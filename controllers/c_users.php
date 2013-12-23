<?
# start output buffering
ob_start();

class users_controller extends base_controller {

    public function __construct() {
        parent::__construct();
    } 

    public function index() {
        Router::redirect("/users/profile");
    }

    public function signup($email_exists = NULL, $invalid_email = NULL,  $empty_field = NULL) {

        # set up view & title
        $this->template->content = View::instance('v_users_signup');
        $this->template->title = 'Sign Up';
        $this->template->content->username_exists = $username_exists;
        $this->template->content->email_exists = $email_exists;
        $this->template->content->invalid_email = $invalid_email;
        $this->template->content->empty_field = $empty_field;

        # render view
        echo $this->template;
    }

    # user sign up
    public function p_signup() {
        $input_check = array();

        # check for email duplicates
        $username_exists = DB::instance(DB_NAME)->select_field("SELECT email FROM users WHERE username = '".$_POST['username']."'");
        if ($username_exists)
            $username_exists = true;

        # check for email duplicates
        $email_exists = DB::instance(DB_NAME)->select_field("SELECT email FROM users WHERE email = '".$_POST['email']."'");
        if ($email_exists)
            $email_exists = true;

        # check for a valid email
        if(!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL))
            $invalid_email = true;      
        else $invalid_email = false;

        # check for empty fields
        $empty_field = false;
        if(empty($_POST['first_name']) || empty($_POST['last_name']) || empty($_POST['password']) || empty($_POST['email']))
                $empty_field = true;


        # add time created 
        $_POST['created'] = Time::now();

        # encrypt password
        $_POST['password'] = sha1(PASSWORD_SALT.$_POST['password']);
        $_POST['token'] = sha1(TOKEN_SALT.$_POST['email'].Utils::generate_random_string());

        if (!$email_exists && !$invalid_email && !$empty_field)
        {
            # insert form data into table
            DB::instance(DB_NAME)->insert_row('users', $_POST);
            $token = $_POST['token'];
            setcookie('token', $token, strtotime('+2 week'), '/');
            # send to login page
            Router::redirect('/users/profile');
        }

        else
            # show what errors occured
            $this->signup($email_exists, $invalid_email, $empty_field);
    }

    public function login($error = NULL){
        # setup view & title
        $this->template->content = View::instance('v_users_login');
        $this->template->title = 'Log In';
        # pass data to view
        $this->template->content->error = $error;
        # render view
        echo $this->template;
    }

    public function p_login(){

        # sanatize user data
        $_POST = DB::instance(DB_NAME)->sanitize($_POST);

        # match password to encryption
        $_POST['password'] = sha1(PASSWORD_SALT.$_POST['password']);

        # search & match with database
        $q = 'SELECT token 
            FROM users
            WHERE username = "'.$_POST['username'].'"
            AND password = "'.$_POST['password'].'"';

        $token = DB::instance(DB_NAME)->select_field($q);

        # success: store cookie and send to landing page
        if($token) {

            setcookie('token', $token, strtotime('+2 weeks'), '/');
            Router::redirect("/index");
        }

        # fail: send back to login page
        else {
            Router::redirect("/users/login/error");
        }
    }

        public function logout() {
        # token for next login
        $new_token = sha1(TOKEN_SALT.$this->user->email.Utils::generate_random_string());

        # update to database
        $data = Array("token" => $new_token);
        DB::instance(DB_NAME)->update("users", $data, "WHERE token = '".$this->user->token."'");

        # delete cookie and send to landing page
        setcookie("token", "", strtotime('-1 year'), '/');
        Router::redirect("/");
    }


    public function profile() {

        # not authemticated: redirect
        if(!$this->user){
            Router::redirect('/users/login');
        }

        # setup view
        $this->template->content = View::instance('v_users_profile');
        $this->template->title = $this->user->username."'s Profile";

        $q = "SELECT *
              FROM posts
              WHERE posts.user_id = ".$this->user->user_id;

        $yourPosts = DB::instance(DB_NAME)->select_rows($q);

        $q = "SELECT 
                    posts.post_title,
                    posts.created,
                    posts.image1,
                    posts.post_id,
                    posts.user_id AS post_user_id,
                    users_users.user_id AS follower_id
                FROM posts
                INNER JOIN users_users
                    ON posts.user_id = users_users.user_id_followed
                WHERE users_users.user_id = ".$this->user->user_id;

        # run query
        $theirPosts = DB::instance(DB_NAME)->select_rows($q);

        # pass the data to the view
        $this->template->content->yourPosts = $yourPosts;
        $this->template->content->theirPosts = $theirPosts;

        # disaply view
        echo $this->template;
    }

    public function postPage($user_id){
        # set view for User's post page
        $this->template->content = View::instance('v_users_postPage');
            
 
        # SQL query
        $q = "SELECT *
              FROM posts
              WHERE posts.user_id = ".$user_id;

        $r = "SELECT username
            FROM users
            WHERE users.user_id = ".$user_id;

        # run query
        $posts = DB::instance(DB_NAME)->select_rows($q);
        $username = DB::instance(DB_NAME)->select_field($r);

        # pass data to view
        $this->template->content->posts = $posts;
        $this->template->content->user = $username;

        # Now set the <title> tag
        $this->template->title = $username."'s SOCI";   
                                        
        # Render the view
        echo $this->template;

    }


} # end of the class
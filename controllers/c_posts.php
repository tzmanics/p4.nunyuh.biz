<?php 
class posts_controller extends base_controller {

	public function __construct(){
		parent::__construct();
	}

	public function add() {

		# not authemticated: redirect
		if(!$this->user){
			Router::redirect("/users/login");
		} else {

			# setup view & title
			$this->template->content = View::instance('v_posts_add');
			$this->template->title = "New Post";

			# load js files
			$client_files_body = Array(
		        "/js/jquery.form.js",
		        "/js/posts_add.js"
		    );

			# add client files
			$this->template->client_files_body = Utils::load_client_files($client_files_body);

			#render view
			echo $this->template;
			}
		}

    public function p_add(){
            # set up data
            $_POST['user_id'] = $this->user->user_id;
            $_POST['created'] = Time::now();
            
            # insert into DB
            DB::instance(DB_NAME)->insert('posts', $_POST);

            # feedback
            echo 'upload success! <a href="/posts/add">Add another!</a>';
    }

	public function index(){
		# send to main page
		Router::redirect("/");
	}

	public function follow($user_id_followed){
		# not authemticated: redirect
        if(!$this->user){
            Router::redirect('/users/login');
        }
		# prepare data array to be inserted
		$data = Array(
			"created" => Time::now(),
			"user_id" => $this->user->user_id,
			"user_id_followed" => $user_id_followed
			);

		# insert
		DB::instance(DB_NAME)->insert('users_users', $data);

		# send user back 
		Router::redirect("/");
	}

	public function unfollow($user_id_followed){
		 # not authemticated: redirect
        if(!$this->user){
            Router::redirect('/users/login');
        }

		# delete the connection
		$where_condition = 'WHERE user_id = '.$this->user->user_id.' 
							AND user_id_followed = '.$user_id_followed;
		DB::instance(DB_NAME)->delete('users_users', $where_condition);

		# send user back
		Router::redirect("/users/profile");
	}


	public function pages($post_id){

        # setup view for page for ea post
        $this->template->content = View::instance('v_posts_pages');
        $this->template->title = "SOCI";

        # SQL query for posts
        $q = "SELECT *
            FROM posts
            WHERE post_id = ".$post_id;

        # run query
        $posts = DB::instance(DB_NAME)->select_rows($q);

        # SQL query for user info
        $r = "SELECT user_id
        	FROM posts
        	WHERE post_id = ".$post_id;

    	$post_user_id = DB::instance(DB_NAME)->select_field($r);

        $s = "SELECT username
        	FROM users
        	WHERE user_id =".$post_user_id;

    	$post_username = DB::instance(DB_NAME)->select_field($s);

    	# pass data to view
        $this->template->content->users = $post_username;
        $this->template->content->usersID = $post_user_id;
        $this->template->content->posts = $posts;

        # display view
        echo $this->template;
    }

	public function deletePost($delete_post_id){
		# delete the post
		$deletePost = 'WHERE post_id = '.$delete_post_id;
		DB::instance(DB_NAME)->delete('posts', $deletePost);
		Router::redirect("/users/profile");

	}

}




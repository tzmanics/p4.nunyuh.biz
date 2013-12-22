<?php 
class posts_controller extends base_controller {

	public function __construct(){
		parent::__construct();
	}

	public function add() {

		# make sure user is logged in to post
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

              # Set up the view
    		$view = View::instance('v_posts_p_add');

		    # Pass data to the view
		    $view->created = $_POST['created'];

            # feedback
            echo 'upload success!';
    }

	public function index(){


		# make sure user is logged in to post
		if(!$this->user){
			Router::redirect("/users/login");
		} else {
			# set up view and title
			$this->template->content = View::instance('v_posts_index');
			$this->template->title = "Who You Follow";

			# SQL query
			$q = "SELECT *
					posts.content,
					posts.created,
					posts.user_id AS post_user_id,
					users_users.user_id AS follower_id,
					users.first_name,
					users.last_name,
					users.image
				FROM posts
				INNER JOIN users_users
					ON posts.user_id = users_users.user_id_followed
				INNER JOIN users
					ON posts.user_id = users.user_id
				WHERE users_users.user_id = ".$this->user->user_id;

		    # run query
			$posts = DB::instance(DB_NAME)->select_rows($q);

			# pass data to view
			$this->template->content->posts = $posts;

			$q = "SELECT * FROM users";

			# get all users store array in $users
			$users = DB::instance(DB_NAME)->select_rows($q);

			$q = "SELECT * 
				FROM users_users 
				WHERE user_id = ".$this->user->user_id;

			# get users followed store array in $connections 
			$connections = DB::instance(DB_NAME)->select_array($q, 'user_id_followed');


	        # pass the data to the view
			$this->template->content->users = $users;
		    $this->template->content->connections = $connections;

			# render view
			echo $this->template;
		}
	}

	public function users() {
		# set view & title
		$this->template->content = View::instance("v_posts_users");
		$this->template->title = "Users";

		# query to get all users
		$q = "SELECT * FROM users";

	

		# query to find who user following
		$q = "SELECT * 
			  FROM users_users 
			  WHERE user_id = ".$this->user->user_id;

		# get users followed store array in $connections
		$connections = DB::instance(DB_NAME)->select_array($q, 'user_id_followed');

		# pass users and connections data to view
		$this->template->content->users = $users;
		$this->template->content->connections = $connections;

		# render view
		echo $this->template;

	}

	public function follow($user_id_followed){
		# prepare data array to be inserted
		$data = Array(
			"created" => Time::now(),
			"user_id" => $this->user->user_id,
			"user_id_followed" => $user_id_followed
			);

		# insert
		DB::instance(DB_NAME)->insert('users_users', $data);

		# send user back 
		Router::redirect("/posts");
	}

	public function unfollow($user_id_followed){
		# delete the connection
		$where_condition = 'WHERE user_id = '.$this->user->user_id.' 
							AND user_id_followed = '.$user_id_followed;
		DB::instance(DB_NAME)->delete('users_users', $where_condition);

		# send user back
		Router::redirect("/posts");
	}


	public function pages($post_id){

        # setup view
        $this->template->content = View::instance('v_posts_pages');
        $this->template->title = $this->user->username;

        # SQL query of posts info
        $q = "SELECT *
            FROM posts
            WHERE post_id = ".$tpost_id;

        # run query
        $posts = DB::instance(DB_NAME)->select_rows($q);

        # pass data to view
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




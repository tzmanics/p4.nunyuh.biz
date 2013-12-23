<?php

class index_controller extends base_controller {
	
	/*-------------------------------------------------------------------------------------------------

	-------------------------------------------------------------------------------------------------*/
	public function __construct() {
		parent::__construct();
	} 
		
	/*-------------------------------------------------------------------------------------------------
	Accessed via http://localhost/index/index/
	-------------------------------------------------------------------------------------------------*/
	public function index() {
		
		# set view
		$this->template->content = View::instance('v_index_index');
			
		# set title
		$this->template->title = "SOCI";
	
	    # SQL query for all posts info
		$q = "SELECT *
			  FROM posts
			  ORDER BY posts.created";

		# run query
		$posts = DB::instance(DB_NAME)->select_rows($q);

		# pass data to view
		$this->template->content->posts = $posts;	
	      					     		
		# render the view
		echo $this->template;

	} # End of method
	
	
} # End of class

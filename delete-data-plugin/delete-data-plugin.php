<?php 
	/*
		Plugin Name:  Teacher Plugin (To test the uninstall functionality)
		Plugin URI:   https://www.google.com/
		Description:  Basic Custom Books WordPress Plugin. Add this <strong>Shortcode: [teacher_shortcode]</strong> on respective page to display its content on that page.
		Version:      1.0
		Author:       Sarang
		Author URI:   https://www.google.com/
		License:      No
		License URI:  No
		Text Domain:  www.google.com
		Domain Path:  /languages
	*/
	defined( 'ABSPATH' ) or die( 'You cannot access this file' );

	/*class emailer {
	  static function send($post_ID)  {
	    $friends = 'sarangs@bsf.io';
	    mail($friends,"This is a plugin development practice",'This is a plugin development practice');
	    return $post_ID;
	  }
	}

	$myEmailClass = new emailer();
	add_action('publish_post', array($myEmailClass, 'send'));

	echo "<script>alert('It is running');</script>";*/

	/**
	 *  Here all the plugin functionality is listed or defined
	 */
	class deleteDataPlugin
	{
		
		function __construct(){
			add_action( 'init', array( $this, 'registering_cpt_teacher') );
		}

		function activate(){
			flush_rewrite_rules();
		}

		function deactivate(){
			//code..
		}
		


		// creating custom post type
		static function registering_cpt_teacher(){
			$teacher_labels = array(
		        'name'                => _x( 'Teachers', 'Post Type General Name', 'twentyseventeen' ),
		        'singular_name'       => _x( 'Teachers', 'Post Type Singular Name', 'twentyseventeen' ),
		        'menu_name'           => __( 'Teachers', 'twentyseventeen' ),
		        'parent_item_colon'   => __( 'Teachers', 'twentyseventeen' ),
		        'all_items'           => __( 'All Teachers', 'twentyseventeen' ),
		        'view_item'           => __( 'View Teachers', 'twentyseventeen' ),
		        'add_new_item'        => __( 'Add New Teachers', 'twentyseventeen' ),
		        'add_new'             => __( 'Add New', 'twentyseventeen' ),
		        'edit_item'           => __( 'Edit Teachers', 'twentyseventeen' ),
		        'update_item'         => __( 'Update Teachers', 'twentyseventeen' ),
		        'search_items'        => __( 'Search Teachers', 'twentyseventeen' ),
		        'not_found'           => __( 'Not Found', 'twentyseventeen' ),
		        'not_found_in_trash'  => __( 'Not found in Trash', 'twentyseventeen' ),
		    ); 

		    $teacher_options = array(
		        'label'               => __( 'postteacher', 'twentyseventeen' ),
		        'description'         => __( 'Teachers Description', 'twentyseventeen' ),
		        'labels'              => $teacher_labels,
		        // Features this CPT supports in Post Editor
		        'supports'            => array( 'title', 'editor', 'author', 'thumbnail', 'custom-fields', ),
		        'taxonomies'          => array( 'department' ),
		        'hierarchical'        => false,
		        'public'              => true,
		        'show_ui'             => true,
		        'show_in_menu'        => true,
		        'show_in_nav_menus'   => true,
		        'show_in_admin_bar'   => true,
		        'menu_icon'           => 'dashicons-admin-users',
		        'capability_type'     => array('teacher','teachers'),
		        'map_meta_cap'        => true,
		        'can_export'          => true,
		        'has_archive'         => true,
		        'exclude_from_search' => false,
		        'publicly_queryable'  => true,
		        'capability_type'     => 'page',
		    );
		    //registering custom post type
			register_post_type( 'teacher', $teacher_options );

			//creating shortcode
			function teacher_shortcode_generate() { 
			    ob_start(); 
			    $data = '<div class="facultybox">'; 
			        $query = new WP_Query('post_type=teacher&showposts=5&orderby=rand'); 
			            while( $query->have_posts() ):$query->the_post(); 
			            $data .= '<div class="book-board" id="teacher-'.get_the_ID().'">'; 
			                $data .= '<div class=""> <h3 class="title">'.get_the_title().'</h3><p>'.get_the_excerpt().'</p><a href="'.get_the_permalink().'" class="btn btn-default btn-sm read-more-btn">Read More</a></div>'; 
			            $data .= '</div>'; 
			        endwhile; wp_reset_postdata(); 
			    $data .= '</div>'; 
			    return $data; 
			 } 

			 // generating shortcode for teacher custom post
			 add_shortcode('teacher_shortcode','teacher_shortcode_generate');
		}


	}


	if(class_exists('deleteDataPlugin')){

		$deleteDataPlugin = new deleteDataPlugin();

	}

	//activate
	register_activation_hook(__FILE__, array($deleteDataPlugin, 'activate' ));

	//deactivate
	register_activation_hook(__FILE__, array($deleteDataPlugin, 'deactivate' ));

	//Uninstall
	register_uninstall_hook(__FILE__, array($deleteDataPlugin, 'uninstall' ));
?>
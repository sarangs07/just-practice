
<?php
	// this is the function to add the style of parent theme and the child theme. It also removes the conflits between the css files
	function childtheme_enqueue_styles() {
	    $parent_style = 'parent-style';

	    wp_enqueue_style( $parent_style, get_template_directory_uri() . '/style.css' );
	    wp_enqueue_style( 'child-style',
	        get_stylesheet_directory_uri() . '/style.css',
	        array( $parent_style )
	    );
	}
	add_action( 'wp_enqueue_scripts', 'childtheme_enqueue_styles' );

	//registering custom/external css
	function register_bootstrap_css() {
		wp_register_style( 'bootstrap-css', 'https://stackpath.bootstrapcdn.com/bootstrap/4.1.2/css/bootstrap.min.css' );
		wp_enqueue_style( 'bootstrap-css' );
	}
	add_action( 'wp_enqueue_scripts', 'register_bootstrap_css' );


	// creating new own custom user role
	function add_faculty_roles(){
		add_role('faculty_manager',
                'Faculty Manager',
                array(
                    'read' => true,
                    'edit_posts' => true,
                    'delete_posts' => true,
                    'publish_posts' => true,
                    'upload_files' => true,
                )
            );
	}

	// creating my own custom post type
	function custom_faculty_post(){

			$labels = array(
		        'name'                => _x( 'Faculties', 'Post Type General Name', 'twentyseventeen' ),
		        'singular_name'       => _x( 'Faculty', 'Post Type Singular Name', 'twentyseventeen' ),
		        'menu_name'           => __( 'Faculty', 'twentyseventeen' ),
		        'parent_item_colon'   => __( 'Faculty', 'twentyseventeen' ),
		        'all_items'           => __( 'All Faculties', 'twentyseventeen' ),
		        'view_item'           => __( 'View Faculty', 'twentyseventeen' ),
		        'add_new_item'        => __( 'Add New Faculty', 'twentyseventeen' ),
		        'add_new'             => __( 'Add New', 'twentyseventeen' ),
		        'edit_item'           => __( 'Edit Faculty', 'twentyseventeen' ),
		        'update_item'         => __( 'Update Faculty', 'twentyseventeen' ),
		        'search_items'        => __( 'Search Faculty', 'twentyseventeen' ),
		        'not_found'           => __( 'Not Found', 'twentyseventeen' ),
		        'not_found_in_trash'  => __( 'Not found in Trash', 'twentyseventeen' ),
		    ); 

		    $options = array(
		        'label'               => __( 'postfaculty', 'twentyseventeen' ),
		        'description'         => __( 'Faculty Description', 'twentyseventeen' ),
		        'labels'              => $labels,
		        // Features this CPT supports in Post Editor
		        'supports'            => array( 'title', 'editor', 'author', 'thumbnail', 'custom-fields', ),
		        'taxonomies'          => array( 'department' ),
		        'hierarchical'        => false,
		        'public'              => true,
		        'show_ui'             => true,
		        'show_in_menu'        => true,
		        'show_in_nav_menus'   => true,
		        'show_in_admin_bar'   => true,
		        'menu_position'       => 2,
		        'menu_icon'           => 'dashicons-admin-users',
		        'capability_type'     => array('faculty','faculties'),
		        'map_meta_cap'        => true,
		        'can_export'          => true,
		        'has_archive'         => true,
		        'exclude_from_search' => false,
		        'publicly_queryable'  => true,
		        'capability_type'     => 'post',
		    );

		    register_post_type( 'faculty', $options);
	}

	add_action( 'init', 'custom_faculty_post', 0 );


	
	// adding created rules
	add_action('admin_init','add_faculty_roles',998);
    function add_role_caps() {

        // Add the roles you'd like to administer the custom post types
        $roles = array('faculty_manager','editor','administrator');

        // Loop through each role and assign capabilities
        foreach($roles as $the_role) { 

             $role = get_role($the_role);

                 $role->add_cap( 'read' );
                 $role->add_cap( 'read_faculty');
                 $role->add_cap( 'read_private_faculties' );
                 $role->add_cap( 'edit_faculty' );
                 $role->add_cap( 'edit_faculties' );
                 $role->add_cap( 'edit_others_faculties' );
                 $role->add_cap( 'edit_published_faculties' );
                 $role->add_cap( 'publish_faculties' );
                 $role->add_cap( 'delete_others_faculties' );
                 $role->add_cap( 'delete_private_faculties' );
                 $role->add_cap( 'delete_published_faculties' );

        }}


        //adding shortcode for custom post type

        function faculty_shortcode_generate() { 
		    ob_start(); 
		    $data = '<div class="facultybox">'; 
		        $query = new WP_Query('post_type=faculty&showposts=5&orderby=rand'); 
		            while( $query->have_posts() ):$query->the_post(); 
		            $data .= '<div class="faculty-board" id="faculty-'.get_the_ID().'">'; 
		                $data .= '<div class=""> <h3 class="title">'.get_the_title().'</h3><p>'.get_the_excerpt().'</p><a href="'.get_the_permalink().'" class="btn btn-default btn-sm read-more-btn">Read More</a></div>'; 
		            $data .= '</div>'; 
		        endwhile; wp_reset_postdata(); 
		    $data .= '</div>'; 
		    return $data; 
		 } 
		add_shortcode('faculty_shortcode','faculty_shortcode_generate');



		// adding mesonry libery from cdnjs
		function register_masonry_script() {
			wp_register_script( 'masonry', '//cdnjs.cloudflare.com/ajax/libs/masonry/3.1.2/masonry.pkgd.js' );
			wp_enqueue_script( 'masonry' );
		}
		add_action( 'wp_enqueue_masonry_scripts', 'register_masonry_script' );


		function show_names(){
	    	$names = array(
	    		'Name One',
	    		'Name Two',
	    		'Name Three',
	    		'Name Four'
	    	);

	    	/*$list = "<ul>";

	    	if(has_filter('add_name_to_show')){
	    		$names = apply_filters( 'add_name_to_show', $names );
	    	}

	    	foreach($names as $name){
	    		$list .= '<li>' . $name . '</li>';
	    	}

	    	$list .= "</ul>";*/

	    	//return $list;
	    }


	    function add_extra_names( $names ){
	    	//print_r($names);
	    	array_push($names, 'Number Five');
	    	return $names;
	    }

	    add_filter( 'add_name_to_show', 'add_extra_names' );
	    echo show_names();

	    function change_all_titles( $titles ){
	    	//print_r($titles);
	    	$titles = "<i style='color:#ccc;text-decoration:underline;'>".$titles.": </i>";
	    	return $titles;
	    	
	    }
		add_filter( 'change_title', 'change_all_titles');


?>
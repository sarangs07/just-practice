<?php

	/*
		@package facultyPlugin
	*/
	
	if( ! defined( 'WP_UNINSTALL_PLUGIN' )){
		die;
	}

	$faculy = get_posts( array ( 'post_type' => 'faculty', 'numberposts' => -1) );

	foreach ($faculties as $faculty) {
		wp_delete_posts( $faculty->ID, true);
	}
?>
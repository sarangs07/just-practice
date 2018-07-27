<?php

	/*
		@package deleteDataPlugin
	*/
	
	if( ! defined( 'WP_UNINSTALL_PLUGIN' )){
		die;
	}

	$teacher = get_posts( array ( 'post_type' => 'teacher', 'numberposts' => -1) );

	foreach ($faculties as $teacher) {
		wp_delete_posts( $teacher->ID, true);
	}
?>
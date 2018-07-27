<?php

	/*
		@package booksPlugin
	*/
	
	if( ! defined( 'WP_UNINSTALL_PLUGIN' )){
		die;
	}

	$book = get_posts( array ( 'post_type' => 'book', 'numberposts' => -1) );

	foreach ($faculties as $book) {
		wp_delete_posts( $book->ID, true);
	}
?>
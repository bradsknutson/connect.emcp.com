<?php

    include('../../../wp-load.php');

    $tweet_content = $_POST['tweet_content'];
    $tweet_url = $_POST['tweet_url'];

    // Create post object
    $new_post = array();
    $new_post['post_title'] = "Connect With Us on Twitter";
    $new_post['post_content'] = $tweet_content ."\r\n\r\n<a href=\"". $tweet_url ."\" target=\"_blank\">Connect with us!</a>";
    $new_post['post_status'] = "publish";
    $new_post['post_author'] = 8;
    $new_post['post_category'] = array('26');

    // Insert the post into the database
    
    $post_id = wp_insert_post( $new_post, true );
    $attach_id = '304';
    set_post_thumbnail( $post_id, $attach_id );

?>
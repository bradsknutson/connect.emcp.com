<?php
/**
 * The script is used to display the most recent post on emcp.com
 *
 */
?>
<?php 

    require '../../../wp-load.php';

    $post = wp_get_recent_posts(array(
        'numberposts' => 1
    ));

    echo '<h2><a href="'. get_permalink($post[0]['ID']). '">'. $post[0]['post_title']. '</a></h2><p>'. get_excerpt_by_id($post[0]['ID']) .'</p><p><a href="'. get_permalink($post[0]['ID']). '">Continue readering -></a></p>';

    function get_excerpt_by_id($post_id){
        $the_post = get_post($post_id);
        $the_excerpt = $the_post->post_content;
        $excerpt_length = 35;
        $the_excerpt = strip_tags(strip_shortcodes($the_excerpt)); //Strips tags and images
        $words = explode(' ', $the_excerpt, $excerpt_length + 1);

        if(count($words) > $excerpt_length) :
            array_pop($words);
            array_push($words, '...');
            $the_excerpt = implode(' ', $words);
        endif;

        $the_excerpt = '<p>' . $the_excerpt . '</p>';

        return $the_excerpt;
    }

?>
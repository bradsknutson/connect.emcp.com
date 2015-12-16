<?php
/**
 * The script is used to display the most recent post on emcp.com
 *
 */
?>
<?php 

    require '../../../wp-load.php';

    $post = wp_get_recent_posts(array(
        'numberposts' => 3
    ));

    $d1 = $post[0]['post_date'];
    $d2 = $post[1]['post_date'];
    $d3 = $post[2]['post_date'];

    $day1 = explode( ' ', $d1 );
    $day2 = explode( ' ', $d2 );
    $day3 = explode( ' ', $d3 );

    $date1 = date( 'F j, Y', strtotime( $day1[0] ) );
    $date2 = date( 'F j, Y', strtotime( $day2[0] ) );
    $date3 = date( 'F j, Y', strtotime( $day3[0] ) );

    echo '<div class="one-third first"><h2><a href="'. get_permalink($post[0]['ID']). '">'. $post[0]['post_title']. '</a></h2><p class="date">'. $date1 .'</p>'. get_excerpt_by_id($post[0]['ID']) .'<p><a href="'. get_permalink($post[0]['ID']). '">Read more...</a></p></div>
    
    ';
    echo '<div class="one-third second"><h2><a href="'. get_permalink($post[1]['ID']). '">'. $post[1]['post_title']. '</a></h2><p class="date">'. $date2 .'</p>'. get_excerpt_by_id($post[1]['ID']) .'<p><a href="'. get_permalink($post[1]['ID']). '">Read more...</a></p></div>
    
    ';
    echo '<div class="one-third third last"><h2><a href="'. get_permalink($post[2]['ID']). '">'. $post[2]['post_title']. '</a></h2><p class="date">'. $date3 .'</p>'. get_excerpt_by_id($post[2]['ID']) .'<p><a href="'. get_permalink($post[2]['ID']). '">Read more...</a></p></div>';

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
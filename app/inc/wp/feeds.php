<?php 
/**
 *
 * Default settings for Feeds
 *
 */

// Put post thumbnails into rss feed
function feed_post_thumbnail($content) {
    global $post;
    if(has_post_thumbnail($post->ID)) {
        $content = '' . $content;
    }
    return $content;
}
add_filter('the_excerpt_rss', 'feed_post_thumbnail');
add_filter('the_content_feed', 'feed_post_thumbnail');


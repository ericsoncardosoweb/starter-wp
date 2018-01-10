<?php

/*----------  Shortcode  ----------*/



// Share Button

function social_sharing_buttons() {

    // Get current page URL

    $socialURL = get_permalink();



    // Get current page title

    $socialTitle = str_replace( ' ', '%20', get_the_title());



    // Get Post Thumbnail for pinterest

    $socialThumbnail = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full' );



    // Construct sharing URL without using any script

    $twitterURL = 'https://twitter.com/intent/tweet?text='.$socialTitle.'&amp;url='.$socialURL.'&amp;';

    $facebookURL = 'https://www.facebook.com/sharer/sharer.php?u='.$socialURL;

    $googleURL = 'https://plus.google.com/share?url='.$socialURL;

    $bufferURL = 'https://bufferapp.com/add?url='.$socialURL.'&amp;text='.$socialTitle;

    $linkedinURL = 'https://www.linkedin.com/shareArticle?mini=true&url='.$socialURL.'&title='.$socialTitle.'&summary=&source=';



    $mailTo = 'mailto:'.get_bloginfo('admin_email').'?subject=Compartilhamento - '.get_bloginfo('name');



    // Based on popular demand added Pinterest too

    $pinterestURL = 'https://pinterest.com/pin/create/button/?url='.$socialURL.'&amp;media='.$socialThumbnail[0].'&amp;description='.$socialTitle;



    // Add sharing button at the end of page/page content

    $content .= '<h3 class="social-share-title">Compartilhe essse post:</h3>';

    $content .= '<nav class="social-share">';

    $content .= '<a class="social-link facebook link-popup" href="'.$facebookURL.'"><i class="fa fa-facebook"></i></a>';

    $content .= '<a class="social-link twitter link-popup" href="'. $twitterURL .'"><i class="fa fa-twitter"></i></a>';

    // $content .= '<a class="social-link twitter link-popup" href="'. $pinterestURL .'"><i class="fa fa-pinterest"></i></a>';

    $content .= '<a class="social-link google-plus link-popup" href="'.$googleURL.'"><i class="fa fa-google-plus"></i></a>';

    // $content .= '<a class="social-link email" href="'.$mailTo.'"><i class="fa fa-envelope"></i></a>';

    // $content .= '<a class="social-link whatsapp show-mobile" href="whatsapp://send?text='.$BLOG_NAME.' '.$socialURL.'" data-action="share/whatsapp/share"><i class="fa fa-whatsapp"></i></a>';

    $content .= '</nav>';



    return $content;

};

add_shortcode('sharing-buttons','social_sharing_buttons');

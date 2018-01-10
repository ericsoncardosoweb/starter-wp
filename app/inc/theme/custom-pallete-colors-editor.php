<?php 

function agatha_theme_custom_palette( $init ) {



$custom_colours = ' "ff5032", "Color Primary", "6E9B19", "Green Secondary", "00ACE2", "Cyan Primary", "0097C6", "Cyan Secondary", "003D68", "Blue Primary", "003052", "Blue Secondary", "728893", "Grey Primary", "5F717A", "Grey Secondary", "ffffff", "White" ';    



$init['textcolor_map'] = '['.$custom_colours.']';

 

return $init;

}



add_filter('tiny_mce_before_init', 'agatha_theme_custom_palette');

<?php 
function modify_contact_methods($profile_fields) {

  // Add new fields
  $profile_fields['facebook'] = 'Facebook URL';
  $profile_fields['twitter'] = 'Twitter URL';
  $profile_fields['pinterest'] = 'Pinterest URL';
  $profile_fields['instagram'] = 'Instagram URL';
  $profile_fields['gplus'] = 'Google+ URL';
  $profile_fields['author_email'] = 'E-mail Público';

  // Remove old fields
  unset($profile_fields['aim']);

    return $profile_fields;

}
add_filter('user_contactmethods', 'modify_contact_methods');

// get_the_author_meta('twitter');
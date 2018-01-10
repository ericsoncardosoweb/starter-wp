<?php 

if (isset($_GET['activated']) && is_admin()){

    add_action('init', 'create_initial_pages');

}



function create_initial_pages() {

    $pages = array(

        'page1' => 'Referências do Tema',

        'page2' => 'Home',

        'page3' => 'Blog',

        'page4' => 'Contato',

        'page5' => 'Quem Somos'

    );

    foreach($pages as $key => $value) {

        $id = get_page_by_title($value);

        $page = array(

            'post_type'   => 'page',

            'post_title'  => $value,

            'post_name'   => $key,

            'post_status' => 'publish',

            'post_author' => 1,

            'post_parent' => ''

        );

        if (!isset($id)) wp_insert_post($page);

    };

}


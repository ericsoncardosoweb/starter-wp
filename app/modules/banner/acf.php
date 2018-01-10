<?php
if(function_exists("register_field_group"))
{
	register_field_group(array (
		'id' => 'acf_banners',
		'title' => 'Banners',
		'fields' => array (
			array (
				'key' => 'field_59da16e6c4659',
				'label' => 'Título',
				'name' => 'titulo',
				'type' => 'wysiwyg',
				'default_value' => '',
				'toolbar' => 'basic',
				'media_upload' => 'no',
			),
			array (
				'key' => 'field_59d8ea8f0742f',
				'label' => 'Imagens',
				'name' => '',
				'type' => 'tab',
			),
			array (
				'key' => 'field_59d8eb0107431',
				'label' => 'Imagem Desktop',
				'name' => 'bg-desktop',
				'type' => 'image',
				'instructions' => 'Esta imagem será aplicada para todos os dispositivos caso as demais opções não sejam preenchidas.',
				'required' => 1,
				'save_format' => 'url',
				'preview_size' => 'thumbnail',
				'library' => 'all',
			),
			array (
				'key' => 'field_59d8ebd707432',
				'label' => 'Imagem Desktop Menores',
				'name' => 'imagem_desktop_menores',
				'type' => 'image',
				'instructions' => 'Para resoluções menores que 1360px',
				'save_format' => 'url',
				'preview_size' => 'thumbnail',
				'library' => 'all',
			),
			array (
				'key' => 'field_59d8ec0907433',
				'label' => 'Imagem Tablet',
				'name' => 'imagem_tablet',
				'type' => 'image',
				'instructions' => 'Para resoluções menores que 980px',
				'save_format' => 'url',
				'preview_size' => 'thumbnail',
				'library' => 'all',
			),
			array (
				'key' => 'field_59d8ec3807434',
				'label' => 'Imagem Mobile',
				'name' => 'imagem_mobile',
				'type' => 'image',
				'instructions' => 'Para resoluções menores que 620px',
				'save_format' => 'url',
				'preview_size' => 'thumbnail',
				'library' => 'all',
			),
			array (
				'key' => 'field_59d8eacb07430',
				'label' => 'Conteúdo',
				'name' => '',
				'type' => 'tab',
			),
			array (
				'key' => 'field_59d8e92f8fdf3',
				'label' => 'Descrição',
				'name' => 'description',
				'type' => 'wysiwyg',
				'default_value' => '',
				'toolbar' => 'full',
				'media_upload' => 'no',
			),
			array (
				'key' => 'field_59d8e9688fdf4',
				'label' => 'Link',
				'name' => 'link',
				'type' => 'text',
				'default_value' => '',
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
				'formatting' => 'none',
				'maxlength' => '',
			),
			array (
				'key' => 'field_59d8e9b68fdf5',
				'label' => 'Opções de Link',
				'name' => 'options_link',
				'type' => 'radio',
				'choices' => array (
					'default' => 'Normal',
					'anchor' => 'Âncora',
					'target' => 'Abrir em nova guia',
				),
				'other_choice' => 0,
				'save_other_choice' => 0,
				'default_value' => 'default',
				'layout' => 'horizontal',
			),
			array (
				'key' => 'field_59d8ea500742e',
				'label' => 'Botão',
				'name' => 'button',
				'type' => 'text',
				'instructions' => 'Insira o texto do botão',
				'default_value' => 'Saiba Mais',
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
				'formatting' => 'html',
				'maxlength' => '',
			),
		),
		'location' => array (
			array (
				array (
					'param' => 'post_type',
					'operator' => '==',
					'value' => 'banners',
					'order_no' => 0,
					'group_no' => 0,
				),
			),
		),
		'options' => array (
			'position' => 'acf_after_title',
			'layout' => 'default',
			'hide_on_screen' => array (
			),
		),
		'menu_order' => 0,
	));
}


?>
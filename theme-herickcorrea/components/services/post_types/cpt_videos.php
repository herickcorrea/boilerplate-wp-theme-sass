<?php



/* Custom Post Release */
function WP_Video_post_type() {
	$labels = array(
		'name'                => 'Vídeos',
		'singular_name'       => 'Vídeo',
		'menu_name'           => 'Vídeos',
		'view_item'           => 'Ver Release',
		'add_new_item'        => 'Adicionar novo Release',
		'edit_item'           => 'Editar Release',
		'update_item'         => 'Atualizar Release',
		'search_items'        => 'Buscar Release',
	);
	$args = array(
		'label'               => 'Release',
		'description'         => 'Vídeos na Página',
		'labels'              => $labels,
		'supports'            => array( 'title', 'thumbnail'),
		'hierarchical'        => false,
		'public'              => true,
		'show_ui'             => true,
		'show_in_menu'        => true,
		'show_tagcloud' => true,
		'menu_position'       => 5,
		'show_in_admin_bar'   => true,
		'menu_icon'           => 'dashicons-media-document',
		'show_in_nav_menus'   => false,
		'can_export'          => false,
		'has_archive'         => true,
		'exclude_from_search' => true,
		'rewrite'             => array( 'slug' => 'video' ),
		'publicly_queryable'  => true,
		'capability_type'     => 'post',
	);
	register_post_type( 'video', $args );

}
add_action( 'init', 'WP_Video_post_type', 0 );
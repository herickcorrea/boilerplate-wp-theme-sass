<?php



/* Custom Post Release */
function WP_Release_post_type() {
	$labels = array(
		'name'                => 'Release',
		'singular_name'       => 'Releases',
		'menu_name'           => 'Releases',
		'view_item'           => 'Ver Release',
		'add_new_item'        => 'Adicionar novo Release',
		'edit_item'           => 'Editar Release',
		'update_item'         => 'Atualizar Release',
		'search_items'        => 'Buscar Release',
	);
	$args = array(
		'label'               => 'Release',
		'description'         => 'Campos do Release',
		'labels'              => $labels,
		'supports'            => array( 'title', 'excerpt', 'editor', 'thumbnail'),
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
		'rewrite'             => array( 'slug' => 'release' ),
		'publicly_queryable'  => true,
		'capability_type'     => 'post',
	);
	register_post_type( 'Release', $args );

}
add_action( 'init', 'WP_Release_post_type', 0 );


/**
 * Add Tags
 */

add_action( 'init', 'release_tag_taxonomies' );

function release_tag_taxonomies() 
{
  // Add new taxonomy, NOT hierarchical (like tags)
  $labels = array(
    'name' => _x( 'Tags', 'taxonomy general name' ),
    'singular_name' => _x( 'Tag', 'taxonomy singular name' ),
    'search_items' =>  __( 'Search Tags' ),
    'popular_items' => __( 'Popular Tags' ),
    'all_items' => __( 'All Tags' ),
    'parent_item' => null,
    'parent_item_colon' => null,
    'edit_item' => __( 'Edit Tag' ), 
    'update_item' => __( 'Update Tag' ),
    'add_new_item' => __( 'Add New Tag' ),
    'new_item_name' => __( 'New Tag Name' ),
    'separate_items_with_commas' => __( 'Separate tags with commas' ),
    'add_or_remove_items' => __( 'Add or remove tags' ),
    'choose_from_most_used' => __( 'Choose from the most used tags' ),
    'menu_name' => __( 'Tags' ),
  ); 

  register_taxonomy('tag','release',array( 
    'hierarchical' => false,
    'labels' => $labels,
    'show_ui' => true,
    'update_count_callback' => '_update_post_term_count',
    'query_var' => true,
    'rewrite' => array( 'slug' => 'tag' ),
  ));
}

/**
 * Add Metaboxes
 */
function register_Release_metaboxes() {
	//add_meta_box('mb_Release', 'Dados da Release', 'mb_Release', 'Release', 'normal', 'default');
}
add_action('add_meta_boxes', 'register_Release_metaboxes');

/**
 * Metabox
 */
function mb_Release()
{
    global $post;
    // Noncename needed to verify where the data originated
    echo '<input type="hidden" name="post_meta_noncename" id="post_meta_noncename" value="' . wp_create_nonce( plugin_basename(__FILE__) ) . '" />';

    
}

/**
 * Save posts function
 */
function register_Release_save_post($post_id, $post)
{
    if ( !isset($_POST['post_meta_noncename']) ) {
        return $post->ID;
    } else if ( !wp_verify_nonce($_POST['post_meta_noncename'], plugin_basename(__FILE__) )) {
        return $post->ID;
    }
    // Is the user allowed to edit the post or page?
    if ( !current_user_can('edit_post', $post->ID))
        return $post->ID;

    // File fields
    //$meta['Release_cargo'] = $_POST['Release_cargo'];

    foreach ( $meta as $k=>$v ) {
        // Don't store custom data twice
        if ( $post->post_type == 'revision' )
            return;

        $v = implode(',', (array) $v);
        if ( !$v ) {
            delete_post_meta( $post->ID, $k );
        } else if ( get_post_meta( $post->ID, $k, false) ) {
            update_post_meta( $post->ID, $k, $v );
        } else {
            add_post_meta( $post->ID, $k, $v );
        }
    }
}
// Save post action
add_action('save_post', 'register_Release_save_post', 1, 2);
?>
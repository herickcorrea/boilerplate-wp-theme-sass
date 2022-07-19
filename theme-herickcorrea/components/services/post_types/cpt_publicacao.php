<?php



/* Custom Post Publicacao */
function WP_Publicacao_post_type() {
	$labels = array(
		'name'                => 'Publicação',
		'singular_name'       => 'Publicação',
		'menu_name'           => 'Publicações',
		'view_item'           => 'Ver publicação',
		'add_new_item'        => 'Adicionar nova publicação',
		'edit_item'           => 'Editar publicação',
		'update_item'         => 'Atualizar publicação',
		'search_items'        => 'Buscar publicação',
	);
	$args = array(
		'label'               => 'Publicação',
		'description'         => 'Campos da publicação',
		'labels'              => $labels,
		'supports'            => array( 'title', 'excerpt', 'editor', 'thumbnail'),
		'hierarchical'        => false,
		'public'              => true,
		'show_ui'             => true,
		'show_in_menu'        => true,
		'show_tagcloud' => true,
		'menu_position'       => 5,
		'show_in_admin_bar'   => true,
		'menu_icon'           => 'dashicons-book',
		'show_in_nav_menus'   => false,
		'can_export'          => false,
		'has_archive'         => true,
		'exclude_from_search' => true,
		'rewrite'             => array( 'slug' => 'publicacao' ),
		'publicly_queryable'  => true,
		'capability_type'     => 'post',
	);
	register_post_type( 'Publicacao', $args );

}
add_action( 'init', 'WP_Publicacao_post_type', 0 );


/**
 * Add Tags
 */

add_action( 'init', 'publicacao_tag_taxonomies' );

function publicacao_tag_taxonomies() 
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

  register_taxonomy('tag-livro','publicacao',array( 
    'hierarchical' => false,
    'labels' => $labels,
    'show_ui' => true,
    'update_count_callback' => '_update_post_term_count',
    'query_var' => true,
    'rewrite' => array( 'slug' => 'tag-livro' ),
  ));
}

/**
 * Add Metaboxes
 */
function register_Publicacao_metaboxes() {
	add_meta_box('mb_Publicacao', 'Dados da Publicacao', 'mb_Publicacao', 'Publicacao', 'normal', 'default');
}
add_action('add_meta_boxes', 'register_Publicacao_metaboxes');

/**
 * Metabox
 */
function mb_Publicacao()
{
    global $post;
    // Noncename needed to verify where the data originated
    echo '<input type="hidden" name="post_meta_noncename" id="post_meta_noncename" value="' . wp_create_nonce( plugin_basename(__FILE__) ) . '" />';

    $val = get_post_meta($post->ID, 'autores', true);
    echo '<label for="autores">Autores:</label><br>';
    echo '<input type="text" name="autores" id="autores" class="widefat" value="' . $val . '" />';

       $val = get_post_meta($post->ID, 'organizacao', true);
    echo '<label for="organizacao">Organização:</label><br>';
    echo '<input type="text" name="organizacao" id="organizacao" class="widefat" value="' . $val . '" />';
    
    $val = get_post_meta($post->ID, 'edicao', true);
    echo '<label for="edicao">Edição:</label><br>';
    echo '<input type="text" name="edicao" id="edicao" class="widefat" value="' . $val . '" />';
    
    $val = get_post_meta($post->ID, 'traducao', true);
    echo '<label for="traducao">Tradução:</label><br>';
    echo '<input type="text" name="traducao" id="traducao" class="widefat" value="' . $val . '" />';
    
    $val = get_post_meta($post->ID, 'parceria', true);
    echo '<label for="parceria">Parceria:</label><br>';
    echo '<input type="text" name="parceria" id="parceria" class="widefat" value="' . $val . '" />';
    
    $val = get_post_meta($post->ID, 'ano', true);
    echo '<label for="ano">Ano:</label><br>';
    echo '<input type="text" name="ano" id="ano" class="widefat" value="' . $val . '" />';

    $val = get_post_meta($post->ID, 'leronline', true);
    echo '<label for="leronline">Link para ler online:</label><br>';
    echo '<input type="text" name="leronline" id="leronline" class="widefat" value="' . $val . '" />';
    

    $val = get_post_meta($post->ID, 'link', true);
    echo '<label for="link">Link para download:</label><br>';
    echo '<input type="hidden" name="link" id="link" class="widefat" value="' . $val . '" />';
    echo '<input disabled="disabled" type="text" name="linkd" id="linkd" class="widefat" value="' . $val . '" />';
    echo "<a href='#' class='upload'>Subir arquivo</a><br><br>";


    $val = get_post_meta($post->ID, 'link_acessivel', true);
    echo '<label for="link_acessivel">Link para versão acessível:</label><br>';
    echo '<input type="hidden" name="link_acessivel" id="link_acessivel" class="widefat" value="' . $val . '" />';
    echo '<input disabled="disabled" type="text" name="linkd_acessivel" id="linkd_acessivel" class="widefat" value="' . $val . '" />';
    echo "<a href='#' class='upload_acessivel'>Subir arquivo</a>";

    ?>
    <script>
    // Uploading files
    var file_frame;
    var file_frame_a;

      jQuery('.upload').live('click', function( event ){

        event.preventDefault();

        if ( file_frame ) {
          file_frame.open();
          return;
        }

        file_frame = wp.media.frames.file_frame = wp.media({
          title: jQuery( this ).data( 'uploader_title' ),
          button: {
            text: jQuery( this ).data( 'uploader_button_text' ),
          },
          multiple: false
        });

        file_frame.on( 'select', function() {
          attachment = file_frame.state().get('selection').first().toJSON();
          jQuery('#link').val(attachment.url);
          jQuery('#linkd').val(attachment.url);
        });

        file_frame.open();
      });

      jQuery('.upload_acessivel').live('click', function( event ){

        event.preventDefault();

        if ( file_frame_a ) {
          file_frame_a.open();
          return;
        }

        file_frame_a = wp.media.frames.file_frame = wp.media({
          title: jQuery( this ).data( 'uploader_title' ),
          button: {
            text: jQuery( this ).data( 'uploader_button_text' ),
          },
          multiple: false
        });

        file_frame_a.on( 'select', function() {
          attachment = file_frame_a.state().get('selection').first().toJSON();
          jQuery('#link_acessivel').val(attachment.url);
          jQuery('#linkd_acessivel').val(attachment.url);
        });

        file_frame_a.open();
      });
    </script>
    <?php
    
    
    
}

/**
 * Save posts function
 */
function register_Publicacao_save_post($post_id, $post)
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
    $meta['autores'] = $_POST['autores'];
    $meta['organizacao'] = $_POST['organizacao'];
    $meta['edicao'] = $_POST['edicao'];
    $meta['traducao'] = $_POST['traducao'];
    $meta['parceria'] = $_POST['parceria'];
    $meta['ano'] = $_POST['ano'];
    $meta['link'] = $_POST['link'];
    $meta['link_acessivel'] = $_POST['link_acessivel'];
    $meta['leronline'] = $_POST['leronline'];

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
add_action('save_post', 'register_Publicacao_save_post', 1, 2);
?>
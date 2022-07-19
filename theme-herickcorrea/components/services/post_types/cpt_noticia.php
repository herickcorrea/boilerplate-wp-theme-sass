<?php

/**
 * Rename default Posts
 */
function WP_change_post_label() {
    global $menu;
    global $submenu;
    $menu[5][0] = 'Notícias';
    $submenu['edit.php'][5][0] = 'Notícias';
    $submenu['edit.php'][10][0] = 'Adicionar notícia';
    echo '';
}
function WP_change_post_object() {
    global $wp_post_types;
    $labels = &$wp_post_types['post']->labels;
    $labels->name = 'Notícias';
    $labels->singular_name = 'Notícia';
    $labels->add_new = 'Adicionar Notícia';
    $labels->add_new_item = 'Adicionar Notícia';
    $labels->edit_item = 'Editar Notícia';
    $labels->new_item = 'Notícia';
    $labels->view_item = 'Ver Notícia';
    $labels->search_items = 'Pesquisar Notícias';
    $labels->not_found = 'Nenhuma notícia encontrada';
    $labels->not_found_in_trash = 'Nenhuma notícia encontrada na lixeira';
    $labels->all_items = 'Todas as notícias';
    $labels->menu_name = 'Notícias';
    $labels->name_admin_bar = 'Notícias';
}
add_action('admin_menu', 'WP_change_post_label');
add_action('init', 'WP_change_post_object');
add_post_type_support( 'post', 'excerpt' );

/**
 * Add Metaboxes
 */
function register_post_metaboxes() {
	add_meta_box('mb_post_galeria', 'Galeria de imagens e vídeos', 'mb_post_galeria', 'post');
}
add_action('add_meta_boxes', 'register_post_metaboxes');


/**
 * Metabox da Galeria de imagens e vídeos
 */
function mb_post_galeria()
{
    global $post;
    // Noncename needed to verify where the data originated
    echo '<input type="hidden" name="post_meta_noncename" id="post_meta_noncename" value="' . wp_create_nonce( plugin_basename(__FILE__) ) . '" />';

    $midias = get_post_meta($post->ID, 'post_galeria_metabox', true);
	$c = 0;
	echo '<div id="meta_inner">';
    if ( isset($midias) && $midias != '' && count($midias) > 0 ) {
        foreach($midias as $midia) {
            if (isset($midia)) {
                printf('<p><label for="meta-image" class="prfx-row-title">Imagem ou link do Youtube</label>
                		<input type="text" name="post_galeria_metabox[%1$s]" id="post_galeria_metabox[%2$s]" value="%3$s" />
                		<input type="button" id="meta-image-button" class="button" value="Escolha uma imagem" onclick="abre_uploader(\'#post_galeria_metabox[%4$s]\');" />
                		<span class="remove_galeria" style="cursor:pointer;">%5$s</span></p>',
                $c, $c, $midia, $c, 'Remover');
                $c = $c +1;
            }
        }
    }
	?>
		<span id="galeria_novos"></span>
		<span class="adiciona_galeria" style="cursor:pointer;">Adicionar Imagem/Vídeo</span>
	</div>

	<script>
		var $ =jQuery.noConflict();
    	$(document).ready(function() {
        	var count = <?php echo $c; ?>;
        	$(".adiciona_galeria").click(function() {
	            count = count + 1;

    	        $('#galeria_novos').append('<p><label for="meta-image">Imagem ou link do Youtube</label> <input type="text" id="post_galeria_metabox['+count+']" name="post_galeria_metabox['+count+']" value="" /> <input type="button" id="meta-image-button['+count+']" class="button" value="Escolha uma imagem" onclick="abre_uploader(\'#post_galeria_metabox['+count+']\');" /> <span class="remove_galeria" style="cursor:pointer;">Remover</span></p>' );
        	    return false;
        	});
        	$(".remove_galeria").live('click', function() {
	            $(this).parent().remove();
        	});
    	});
    </script>

	<!--script type='text/javascript' src='<?php echo get_template_directory_uri() . '/js/main.js'; ?>'></script-->
	<?php
}


/**
 * Save posts function
 */
function register_post_save_post($post_id, $post)
{
    if ( !isset($_POST['post_meta_noncename']) ) {
        return $post->ID;
    } else if ( !wp_verify_nonce($_POST['post_meta_noncename'], plugin_basename(__FILE__) )) {
        return $post->ID;
    }
    // Is the user allowed to edit the post or page?
    if ( !current_user_can('edit_post', $post->ID))
        return $post->ID;

	$projeto_galeria_metabox = $_POST['post_galeria_metabox'];
    update_post_meta($post_id,'post_galeria_metabox',$projeto_galeria_metabox);
}
// Save post action
add_action('save_post', 'register_post_save_post', 1, 2);
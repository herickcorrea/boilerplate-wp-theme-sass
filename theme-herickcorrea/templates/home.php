<?php
/**
 * Template Name: Home
 * Template Post Type: page
 *
 * @package WordPress
 * @subpackage fundacaosantillana
 */
get_header();
get_template_part( 'components/template/header/header' );
?>

<main id="mainContent">
<?php if ( have_posts() ) : ?>
<?php while ( have_posts() ) : the_post(); ?>

<!-- INÍCIO DO CONTEÚDO -->

<?php import_component('/components/genericos/banner-home/bannerhome', array()); ?>	
<section>
    HOME
</section>

<!-- FIM DO CONTEÚDO -->

<?php endwhile; ?>
<?php endif; ?>
</main>
<?php 
get_template_part( 'components/template/footer/footer' );
get_footer();
?>
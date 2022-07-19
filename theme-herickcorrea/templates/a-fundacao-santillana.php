<?php
/**
 * Template Name: A Fundação Santillana
 * Template Post Type: page
 *
 * @package WordPress
 * @subpackage fundacaosantillana
 */
get_header();
get_template_part( 'components/template/header' );
?>

<main id="site-content">

	<?php

	if ( have_posts() ) {

		while ( have_posts() ) {
			the_post();

			echo '<h1>'.get_the_title().'</h1>';
            echo '<h1>'.get_the_content().'</h1>';
		}
	}

	?>

</main><!-- #site-content -->

<?php get_template_part( 'template-parts/footer-menus-widgets' ); ?>

<?php get_footer(); ?>

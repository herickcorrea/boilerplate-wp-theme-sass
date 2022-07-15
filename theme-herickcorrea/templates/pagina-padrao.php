<?php
/**
 * Template Name: Home
 * Template Post Type: page
 *
 * @package WordPress
 * @subpackage fundacaosantillana
 */

get_template_part( 'components/template/header' );
?>

<main id="site-content">

	<?php

	if ( have_posts() ) {

		while ( have_posts() ) {
			the_post();

			get_template_part( 'template-parts/content-cover' );
		}
	}

	?>

</main><!-- #site-content -->

<?php get_template_part( 'template-parts/footer-menus-widgets' ); ?>

<?php get_footer(); ?>

<?php
// require_once get_template_directory() . '/servicos/AppUtil.php';
// $staticURL = AppUtil;
?>
<!DOCTYPE html>
<html class="no-js" <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1.0" >
	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
    <header id="mainHeader" role="banner">
        <?php get_template_part( 'components/template/acessibilidade/acessibilidade' ); ?>
        <div class="headerContent">
			<h1>
				<span class="hide"><?php echo get_bloginfo ( 'title' ); ?></span>
				<a href="<?php echo get_home_url(); ?>" title="Ir para página inicial">
					<img src="<?php echo staticURL('/images/svg/logo-funcadao-santillana.svg'); ?>" width="351" height="41">
				</a>
			</h1>
			<h2 class="hide"><?php echo get_bloginfo ( 'description' ); ?></h2>
			<nav role="navigation">
				<h3 class="hide">Menu Principal</h3>
				<div id="mainMenu">
					<div class="scroll">
						<ul class="menu-principal" role="list" aria-label="Menu principal do site">
							<?php
								if ( has_nav_menu( 'primary' ) )
								{
									wp_nav_menu(
										array(
											'container'  => '',
											'items_wrap' => '%3$s',
											'theme_location' => 'primary',
										)
									);
								}
							?>
						</ul>
					</div>
				</div>
			</nav>
			<div class="container components">
				<div class="row d-flex justify-content-between align-items-center">
					<div class="left-content col order-2 d-flex justify-content-end align-items-center">
						<div id="mainSearch" class="busca">
							<button title="Abrir busca">
								<?php svg('lupa', array()); ?>
							</button>
						</div>
						<div class="newsletter">
							<a href="<?php echo get_site_url('contato/newsletter'); ?>" title="Abrir busca" class="btn Small Solid VerdeClaro_500 Capsula icon-left">
								<?php svg('envelope', array()); ?> 
								Newsletter
							</a>
						</div>
					</div>
					<div class="right-content col order-1 align-items-end">
						<h3 class="hide">Nossas Redes</h3>
						<ul role="list" aria-label="Lista de redes sociais">
							<li role="listitem">facebook</li>
							<li role="listitem">instagram</li>
							<li role="listitem">linkedin</li>
						</ul>
					</div>
				</div>
			</div>
			<?php /*
			<div class="container">
				<h1>
					<span class="hide"><?php echo get_bloginfo ( 'title' ); ?></span>
					<a href="<?php echo get_home_url(); ?>" title="Ir para página inicial">
						<img src="<?php echo staticURL('/images/svg/logo-funcadao-santillana.svg'); ?>" width="351" height="41">
					</a>
				</h1>
				<h2 class="hide"><?php echo get_bloginfo ( 'description' ); ?></h2>
				<div class="row">
					<nav role="navigation">
						<h3 class="hide">Menu Principal</h3>
						<div id="mainMenu">
							<div class="scroll">
								<ul class="menu-principal" role="list" aria-label="Menu principal do site">
									<?php
										if ( has_nav_menu( 'primary' ) )
										{
											wp_nav_menu(
												array(
													'container'  => '',
													'items_wrap' => '%3$s',
													'theme_location' => 'primary',
												)
											);
										}
									?>
								</ul>
							</div>
						</div>
					</nav>
				</div>
				<div class="row d-flex justify-content-between align-items-center">
					<div class="left-content col order-2 d-flex justify-content-end align-items-center">
						<div id="mainSearch" class="busca">
							<button title="Abrir busca">
								<?php svg('lupa', array()); ?>
							</button>
						</div>
						<div class="newsletter">
							<a href="<?php echo get_site_url('contato/newsletter'); ?>" title="Abrir busca" class="btn Small Solid Verde_700 Capsula">
								<?php svg('envelope', array()); ?> 
								Newsletter
							</a>
						</div>
					</div>
					<div class="right-content col order-1 align-items-end">
						<h3 class="hide">Nossas Redes</h3>
						<ul role="list" aria-label="Lista de redes sociais">
							<li role="listitem">facebook</li>
							<li role="listitem">instagram</li>
							<li role="listitem">linkedin</li>
						</ul>
					</div>
				</div>
			</div>
			*/ ?>
		</div>
    </header>
<?php 
/*
	

		<header id="site-header" class="header-footer-group">

			<div class="header-inner section-inner">

				<div class="header-titles-wrapper">

					<?php

					// Check whether the header search is activated in the customizer.
					$enable_header_search = get_theme_mod( 'enable_header_search', true );

					if ( true === $enable_header_search ) {

						?>

						<button class="toggle search-toggle mobile-search-toggle" data-toggle-target=".search-modal" data-toggle-body-class="showing-search-modal" data-set-focus=".search-modal .search-field" aria-expanded="false">
							<span class="toggle-inner">
								<span class="toggle-icon">
									<?php twentytwenty_the_theme_svg( 'search' ); ?>
								</span>
								<span class="toggle-text"><?php _ex( 'Search', 'toggle text', 'twentytwenty' ); ?></span>
							</span>
						</button><!-- .search-toggle -->

					<?php } ?>

					<div class="header-titles">

						<?php
							// Site title or logo.
							twentytwenty_site_logo();

							// Site description.
							twentytwenty_site_description();
						?>

					</div><!-- .header-titles -->

					<button class="toggle nav-toggle mobile-nav-toggle" data-toggle-target=".menu-modal"  data-toggle-body-class="showing-menu-modal" aria-expanded="false" data-set-focus=".close-nav-toggle">
						<span class="toggle-inner">
							<span class="toggle-icon">
								<?php twentytwenty_the_theme_svg( 'ellipsis' ); ?>
							</span>
							<span class="toggle-text"><?php _e( 'Menu', 'twentytwenty' ); ?></span>
						</span>
					</button><!-- .nav-toggle -->

				</div><!-- .header-titles-wrapper -->

				<div class="header-navigation-wrapper">

					<?php
					if ( has_nav_menu( 'primary' ) || ! has_nav_menu( 'expanded' ) ) {
						?>

							<nav class="primary-menu-wrapper" aria-label="<?php echo esc_attr_x( 'Horizontal', 'menu', 'twentytwenty' ); ?>">

								<ul class="primary-menu reset-list-style">

								<?php
								if ( has_nav_menu( 'primary' ) ) {

									wp_nav_menu(
										array(
											'container'  => '',
											'items_wrap' => '%3$s',
											'theme_location' => 'primary',
										)
									);

								} elseif ( ! has_nav_menu( 'expanded' ) ) {

									wp_list_pages(
										array(
											'match_menu_classes' => true,
											'show_sub_menu_icons' => true,
											'title_li' => false,
											'walker'   => new TwentyTwenty_Walker_Page(),
										)
									);

								}
								?>

								</ul>

							</nav><!-- .primary-menu-wrapper -->

						<?php
					}

					if ( true === $enable_header_search || has_nav_menu( 'expanded' ) ) {
						?>

						<div class="header-toggles hide-no-js">

						<?php
						if ( has_nav_menu( 'expanded' ) ) {
							?>

							<div class="toggle-wrapper nav-toggle-wrapper has-expanded-menu">

								<button class="toggle nav-toggle desktop-nav-toggle" data-toggle-target=".menu-modal" data-toggle-body-class="showing-menu-modal" aria-expanded="false" data-set-focus=".close-nav-toggle">
									<span class="toggle-inner">
										<span class="toggle-text"><?php _e( 'Menu', 'twentytwenty' ); ?></span>
										<span class="toggle-icon">
											<?php twentytwenty_the_theme_svg( 'ellipsis' ); ?>
										</span>
									</span>
								</button><!-- .nav-toggle -->

							</div><!-- .nav-toggle-wrapper -->

							<?php
						}

						if ( true === $enable_header_search ) {
							?>

							<div class="toggle-wrapper search-toggle-wrapper">

								<button class="toggle search-toggle desktop-search-toggle" data-toggle-target=".search-modal" data-toggle-body-class="showing-search-modal" data-set-focus=".search-modal .search-field" aria-expanded="false">
									<span class="toggle-inner">
										<?php twentytwenty_the_theme_svg( 'search' ); ?>
										<span class="toggle-text"><?php _ex( 'Search', 'toggle text', 'twentytwenty' ); ?></span>
									</span>
								</button><!-- .search-toggle -->

							</div>

							<?php
						}
						?>

						</div><!-- .header-toggles -->
						<?php
					}
					?>

				</div><!-- .header-navigation-wrapper -->

			</div><!-- .header-inner -->

			<?php
			// Output the search modal (if it is activated in the customizer).
			if ( true === $enable_header_search ) {
				get_template_part( 'template-parts/modal-search' );
			}
			?>

		</header><!-- #site-header -->

		<?php
		// Output the menu modal.
		get_template_part( 'template-parts/modal-menu' );

	*/
?>

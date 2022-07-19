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
							<button title="Abrir busca" class="btn busca Small Outline VerdeClaro_500 Capsula">
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
						<ul class="socialList" role="list" aria-label="Lista de redes sociais">
							<li role="listitem"><a href="#" title="Visitar perfil no facebook: link externo" target="_blank" rel="nofollow"><?php svg('facebook', array()); ?></a></li>
							<li role="listitem"><a href="#" title="Visitar perfil no instagram: link externo" target="_blank" rel="nofollow"><?php svg('instagram', array()); ?></a></li>
							<li role="listitem"><a href="#" title="Visitar perfil no linkedin: link externo" target="_blank" rel="nofollow"><?php svg('linkedin', array()); ?></a></li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</header>
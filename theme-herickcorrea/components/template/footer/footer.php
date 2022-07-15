<footer id="mainFooter" class="header-footer-group">
	<div class="rodape">
		<div class="container">
			<div class="row">
				<div class="d-flex justify-content-between align-items-center brandBar">
					<div class="col brand">
						<a href="<?php echo get_home_url(); ?>" title="Ir para página inicial">
							<img src="<?php echo staticURL('/images/svg/logo-funcadao-santillana-rodape.svg'); ?>" width="270.67" height="30">
						</a>
					</div>
					<div class="col social d-flex justify-content-end align-items-center">
						<ul class="socialList" role="list" aria-label="Lista de redes sociais">
							<li role="listitem">
								<a href="#" title="Visitar perfil no facebook: link externo" target="_blank" rel="nofollow">
									<?php svg('facebook', array('cor'=>'#fff','width'=>24,'height'=>24)); ?>
								</a>
							</li>
							<li role="listitem">
								<a href="#" title="Visitar perfil no instagram: link externo" target="_blank" rel="nofollow">
									<?php svg('instagram', array('cor'=>'#fff','width'=>24,'height'=>24)); ?>
								</a>
							</li>

							<li role="listitem">
								<a href="#" title="Visitar perfil no linkedin: link externo" target="_blank" rel="nofollow">
									<?php svg('linkedin', array('cor'=>'#fff','width'=>24,'height'=>24)); ?>
								</a>
							</li>
						</ul>
					</div>
				</div>
			</div>
			<div class="row sitemapBar d-flex justify-content-start align-items-start">
				<div class="newsletter col-12 col-lg-3">
					<h5 class="Typography HBB3 txColor White">Fique por dentro</h5>
					<p class="Typography MR txColor White">
						Receba nossas novidades, notícias e lançamentos de novas publicações.
					</p>
					<a href="<?php echo get_site_url('contato/newsletter'); ?>" title="Cadastre em nossa newsletter" class="btn Outline icon-both">
						<?php svg('envelope', array()); ?> 
						Quero me cadastrar
						<?php svg('seta', array()); ?> 
					</a>
				</div>
				<div class="col-12 col-lg-9">
					<?php import_component('/components/template/sitemap/sitemap', array()); ?>	
				</div>
			</div>
		</div>
	</div>
	<div class="copy">
		<div class="container">
			<div class="row">
				<p class="Typography SR txColor White">© 2022 Fundação Santillana. Todos os direitos reservados.</p>
			</div>
		</div>
	</div>
</footer>
<?php wp_footer(); ?>
</body>
</html>
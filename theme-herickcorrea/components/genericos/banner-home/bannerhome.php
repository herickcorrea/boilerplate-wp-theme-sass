<section id="CCBannerHome">
    <h2 class="hide">Confira nossos destaques</h2>
    <div id="BannerHomeSwiper" class="swiper">
        <!-- Additional required wrapper -->
        <div class="swiper-wrapper">
            <?php $t = 0; ?>
            <?php foreach (get_field('adicionar_banners') as $banners):?>
                <div class="swiper-slide" data-subtitulo="<?php echo $banners['informacoes']['subtitulo']; ?>">
                    <div class="legenda">
                        <div class="container">
                            <div class="row d-flex justify-content-start align-content-center">
                                <div class="content col-12 col-sm-6 col-lg-5 col-xxl-4">
                                    <?php 
                                        echo 
                                        $banners['informacoes']['titulo_do_banner'] && $banners['informacoes']['titulo_do_banner'] != "" ? 
                                            '<h3 class="Typography H1 txColor White">'.format_the_title($banners['informacoes']['titulo_do_banner']).'</h3>' 
                                        : '';
                                    ?>
                                    <?php 
                                        echo 
                                        $banners['informacoes']['descricao'] && $banners['informacoes']['descricao'] != "" ? 
                                            '<p class="Typography H4L txColor White">'.format_the_title($banners['informacoes']['descricao']).'</p>' 
                                        : '';
                                    ?>
                                    <div class="interacoes">
                                        <?php 
                                            echo 
                                            $banners['informacoes']['link'] && $banners['informacoes']['link']['url'] ? 
                                                '<a 
                                                href="'.$banners['informacoes']['link']['url'].'" 
                                                title="'.($banners['informacoes']['link']['title'] ? $banners['informacoes']['link']['title'] : "Saiba mais").'"
                                                target="'.($banners['informacoes']['link']['target'] ? $banners['informacoes']['link']['target'] : "_self").'"
                                                class="btn Big Solid VerdeClaro_500">
                                                        Saiba mais
                                                </a>' 
                                            : '';
                                        ?>
                                        <?php if($banners['imagens']['video'] && $banners['imagens']['video'] != ""): ?>
                                            <div class="video <?php echo $banners['informacoes']['link'] && $banners['informacoes']['link']['url'] ? 'TemSeparador' : ''; ?>">
                                                <button data-fancybox href="<?php echo $banners['imagens']['video']; ?>">
                                                    <span class="icon"><?php svg('play', array()); ?></span>
                                                    <strong class="Typography TB txColor White">Assista ao vídeo completo</strong>
                                                </button>
                                            </div>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="fundo">
                        <div class="overlay" style="background-color: <?php echo $banners['informacoes']['overlay']; ?>"></div>
                        <?php //echo '<pre>'; print_r($banners['informacoes']['link']); echo '</pre>'; ?>
                        <picture>
                            <source 
                                media="<?php echo $banners['imagens']['imagem_mobile'] ? '(min-width: 621px)' : ''; ?>" 
                                srcset="<?php echo $banners['imagens']['imagem_desktop']['sizes']['bannerhome-desktop']; ?>.webp" 
                                type="image/webp">
                            <source 
                                media="<?php echo $banners['imagens']['imagem_mobile'] ? '(min-width: 621px)' : ''; ?>" 
                                srcset="<?php echo $banners['imagens']['imagem_desktop']['sizes']['bannerhome-desktop']; ?>" 
                                type="<?php echo $banners['imagens']['imagem_desktop']['mime_type']; ?>">
                            
                            <?php if($banners['imagens']['imagem_mobile']): ?>
                                <source 
                                    media="<?php echo $banners['imagens']['imagem_mobile'] ? '(max-width: 620px)' : ''; ?>"  
                                    srcset="<?php echo $banners['imagens']['imagem_mobile']['sizes']['bannerhome-mobile']; ?>.webp"
                                    type="image/webp">
                                <source 
                                    media="<?php echo $banners['imagens']['imagem_mobile'] ? '(max-width: 620px)' : ''; ?>"  
                                    srcset="<?php echo $banners['imagens']['imagem_mobile']['sizes']['bannerhome-mobile']; ?>"
                                    type="<?php echo $banners['imagens']['imagem_mobile']['mime_type']; ?>">
                            <?php endif; ?>
                            
                            <img
                                src="<?php echo $banners['imagens']['imagem_desktop']['sizes']['bannerhome-desktop']; ?>"
                                width="<?php echo $banners['imagens']['imagem_desktop']['sizes']['bannerhome-desktop-width']; ?>"
                                height="<?php echo $banners['imagens']['imagem_desktop']['sizes']['bannerhome-desktop-height']; ?>"
                            >
                        </picture>
                    </div>
                </div>
                <?php $t++; ?>
            <?php endforeach; ?>
        </div>
        
        <div class="banner-pagination">
            <div class="pagination-elements">
                <div class="container">
                    <div class="row">
                        <div class="col paginate-itens">
                            <div class="list-pagination"></div>
                            <div class="grafismo">
                                <?php svg('folha', array()); ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="pagination-stripe"></div>
        </div>
        
        <?php if($t >1): ?>
            <div class="swiper-button-prev"></div>
            <div class="swiper-button-next"></div>
        <?php endif; ?>
    </div>
</section>
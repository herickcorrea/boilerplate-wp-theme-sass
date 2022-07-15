<div class="CCSitemap">
    <?php
        if ( has_nav_menu( 'sitemap_c01' ) )
        {
            echo '<ul class="menu-sitemap" role="list" aria-label="Primeira coluna do Sitemap">';

            wp_nav_menu(
                array(
                    'container'  => '',
                    'items_wrap' => '%3$s',
                    'theme_location' => 'sitemap_c01',
                )
            );
            
            echo '</ul>';
        }
    ?>

    <?php
        if ( has_nav_menu( 'sitemap_c02' ) )
        {
            echo '<ul class="menu-sitemap" role="list" aria-label="Segunda coluna do Sitemap">';

            wp_nav_menu(
                array(
                    'container'  => '',
                    'items_wrap' => '%3$s',
                    'theme_location' => 'sitemap_c02',
                )
            );
            
            echo '</ul>';
        }
    ?>

    <?php
        if ( has_nav_menu( 'sitemap_c03' ) )
        {
            echo '<ul class="menu-sitemap" role="list" aria-label="Terceira coluna do Sitemap">';

            wp_nav_menu(
                array(
                    'container'  => '',
                    'items_wrap' => '%3$s',
                    'theme_location' => 'sitemap_c03',
                )
            );

            echo '</ul>';
        }

    ?>
    
    <?php					
        if ( has_nav_menu( 'sitemap_c04' ) )
        {
            echo '<ul class="menu-sitemap" role="list" aria-label="Quarta coluna do Sitemap">';

            wp_nav_menu(
                array(
                    'container'  => '',
                    'items_wrap' => '%3$s',
                    'theme_location' => 'sitemap_c04',
                )
            );
            
            echo '</ul>';
        }
    ?>
</div>	
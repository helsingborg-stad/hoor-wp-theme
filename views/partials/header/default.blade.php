<div class="mobile-header">
    <div class="mobile-header__logotype">
        {!! municipio_get_logotype(get_field('header_logotype', 'option'), get_field('logotype_tooltip', 'option'), false, get_field('header_tagline_enable', 'option')) !!}
    </div>
    <button aria-expanded="false" aria-controls="site-header-container" class="hidden-print js-menu-toggle"><?php _e('Menu', 'hoor'); ?></button>
    <button aria-expanded="false" aria-controls="search" class="hidden-print toggle-search-top js-search-top-mobile"><?php _e('Search', 'hoor'); ?></button>
</div>

<div id="site-header-container" class="site-header-container hidden-print">
    <div class="container">
        <div class="grid">
            <div class="grid-xs-12 grid-sm-3 site-header__logotype">
                {!! municipio_get_logotype(get_field('header_logotype', 'option'), get_field('logotype_tooltip', 'option'), false, get_field('header_tagline_enable', 'option')) !!}
            </div>
            <div class="grid-xs-12 grid-sm-9 hidden-print">
                {!!
                    wp_nav_menu(array(
                        'theme_location' => 'help-menu',
                        'container' => 'nav',
                        'container_class' => 'menu-help',
                        'container_id' => '',
                        'menu_class' => 'nav nav-help nav-horizontal',
                        'menu_id' => 'help-menu-top',
                        'echo' => 'echo',
                        'before' => '',
                        'after' => '',
                        'link_before' => '',
                        'link_after' => '',
                        'items_wrap' => '<ul class="%2$s">%3$s</ul>',
                        'depth' => 1,
                        'fallback_cb' => '__return_false'
                    ));
                !!}
            </div>
        </div>
    </div>

    @if (get_field('nav_primary_enable', 'option') === true)
        <nav class="primary-navigation hidden-print">
            <div class="primary-navigation__container clearfix">
                <?php
                    // {!! $navigation['mainMenu'] !!}
                    // Ideally the above should be used if Municipio
                    // is updated so we don't need our helpers that
                    // override Municipio´s helpers.
                    $navigation = new \Hoor\Helper\Navigation();
                    echo $navigation->mainMenu();
                 ?>
            </div>
        </nav>
    @endif
</div>

<div class="search-top header__search hidden-print" id="search">
    <div class="container">
        <div class="grid">
            <div class="grid-sm-12">
                @include('partials.search.top-search')
            </div>
        </div>
    </div>
</div>

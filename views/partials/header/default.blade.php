<div class="mobile-header">
    <div class="mobile-header__logotype">
        {!! municipio_get_logotype(get_field('header_logotype', 'option'), get_field('logotype_tooltip', 'option'), false, get_field('header_tagline_enable', 'option')) !!}
    </div>
    <button aria-expanded="false" aria-controls="site-header-container" class="hidden-print js-menu-toggle">
        <svg class="icon-menu" width="20" height="20" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M0 3h20v2H0V3zm0 6h20v2H0V9zm0 6h20v2H0v-2z" fill-rule="evenodd"/></svg>
        <svg  class="icon-close"  width="20" height="20" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M20 2l-2-2-8 8-8-8-2 2 8 8-8 8 2 2 8-8 8 8 2-2-8-8z" fill-rule="evenodd"/></svg>
        <span><?php _e('Menu', 'hoor'); ?></span>
    </button>
    <button aria-expanded="false" aria-controls="search" class="hidden-print toggle-search-top js-search-top-mobile">
        <svg class="icon-search" width="40" height="40" viewBox="0 0 40 40" xmlns="http://www.w3.org/2000/svg"><path d="M29.219 24.375a15.814 15.814 0 0 0 2.479-8.51C31.698 7.105 24.604 0 15.854 0 7.094 0 0 7.104 0 15.865c0 8.76 7.094 15.864 15.844 15.864a15.81 15.81 0 0 0 8.614-2.541l.72-.5L36.49 40 40 36.427 28.698 25.115l.52-.74zM24.729 7a12.442 12.442 0 0 1 3.667 8.854c0 3.344-1.302 6.49-3.667 8.854a12.442 12.442 0 0 1-8.854 3.667c-3.344 0-6.49-1.302-8.854-3.667a12.442 12.442 0 0 1-3.667-8.854c0-3.344 1.302-6.49 3.667-8.854a12.442 12.442 0 0 1 8.854-3.667c3.344 0 6.49 1.302 8.854 3.667z"/></svg>
        <svg  class="icon-close"  width="20" height="20" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M20 2l-2-2-8 8-8-8-2 2 8 8-8 8 2 2 8-8 8 8 2-2-8-8z" fill-rule="evenodd"/></svg>
        <span><?php _e('Search', 'hoor'); ?></span>
    </button>
</div>

<div id="site-header-container" class="site-header-container hidden-print">
    <div class="container">
        <div class="grid">
            <div class="grid-xs-12 grid-md-3 site-header__logotype">
                {!! municipio_get_logotype(get_field('header_logotype', 'option'), get_field('logotype_tooltip', 'option'), false, get_field('header_tagline_enable', 'option')) !!}
            </div>
            <div class="grid-xs-12 grid-md-9 hidden-print">
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

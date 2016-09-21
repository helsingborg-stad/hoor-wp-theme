<div class="container">
    <div class="grid">
        <div class="grid-xs-12 grid-sm-3 site-header__logotype">
            {!! municipio_get_logotype(get_field('header_logotype', 'option'), get_field('logotype_tooltip', 'option'), true, get_field('header_tagline_enable', 'option')) !!}
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
        <div class="container">
            {!! $navigation['mainMenu'] !!}
        </div>
    </nav>

    @if (strlen($navigation['mobileMenu']) > 0)
        <nav id="mobile-menu" class="nav-mobile-menu nav-toggle nav-toggle-expand {!! apply_filters('Municipio/mobile_menu_breakpoint','hidden-md hidden-lg'); !!} hidden-print">
            @include('partials.mobile-menu')
        </nav>
    @endif
@endif

<div class="search-top {!! apply_filters('Municipio/desktop_menu_breakpoint','hidden-sm'); !!} hidden-print" id="search">
    <div class="container">
        <div class="grid">
            <div class="grid-sm-12">
                {{ get_search_form() }}
            </div>
        </div>
    </div>
</div>

@if ($hasLeftSidebar)
<aside class="sidebar-left-sidebar">
    @if (is_active_sidebar('left-sidebar'))
        <div class="grid sidebar-left-sidebar-top">
            <?php dynamic_sidebar('left-sidebar'); ?>
        </div>
    @endif

    <?php
        // Ideally $navigation['sidebarMenu'] should be used if Municipio
        // is updated so we don't need our helpers that
        // override Municipio´s helpers.
        $navHelper = new \Hoor\Helper\Navigation();
        $sidebarMenu = $navHelper->sidebarMenu();
    ?>

    @if ($sidebarMenu)
        <?php
            global $post;
            $ancestors = array_reverse(get_post_ancestors($post->ID));
            if ($ancestors) {
                $ancestor = $ancestors[0];
                $sidebar_label = get_the_title($ancestor);
            } else {
                $sidebar_label = get_the_title($post->ID);
            }

        ?>

        <button aria-expanded="false" aria-controls="sidebarMenu" class="sidebar-menu__navigation-button o-button o-button--primary">
            <svg width="20" height="20" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M0 3h20v2H0V3zm0 6h20v2H0V9zm0 6h20v2H0v-2z" fill-rule="evenodd"/></svg>
            <span>
                <?php _e('Show submenu', 'hoor'); ?><span class="visually-hidden"><?php _e('for', 'hoor'); ?> {{ $sidebar_label }}</span>
            </span>
        </button>

        <h2 class="sidebar-menu__headline">{{ $sidebar_label }}</h2>
        <?php echo $sidebarMenu; ?>
    @endif

    @if (is_active_sidebar('left-sidebar-bottom'))
        <div class="grid sidebar-left-sidebar-bottom">
            <?php dynamic_sidebar('left-sidebar-bottom'); ?>
        </div>
    @endif
</aside>
@endif

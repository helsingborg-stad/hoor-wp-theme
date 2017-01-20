@if ($hasLeftSidebar)
<aside class="sidebar-left-sidebar hidden-print">
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

        <!-- Set aria-expanded="true/false" with JS -->
        <button aria-expanded="false" aria-controls="sidebarMenu" class="sidebar-menu__navigation-button o-button o-button--primary">
        <?php _e('Show submenu', 'hoor'); ?><span class="visually-hidden"><?php _e('for', 'hoor'); ?> {{ $sidebar_label }}</span></button>

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

@if (wp_get_post_parent_id(get_the_id()) != 0)
<nav class="c-breadcrumbs" aria-label="<?php _e('breadcrumbs', 'hoor'); ?>" role="navigation">
    <p class="c-breadcrumbs__title" id="breadcrumbslabel"><?php _e('You are here:', 'hoor'); ?></p>
    {{ \Hoor\Theme\Navigation::outputBreadcrumbs() }}
</nav>
@endif

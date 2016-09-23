<nav class="c-breadcrumbs" aria-label="<?php _e('breadcrumbs', 'hoor'); ?>" role="navigation">
    <div class="container">
        <div class="grid">
            <div class="grid-md-12">
                <p class="c-breadcrumbs__title hidden-print" id="breadcrumbslabel"><?php _e('You are here:', 'hoor'); ?></p>
                {{ \Hoor\Theme\Navigation::outputBreadcrumbs() }}
            </div>
        </div>
    </div>
</nav>

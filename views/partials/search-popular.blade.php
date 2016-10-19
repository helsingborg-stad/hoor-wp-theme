<?php if( have_rows('search_links') ): ?>
    <div class="search-popular">
        <div class="container">
            <div class="grid">
                <div class="grid-md-12">
                    <p class="search-popular__title"><?php _e('Popular searches', 'hoor'); ?>:</p>
                    <ul class="search-popular__list">
                        <?php while ( have_rows('search_links') ) : the_row(); ?>
                            <li class="search-popular__list-item"><a class="search-popular__list-link" href="?s={{ rawurlencode(get_sub_field('search_query')) }}">{{ get_sub_field('search_label') }}</a></li>
                        <?php endwhile; ?>
                    </ul>
                </div>
            </div>
        </div>
    </div>
<?php else :
    // no rows found
endif; ?>
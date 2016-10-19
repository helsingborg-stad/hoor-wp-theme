<?php if (count($posts) > 0): ?>
    <div class="<?php echo implode(' ', apply_filters('Modularity/Module/Classes', array('box', 'box--inline'), $module->post_type, $args)); ?>">
        <h2 class="box__headline"><?php echo $module->post_title; ?></h2>
        <ul class="box__list">
            <?php
            foreach ($posts as $post) :

                //Make sorted by data avabile
                if (isset($fields->meta_key_output)) {
                    $meta_data = get_post_meta($post->ID, $fields->meta_key_output, true);

                    //Serialize data if needed
                    if (is_array($meta_data) || is_object($meta_data)) {
                        $meta_data = json_encode($meta_data);
                    }
                } else {
                    $meta_data = "";
                }
            ?>
                <li class="box__list-item" data-meta-sort-by="<?php echo $meta_data; ?>">
                    <a class="box__link" href="<?php echo get_permalink($post->ID); ?>" data-meta-sort-by="<?php echo $meta_data; ?>">
                        <?php if ($fields->show_title) : ?>
                            <span class="box__title"><?php echo apply_filters('the_title', $post->post_title); ?></span>
                        <?php endif; ?>

                        <?php if ($fields->show_date) : ?>
                        <time class="box__date"><?php echo get_the_time('Y-m-d', $post->ID); ?></time>
                        <?php endif; ?>
                    </a>
                </li>
            <?php endforeach; ?>
        </ul>
        <footer class="box__footer">
            <?php if ($showMoreButton) : ?>
                <?php
                    $filters = array(
                        'orderby' => sanitize_text_field($sortBy),
                        'order'   => sanitize_text_field($order)
                    );

                    if ($sortBy == 'meta_key') {
                        $filters['meta_key'] = $orderby;
                    }

                    if ($fields->taxonomy_filter === true) {
                        $taxType = $fields->filter_posts_taxonomy_type;
                        $taxValues = (array) $fields->filter_posts_by_tag;
                        $taxValues = implode('|', $taxValues);

                        $filters['tax'] = $taxType;
                        $filters['term'] = $taxValues;
                    }
                ?>
                <a class="o-button o-button--primary" href="<?php echo get_post_type_archive_link($fields->post_type); echo '?' . http_build_query($filters); ?>"><?php _e('Show more', 'modularity'); ?></a>
            <?php endif; ?>
        </footer>
    </div>
<?php endif ?>

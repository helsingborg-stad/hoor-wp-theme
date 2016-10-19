<div class="grid" data-equal-container>
    <?php
    foreach ($posts as $post) :

        /* Image size */
        switch ($fields->posts_columns) {
            case "grid-md-12":    //1-col
                $image_dimensions = array(1220,686);
                break;
            case "grid-md-6":    //2-col
                $image_dimensions = array(590,332);
                break;
            default:
                $image_dimensions = array(275,155);
        }

        /* Image */
        $image = null;
        if ($fields->posts_data_source !== 'input') {
            $image = wp_get_attachment_image_src(
                get_post_thumbnail_id($post->ID),
                apply_filters('modularity/image/latest/box',
                    $image_dimensions,
                    $args
                )
            );
        } else {
            if ($post->image) {
                $image = wp_get_attachment_image_src(
                    $post->image->ID,
                    apply_filters('modularity/image/latest/box',
                        $image_dimensions,
                        $args
                    )
                );
            }
        }
    ?>
    <div class="<?php echo $fields->posts_columns; ?>">
        <a href="<?php echo $fields->posts_data_source === 'input' ? $post->permalink : get_permalink($post->ID); ?>" class="<?php echo implode(' ', apply_filters('Modularity/Module/Classes', array('box', 'box--panel', 'box--index'), $module->post_type, $args)); ?>" data-equal-item>
            <?php if ($image && in_array('image', $fields->posts_fields)) : ?>
                <img class="box-image" src="<?php echo $image[0]; ?>" alt="<?php echo $post->post_title; ?>">
            <?php endif; ?>

            <div class="box__content">
                <?php if (in_array('title', $fields->posts_fields)) : ?>
                    <h2 class="box__title"><?php echo apply_filters('the_title', $post->post_title); ?></h2>
                <?php endif; ?>

                <?php if (in_array('date', $fields->posts_fields) && $fields->posts_data_source !== 'input') : ?>
                <time class="box__date" datetime="<?php echo get_the_time('Y-m-d', $post->ID); ?>"><?php echo get_the_time('d F Y', $post->ID); ?></time>
                <?php endif; ?>

                <?php if (in_array('excerpt', $fields->posts_fields)) : ?>
                    <div class="box__excerpt">
                        <?php if ($fields->posts_data_source === 'input') : ?>
                            <?php echo $post->post_content; ?>
                        <?php else : ?>
                            <?php echo isset(get_extended($post->post_content)['main']) ? apply_filters('the_excerpt', wp_trim_words(wp_strip_all_tags(get_extended($post->post_content)['main']), 30, null)) : ''; ?>
                        <?php endif; ?>
                    </div>
                <?php endif; ?>
            </div>
        </a>
    </div>
    <?php endforeach; ?>
</div>

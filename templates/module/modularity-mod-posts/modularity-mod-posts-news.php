<?php
// TODO: Cleanup/refactor template
    $is_event = $module->meta['posts_data_post_type'][0] == 'evenemang';
?>

<?php if (is_front_page()): ?>
    <?php // Frontpage ?>
    <div class="grid <?php echo $is_event ? 'box__event-column': 'box__news-column' ?>" data-equal-container>
        <?php if (!$module->hideTitle) : ?>
            <?php // Heading ?>
            <div class="grid-xs-12 grid-align--center">
                <h2 class="box__headline box__headline--centered"><?php echo $module->post_title; ?></h2>
            </div>
        <?php endif; ?>

        <?php
            $first_two_posts = array_slice($posts, 0, 2);
            $rest_of_posts = array_slice($posts, 2);
        ?>

        <?php foreach ($first_two_posts as $post): ?>
            <?php // List to the left with two news items with image and text ?>
            <?php
                $image = null;
                if ($fields->posts_data_source !== 'input') {
                    $image = wp_get_attachment_image_src(
                        get_post_thumbnail_id($post->ID),
                        apply_filters('modularity/image/latest/box',
                            array(275,155),
                            $args
                        )
                    );
                } else {
                    if ($post->image) {
                        $image = wp_get_attachment_image_src(
                            $post->image->ID,
                            apply_filters('modularity/image/latest/box',
                                array(275,155),
                                $args
                            )
                        );
                    }
                }
            ?>
            <div class="grid-sm-12 grid-md-6 grid-lg-3">
                <a href="<?php echo get_permalink($post->ID); ?>" class="box box--panel box--panel-news-card" data-equal-item>
                        <div class="box__image-holder">
                            <?php if (!empty($image) && in_array('image', $fields->posts_fields)) : ?>
                                <img  class="box__image" src="<?php echo $image[0]; ?>" alt="<?php echo $post->post_title; ?>">
                            <?php endif; ?>

                            <?php if ($startdate = get_field('event_startdate', $post->ID, false)): ?>
                                <?php $startdate = strtotime($startdate) ?>
                                <time class="box__date-event" datetime="<?php echo date('Y-m-d\TH:i', $startdate); ?>">
                                    <span class="box__date-event-month"><?php echo date_i18n('M', $startdate); ?></span>
                                    <span class="box__date-event-day"><?php echo date('d', $startdate); ?></span>
                                </time>
                            <?php endif ?>
                        </div>

                    <div class="box__content">
                        <?php if (in_array('title', $fields->posts_fields)) : ?>
                            <h2 class="box__title"><?php echo apply_filters('the_title', $post->post_title); ?></h2>
                        <?php endif; ?>

                        <?php if(in_array('date', $fields->posts_fields) && $fields->posts_data_source !== 'input' && !$startdate): ?>
                            <time class="box__date" datetime="<?php echo get_the_time('Y-m-d', $post->ID); ?>"><?php echo get_the_time('d F Y', $post->ID); ?></time>
                        <?php endif ?>

                        <?php if ($place = get_field('event_place', $post->ID, false)): ?>
                            <div class="box__event-location">
                                <?php echo $place ?>
                            </div>
                        <?php endif ?>

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
        <?php endforeach ?>
        <?php if ($rest_of_posts): ?>
            <?php // List to the right with title/date ?>
            <div class="grid-sm-12 grid-md-12 grid-lg-6">
                <div class="box box--panel box--panel-clean">
                    <ul class="box__list box__news-list">
                        <?php foreach ($rest_of_posts as $post): ?>
                            <li class="box__list-item">
                                <a href="<?php echo get_permalink($post->ID); ?>" class="box__link">
                                    <?php if (in_array('title', $fields->posts_fields)) : ?>
                                    <div class="box__date-event-holder">
                                        <?php if ($startdate = get_field('event_startdate', $post->ID, false)): ?>
                                            <?php $startdate = strtotime($startdate) ?>
                                            <time class="box__date-event" datetime="<?php echo date('Y-m-d\TH:i', $startdate); ?>">
                                                <span class="box__date-event-month"><?php echo date_i18n('M', $startdate); ?></span>
                                                <span class="box__date-event-day"><?php echo date('d', $startdate); ?></span>
                                            </time>
                                        <?php endif ?>
                                    </div>
                                    <div class="box__content-holder">
                                        <h2 class="box__title"><?php echo apply_filters('the_title', $post->post_title); ?></h2>
                                        <?php endif; ?>
                                        <?php if(in_array('date', $fields->posts_fields) && $fields->posts_data_source !== 'input' && !$startdate): ?>
                                            <time class="box__date" datetime="<?php echo get_the_time('Y-m-d', $post->ID); ?>"><?php echo get_the_time('d F Y', $post->ID); ?></time>
                                        <?php endif ?>
                                        <?php if ($place = get_field('event_place', $post->ID, false)): ?>
                                            <div class="box__event-location">
                                                <?php echo $place ?>
                                            </div>
                                        <?php endif ?>
                                    </div>
                                </a>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            </div>
        <?php endif ?>


        <?php if (!empty($fields->archive_link)) : ?>
            <?php // Show more link ?>
            <div class="grid-lg-12 grid-align--center hidden-print">
                <a class="o-button <?php echo $is_event ? 'o-button--secondary' : 'o-button--primary' ?>" href="<?php echo get_post_type_archive_link($fields->posts_data_post_type); ?>"><?php $is_event ? _e('See more events', 'hoor') : _e('See more news', 'hoor'); ?></a>
            </div>
        <?php endif; ?>
    </div>
<?php else: ?>
    <?php // NOT Frontpage (just a copy of the original template) ?>
    <div class="grid">
        <?php if (!$module->hideTitle) : ?>
            <div class="grid-xs-12">
                <h2><?php echo $module->post_title; ?></h2>
            </div>
        <?php endif; ?>

    <?php
    $hasImages = false;
    foreach ($posts as $post) {
        if ($fields->posts_data_source === 'input') {
            if ($post->image) {
                $hasImages = true;
            }
        } else {
            if (get_thumbnail_source($post->ID) !== false) {
                $hasImages = true;
            }
        }
        var_dump($hasImages);
    }
    ?>

    <?php foreach ($posts as $post) :  ?>
        <?php
            $image = null;
            if ($fields->posts_data_source !== 'input') {
                $image = wp_get_attachment_image_src(
                    get_post_thumbnail_id($post->ID),
                    apply_filters('modularity/image/latest/box',
                        municipio_to_aspect_ratio('16:9', $image_dimensions),
                        $args
                    )
                );
            } else {
                if ($post->image) {
                    $image = wp_get_attachment_image_src(
                        $post->image->ID,
                        apply_filters('modularity/image/latest/box',
                            municipio_to_aspect_ratio('16:9', $image_dimensions),
                            $args
                        )
                    );
                }
            }
        ?>
        <div class="grid-lg-12">
            <a href="<?php echo $fields->posts_data_source === 'input' ? $post->permalink : get_permalink($post->ID); ?>" class="<?php echo implode(' ', apply_filters('Modularity/Module/Classes', array('box', 'box-news', 'box-news-horizontal'), $module->post_type, $args)); ?>">
                <?php var_dump($hasImages); ?>
                <?php if ($hasImages) : ?>
                    <div class="box-image-container">
                        <?php if ($image && in_array('image', $fields->posts_fields)) : ?>
                        <img src="<?php echo $image[0]; ?>" alt="<?php echo $post->post_title; ?>" class="box-image">
                        <?php else : ?>
                        <figure class="image-placeholder"></figure>
                        <?php endif; ?>
                    </div>
                <?php endif; ?>
                <div class="box-content">
                    <?php if (in_array('title', $fields->posts_fields)) : ?>
                    <h3 class="text-highlight"><?php echo apply_filters('the_title', $post->post_title); ?></h3>
                    <?php endif; ?>

                    <?php if (in_array('excerpt', $fields->posts_fields)) : ?>
                    <?php echo isset(get_extended($post->post_content)['main']) ? apply_filters('the_excerpt', wp_trim_words(wp_strip_all_tags(strip_shortcodes(get_extended($post->post_content)['main'])), 30, null)) : ''; ?>
                    <?php endif; ?>

                    <p><span class="link-item"><?php _e('Read more', 'modularity'); ?></span></p>
                </div>
            </a>
        </div>
    <?php endforeach; ?>

    <?php if (!empty($fields->archive_link)) : ?>
    <div class="grid-lg-12">
        <a class="read-more" href="<?php echo get_post_type_archive_link($fields->posts_data_post_type); ?>"><?php _e('Show more', 'modularity'); ?></a>
    </div>
    <?php endif; ?>
    </div>
<?php endif ?>

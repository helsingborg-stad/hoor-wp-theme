<div class="<?php echo implode(' ', apply_filters('Modularity/Module/Classes', array('box', 'box--panel'), $module->post_type, $args)); ?>">
    <?php if (!$module->hideTitle) : ?>
    <h2 class="box__headline"><?php echo $module->post_title; ?></h2>
    <?php endif; ?>
    <ul class="box__list">
        <?php
        if (count($posts) > 0) :
        foreach ($posts as $post) :
        ?>
            <li class="box__list-item">
                <a class="box__link" href="<?php echo $fields->posts_data_source === 'input' ? $post->permalink : get_permalink($post->ID); ?>">
                    <?php if (in_array('title', $fields->posts_fields)) : ?>
                        <?php echo apply_filters('the_title', $post->post_title); ?>
                    <?php endif; ?>
                </a>
                <?php if (in_array('date', $fields->posts_fields) && $fields->posts_data_source !== 'input') : ?>
                <time class="box__date" datetime="<?php echo get_the_time('Y-m-d', $post->ID); ?>"><?php echo get_the_time('Y-m-d', $post->ID); ?></time>
                <?php endif; ?>
            </li>
        <?php endforeach; else : ?>
        <li class="box__list-item">
            <?php _e('No posts to show…', 'modularity'); ?>
        </li>
        <?php endif; ?>
    </ul>

    <?php if (isset($fields->archive_link) && $fields->archive_link) : ?>
    <div class="box__footer"><a class="o-button o-button--primary" href="<?php echo get_post_type_archive_link($fields->posts_data_post_type); ?>"><?php _e('Show more', 'modularity'); ?></a></div>
    <?php endif; ?>
</div>
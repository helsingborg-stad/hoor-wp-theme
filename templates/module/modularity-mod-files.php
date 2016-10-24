<?php $files = get_field('files', $module->ID); ?>

<div class="<?php echo implode(' ', apply_filters('Modularity/Module/Classes', array('box', 'box--panel'), $module->post_type, $args)); ?>">
    <?php if (!$module->hideTitle) : ?>
        <h2 class="box__headline"><?php echo apply_filters('the_title', $module->post_title); ?></h2>
    <?php endif; ?>

    <ul class="box__list">
        <?php foreach ($files as $file) : ?>
            <li class="box__list-item">
                <a class="box__link box__link--arrow" href="<?php echo $file['url']; ?>" title="<?php echo $file['title']; ?>">
                    <?php echo $file['title']; ?>
                </a>
                <div class="box__list-description">
                    <p class="box__list-meta">
                        <strong><?php _e('Size', 'hoor'); ?>:</strong> <?php echo size_format(filesize(get_attached_file($file['ID'])), 2); ?>,
                        <strong><?php _e('File type', 'hoor'); ?>:</strong> <?php echo pathinfo($file['url'], PATHINFO_EXTENSION); ?>
                    </p>

                    <?php if (isset($file['description']) && !empty($file['description'])) : ?>
                        <?php echo wpautop($file['description']); ?>
                    <?php endif; ?>
                </div>
            </li>
        <?php endforeach; ?>
    </ul>
</div>

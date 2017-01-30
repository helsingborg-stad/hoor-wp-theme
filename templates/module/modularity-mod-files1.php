<?php $files = get_field('files', $module->ID); ?>

<div class="<?php echo implode(' ', apply_filters('Modularity/Module/Classes', array('box', 'box--panel'), $module->post_type, $args)); ?>">
    <?php if (!$module->hideTitle && !empty($module->post_title)) { ?>
      <h2 class="box__headline"><?php echo apply_filters('the_title', $module->post_title); ?></h2>
    <?php } ?>

    <ul class="box__list">
        <?php foreach ($files as $file) : ?>
            <li class="box__list-item">
                <a class="box__link" href="<?php echo $file['url']; ?>">
                    <?php echo $file['title']; ?>
                </a>
                <em>(<?php echo pathinfo($file['url'], PATHINFO_EXTENSION); ?>, <?php echo size_format(filesize(get_attached_file($file['ID'])), 2); ?>)</em>
                <?php if (isset($file['description']) && !empty($file['description'])) : ?>
                    <?php echo wpautop($file['description']); ?>
                <?php endif; ?>
            </li>
        <?php endforeach; ?>
    </ul>
</div>

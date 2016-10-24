<div class="<?php echo implode(' ', apply_filters('Modularity/Module/Classes', array('box', 'box--panel'), $module->post_type, $args)); ?>">
    <?php if (!$module->hideTitle && !empty($module->post_title)) { ?>
        <h2 class="box__headline"><?php echo apply_filters('the_title', $module->post_title); ?></h2>
    <?php } ?>
    <div class="box__content">
        <?php echo apply_filters('the_content', $module->post_content); ?>
    </div>
</div>
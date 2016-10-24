<div class="box">
    <?php if (!$module->hideTitle) : ?>
        <h2 class="box__headline"><?php echo $module->post_title; ?></h2>
    <?php endif; ?>
    <?php echo get_post_meta($module->ID, 'embed_code', true); ?>
</div>
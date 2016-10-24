<?php $fields = get_fields($module->ID); ?>
<div class="grid">
    <div class="grid-sm-12">
        <div class="notice <?php echo $fields['notice_type']; ?> <?php echo $fields['notice_size']; ?>">
            <?php if (!$module->hideTitle) : ?>
                <h2 class="notice__title"><?php echo $module->post_title; ?></h2>
            <?php endif; ?>
            <p class="notice__description"><?php echo $fields['notice_text']; ?></p>
        </div>
    </div>
</div>

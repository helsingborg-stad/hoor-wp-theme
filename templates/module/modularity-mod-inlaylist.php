<?php
    global $post;
    $items = get_field('items', $module->ID);
?>

<div class="<?php echo implode(' ', apply_filters('Modularity/Module/Classes', array('box', 'box--panel'), $module->post_type, $args)); ?>">
    <h2 class="box__headline"><?php echo $module->post_title; ?></h2>
    <ul class="box__list">
        <?php foreach ($items as $item) : ?>
            <?php if ($item['type'] == 'external') : ?>
            <li class="box__list-item">
                <a class="box__link" href="<?php echo $item['link_external']; ?>"><?php echo $item['title'] ?></a>
            </li>
            <?php elseif ($item['type'] == 'internal') : ?>
            <li class="box__list-item">
                <a class="box__link" href="<?php echo get_permalink($item['link_internal']->ID); ?>"><?php echo (!empty($item['title'])) ? $item['title'] : $item['link_internal']->post_title; ?>
                </a>
                <?php if ($item['date'] === true) : ?>
                <time class="box__date"><?php echo date('Y-m-d', strtotime($item['link_internal']->post_date)); ?></time>
                <?php endif; ?>
            </li>
            <?php endif; ?>
        <?php endforeach; ?>
    </ul>
</div>

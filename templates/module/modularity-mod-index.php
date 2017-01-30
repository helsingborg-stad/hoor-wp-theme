<?php
    global $post;
    $items = get_field('index', $module->ID);
    $columnClass = !empty(get_field('index_columns', $module->ID)) ? get_field('index_columns', $module->ID) : 'grid-md-6';
?>
<?php if (!$module->hideTitle && !empty($module->post_title)) : ?>
    <h2 class="box__headline box__headline--inline"><?php echo $module->post_title; ?></h2>
<?php endif; ?>
<div class="grid" data-equal-container>


    <?php
    /* Get image size by column count */
    switch ($columnClass) {
        case "grid-md-12":    //1-col
            $image_dimensions = array(1200,900);
            break;
        case "grid-md-6":    //2-col
            $image_dimensions = array(800,600);
            break;
        default:
            $image_dimensions = array(400,300);
    }
    /* Get image */
    foreach ($items as $item) : $post = $item['page'];
        if (!is_null($item['page'])) {
            setup_postdata($post);
        }
        $permalink = ($item['link_type'] == 'internal') ? get_permalink() : $item['link_url'];
        $thumbnail_image = null;
        if ($item['image_display'] == 'custom' || $item['link_type'] == 'external') {
            $thumbnail_image = wp_get_attachment_image_src(
                $item['custom_image']['ID'],
                apply_filters('Modularity/index/image',
                    municipio_to_aspect_ratio('16:9', $image_dimensions),
                    $args
                )
            );
        } elseif ($item['image_display'] == 'false') {
            $thumbnail_image = false;
        } else {
            $thumbnail_image = wp_get_attachment_image_src(
                get_post_thumbnail_id($item['page']->ID),
                apply_filters('Modularity/index/image',
                    municipio_to_aspect_ratio('16:9', $image_dimensions),
                    $args
                )
            );
        }
    ?>
    <div class="<?php echo $columnClass; ?>">
        <a href="<?php echo $permalink; ?>" class="<?php echo implode(' ', apply_filters('Modularity/Module/Classes', array('box', 'box--panel', 'box--index'), $module->post_type, $args)); ?>" data-equal-item>
            <?php if ($thumbnail_image) : ?>
                <img class="box__image" src="<?php echo $thumbnail_image[0]; ?>" alt="<?php echo isset($item['title']) && !empty($item['title']) ? $item['title'] : get_the_title(); ?>">
            <?php endif; ?>

            <div class="box__content">
                <h3 class="box__link box__link--arrow"><?php echo isset($item['title']) && !empty($item['title']) ? $item['title'] : get_the_title(); ?></h3>
                <p><?php echo isset($item['lead']) && !empty($item['lead']) ? $item['lead'] : get_the_excerpt(); ?></p>
            </div>
        </a>
    </div>
    <?php endforeach; ?>
</div>

<?php wp_reset_postdata(); ?>

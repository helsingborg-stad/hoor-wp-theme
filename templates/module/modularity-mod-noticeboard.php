<?php

$fields = json_decode(json_encode(get_fields($module->ID)));

$getPostsArgs = array(
    'post_type' => MODULARITYNOTICEBOARD_POST_TYPE,
    'posts_per_page' => -1,
    'orderby' => 'date',
    'order' => 'asc',
    'tax_query' => array(
        array(
            'taxonomy' => MODULARITYNOTICEBOARD_TAXONOMY,
            'field'    => 'term_id',
            'terms'    => $fields->filter_posts_by_tag,
        )
    )
);

$posts = get_posts($getPostsArgs);
?>


<div class="<?php echo implode(' ', apply_filters('Modularity/Module/Classes', array('box', 'box-panel'), $module->post_type, $args)); ?>">
    <h2 class="box__title"><?php echo $module->post_title; ?></h2>
    <?php if (!empty($module->introductory_text) || empty($posts)): ?>
        <div class="box-content">
            <?php echo wpautop($module->introductory_text) ?>
        <?php if(empty($posts)) : ?>
                <p><?php _e('There are no announcements right now.') ?></p>
            <?php endif; ?>
        </div>
    <?php endif ?>
    <?php if(!empty($posts)) : ?>
    <ul class="box__list">
        <?php foreach ($posts as $post) :
            $title = apply_filters('the_title', $post->post_title);
            $published = get_the_date('Y-m-d', $post);
            $custom = get_post_custom($post->ID);
            $unpubDate = get_post_meta($post->ID, 'unpublish-date', true);
            if (!empty($custom['unpublish-date'][0])) {
                $unpubDate = unserialize($custom['unpublish-date'][0]);
                $unpubDate = sprintf("%s-%s-%s", $unpubDate['aa'], $unpubDate['mm'], $unpubDate['jj']);
            }
            $meetingDate = '';
            if (!empty($custom['meeting_date'][0])) {
                $meetingDate = date('Y-m-d', strtotime($custom['meeting_date'][0]));
            }
            $link = isset($custom['link'][0]) ? $custom['link'][0] : false;
        ?>
            <li class="box__list-item">
                <?php if ($link): ?>
                    <a href="<?php echo $link ?>" class="box__list-link"><?php echo $title; ?> <?php echo $meetingDate; ?></a>
                <?php else: ?>
                    <?php echo $title; ?> <?php echo $meetingDate; ?>
                <?php endif ?>
                <div>
                    <span class="box__date"><strong>Anslaget:</strong> <time datetime="<?php echo $published ?>"><?php echo $published ?></time></span>
                    <?php if ($unpubDate): ?><span class="box__date"><strong>Tas ner:</strong> <?php echo $unpubDate; ?></span><?php endif ?>
                </div>
            </li>
        <?php endforeach; ?>
        </ul>
    <?php endif; ?>
</div>

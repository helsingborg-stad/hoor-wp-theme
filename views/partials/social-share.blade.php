<ul class="c-share__list hidden-print clearfix" aria-labelledby="social-share">
    <li class="c-share__list-item">
        <a class="c-share__link c-share__link--facebook" data-action="share-popup" href="https://www.facebook.com/sharer/sharer.php?u={{ get_the_permalink() }}" data-tooltip="<?php _e('Share on', 'municipio'); ?> Facebook"><span class="visually-hidden">
            <?php _e('Share on', 'municipio'); ?> </span>Facebook
        </a>
    </li>
    <li class="c-share__list-item">
        <a class="c-share__link c-share__link--twitter" data-action="share-popup" href="http://twitter.com/share?url=<?php echo urlencode(wp_get_shortlink()); ?>" data-tooltip="<?php _e('Share on', 'municipio'); ?> Twitter"><span class="visually-hidden"><?php _e('Share on', 'municipio'); ?> </span>Twitter
        </a>
    </li>
    <li class="c-share__list-item">
        <a class="c-share__link c-share__link--linkedin" data-action="share-popup" href="https://www.linkedin.com/shareArticle?mini=true&amp;url={{ get_the_permalink() }}&amp;title={{ get_the_title() }}&amp;summary={{ get_the_excerpt() }}&amp;source={{ bloginfo('site_name') }}" data-tooltip="<?php _e('Share on', 'municipio'); ?> LinkedIn"><span class="visually-hidden"><?php _e('Share on', 'municipio'); ?> </span>LinkedIn
        </a>
    </li>
    <li class="c-share__list-item">
        <a class="c-share__link c-share__link--mail" href="/"><?php _e('Email page', 'hoor'); ?>
        </a>
    </li>
    <li class="c-share__list-item">
        <a class="c-share__link c-share__link--print" href="#" onclick="window.print();return false;"><?php _e('Print page', 'hoor'); ?>
        </a>
    </li>
</ul>

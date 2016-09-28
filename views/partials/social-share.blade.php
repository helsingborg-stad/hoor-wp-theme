<ul class="c-share__list hidden-print clearfix" aria-labelledby="social-share">
    <li class="c-share__list-item">
        <a class="c-share__link c-share__link--facebook" data-action="share-popup" href="https://www.facebook.com/sharer/sharer.php?u={{ get_the_permalink() }}" data-tooltip="<?php _e('Share on', 'municipio'); ?> Facebook">@include('partials.icon', ['name' => 'facebook']) <span class="visually-hidden">
            <?php _e('Share on', 'municipio'); ?> </span>Facebook
        </a>
    </li>
    <li class="c-share__list-item">
        <a class="c-share__link c-share__link--twitter" data-action="share-popup" href="http://twitter.com/share?url=<?php get_the_permalink() ?>" data-tooltip="<?php _e('Share on', 'municipio'); ?> Twitter">@include('partials.icon', ['name' => 'twitter']) <span class="visually-hidden"><?php _e('Share on', 'municipio'); ?> </span>Twitter
        </a>
    </li>
    <li class="c-share__list-item">
        <a class="c-share__link c-share__link--linkedin" data-action="share-popup" href="https://www.linkedin.com/shareArticle?mini=true&amp;url={{ get_the_permalink() }}&amp;title={{ get_the_title() }}&amp;summary={{ get_the_excerpt() }}&amp;source={{ bloginfo('site_name') }}" data-tooltip="<?php _e('Share on', 'municipio'); ?> Linkedin">@include('partials.icon', ['name' => 'linkedin'])<span class="visually-hidden"><?php _e('Share on', 'municipio'); ?> </span>Linkedin
        </a>
    </li>
    <li class="c-share__list-item">
        <a class="c-share__link c-share__link--mail" href="mailto:?&subject={{ get_the_title() }} &mdash; {{ bloginfo('site_name') }}&amp;body={{ get_the_permalink() }}">@include('partials.icon', ['name' => 'email'])<?php _e('Email page', 'hoor'); ?>
        </a>
    </li>
    <li class="c-share__list-item">
        <a class="c-share__link c-share__link--print" href="#" onclick="window.print();return false;">@include('partials.icon', ['name' => 'print'])<?php _e('Print page', 'hoor'); ?>
        </a>
    </li>
</ul>

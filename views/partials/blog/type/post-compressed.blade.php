<?php global $post; ?>
<li class="archive__item">
    <h3 class="archive__headline"><a href="{{ the_permalink() }}" class="archive__link">{{ the_title() }}</a></h3>
    @if (get_field('archive_' . sanitize_title(get_post_type()) . '_feed_date_published', 'option') != 'false')
    <span class="archive__date">
        <time>
            {{ in_array(get_field('archive_' . sanitize_title(get_post_type()) . '_feed_date_published', 'option'), array('datetime', 'date')) ? the_time(get_option('date_format')) : '' }}
            {{ in_array(get_field('archive_' . sanitize_title(get_post_type()) . '_feed_date_published', 'option'), array('datetime', 'time')) ? the_time(get_option('time_format')) : '' }}
        </time>
    </span>
    @endif

    <div class="archive__container">
        @if (municipio_get_thumbnail_source(null,array(400,250)))
        <div class="archive__image-container">
            <img src="{{ municipio_get_thumbnail_source(null,array(200,250)) }}">
        </div>
        @endif
        <div class="archive__excerpt">
            {{ the_excerpt() }}
        </div>
    </div>
</li>

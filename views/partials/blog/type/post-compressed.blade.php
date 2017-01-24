<?php global $post; ?>
<li class="archive__item">
    <h3 class="archive__link"><a href="{{ the_permalink() }}" class="archive__link">{{ the_title() }}</a></h3>
    <div class="archive__excerpt">
         @if (municipio_get_thumbnail_source(null,array(400,250)))
        <div class="box-image-container">
            <img src="{{ municipio_get_thumbnail_source(null,array(400,250)) }}">
        </div>
        @endif

        @if (get_field('archive_' . sanitize_title(get_post_type()) . '_feed_date_published', 'option') != 'false')
        <span class="archive__date">
            <time>
                {{ in_array(get_field('archive_' . sanitize_title(get_post_type()) . '_feed_date_published', 'option'), array('datetime', 'date')) ? the_time(get_option('date_format')) : '' }}
                {{ in_array(get_field('archive_' . sanitize_title(get_post_type()) . '_feed_date_published', 'option'), array('datetime', 'time')) ? the_time(get_option('time_format')) : '' }}
            </time>
        </span>
        @endif
        {{ the_excerpt() }}
    </div>
</li>

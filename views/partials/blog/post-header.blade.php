<header class="post-header">

    @if (is_single())
        <h1 class="post__headline">{{ the_title() }}</h1>
    @else
        <h2><a href="{{ the_permalink() }}">{{ the_title() }}</a></h2>
    @endif

    <div class="article-meta">
        <ul class="clearfix">
            @if (in_array('author', (array)get_field('archive_' . sanitize_title(get_post_type()) . '_post_display_info', 'option')))
            <li class="post-author">
                @if (in_array('author_image', (array)get_field('archive_' . sanitize_title(get_post_type()) . '_post_display_info', 'option')) && is_array(get_field('user_profile_picture', 'user_' . get_the_author_meta('ID'))))
                    <span class="post-author-image" style="background-image:url('{{ get_field('user_profile_picture', 'user_' . get_the_author_meta('ID'))['url'] }}');"><img src="{{ get_field('user_profile_picture', 'user_' . get_the_author_meta('ID'))['url'] }}" alt="{{ (!empty(get_the_author_meta('first_name')) && !empty(get_the_author_meta('last_name'))) ? get_the_author_meta('first_name') . ' ' . get_the_author_meta('last_name')  : get_the_author() }}"></span>
                @endif

                @if (!empty(get_the_author_meta('first_name')) && !empty(get_the_author_meta('last_name')))
                    <span class="post-author-name">{{ get_the_author_meta('first_name') }} {{ get_the_author_meta('last_name') }}</span>
                @else
                    <span class="post-author-name">{{ get_the_author() }}</span>
                @endif
            </li>
            @endif

            @if ((!is_single() && get_field('archive_' . sanitize_title(get_post_type()) . '_feed_date_published', 'option') != 'false' && !empty(get_field('archive_' . sanitize_title(get_post_type()) . '_feed_date_published', 'option'))) || (is_single() && get_field('archive_' . sanitize_title(get_post_type()) . '_post_date_published', 'option') != 'false') && !empty(get_field('archive_' . sanitize_title(get_post_type()) . '_post_date_published', 'option')))
            <li class="post-date">
                <time>
                    @if (is_single())
                        {{ in_array(get_field('archive_' . sanitize_title(get_post_type()) . '_post_date_published', 'option'), array('datetime', 'date')) ? the_time(get_option('date_format')) : '' }}
                        {{ in_array(get_field('archive_' . sanitize_title(get_post_type()) . '_post_date_published', 'option'), array('datetime', 'time')) ? the_time(get_option('time_format')) : '' }}
                    @else
                        {{ in_array(get_field('archive_' . sanitize_title(get_post_type()) . '_feed_date_published', 'option'), array('datetime', 'date')) ? the_time(get_option('date_format')) : '' }}
                        {{ in_array(get_field('archive_' . sanitize_title(get_post_type()) . '_feed_date_published', 'option'), array('datetime', 'time')) ? the_time(get_option('time_format')) : '' }}
                    @endif
                </time>
            </li>
            @endif

            @if (comments_open())
            <li class="post-comments">
                <a href="{{ comments_link() }}">
                    <span class="hidden-xs hidden-sm"><?php _e('Comments'); ?> ({{ comments_number('0', '1', '%') }})</span>
                </a>
            </li>
            @endif
        </ul>
    </div>

    @include('partials.accessibility-menu')

</header>

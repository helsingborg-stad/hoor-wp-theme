<footer class="c-post-footer">
    @if (get_field('post_show_share', get_the_id()) !== false && get_field('page_show_share', 'option') !== false && is_single())
    <div class="c-share hidden-print clearfix">

        <p class="c-share__title visually-hidden" id="social-share"><strong><?php _e('Share the page', 'municipio'); ?>:</strong> {{ the_title() }}</p>
        @include('partials.social-share')

    </div>
    @endif

    <div class="c-article-timestamps">
        @if (in_array('author', (array)get_field('archive_' . sanitize_title(get_post_type()) . '_post_display_info', 'option')) && get_field('post_show_author', get_the_id()) !== false)
            <strong><?php echo apply_filters('Municipio/author_display/title', __('Published by', 'municipio')); ?>:</strong>
            <span class="post-author post-author-margin-left">
                @if (in_array('author_image', (array)get_field('archive_' . sanitize_title(get_post_type()) . '_post_display_info', 'option')) && get_field('post_show_author_image', get_the_id()) !== false && !empty(get_field('user_profile_picture', 'user_' . get_the_author_meta('ID'))))
                    <span class="post-author-image" style="background-image:url('{{ get_field('user_profile_picture', 'user_' . get_the_author_meta('ID')) }}');"><img src="{{ get_field('user_profile_picture', 'user_' . get_the_author_meta('ID')) }}" alt="{{ (!empty(get_the_author_meta('first_name')) && !empty(get_the_author_meta('last_name'))) ? get_the_author_meta('first_name') . ' ' . get_the_author_meta('last_name')  : get_the_author() }}"></span>
                @endif

                @if (!empty(get_the_author_meta('first_name')) && !empty(get_the_author_meta('last_name')))
                    <span class="post-author-name">{!! apply_filters('Municipio/author_display/name', get_the_author_meta('first_name') . ' ' . get_the_author_meta('last_name'), get_the_author_meta('ID')) !!}</span>
                @else
                    <span class="post-author-name">{!! apply_filters('Municipio/author_display/name', get_the_author(), get_the_author_meta('ID')) !!}</span>
                @endif
            </span>
        @endif

        @if (in_array('category', (array)get_field('archive_' . sanitize_title(get_post_type()) . '_post_display_info', 'option')))
            @include('partials.blog.post-categories')
        @endif

        @if (in_array('tags', (array)get_field('archive_' . sanitize_title(get_post_type()) . '_post_display_info', 'option')))
            @include('partials.blog.post-tags')
        @endif
    </div>

</footer>

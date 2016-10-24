@extends('templates.master')

@section('content')

@include('partials.archive-filters')

@include('partials.breadcrumbs')

<div class="container main-container">

    <div class="grid">
        @if (get_field('archive_' . sanitize_title(get_post_type()) . '_show_sidebar_navigation', 'option'))
            @include('partials.sidebar-left')
        @endif

        <?php
            $cols = 'grid-md-12';
            if (is_active_sidebar('right-sidebar') && get_field('archive_' . sanitize_title(get_post_type()) . '_show_sidebar_navigation', 'option')) {
                $cols = 'grid-md-8 grid-lg-6';
            } elseif (is_active_sidebar('right-sidebar') || get_field('archive_' . sanitize_title(get_post_type()) . '_show_sidebar_navigation', 'option')) {
                $cols = 'grid-md-12 grid-lg-9';
            }
        ?>

        <div class="{{ $cols }}">

            @if (is_active_sidebar('content-area-top'))
                <div class="grid sidebar-content-area sidebar-content-area-top">
                    <?php dynamic_sidebar('content-area-top'); ?>
                </div>
            @endif

            <div class="grid">
                @while(have_posts())
                    <h1>Evenemang</h1>
                    {!! the_post() !!}

                    <?php global $post; ?>
                    <div class="grid">
                        <div class="grid-xs-12">
                            <div class="post post-single">
                                <h2><a href="{{ the_permalink() }}">{{ the_title() }}</a></h2>
                                <h3>{{ get_field(date) }}</h3>
                                <h3>{{ get_field(place) }}</h3>

                                <article class="clearfix">
                                    @if (isset(get_extended($post->post_content)['main']) && strlen(get_extended($post->post_content)['main']) > 0 && isset(get_extended($post->post_content)['extended']) && strlen(get_extended($post->post_content)['extended']) > 0)

                                        {!! apply_filters('the_lead', get_extended($post->post_content)['main']) !!}
                                        {!! apply_filters('the_content', get_extended($post->post_content)['extended']) !!}

                                    @else
                                        {!! the_content() !!}
                                    @endif
                                </article>
                            </div>
                        </div>
                    </div>
                @endwhile
            </div>

            @if (is_active_sidebar('content-area'))
                <div class="grid sidebar-content-area sidebar-content-area-bottom">
                    <?php dynamic_sidebar('content-area'); ?>
                </div>
            @endif

            <div class="grid">
                <div class="grid-sm-12 text-center">
                    <h2 class="visually-hidden" id="pagination"><?php _e('Pagination') ?></h2>
                    {!!
                        paginate_links(array(
                            'type' => 'list',
                            'next_text' => '<span class="next__label">Nästa<span class="visually-hidden"> sida</span></span>',
                            'prev_text' => '<span class="previous__label">Föregående</span>',
                        ))
                    !!}
            </div>
        </div>

        @include('partials.sidebar-right')
    </div>
</div>

@stop

{{-- This template is used for the posts index page, i.e /nyheter. See https://developer.wordpress.org/files/2014/10/template-hierarchy.png --}}

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
                    {!! the_post() !!}

                    @if (in_array($template, array('full', 'compressed', 'collapsed')))
                        <div class="grid-xs-12 post">
                            @include('partials.blog.type.post-' . $template)
                        </div>
                    @else
                        @include('partials.blog.type.post-' . $template)
                    @endif
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

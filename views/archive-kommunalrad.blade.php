{{-- This template is used for the kommunalrådsblogg --}}

@extends('templates.master')

@section('content')

@include('partials.breadcrumbs')

@include('partials.hero')

@include('partials.archive-filters')

<div class="container main-container">

    <div class="grid">
        <div class="grid-lg-12">
            <div class="grid">

                <div class="{{ $contentGridSize }} grid-print-12">

                    @if (is_active_sidebar('content-area-top'))
                        <div class="sidebar-content-area sidebar-content-area-top">
                            <div class="grid">
                                <?php dynamic_sidebar('content-area-top'); ?>
                            </div>
                        </div>
                    @endif

                    @if (have_posts())
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
                    @else
                        <div class="grid-xs-12">
                            <div class="notice info pricon pricon-info-o pricon-space-right"><?php _e('No posts to show'); ?>…</div>
                        </div>
                    @endif

                    @if (is_active_sidebar('content-area'))
                        <div class="sidebar-content-area sidebar-content-area-bottom">
                            <div class="grid">
                                <?php dynamic_sidebar('content-area'); ?>
                            </div>
                        </div>
                    @endif

                    <div class="c-article-timestamps">
                        @include('partials.timestamps')
                    </div>

                </div>

                @include('partials.sidebar-right')

                <div class="grid-sm-12">
                    @include('partials.page-footer')
                </div>

            </div>
        </div>
    </div>
</div>

@stop

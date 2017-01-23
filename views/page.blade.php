@extends('templates.master')

@section('content')

@include('partials.breadcrumbs')

@include('partials.hero')

<div class="container main-container">

    <div class="grid">
        <div class="grid-lg-3 hidden-print">
            @include('partials.sidebar-left')
        </div>

        <div class="grid-lg-9">
            <div class="grid {{ (wp_get_post_parent_id(get_the_id()) != 0) ? 'no-margin-top' : '' }}">

                <div class="{{ $contentGridSize }} grid-print-12">

                    @if (is_active_sidebar('content-area-top'))
                        <div class="sidebar-content-area sidebar-content-area-top">
                            <div class="grid">
                                <?php dynamic_sidebar('content-area-top'); ?>
                            </div>
                        </div>
                    @endif

                    <div id="readspeaker-read">
                        @while(have_posts())
                            {!! the_post() !!}
                            @include('partials.article')
                        @endwhile
                    </div>

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

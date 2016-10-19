@extends('templates.master')

@section('content')

@include('partials.breadcrumbs')

@include('partials.hero')

<div class="container main-container">

    <div class="grid {{ (wp_get_post_parent_id(get_the_id()) != 0) ? 'no-margin-top' : '' }}">
        @include('partials.sidebar-left')

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

            @include('partials.page-footer')
        </div>


        @include('partials.sidebar-right')
    </div>
</div>

@stop

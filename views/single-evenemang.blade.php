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

                    <?php global $post; ?>
                    <article class="clearfix">
                        <h1>{{ the_title() }}</h1>

                        @include('partials.accessibility-menu')

                        <h1>{{ get_field(date) }}</h1>
                        <h1>{{ get_field(place) }}</h1>

                        @if (isset(get_extended($post->post_content)['main']) && strlen(get_extended($post->post_content)['main']) > 0 && isset(get_extended($post->post_content)['extended']) && strlen(get_extended($post->post_content)['extended']) > 0)

                            {!! apply_filters('the_lead', get_extended($post->post_content)['main']) !!}
                            {!! apply_filters('the_content', get_extended($post->post_content)['extended']) !!}

                        @else

                            {!! the_content() !!}

                        @endif

                    </article>

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

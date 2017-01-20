{{-- This template is used for the event archive page --}}


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

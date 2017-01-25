@extends('templates.master')

@section('content')

@include('partials.breadcrumbs')

@include('partials.hero')

<div class="container main-container">

    <div class="grid">
        <div class="grid-lg-3 hidden-print">
            <a class="o-button o-button--primary" href="/nyheter">Till alla nyheter</a>
        </div>

        <div class="grid-lg-9">
            <div class="grid">

                <div class="grid-sm-12 grid-md-8 grid-print-12">

                    @while(have_posts())

                    @if (is_single() && is_active_sidebar('content-area-top'))
                        <div class="sidebar-content-area sidebar-content-area-top">
                            <div class="grid">
                                <?php dynamic_sidebar('content-area-top'); ?>
                            </div>
                        </div>
                    @endif

                    <div id="readspeaker-read">
                        {!! the_post() !!}

                        @include('partials.blog.type.post-single')
                    </div>

                    <div class="c-article-timestamps">
                        <ul class="c-article-timestamps__list">
                            <li class="c-article-timestamps__list-item">
                                <strong>Publicerad:</strong>
                                <time datetime="2016-09-28T19:51">28 september 2016, 19.51</time>
                            </li>
                            <li class="c-article-timestamps__list-item">
                                <strong>Senast uppdaterad:</strong>
                                <time datetime="2017-01-04T19:51">4 januari 2017, 13.55</time>
                            </li>
                        </ul>
                    </div>

                    @if (is_single() && is_active_sidebar('content-area'))
                        <div class="sidebar-content-area sidebar-content-area-bottom">
                            <div class="grid">
                                <?php dynamic_sidebar('content-area'); ?>
                            </div>
                        </div>
                    @endif

                    @if (is_single() && comments_open())
                        <div class="grid">
                            <div class="grid-sm-12">
                                @include('partials.blog.comments-form')
                            </div>
                        </div>
                        <div class="grid">
                            <div class="grid-sm-12">
                                @include('partials.blog.comments')
                            </div>
                        </div>
                    @endif
                @endwhile
                </div>

                @include('partials.sidebar-right')

                <div class="grid-sm-12">
                    @include('partials.blog.post-footer')
                </div>
            </div>
        </div>

    </div>
</div>

@stop

@extends('templates.master')

@section('content')

@include('partials.breadcrumbs')

@include('partials.hero')

<div class="container main-container">

    <div class="grid">
        <div class="grid-lg-3 hidden-print">

            <!-- TODO: Dummy example -->
            <aside class="sidebar-left-sidebar">
                <button aria-expanded="false" aria-controls="sidebarMenu" class="sidebar-menu__navigation-button o-button o-button--primary">
                    <svg width="20" height="20" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path d="M0 3h20v2H0V3zm0 6h20v2H0V9zm0 6h20v2H0v-2z" fill-rule="evenodd"></path>
                    </svg>
                    <span>
                    Visa undermeny<span class="visually-hidden">Nyhetsarkiv</span>
                    </span>
                </button>
                <h2 class="sidebar-menu__headline">Nyhetsarkiv</h2>
                <nav id="sidebar-menu">
                    <ul class="nav-aside hidden-xs hidden-sm">
                        <li class=""><a href="/">2017</a></li>
                        <li class="has-children is-expanded"><a href="/">2016</a><button>Show submenu</button>
                        <ul class="sub-menu">
                            <li><a href="/">December</a></li>
                            <li><a href="/">November</a></li>
                            <li><a href="/">Oktober</a></li>
                            <li><a href="/">September</a></li>
                            <li><a href="/">Augusti</a></li>
                            <li><a href="/">Juli</a></li>
                            <li><a href="/">Juni</a></li>
                            <li><a href="/">Maj</a></li>
                            <li><a href="/">April</a></li>
                            <li><a href="/">Mars</a></li>
                            <li><a href="/">Februari</a></li>
                            <li><a href="/">Januari</a></li>
                        </ul>
                        </li>
                        <li><a href="/">2015</a></li>
                        <li><a href="/">2014</a></li>
                    </ul>
                </nav>
            </aside>
            <!-- TODO: /Dummy example -->
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

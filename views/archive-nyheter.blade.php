{{-- This template is used for the /nyheter --}}

@extends('templates.master')

@section('content')

@include('partials.breadcrumbs')

@include('partials.hero')

@include('partials.archive-filters')

<div class="container main-container">

    <div class="grid">

        <div class="grid-lg-12">
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

                    @if (is_active_sidebar('content-area-top'))
                        <div class="sidebar-content-area sidebar-content-area-top">
                            <div class="grid">
                                <?php dynamic_sidebar('content-area-top'); ?>
                            </div>
                        </div>
                    @endif

                    <h1><?php _e('Latest news', 'hoor'); ?></h1>
                    <!--<h1>Nyhetsarkiv för December, 2016</h1> -->

                    <ul class="archive">
                        @if (have_posts())
                            @while(have_posts())
                                {!! the_post() !!}

                                @if (in_array($template, array('full', 'compressed', 'collapsed')))
                                    @include('partials.blog.type.post-' . $template)
                                @else
                                    @include('partials.blog.type.post-' . $template)
                                @endif
                            @endwhile
                        @else
                            <li class="grid-xs-12">
                                <div class="notice info"><?php _e('No posts to show'); ?>…</div>
                            </li>
                        @endif
                    </ul>

                    <div class="grid">
                        <div class="grid-lg-12">
                            {!!
                                paginate_links(array(
                                    'type' => 'list'
                                ))
                            !!}
                        </div>
                    </div>

                    @if (is_active_sidebar('content-area'))
                        <div class="sidebar-content-area sidebar-content-area-bottom">
                            <div class="grid">
                                <?php dynamic_sidebar('content-area'); ?>
                            </div>
                        </div>
                    @endif

                </div>
            </div>
        </div>
    </div>
</div>

@stop

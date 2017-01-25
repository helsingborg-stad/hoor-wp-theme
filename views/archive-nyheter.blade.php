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
                <div class="{{ $contentGridSize }} grid-print-12">

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

                @include('partials.sidebar-right')

            </div>
        </div>
    </div>
</div>

@stop

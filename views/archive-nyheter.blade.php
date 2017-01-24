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

                <div class="grid-md-8 grid-lg-9">

                    @if (is_active_sidebar('content-area-top'))
                        <div class="sidebar-content-area sidebar-content-area-top">
                            <div class="grid">
                                <?php dynamic_sidebar('content-area-top'); ?>
                            </div>
                        </div>
                    @endif

                    <h1>Nyhetsarkiv</h1>

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

                <aside class="grid-md-4 grid-lg-3 sidebar-right-sidebar">
                    <div class="grid">
                        <div class="grid-xs-12">Sidebar</div>
                    </div>
                </aside>

                <div class="grid-sm-12">
                    @include('partials.page-footer')
                </div>

            </div>
        </div>
    </div>
</div>

@stop

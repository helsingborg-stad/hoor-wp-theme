@extends('templates.master')

@section('content')

@include('partials.breadcrumbs')

@include('partials.hero')

<div class="container main-container">

    <div class="grid {{ (wp_get_post_parent_id(get_the_id()) != 0) ? 'no-margin-top' : '' }}">
        <div class="grid-lg-3 hidden-print">
            <a class="o-button o-button--primary o-button--more" href="/evenemang"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 512 512"><path d="M427 234.625H167.296l119.702-119.702L256 85 85 256l171 171 29.922-29.924-118.626-119.701H427v-42.75z"/></svg> <?php _e('More events', 'hoor'); ?></a>
        </div>

        <div class="grid-lg-9">
            <div class="grid">

                <div class="grid-sm-12 grid-md-8 grid-print-12">
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

                                @if (municipio_get_thumbnail_source(null,array(590,500)))
                                    <div class="event__image-container">
                                        <img src="{{ municipio_get_thumbnail_source(null,array(590,500)) }}">
                                    </div>
                                @endif

                                <h1>{{ the_title() }}</h1>

                                @include('partials.accessibility-menu')

                                <div class="event__meta">
                                    <p class="event__meta--date">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="0 0 512 512"><path d="M144 128c17.7 0 32-14.3 32-32V64c0-17.7-14.3-32-32-32s-32 14.3-32 32v32c0 17.7 14.3 32 32 32zm224 0c17.7 0 32-14.3 32-32V64c0-17.7-14.3-32-32-32s-32 14.3-32 32v32c0 17.7 14.3 32 32 32z"/><path d="M472 64h-56v40.7c0 22.5-23.2 39.3-47.2 39.3S320 127.2 320 104.7V64H192v40.7c0 22.5-24 39.3-48 39.3s-48-16.8-48-39.3V64H40c-4.4 0-8 3.6-8 8v400c0 4.4 3.6 8 8 8h432c4.4 0 8-3.6 8-8V72c0-4.4-3.6-8-8-8zm-40 368H80V176h352v256z"/></svg>
                                        <strong><?php _e('Date', 'hoor'); ?>:</strong>
                                        <?php $startdate = strtotime(get_field('event_startdate', false, false)) ?>
                                            <time class="event__meta--time" datetime="<?php echo date('Y-m-d\TH:i', $startdate); ?>">
                                                <?php echo date('j', $startdate); ?>
                                                <?php echo date_i18n('F', $startdate); ?>
                                                <?php echo date('H:i', $startdate); ?>
                                            </time>
                                        <?php if ($endate = get_field('event_enddate', false, false)): ?>
                                            -
                                            <?php $enddate = strtotime($endate) ?>
                                            <time  datetime="<?php echo date('Y-m-d\TH:i', $enddate); ?>">
                                              <?php echo date('j', $enddate); ?>
                                              <?php echo date_i18n('F', $enddate); ?>
                                              <?php echo date('H:i', $enddate); ?>
                                            </time>
                                        <?php endif ?>
                                    </p>

                                    <?php if ($place = get_field('event_place')): ?>
                                        <p class="event__meta--place">
                                            <svg width="14" height="16" viewBox="0 0 14 20" xmlns="http://www.w3.org/2000/svg"><path d="M7 0C3.13 0 0 3.13 0 7c0 5.25 7 13 7 13s7-7.75 7-13c0-3.87-3.13-7-7-7zm0 9.5a2.5 2.5 0 1 1 0-5 2.5 2.5 0 0 1 0 5z"fill-rule="evenodd"/></svg>
                                            <strong><?php _e('Location', 'hoor'); ?>:</strong> <?php echo $place ?>
                                        </p>
                                    <?php endif ?>
                                </div>

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
            </div>
        </div>


        @include('partials.sidebar-right')
    </div>
</div>

@stop

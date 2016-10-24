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

                        <div class="box__date-event">
                            <?php $startdate = strtotime(get_field('event_startdate', false, false)) ?>
                                <time class="box__date-event" datetime="<?php echo date('Y-m-d\TH:i', $startdate); ?>">
                                <span class="box__date-event-start--day"><?php echo date('d', $startdate); ?></span>
                                <span class="box__date-event-start--month"><?php echo date_i18n('F', $startdate); ?></span>
                                <span class="box__date-event-start--time"><?php echo date('H:i', $startdate); ?></span>
                            </time>
                            <?php if ($endate = get_field('event_enddate', false, false)): ?>
                                -
                                <?php $enddate = strtotime($endate) ?>
                                <time class="box__date-event-end" datetime="<?php echo date('Y-m-d\TH:i', $enddate); ?>">
                                  <span class="box__date-event-start--day"><?php echo date('d', $enddate); ?></span>
                                  <span class="box__date-event-start--month"><?php echo date_i18n('F', $enddate); ?></span>
                                  <span class="box__date-event-end--time"><?php echo date('H:i', $enddate); ?></span>
                                </time>
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


        @include('partials.sidebar-right')
    </div>
</div>

@stop

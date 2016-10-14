@extends('templates.master')

@section('content')

<div class="container main-container">
    <div class="grid">
        <div class="grid-lg-6 grid-md-8 grid-sm-12 error404__content">
            <h1 class="error404__title">{{ get_field('404_error_message', 'option') ? get_field('404_error_message', 'option') : 'The page could not be found' }} <span class="error404__error-code"><?php _e('Error 404', 'hoor'); ?></span></h1>

            {!! get_field('404_error_info', 'option') ? get_field('404_error_info', 'option') : '' !!}

            <ul class="actions">
                @if (is_array(get_field('404_display', 'option')) && in_array('search', get_field('404_display', 'option')))
                <li>
                    <a rel="nofollow" href="{{ home_url() }}?s={{ $keyword }}" class="link-item link-item-light">{{ sprintf(get_field('404_display', 'option') ? get_field('404_search_link_text', 'option') : 'Search "%s"', $keyword) }}</a>
                </li>
                @endif

                @if (is_array(get_field('404_display', 'option')) && in_array('home', get_field('404_display', 'option')))
                <li><a href="{{ home_url() }}" class="link-item link-item-light">{{ get_field('404_home_link_text', 'option') ? get_field('404_home_link_text', 'option') : 'Go to home' }}</a></li>
                @endif

                @if (is_array(get_field('404_display', 'option')) && in_array('back', get_field('404_display', 'option')))
                <li>
                    <a href="javascript:history.go(-1);" class="btn btn-primary">
                        {{ get_field('404_back_button_text', 'option') ? get_field('404_back_button_text', 'option') : 'Go back' }}
                    </a>
                </li>
                @endif
            </ul>
        </div>
    </div>
</div>

@stop

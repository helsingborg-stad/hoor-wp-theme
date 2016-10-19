@extends('templates.master')

@section('content')

@include('partials.search-hero')

@include('partials.search-popular')

<div class="container-front container-front--alt">
    <div class="container">
        @include('partials.hero')
    </div>
</div>

<div class="container-front">
    <div class="container">
        @if (is_active_sidebar('content-area-top'))
            <?php dynamic_sidebar('content-area-top'); ?>
        @endif
    </div>
</div>

<div class="container-front container-front--alt">
    <div class="container">
        @if (is_active_sidebar('content-area'))
            <?php dynamic_sidebar('content-area'); ?>
        @endif
    </div>
</div>

@stop

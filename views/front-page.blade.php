@extends('templates.master')

@section('content')

<?php 
    $image = get_field('hero_image');

    if( !empty($image) ): ?>

    <div class="hero-image">
        <style>
            .hero-image {
                background-image: url(<?php echo $image['url']; ?>);
            }
        </style>

        <div class="hero-search">
            <form class="c-search-form" method="get" action="/">
                <label for="searchkeyword-{{ $searchFormNode }}" class="visually-hidden">{{ get_field('search_label_text', 'option') ? get_field('search_label_text', 'option') : __('Search', 'municipio') }}</label>
                <div class="c-search-form__group">
                    <input id="searchkeyword-{{ $searchFormNode }}" autocomplete="off" class="c-search-form__field" type="search" name="s" placeholder="{{ get_field('search_placeholder_text', 'option') ? get_field('search_placeholder_text', 'option') : 'What are you looking for?' }}" value="<?php echo (!empty(get_search_query())) ? get_search_query() : ''; ?>">
                    <button type="submit" class="c-search-form__button c-search-form__button--primary">{{ get_field('search_button_text', 'option') ? get_field('search_button_text', 'option') : __('Search', 'municipio') }}</button>
                </div>
            </form>
        </div>
    </div>


<?php endif; ?>

<?php if( have_rows('search_links') ): ?>
    <div class="search-popular">
        <div class="container">
            <div class="grid">
                <div class="grid-md-12">
                    <p class="search-popular__title"><?php _e('Popular searches', 'hoor'); ?>:</p>
                    <ul class="search-popular__list">
                        <?php while ( have_rows('search_links') ) : the_row(); ?>
                            <li class="search-popular__list-item"><a class="search-popular__list-link" href="?s={{ rawurlencode(get_sub_field('search_query')) }}">{{ get_sub_field('search_label') }}</a></li>
                        <?php endwhile; ?>
                    </ul>
                </div>
            </div>
        </div>
    </div>
<?php else :
    // no rows found
endif; ?>

<div class="container-front container-front--alt">
    <code>[Hero] - Genvägar</code>
    <div class="container">
        @include('partials.hero')
    </div>
</div>

<div class="container-front">
    <code>[Content Area Top] - 4 Puffar</code>
    <div class="container">
        @if (is_active_sidebar('content-area-top'))
            <?php dynamic_sidebar('content-area-top'); ?>
        @endif
    </div>
</div>

<div class="container-front container-front--alt">
    <code>[Content Area] - Nyheter</code>
    <div class="container">
        @if (is_active_sidebar('content-area'))
            <?php dynamic_sidebar('content-area'); ?>
        @endif
    </div>
</div>

<div class="container-front">
    <code>[Right Sidebar] - Evenemang</code>
    <div class="container">
        @if (is_active_sidebar('right-sidebar'))
            <?php dynamic_sidebar('right-sidebar'); ?>
        @endif
    </div>
</div>

@stop

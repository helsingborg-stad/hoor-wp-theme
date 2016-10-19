<?php 
    $image = get_field('hero_image');

    if( !empty($image) ): ?>

    <div class="hero-image">
        <style>
            .hero-image {
                background-image: url(<?php echo $image['url']; ?>);
            }
        </style>

        <div class="hero__search">
            @include('partials.search.top-search')
        </div>
    </div>
<?php endif; ?>
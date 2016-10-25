<?php

    $image = get_field('hero_image');
    $sizes = array(
        array(468, 200),
        array(768, 240),
        array(960, 300),
        array(1260, 360),
        array(1440, 400),
    );
?>

    <?php if( !empty($image) ): ?>
    <div class="hero-image hidden-print">

        <style>
           .hero-image {
               background-image: url(<?php echo $image['url']; ?>);
           }

            <?php foreach ($sizes as $i => $size): ?>
                <?php
                    $image_data = wp_get_attachment_image_src($image['ID'], $size);
                    $max_width = false;
                    $min_width = false;
                    // Use max-width for all breakpoints except the the last.
                    if ($i < count($sizes) - 1 ) {
                        $max_width = $size[0];
                    }
                    // Use min-width for all breakpoints except the the first.
                    if ($i > 0) {
                        $min_width = $sizes[$i-1][0];
                    }
                ?>
                @media only screen @if($min_width)and (min-width: {{ $min_width }}px) @endif @if($max_width)and (max-width: {{ $max_width }}px) @endif {
                    .hero-image {
                        background-image: url({{ $image_data[0] }});
                    }
                }
           <?php endforeach ?>
       </style>

        <div class="hero__search">
            @include('partials.search.top-search')
        </div>
    </div>
<?php endif; ?>

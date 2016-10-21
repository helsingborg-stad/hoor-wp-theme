@if (is_active_sidebar('slider-area') === true )
    <div class="hero">
        <div class="container">
            <div class="grid">
                <?php dynamic_sidebar('slider-area'); ?>
            </div>
        </div>
    </div>
@endif
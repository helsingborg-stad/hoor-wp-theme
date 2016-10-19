<div class="post-categories__wrapper">
    <p class="post-categories__title"><?php _e('Categories', 'municipio'); ?>:</p>
    @if (has_category())
    {{ the_category() }}
    @else
    <?php _e('No categories', 'municipio'); ?>
    @endif
</div>

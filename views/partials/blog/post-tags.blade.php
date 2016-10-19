<div class="post-tags__wrapper">
    <p class="post-tags__title"><?php _e('Tags', 'municipio'); ?>:
    @if (has_tag())
    <ul class="post-tags">
        {{ the_tags('<li>', '</li><li>', '</li>') }}
    </ul>
    @else
    <?php _e('No tags', 'municipio'); ?>
    @endif
</div>

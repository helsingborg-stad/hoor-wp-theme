<?php
    global $searchFormNode;
    $searchFormNode = ($searchFormNode) ? $searchFormNode+1 : 1;
?>
<form class="c-search-form" method="get" action="/">
    <label for="searchkeyword-{{ $searchFormNode }}" class="visually-hidden c-search-form__label">{{ get_field('search_label_text', 'option') ? get_field('search_label_text', 'option') : __('Search', 'municipio') }}</label>
    <div class="c-search-form__group">
        <input id="searchkeyword-{{ $searchFormNode }}" autocomplete="off" class="c-search-form__field" type="search" name="s" placeholder="{{ get_field('search_placeholder_text', 'option') ? get_field('search_placeholder_text', 'option') : 'What are you looking for?' }}" value="<?php echo (!empty(get_search_query())) ? get_search_query() : ''; ?>">
        <button type="submit" class="c-search-form__button">{{ get_field('search_button_text', 'option') ? get_field('search_button_text', 'option') : __('Search', 'municipio') }}</button>
    </div>
</form>

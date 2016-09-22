<?php
    global $searchFormNode;
    $searchFormNode = ($searchFormNode) ? $searchFormNode+1 : 1;
?>
<form class="header__search-form" method="get" action="/">
    <label for="searchkeyword-{{ $searchFormNode }}" class="visually-hidden">{{ get_field('search_label_text', 'option') ? get_field('search_label_text', 'option') : __('Search', 'municipio') }}</label>
    <div class="header__search-group">
        <input id="searchkeyword-{{ $searchFormNode }}" autocomplete="off" class="header__search-field" type="search" name="s" placeholder="{{ get_field('search_placeholder_text', 'option') ? get_field('search_placeholder_text', 'option') : 'What are you looking for?' }}" value="<?php echo (!empty(get_search_query())) ? get_search_query() : ''; ?>">
        <button type="submit" class="header__search-button">{{ get_field('search_button_text', 'option') ? get_field('search_button_text', 'option') : __('Search', 'municipio') }}</button>
    </div>

</form>

<?php $pagination = $search->pagination(); ?>

<div class="main__search hidden-print" id="header-search">
    <div class="container">
        <div class="grid">
            <div class="grid-sm-12">
                @include('partials.search.top-search')
            </div>
        </div>
    </div>
</div>

<div class="container main-container">

    <section class="gutter-vertical gutter-lg clearfix">
        <div class="gid">
            <div class="grid-lg-12">
                <div class="gutter gutter-sm gutter-top">
                    <h1 class="search-result__headline"><strong>{{ $results->searchInformation->formattedTotalResults }}</strong> träffar på <strong>"{{ get_search_query() }}"</strong> inom Hoor.se</h1>
                </div>
            </div>
        </div>
    </section>

    @if (!$results->items)

    <div class="container gutter gutter-lg gutter-top">
        <div class="grid gutter gutter-lg gutter-top">
            <div class="grid-lg-12">
                <div class="notice info">
                 <?php _e('Found no matching results on your search.', 'municipio'); ?>
                </div>
            </div>
        </div>
    </div>

    @else

    <section>
        <div class="container">
            <div class="grid">
                <div class="grid-md-12 grid-lg-9">
                    <div class="grid">
                        <div class="grid-lg-12">
                            <ul class="search-result">

                                @foreach ($results->items as $item)
                                <li class="search-result__item">
                                    <h3 class="search-result__title"><a class="search-result__link {{ (isset($item->fileFormat)) ? $search->getFiletypeClass($item->fileFormat) : '' }}" href="{{ apply_filters('Municipio/search_result/permalink_url', $item->link, false) }}">{!! apply_filters('Municipio/search_result/title', $item->htmlTitle, false) !!}</a></h3>
                                    <p class="search-result__excerpt">@if ($search->getModifiedDate($item))<span class="search-result__date"><time >{{ apply_filters('Municipio/search_result/date', $search->getModifiedDate($item), false) }}</time> &dash; </span>@endif{!! apply_filters('Municipio/search_result/excerpt', trim($item->snippet), false) !!}</p>
                                    <!--
                                    <div class="search-result__details">
                                        <span ><a href="{{ apply_filters('Municipio/search_result/permalink_url', $item->link, false) }}" class="search-result__url">{!! apply_filters('Municipio/search_result/permalink_text', $item->htmlFormattedUrl, false) !!}</a>
                                    </div>
                                    -->
                                </li>
                                @endforeach

                            </ul>
                        </div>
                    </div>

                    @if ($pagination)
                    <div class="grid">
                        <div class="grid-lg-12">
                            {!! $pagination !!}
                        </div>
                    </div>
                    @endif
                </div>

                @include('partials.sidebar-right')
            </div>
        </div>
    </section>
</div>

@endif

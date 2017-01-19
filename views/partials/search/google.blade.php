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

    @if (is_active_sidebar('content-area-top'))
        <div class="sidebar-content-area sidebar-content-area-top">
            <div class="grid">
                <?php dynamic_sidebar('content-area-top'); ?>
            </div>
        </div>
    @endif

    <section class="gutter-vertical gutter-lg clearfix">
        <div class="gid">
            <div class="grid-lg-12">
                <div class="gutter gutter-sm gutter-top">
                    <h1 class="search-result__headline"><strong>{{ $results->searchInformation->formattedTotalResults }}</strong> träffar på <strong>"{{ get_search_query() }}"</strong> inom Hoor.se</h1>
                </div>
                @if (!empty($results->spelling->correctedQuery))
                 <div class="gutter gutter-sm gutter-top">
                     <p class="did-you-mean"><?php _e('Did you mean', 'hoor'); ?>: <a class="did-you-mean__suggestion" href="/?s={{ $results->spelling->correctedQuery }}">{{ $results->spelling->correctedQuery }}</a><p>
                 </div>
                @endif
            </div>
        </div>
    </section>

@if (empty($results->items))

    <div class="container gutter gutter-lg gutter-top">
        <div class="grid gutter gutter-lg gutter-top">
            <div class="grid-lg-12">
                <div class="notice info">
                 <?php _e('Found no matching results on your search.', 'hoor'); ?>
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

            </div>
        </div>
    </section>
@endif

@if (is_active_sidebar('content-area'))
    <div class="sidebar-content-area sidebar-content-area-bottom">
        <div class="grid">
            <?php dynamic_sidebar('content-area'); ?>
        </div>
    </div>
@endif
</div>

@include('partials.sidebar-right')

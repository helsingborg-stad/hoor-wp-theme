@extends('templates.master')

@section('content')

@if (is_front_page() && is_array(get_field('search_display', 'option')) && in_array('hero', get_field('search_display', 'option')))
    {{ get_search_form() }}
@endif

<div class="search-popular">
	<div class="container">
		<div class="grid">
			<div class="grid-md-12">
				<p class="search-popular__title"><?php _e('Popular searches', 'hoor'); ?>:</p>
				<ul class="search-popular__list">
					<li class="search-popular__list-item"><a class="search-popular__list-link" href="?s=Lediga jobb">Lediga jobb</a></li>
					<li class="search-popular__list-item"><a class="search-popular__list-link" href="?s=Förskola">Förskola</a></li>
					<li class="search-popular__list-item"><a class="search-popular__list-link" href="?s=Äldreomsorg">Äldreomsorg</a></li>
					<li class="search-popular__list-item"><a class="search-popular__list-link" href="?s=Gymnasievalet">Gymnasievalet</a></li>
					<li class="search-popular__list-item"><a class="search-popular__list-link" href="?s=Badplatser">Badplatser</a></li>
				</ul>
			</div>
		</div>
	</div>
</div>

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

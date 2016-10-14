<ul class="c-share__list hidden-print clearfix" aria-labelledby="social-share">
    <li class="c-share__list-item">
        <a class="c-share__link c-share__link--facebook" data-action="share-popup" href="https://www.facebook.com/sharer/sharer.php?u={{ rawurlencode(get_the_permalink()) }}" data-tooltip="{{ __('Share on', 'municipio') }} Facebook">@include('partials.icon', ['name' => 'facebook']) <span class="visually-hidden">
            {{ __('Share on', 'municipio') }} </span>Facebook
        </a>
    </li>
    <li class="c-share__list-item">
        <a class="c-share__link c-share__link--twitter" data-action="share-popup" href="http://twitter.com/share?url={{ rawurlencode(get_the_permalink()) }}" data-tooltip="{{ __('Share on', 'municipio') }} Twitter">@include('partials.icon', ['name' => 'twitter']) <span class="visually-hidden">{{ __('Share on', 'municipio') }} </span>Twitter
        </a>
    </li>
    <li class="c-share__list-item">
        <a class="c-share__link c-share__link--linkedin" data-action="share-popup" href="https://www.linkedin.com/shareArticle?mini=true&amp;url={{ rawurlencode(get_the_permalink()) }}&amp;title={{ rawurlencode(get_the_title()) }}&amp;summary={{ get_the_excerpt() }}&amp;source={{ rawurlencode(get_bloginfo('site_name')) }}" data-tooltip="{{ __('Share on', 'municipio') }} Linkedin">@include('partials.icon', ['name' => 'linkedin'])<span class="visually-hidden">{{ __('Share on', 'municipio') }} </span>Linkedin
        </a>
    </li>
    <li class="c-share__list-item">
        <a class="c-share__link c-share__link--mail" href="mailto:?&amp;subject={{ rawurlencode(get_the_title() . ' — ' .  get_bloginfo('site_name')) }}&amp;body={{ rawurlencode(get_the_permalink()) }}" data-tooltip="{{ __('Send page via e-mail', 'hoor') }}">@include('partials.icon', ['name' => 'email']){{ __('Email page', 'hoor') }}
        </a>
    </li>
    <li class="c-share__list-item c-share__list--print">
        <a class="c-share__link c-share__link--print" href="#" onclick="window.print();return false; data-tooltip="{{ __('Print this page', 'hoor') }}">@include('partials.icon', ['name' => 'print']){{ __('Print page', 'hoor') }}
        </a>
    </li>
</ul>

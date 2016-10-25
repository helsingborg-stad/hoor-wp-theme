<?php

namespace Hoor\Theme;

class Oembed
{
    public function __construct()
    {
        // Wrap embeds in an div to be able to make videos responsive
        add_filter('embed_oembed_html', array($this, 'siteEmbedOembedHtml'), 99, 4);
    }
    public function siteEmbedOembedHtml($html, $url, $attr, $post_id)
    {
        return '<div class="o-embed-container">' . $html . '</div>';
    }
}

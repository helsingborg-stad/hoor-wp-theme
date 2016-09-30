<?php

namespace Hoor\Admin\UI;

class Translations
{
    // Note! These do not cover plural forms.
    protected $translations = array(
        'Inlägg' => 'Nyheter',
        'Alla inlägg' => 'Alla nyheter',
        'Skapa nytt inlägg' => 'Skapa ny nyhet',
        'Inläggsnamn' => 'Nyhetsnamn',
        'Inlägg på startsidan' => 'Nyheter på startsidan',
        'Inläggssida: %s' => 'Nyhetssida: %s',
        'Inlägg sparat.' => 'Nyheter sparat.',
        'Inlägg uppdaterat.' => 'Nyheter uppdaterat.',
        'Inlägg publicerat.' => 'Nyheter publicerat.',
        'Inläggssida' => 'Nyhetssida',
        'Inläggstitel' => 'Nyhetstitel',
        'Skapa ett blogginlägg' => 'Skapa en nyhet',
        'inlägg' => 'nyheter',
        'Visa inlägg' => 'Visa nyheter',


    );

    public function __construct()
    {
        add_filter( 'gettext', array($this, 'filter_gettext'), 10, 3 );
        add_filter( 'gettext_with_context', array($this, 'filter_gettext_with_context'), 10, 4 );
    }

    public function filter_gettext($translated, $original, $domain)
    {
        // Use the text string exactly as it is in the translation file
        if (isset($this->translations[$translated])) {
            $translated = $this->translations[$translated];
        }

        return $translated;
    }

    public function filter_gettext_with_context($translated, $original, $context, $domain) {
        if (isset($this->translations[$translated])) {
            $translated = $this->translations[$translated];
        }

        return $translated;
    }
}



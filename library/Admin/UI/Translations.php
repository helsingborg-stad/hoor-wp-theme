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
        //'Inlägg sparat.' => 'Nyheter sparat.', // Used for all post types apperently
        //'Inlägg uppdaterat.' => 'Nyhet uppdaterat.', // Used for all post types apperently
        //'Inlägg publicerat.' => 'Nyhet publicerat.', // Used for all post types apperently
        'Inläggssida' => 'Nyhetssida',
        'Inläggstitel' => 'Nyhetstitel',
        'Skapa ett blogginlägg' => 'Skapa en nyhet',
        'inlägg' => 'nyheter',
        //'Visa inlägg' => 'Visa nyheter', // Used for all post types apperently
        'Författare' => 'Redaktör',


    );

    public function __construct()
    {
        // Performance optimisation: only apply these filter on admin pages since
        // applying by just this filter it seems to add around 60 ms to every call
        // (very rudimentary tests, but still)
        if (is_admin()) {
            add_filter( 'gettext', array($this, 'filter_gettext'), 10, 3 );
            add_filter( 'gettext_with_context', array($this, 'filter_gettext_with_context'), 10, 4 );
        }
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



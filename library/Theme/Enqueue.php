<?php

namespace Hoor\Theme;

class Enqueue
{
    protected $revManifest;

    public function __construct()
    {
        // Enqueue scripts and styles
        add_action('wp_enqueue_scripts', array($this, 'style'));
        add_action('wp_enqueue_scripts', array($this, 'script'), 900);

        add_action('wp_print_styles', array($this, 'dequeueUnnecessaryStyles'));
    }

    /**
     * Enqueue styles
     * @return void
     */
    public function style()
    {
        wp_enqueue_style('hoor-css', get_stylesheet_directory_uri(). '/assets/dist/' . \Hoor\Helper\CacheBust::name('css/main.min.css'), '', null);
    }

    /**
     * Enqueue scripts
     * @return void
    */
    public function script()
    {
        // Remove default hbg-prime scripts added by Municipio
        wp_deregister_script( 'hbg-prime' );

        // Remove Municipio scripts.
        wp_deregister_script( 'municipio' );


        wp_register_script('hoor-js', get_stylesheet_directory_uri() . '/assets/dist/' . \Hoor\Helper\CacheBust::name('js/app.min.js'), '', null, true);

        // Localization for the hbg-prime scrippt (bundled in app.min.js above).
        // See wp-content/themes/municipio/library/Theme/Enqueue.php
        wp_localize_script('hoor-js', 'HbgPrimeArgs', array(
            'cookieConsent' => array(
                'show'      => get_field('cookie_consent_active', 'option'),
                'message'   => get_field('cookie_consent_message', 'option'),
                'button'    => get_field('cookie_consent_button', 'option'),
                'placement' => get_field('cookie_consent_placement', 'option')
            ),
            'googleTranslate' => array(
                'gaTrack' => get_field('google_translate_ga_track', 'option'),
                'gaUA'    => get_field('google_analytics_ua', 'option')
            )
        ));

        wp_enqueue_script('hoor-js');
    }

    public function dequeueUnnecessaryStyles() {
            wp_dequeue_style( 'hbg-prime' );
            wp_deregister_style( 'hbg-prime' );

            wp_dequeue_style( 'municipio' );
            wp_deregister_style( 'municipio' );

    }
}

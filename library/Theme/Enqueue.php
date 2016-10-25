<?php

namespace Hoor\Theme;

class Enqueue
{
    public function __construct()
    {
        // Enqueue scripts and styles
        add_action('wp_enqueue_scripts', array($this, 'style'));
        add_action('wp_enqueue_scripts', array($this, 'script'),900);

        // Admin style
        add_action('admin_enqueue_scripts', array($this, 'adminStyle'), 1000);

        add_action('wp_print_styles', array($this, 'dequeueUnnecessaryStyles'));
    }

    /**
     * Enqueue styles
     * @return void
     */
    public function style()
    {
        wp_enqueue_style('hoor-css', get_stylesheet_directory_uri(). '/assets/dist/css/main.min.css', '', filemtime(get_stylesheet_directory() . '/assets/dist/css/main.min.css'));
    }

    /**
     * Enqueue admin style
     * @return void
     */
    public function adminStyle()
    {
        wp_dequeue_style('helsingborg-se-admin');
    }

    /**
     * Enqueue scripts
     * @return void
    */
    public function script()
    {
        // Remove default hbg-prime scripts added by Municipio
        wp_dequeue_script( 'hbg-prime' );

        // Remove Municipio scripts.
        wp_dequeue_script( 'municipio' );

        wp_register_script('hoor-js', get_stylesheet_directory_uri(). '/assets/dist/js/app.min.js', '', filemtime(get_stylesheet_directory() . '/assets/dist/js/app.min.js'), true);

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

<?php

namespace Hoor\Admin\UI;

class Editor
{
    public function __construct()
    {
        // Disable Municipio Editor styles.
        add_filter('Municipio/admin/editor_stylesheet', array($this, 'disableMunicipioEditorStylesheeet'));
        // Register editor stylesheet for the theme.
        add_action( 'admin_init', array($this, 'addEditorStyles'));

        // Override Municipio style formats. This breaks the Content editor settings...
        add_filter( 'tiny_mce_before_init', array($this, 'styleFormats'), 999);

        // Remove unused buttons from TinyMCE toolbar
        add_filter('mce_buttons', array($this, 'tinymceButtons'));
        add_filter('mce_buttons_2', array($this, 'tinymceSecondButtons'));

        add_filter('tiny_mce_before_init', array($this, 'tinymceElements'));
    }

    public function disableMunicipioEditorStylesheeet() {
        return '';
    }

    public function addEditorStyles() {
            add_editor_style('assets/dist/' . \Hoor\Helper\CacheBust::name('css/editor-style.css'));
    }

    public function styleFormats($settings) {
        $style_formats = array(
            array(
                'title' => 'Pull quote',
                'selector' => 'blockquote',
                'classes' => 'o-pull-quote'
            ),
        );

        $settings['style_formats'] = json_encode( $style_formats );

        return $settings;
    }

    public function tinymceButtons($buttons) {
        $remove = array('alignleft', 'aligncenter', 'alignright');
        return array_diff($buttons,$remove);
    }

    public function tinymceSecondButtons($buttons) {
        $remove = array('underline', 'alignjustify', 'forecolor', 'indent', 'outdent');
        return array_diff($buttons,$remove);
    }

    public function tinymceElements($arr){
        $arr['block_formats'] = 'Paragraph=p;Heading 2=h2;Heading 3=h3;';
        return $arr;
    }

}

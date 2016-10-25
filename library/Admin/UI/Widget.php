<?php

namespace Hoor\Admin\UI;

class Widget
{
    public function __construct()
    {
        // Unregister stale and unused WordPress widgets
        add_action( 'widgets_init', array($this, 'unregisterWidgets'));
    }

    public function unregisterWidgets() {
        unregister_widget('WP_Widget_Tag_Cloud');
        unregister_widget('WP_Widget_Meta');
        unregister_widget('WP_Widget_Categories');
        unregister_widget('WP_Widget_Recent_Posts');
        unregister_widget('WP_Widget_Recent_Comments');
        unregister_widget('WP_Widget_Search');
        unregister_widget('WP_Widget_Calendar');
        unregister_widget('WP_Widget_Archives');
        unregister_widget('WP_Widget_Links');
        unregister_widget('WP_Widget_Text');

        //unregister_widget('WP_Widget_Pages');
        //unregister_widget('WP_Nav_Menu_Widget');
        //unregister_widget('WP_Widget_RSS');
    }
}



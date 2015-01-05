<?php
/*
Plugin Name: OfficeHour Widget
Plugin URI: http://www.officehour.fr
Description: Widget OfficeHour pour intégrer le profil d'un expert OfficeHour sur votre blog WordPress
Version: 0.1
Author: OfficeHour
Author URI: http://www.officehour.fr
License: GPL2
*/

class OfficeHour_Widget extends WP_Widget
{
    public function __construct()
    {
        parent::__construct('officehour_widget', 'OfficeHour', array('description' => 'Widget OfficeHour'));
    }
    
    public function widget($args, $instance)
    {
        echo 'widget OfficeHour';
    }
}

add_action('widgets_init', function(){register_widget('OfficeHour_Widget');});
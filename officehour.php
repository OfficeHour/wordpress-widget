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
        parent::__construct('officehour_widget', 'OfficeHour', array('description' => 'Widget OfficeHour','classname' => 'officehour-widget'));
    }
    
    public function widget($args, $d)
    {
        extract($args);

        echo $before_widget;

	if(isset($d['title']) && !empty($d['title'])) {
        	echo $before_title.$d['title'].$after_title;
	}

        echo $after_widget;
    }

    public function form($d)
    {
	// default values
        $default = array(
			'title' => 'test' 
		);

	$d = wp_parse_args($d, $default);

        ?>
        <p>
		<label for='<?php echo $this->get_field_id('title'); ?>'>Titre (facultatif) : </label>
		<input value='<?php echo $d['title']; ?>'  name='<?php echo $this->get_field_name('title'); ?>' id='<?php echo $this->get_field_id('title'); ?>' type='text'/>
	</p>
        <?php
    }

    public function update($new, $old)
    {
         return $new;
    }
}


add_action('widgets_init', function(){register_widget('OfficeHour_Widget');});

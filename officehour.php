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

        if(isset($d['slug']) && !empty($d['slug'])) {
        ?>
        <a id='officehour_widget' data-slug='<?php echo $d['slug']; ?>' href='http://www.officehour.fr/<?php echo $d['slug']; ?>' >
            <?php if( empty($d['name']) ) { ?>
                OfficeHour
            <?php } else { ?>
                <?php echo $d['name']; ?> sur OfficeHour
            <?php } ?>
        </a>
        <script src='http://www.officehour.fr/widget/script.js/expert' type='text/javascript'></script>
        <?php
        }
        
        echo $after_widget;
    }

    public function form($d)
    {
	// default values
        $default = array(
			'title' => 'OfficeHour',
                        'slug' => '',
                        'name' => ''
		);

	$d = wp_parse_args($d, $default);

        ?>
        <p>
		<label for='<?php echo $this->get_field_id('title'); ?>'>Titre du Widget (facultatif)</label>
		<input value='<?php echo $d['title']; ?>'  name='<?php echo $this->get_field_name('title'); ?>' id='<?php echo $this->get_field_id('title'); ?>' type='text'/>
	</p>
        <p>
		<label for='<?php echo $this->get_field_id('name'); ?>'>Nom (facultatif)</label>
                <input value='<?php echo $d['name']; ?>' placeholder='ex. Guillaume Warckol' name='<?php echo $this->get_field_name('name'); ?>' id='<?php echo $this->get_field_id('name'); ?>' type='text'/>
	</p>
        <p>
            <label for='<?php echo $this->get_field_id('slug'); ?>'>Nom d'utilisateur OfficeHour (Aide : <a href='http://www.officehour.fr/expert/profile/description'>Mon Compte</a>)</label>
                http://www.officehour.fr/<input value='<?php echo $d['slug']; ?>' placeholder='guillaume-warckol' name='<?php echo $this->get_field_name('slug'); ?>' id='<?php echo $this->get_field_id('slug'); ?>' type='text'/>
	</p>
        <?php
    }

    public function update($new, $old)
    {
         return $new;
    }
}


add_action('widgets_init', function(){register_widget('OfficeHour_Widget');});

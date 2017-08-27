<?php
/*
 * This is Brand Logo Carousel widget
 */

// don't load directly
if(!defined('ABSPATH')) die('-1');

// registered brand logos carousel widget
if(! function_exists('achau_social_media_widget'))
{
	function achau_social_media_widget() {
		register_widget('Vina_SocialMedia_Widget');
	}
}
add_action('widgets_init', 'achau_social_media_widget');

// Vina Product Carousel Widget Class
if(! class_exists('Vina_SocialMedia_Widget')) 
{
	class Vina_SocialMedia_Widget extends WP_Widget 
	{

		public function __construct() 
		{
			parent::__construct(
				'social_media', // Base ID
				esc_html__('Social Media', 'achau'), // Name
				array('description' => esc_html__('A widget that displays Social Media Profiles', 'achau'),) // Args
			);
		}

		public function widget($args, $instance) 
		{
			$title = apply_filters('widget_title', $instance['title']);

			echo ($args['before_widget']);
			
			if(! empty($title))
				echo ($args['before_title']) . esc_html($title) . $args['after_title'];
			
			$achau_options = get_option("achau_options");
			
			$facebook = $pinterest = $linkedin = $twitter = $googleplus = $rss = $tumblr = $instagram = $youtube = $vimeo = $behance = $dribble = $flickr = $git = $skype = $weibo = $foursquare = $soundcloud = $vk = "";
			
			if(isset($achau_options['facebook_link'])) 		$facebook 	= esc_url($achau_options['facebook_link']);
			if(isset($achau_options['twitter_link'])) 		$twitter 	= esc_url($achau_options['twitter_link']);
			if(isset($achau_options['googleplus_link'])) 	$googleplus = esc_url($achau_options['googleplus_link']);
			if(isset($achau_options['instagram_link'])) 	$instagram 	= esc_url($achau_options['instagram_link']);
			if(isset($achau_options['youtube_link']))		$youtube 	= esc_url($achau_options['youtube_link']);
			if(isset($achau_options['skype_link'])) 		$skype 		= esc_url($achau_options['skype_link']);
			
			if(!empty($facebook)) 	echo('<a href="' . esc_url($facebook) . '" target="_blank" class="widget_connect_facebook">Facebook</a>');
			if(!empty($twitter)) 	echo('<a href="' . esc_url($twitter) . '" target="_blank" class="widget_connect_twitter">Twitter</a>');
			if(!empty($googleplus)) echo('<a href="' . esc_url($googleplus) . '" target="_blank" class="widget_connect_googleplus">Google+</a>');
			if(!empty($instagram)) 	echo('<a href="' . esc_url($instagram) . '" target="_blank" class="widget_connect_instagram">Instagram</a>');
			if(!empty($youtube)) 	echo('<a href="' . esc_url($youtube) . '" target="_blank" class="widget_connect_youtube">Youtube</a>');
			if(!empty($skype)) 		echo('<a href="' . esc_url($skype) . '" target="_blank" class="widget_connect_skype">Skype</a>');
			
			echo ($args['after_widget']);
		}

		public function form($instance) 
		{
			$title = !empty($instance['title']) ? $instance['title'] : esc_html__('Get Connected', 'achau');
			?>
			
			<p><em><?php esc_html_e('You can manager Social Media link in A Chau >> Social Media.', 'achau'); ?></em></p>
			<p>
				<label for="<?php echo esc_attr($this->get_field_id('title')); ?>"><?php _e('Title:', 'achau'); ?></label> 
				<input class="widefat" id="<?php echo esc_attr($this->get_field_id('title')); ?>" name="<?php echo esc_attr($this->get_field_name('title')); ?>" type="text" value="<?php echo esc_attr($title); ?>">
			</p>
			
			<?php 
		}

		public function update($new_instance, $old_instance) 
		{
			$instance = array();
			
			$instance['title'] = (! empty($new_instance['title'])) ? strip_tags($new_instance['title']) : '';

			return $instance;
		}
	}
}
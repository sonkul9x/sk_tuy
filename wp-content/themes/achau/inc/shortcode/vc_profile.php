<?php 
if(!class_exists('profile_company')){
    class profile_company{
        public function __construct()
        {
            add_shortcode('add_timeline', array($this, 'shortcode_add_timeline'));
            add_action('vc_before_init', array($this, 'add_timeline_integrate_vc'));
        }

        public function html_add_timeline($image, $year, $heading, $desc){
			$text = '';
			
			$text .= '<div class="item-timeline">';
				$text .= '<div class="item-timeline-i">';
					$text .= '<div class="image">';
						$text .= '<img src="'.$image.'"/>';
					$text .= '</div>';
					$text .= '<div class="info">';
						$text .= '<h4 class="text-heading">'.$heading.'</h4>';
						$text .= '<div class="desc">'.$desc.'</div>';
					$text .= '</div>';
					$text .= '<div class="year">'.$year.'</div>';
				$text .='</div>';
			$text .='</div>';
			
			return $text;
		}
        public function shortcode_add_timeline($atts){
			$img = $imageSRC = '';
			$atts = shortcode_atts(array(
                'image' => '',
                'year' => '',
                'text' => '',
				'desc' => '',
            ), $atts);
			$img = wp_get_attachment_image_src($atts['image'], 'full');
			$imageSRC = $img[0];
			
			$content = $this->html_add_timeline($imageSRC , $atts['year'], $atts['text'], $atts['desc']); 
			
            return $content;
        }

        public function add_timeline_integrate_vc()
        {
            vc_map( array(
                'name' => __('Timeline', 'achau'),
                'base' => 'add_timeline',
                "category" 		=> __('QSOFT', 'achau'),
                'icon' => 'dgt-add_timeline',
                "params" => array(
                    array(
                        'type' => 'attach_image',
                        'heading' => __( 'Choose Avatar', 'achau' ),
                        'param_name' => 'image',
                    ),
					array(
                        'type' => 'textfield',
                        'heading' => __( 'Enter Year', 'achau' ),
                        'param_name' => 'year',
						'admin_label' => true, 
                    ),
					array(
                        'type' => 'textfield',
                        'heading' => __( 'Enter Heading', 'achau' ),
                        'param_name' => 'text',
						'admin_label' => true, 
                    ),
					array(
                        'type' => 'textarea_html',
                        'heading' => __( 'Enter Description', 'achau' ),
                        'param_name' => 'desc',
                    ),
                )
            ) );
        }
    }
    new profile_company();
}
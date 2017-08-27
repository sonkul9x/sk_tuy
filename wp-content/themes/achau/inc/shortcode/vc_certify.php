<?php 
if(!class_exists('certify_company')){
    class certify_company{
        public function __construct()
        {
            add_shortcode('add_certify', array($this, 'shortcode_add_certify'));
            add_action('vc_before_init', array($this, 'add_certify_integrate_vc'));
        }

        public function html_add_certify($image, $desc, $class){
			$text = '';
			
			$text .= '<div class="certify '.$class.'">';
				$text .= '<div class="certify-i">';
					$text .= '<div class="image">';
						$text .= '<img src="'.$image.'"/>';
					$text .= '</div>';
					$text .= '<div class="certify-info">'.$desc.'</div>';
				$text .='</div>';
			$text .='</div>';
			
			return $text;
		}
        public function shortcode_add_certify($atts){
			$img = $imageSRC = '';
			$atts = shortcode_atts(array(
                'image' => '',
				'desc' => '',
				'el_class' => '',
            ), $atts);
			$img = wp_get_attachment_image_src($atts['image'], 'full');
			$imageSRC = $img[0];
			
			$content = $this->html_add_certify($imageSRC , $atts['desc'], $atts['el_class']); 
			
            return $content;
        }

        public function add_certify_integrate_vc()
        {
            vc_map( array(
                'name' => __('Add certify', 'achau'),
                'base' => 'add_certify',
                "category" 		=> __('QSOFT', 'achau'),
                'icon' => 'dgt-add_certify',
				 "class" => "",
                "params" => array(
                    array(
                        'type' => 'attach_image',
                        'heading' => __( 'Choose Avatar', 'achau' ),
                        'param_name' => 'image',
						'admin_label' => true, 
                    ),
					array(
                        'type' => 'textarea_html',
                        'heading' => __( 'Enter Description', 'achau' ),
                        'param_name' => 'desc',
						'admin_label' => true, 
                    ),
					array(
                        'type' => 'textfield',
                        'heading' => __( 'Element Class', 'achau' ),
                        'param_name' => 'el_class',
						'admin_label' => true, 
                    ),
                )
            ) );
        }
    }
    new certify_company();
}
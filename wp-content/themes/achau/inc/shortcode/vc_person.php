<?php 
if(!class_exists('leader_company')){
    class leader_company{
        public function __construct()
        {
            add_shortcode('add_person', array($this, 'shortcode_add_person'));
            add_action('vc_before_init', array($this, 'add_person_integrate_vc'));
        }

        public function html_add_person($image, $subname, $name, $position, $desc){
			$text = '';
			
			$text .= '<div class="person">';
				$text .= '<div class="image">';
					$text .= '<img src="'.$image.'"/>';
				$text .= '</div>';
				$text .= '<div class="person-info">';
					$text .= '<div class="subname">'.$subname.'</div>';
					$text .= '<h4 class="name">'.$name.'</h4>';
					$text .= '<div class="position">'.$position.'</div>';
					$text .= '<div class="desc">'.$desc.'</div>';
				$text .= '</div>';
			$text .='</div>';
			
			return $text;
		}
        public function shortcode_add_person($atts){
			$img = $imageSRC = '';
			$atts = shortcode_atts(array(
                'image' => '',
                'subname' => '',
                'name' => '',
                'position' => '',
				'desc' => '',
            ), $atts);
			$img = wp_get_attachment_image_src($atts['image'], 'full');
			$imageSRC = $img[0];
			
			$content = $this->html_add_person($imageSRC , $atts['subname'], $atts['name'], $atts['position'], $atts['desc']); 
			
            return $content;
        }

        public function add_person_integrate_vc()
        {
            vc_map( array(
                'name' => __('Add Person', 'achau'),
                'base' => 'add_person',
                "category" 		=> __('QSOFT', 'achau'),
                'icon' => 'dgt-add_person',
                "params" => array(
                    array(
                        'type' => 'attach_image',
                        'heading' => __( 'Choose Avatar', 'achau' ),
                        'param_name' => 'image',
                    ),
					array(
                        'type' => 'textfield',
                        'heading' => __( 'Enter Subname', 'achau' ),
                        'param_name' => 'subname',
                    ),
					array(
                        'type' => 'textfield',
                        'heading' => __( 'Enter Name', 'achau' ),
                        'param_name' => 'name',
						'admin_label' => true, 
                    ),
					array(
                        'type' => 'textfield',
                        'heading' => __( 'Enter Position', 'achau' ),
                        'param_name' => 'position',
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
    new leader_company();
}
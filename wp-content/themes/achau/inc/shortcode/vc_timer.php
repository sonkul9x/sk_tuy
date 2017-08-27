<?php 
if(!class_exists('count_to_number')){
    class count_to_number{
        public function __construct()
        {
            add_shortcode('add_number', array($this, 'shortcode_add_number'));
            add_action('vc_before_init', array($this, 'add_number_integrate_vc'));
        }

        public function shortcode_add_number($atts){
			$atts = shortcode_atts(array(
                'to' => '',
				'text' => '',
				'class' => '',
                'speed' => '',
            ), $atts);
			
			$timer = '<div class="countTo"><b class="timer '.$atts['class'].'" data-to="'.$atts['to'].'" data-speed="10000"></b> <span class="text">'.$atts['text'].'</span></div>';
            
            return $timer;
        }

        public function add_number_integrate_vc()
        {
            vc_map( array(
                'name' => __('Add Number', 'achau'),
                'base' => 'add_number',
                "category" 		=> __('QSOFT', 'achau'),
                'icon' => 'dgt-add_number',
                "params" => array(
                    array(
                        'type' => 'textfield',
                        'heading' => __( 'Enter Number', 'achau' ),
                        'param_name' => 'to',
                    ),
					array(
                        'type' => 'textfield',
                        'heading' => __( 'Enter Text', 'achau' ),
                        'param_name' => 'text',
                    ),
					array(
                        'type' => 'dropdown',
                        'heading' => __( 'Choose Add Plus Icon', 'achau' ),
                        'param_name' => 'class',
						'admin_label' => true, 
						'value'       => array(
							__('No Plus', 'achau' ) => 'no',
							__('Plus Icon', 'achau' )  =>  'plus' ,
						),
						'std'  => 'No Plus',
                    )
                )
            ) );
        }
    }
    new count_to_number();
}
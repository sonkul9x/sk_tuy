<?php
/**
 * Main class
 *
 * @author Yithemes
 * @package YITH WooCommerce Recently Viewed Products
 * @version 1.0.0
 */


if ( ! defined( 'YITH_WRVP' ) ) {
	exit;
} // Exit if accessed directly

if ( ! class_exists( 'YITH_WRVP' ) ) {
	/**
	 * YITH WooCommerce Recently Viewed Products
	 *
	 * @since 1.0.0
	 */
	class YITH_WRVP {

		/**
		 * Single instance of the class
		 *
		 * @var \YITH_WRVP
		 * @since 1.0.0
		 */
		protected static $instance;

		/**
		 * Plugin version
		 *
		 * @var string
		 * @since 1.0.0
		 */
		public $version = YITH_WRVP_VERSION;

		/**
		 * Returns single instance of the class
		 *
		 * @return \YITH_WRVP
		 * @since 1.0.0
		 */
		public static function get_instance(){
			if( is_null( self::$instance ) ){
				self::$instance = new self();
			}

			return self::$instance;
		}

		/**
		 * Constructor
		 *
		 * @return mixed YITH_WRVP_Admin | YITH_WRVP_Frontend
		 * @since 1.0.0
		 */
		public function __construct() {

            // Load Plugin Framework
            add_action( 'after_setup_theme', array( $this, 'plugin_fw_loader' ), 1 );

			if ( $this->is_admin() ) {
				// Class Admin
                require_once( 'class.yith-wrvp-admin.php' );
				YITH_WRVP_Admin();
			}
			else {
			    // include classes
                require_once( 'class.yith-wrvp-frontend.php' );
				// Class frontend
				YITH_WRVP_Frontend();
			}
		}

		/**
		 * Load Plugin Framework
		 *
		 * @since  1.0
		 * @access public
		 * @return void
		 * @author Andrea Grillo <andrea.grillo@yithemes.com>
		 */
		public function plugin_fw_loader() {
            if ( ! defined( 'YIT_CORE_PLUGIN' ) ) {
                global $plugin_fw_data;
                if( ! empty( $plugin_fw_data ) ){
                    $plugin_fw_file = array_shift( $plugin_fw_data );
                    require_once( $plugin_fw_file );
                }
            }
		}

        /**
         * Check if load admin classes
         *
         * @since 1.1.0
         * @author Francesco Licandro
         * @return boolean
         */
        public function is_admin(){
            $is_admin= is_admin() && ! ( defined( 'DOING_AJAX' ) && DOING_AJAX && isset( $_REQUEST['context'] ) && $_REQUEST['context'] == 'frontend' );
            return apply_filters( 'yith_wrvp_check_is_admin', $is_admin );
        }
	}
}

/**
 * Unique access to instance of YITH_WRVP class
 *
 * @return \YITH_WRVP
 * @since 1.0.0
 */
function YITH_WRVP(){
	return YITH_WRVP::get_instance();
}
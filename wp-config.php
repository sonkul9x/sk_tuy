<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the
 * installation. You don't have to use the web site, you can
 * copy this file to "wp-config.php" and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * MySQL settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://codex.wordpress.org/Editing_wp-config.php
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'demo_tuy');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', '');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8mb4');

/** The Database Collate type. Don't change this if in doubt. */
define('DB_COLLATE', '');

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         'nI &ZW$ALSd .quV0B6(VU|5^VBc}DMh6^a  ^2}/;h1T<Alj5x|P2g!y qr>FQ7');
define('SECURE_AUTH_KEY',  'P9)[.PV.SJOc`9W=g~Vg9%kaa^0#=92tW2Fur5dKh]gFudR><P$u^Jqr?v :A]Wl');
define('LOGGED_IN_KEY',    'Rl;eF1J|0jec{ns<vTixb%7akBgyW!0J_w9I!W$VY WeF=Khhsmw&&yb]6$P/7U0');
define('NONCE_KEY',        'Bq0BC?)/>!8&!CyEq5#Li8}ZQ{fs;J)?0I-tg|7w,zgks+}0e,Pim^F&Q)&U}Ae ');
define('AUTH_SALT',        'Gq+Fxxk<b3L@3`v{]:%rP&HzyXEMvm)@U:nr[LfAefDyH%kyh]!Qj(pntuu&=txw');
define('SECURE_AUTH_SALT', 'wuo5+w}_R^OBe$.sn-,]V={FWGkP[LzN8fkzpG0>3Ja-c%3R{hqz.LRw;P([#$[I');
define('LOGGED_IN_SALT',   '#^4ZbF0m{Rz6=+yExIc?kk8HW=Qf<#yP6&knvK$aH6;2+!BO*.u+LIr^UZP/Iq;Y');
define('NONCE_SALT',       'T~X(ZFBT>L}hcJfJTt(G]EN7[gg=ycCT18~!!xr?oWj#a ;&pYyZn9tA,&k@Z~3`');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'ac_';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 *
 * For information on other constants that can be used for debugging,
 * visit the Codex.
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define('WP_DEBUG', true);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
?>
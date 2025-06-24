<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the installation.
 * You don't have to use the web site, you can copy this file to "wp-config.php"
 * and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * Database settings
 * * Secret keys
 * * Database table prefix
 * * Localized language
 * * ABSPATH
 *
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'local' );

/** Database username */
define( 'DB_USER', 'root' );

/** Database password */
define( 'DB_PASSWORD', 'root' );

/** Database hostname */
define( 'DB_HOST', 'localhost' );

/** Database charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8' );

/** The database collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**#@+
 * Authentication unique keys and salts.
 *
 * Change these to different unique phrases! You can generate these using
 * the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}.
 *
 * You can change these at any point in time to invalidate all existing cookies.
 * This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',          'cJLwUF{*E{-:9HovKHsQ/CYz>T%?.p9vk<|F1N#>b+QX~$-[4rF+]1voRs_jdtEE' );
define( 'SECURE_AUTH_KEY',   ' N<K}Pn,AMCtP~9N314])E9Z TJ0.;)TON]CNYgf7 O<nMI!m6AVJ4u~%apgI8*?' );
define( 'LOGGED_IN_KEY',     'a}SI?%m}7?VVl`I2)L,?m*sEr^q!6sgyFRS4tBRnK_;!U%b?,@_(g?uVc^cqy6p8' );
define( 'NONCE_KEY',         'N,!V:Ukhq|s%SgW^@c6huI,3NCqNA|6>DGmLm_B*h(k3%~H5C.U$+;F||ML)cTIl' );
define( 'AUTH_SALT',         ' BU;!-fK{I`Gyez-/?nUTdbHR:;[78h9<6J80_vk$w9#NN-?a#E}5Ds3 [p.Jf/l' );
define( 'SECURE_AUTH_SALT',  'Zp92%=t$HiTK3{-IYu_&J7Jf*-x&Era5mZH*LC(%iX$rFh;J_h]n0}h&BS#5k)Jb' );
define( 'LOGGED_IN_SALT',    'wlAwY|[wlxk*3Gc`1@LNh=49%2`!I$w))m)0U]2Yx]^=!8Ad}(yu:%iQQq}=_2zp' );
define( 'NONCE_SALT',        'el 1.yb!U;}.UvIzHX)5jU|H^8>)XGVa<h|y/8hF)g^k?LV4iY%b_<{LA(0=Dvy0' );
define( 'WP_CACHE_KEY_SALT', '(l_VoNy)>2VE5)/U7}}U@aXjC|-a_glro3SR|FnsY&S<}O#VI^yg&Zsf&qHB~]F6' );


/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_';


/* Add any custom values between this line and the "stop editing" line. */



/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 *
 * For information on other constants that can be used for debugging,
 * visit the documentation.
 *
 * @link https://wordpress.org/support/article/debugging-in-wordpress/
 */
if ( ! defined( 'WP_DEBUG' ) ) {
	define( 'WP_DEBUG', false );
}

define( 'WP_ENVIRONMENT_TYPE', 'local' );
/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';

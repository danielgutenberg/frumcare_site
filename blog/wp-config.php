<?php
/**
 * The base configurations of the WordPress.
 *
 * This file has the following configurations: MySQL settings, Table Prefix,
 * Secret Keys, WordPress Language, and ABSPATH. You can find more information
 * by visiting {@link http://codex.wordpress.org/Editing_wp-config.php Editing
 * wp-config.php} Codex page. You can get the MySQL settings from your web host.
 *
 * This file is used by the wp-config.php creation script during the
 * installation. You don't have to use the web site, you can just copy this file
 * to "wp-config.php" and fill in the values.
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'frumcare_db_blogfrumcare');

/** MySQL database username */
define('DB_USER', 'frumcare_ufrumc');

/** MySQL database password */
define('DB_PASSWORD', 'Q^[M!2&NqwEM');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8');

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
define('AUTH_KEY',         'yfF`}{!+sg@1-7a6|&dez|0b&E-Yq.-`c[+o)2f?(k1|Z=Q9^>9gWb 8/P!|:;L<');
define('SECURE_AUTH_KEY',  '.q?^YF^rU7+?,WI+4.Xa[zvo|P=guIo&!E*;u!*&0,B|+`S`m9r0I[vp[*Lf9I?!');
define('LOGGED_IN_KEY',    'YNp[J)B|r?>uWM%^Ru+H-TOKgP.d$V]K~;=b-O+PX!=SXTYZ!*1rL|2c0HD2-&+_');
define('NONCE_KEY',        'i%Kb^fsvDQCLQ1o0N8PwuRx)?a+Kpj jnM0r|n.g2u}~c0T9T9sVqz4{}{iEKQwU');
define('AUTH_SALT',        '2=6UE@@V&]R?l`0p)f0e,-Hj^y;r3{w.kN>=>v-#cH6K?-gx*x/(z B4UHBA-!gt');
define('SECURE_AUTH_SALT', 'a.^jk>5vlq^ms8=wD$(#9+]|Bw3x:bK|Vs0.zq}m2;cooX:g{,,g;]<OGSCT$Z]$');
define('LOGGED_IN_SALT',   'cuHLek|Z;<<+F^>0Q,gg2Wt>~1WfOz,~pe%wx3dbW-.2}ouJ$|j5x{Bu5P_lz#@t');
define('NONCE_SALT',       'Wv-Ek<q5b`9A4&nxPs+nYe%u%$?7eX-g3o;,2OrXc!B7d9zQABT^cL gWR|lAQhE');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'lajdf1lj_';

/**
 * WordPress Localized Language, defaults to English.
 *
 * Change this to localize WordPress. A corresponding MO file for the chosen
 * language must be installed to wp-content/languages. For example, install
 * de_DE.mo to wp-content/languages and set WPLANG to 'de_DE' to enable German
 * language support.
 */
define('WPLANG', '');

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 */
define('WP_DEBUG', false);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
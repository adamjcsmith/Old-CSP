<?php
/**
 * The base configurations of the WordPress.
 *
 * This file has the following configurations: MySQL settings, Table Prefix,
 * Secret Keys, and ABSPATH. You can find more information by visiting
 * {@link http://codex.wordpress.org/Editing_wp-config.php Editing wp-config.php}
 * Codex page. You can get the MySQL settings from your web host.
 *
 * This file is used by the wp-config.php creation script during the
 * installation. You don't have to use the web site, you can just copy this file
 * to "wp-config.php" and fill in the values.
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'cspprofe_wpshowcase');

/** MySQL database username */
define('DB_USER', 'cspprofe_csp');

/** MySQL database password */
define('DB_PASSWORD', 'adamlancaster2013');

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
define('AUTH_KEY',         'j(X4$vkG6isNi;>h1O#xK`ZcwChNH#<#WA5tK{X1)+<q5=IEzT)4N;o=bh[fHhl>');
define('SECURE_AUTH_KEY',  '}Ue~F|g|@(sp8? mA(|Y+T9c&|P=xcWT,h|mcYpNeb8b^6z+%R?3^!!=s3t8|51$');
define('LOGGED_IN_KEY',    '9O4wIa2x~3`26lrY1bKn6!JQHwk6(ZlNk+eHsa8&%xHe+>x+7rX-U]0{eZ|[+~y|');
define('NONCE_KEY',        'vPc2!46w.W$<{(<3-42KTAQiMUN|k$_]m]?.(L {QjY-s1eGf@ty}T+HY[SE.c`5');
define('AUTH_SALT',        '?-F6Y@K#C 9s3ZJ1x+t=5n:rX@+Io9qk:32`JJ&5$+`Pdm ap|/FT2*eKH++9SUj');
define('SECURE_AUTH_SALT', '(.PsqW88s9as5H$98O)^-+SR)#1)vD=.ngH!u+V`pR!Y%s1/*_XkC?bt8oCKj6aH');
define('LOGGED_IN_SALT',   'T;B7{mu.+Wwgy[%+F)qOE,m[5Obq31!ro73[WZ/Hsk|` nVb-*a9]G]?x>2SHY;)');
define('NONCE_SALT',       '2`Rp, @%`O4S8?Uowj|}$5{,!,pZ^g4R?%RL)^Sr#zGWZ2-#&fqwEQZ|qXEu/Y5f');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wpshowcase_';

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

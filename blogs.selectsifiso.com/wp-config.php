<?php

// BEGIN iThemes Security - Do not modify or remove this line
// iThemes Security Config Details: 2
//define( 'FORCE_SSL_LOGIN', true ); // Force SSL for Dashboard - Security > Settings > Secure Socket Layers (SSL) > SSL for Dashboard
//define( 'FORCE_SSL_ADMIN', true ); // Force SSL for Dashboard - Security > Settings > Secure Socket Layers (SSL) > SSL for Dashboard
define( 'DISALLOW_FILE_EDIT', true ); // Disable File Editor - Security > Settings > WordPress Tweaks > File Editor
// END iThemes Security - Do not modify or remove this line

/** Enable W3 Total Cache Edge Mode */
define('W3TC_EDGE_MODE', true); // Added by W3 Total Cache


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
define('DB_NAME', 'ssifis');

/** MySQL database username */
define('DB_USER', 'ssifis');

/** MySQL database password */
define('DB_PASSWORD', 'sbAU747squ');

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
define('AUTH_KEY',         '.2AJY^IO-ai*h+NuPhu^L5O(CkX1iC]f|nOP|-|@_?S|=:kA EdK.Rqy1#+9d@#>');
define('SECURE_AUTH_KEY',  '[oJ^/AQ(y,~i])I]mMyj}PIQpums<]m*bWX - *h,Rq_zZ`M/,V[K|D0kQ&eD;=F');
define('LOGGED_IN_KEY',    'OHExHkEC1Ul[g-zd^(|n~u@)~S[aK`F+e`iL(M#I<+va7UeLB>Y?py([^6]oDs I');
define('NONCE_KEY',        '{h(9UUeNGzNa*SLgM.f2u+P?SCn)VmqKu.f#Qjo-J2-ogtvTpAiKmXJ4[WMH82^}');
define('AUTH_SALT',        'Y-3a:&_BG6QN+!:b aMlY)%KDo^?%V]BDRCwvlY2^ab3!>5!,d_T=Z|o#8nRpb&T');
define('SECURE_AUTH_SALT', 'Sg$#szD.AF0 zr~uuU#fg4t(yHyNIc<]j82C>;yvw+uVc;%xMRCThWAG}Y(y0@l`');
define('LOGGED_IN_SALT',   'I@?D5xY]i&Jl`lIj2~2`t{djM_H XT`;t9u=:*!bXhnutVD-s:TM(WVtG}t}I}(2');
define('NONCE_SALT',       'YbMR(lTEs6YMn{uG(#&1wA)2paSY|znPA0<h~MM|f.Ct+XZ5xEsU5 j)a1F;[THn');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

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

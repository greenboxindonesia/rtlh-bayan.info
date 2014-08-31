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
define('DB_NAME', 'client_db_kec_bayan_2014');

/** MySQL database username */
define('DB_USER', 'dbc_bayan');

/** MySQL database password */
define('DB_PASSWORD', '9sM7GbwVz');

/** MySQL hostname */
/**define('DB_HOST', 'db.greenbox.web.id'); */
define('DB_HOST', 'db.greenbox.web.id');

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
define('AUTH_KEY',         'yy5_Uiqg7(Ut)VX~C2QH+}yM#H{| w9?=?#nK0U:L#%j}BE6t/0f^P|yK)l@X?kW');
define('SECURE_AUTH_KEY',  'm_73!nXo5F}rHdefY +`(pofv*!M`3-VQ2K{604]Ax3C=A%5,)q{^*IS_/9.5AD&');
define('LOGGED_IN_KEY',    'h5>=[U;BI76GbFS+94r1O(L`Y{5Z,3%<?s51(0-Ur6 Lw_-8A<o{}(Qd7<e2i4X@');
define('NONCE_KEY',        '[nhu%T;xi$C:!:!<Yl2nS3#&|A*W@S0wu,Wj``<;dpE-eTp<4huPx_/[dn4Uhvy~');
define('AUTH_SALT',        ']Jhgb#2}pqI0_g,$`I|^3;9GhzlK0< *_MZC)|<NE-V/i2b%ZEz]]k&$^hJ8MOfs');
define('SECURE_AUTH_SALT', 'X!Z}n-{&g oWgZ6XaY+8RH~$t*Hp:)HrjX:}G9s^$K<_GV<3(knTGMjxsM[PQxGI');
define('LOGGED_IN_SALT',   'Nb[b/oR<)qS;aENsu4#%U:n<,C3+;yay>g[`2i&vDD.R%$U2Fd=xbM~3WX[m&]n}');
define('NONCE_SALT',       '2W;Ii5TBL3:a}-C)emvR*kPCf*sZ-Z9P}tG[D:NYs;R9^}r|$HSY).0]=TQ@;-DI');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'db_kom_';

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

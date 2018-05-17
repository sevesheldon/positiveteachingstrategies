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
// define('DB_NAME', 'seveshel_positiveteaching');
define('DB_NAME', 'ayreskat_pts');

/** MySQL database username */
// define('DB_USER', 'seveshel_bossman');
define('DB_USER', 'ayreskat_seve');

/** MySQL database password */
// define('DB_PASSWORD', 'lostboys1');
define('DB_PASSWORD', '14Teaching');

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
define('AUTH_KEY',         '$6:A_DCHl@y-yzbysrv>VoSc9$K>V>h=wVBbWf$?;!x7S\`^S77Si2=y$U^^3kbX1kL))u(');
define('SECURE_AUTH_KEY',  'ssBShCA_92X!QqY/dQ;tgrX4o7*WN>(s:wVuIG0uqV*IYXIsc6@X6fLWu:g@G@Na1zn');
define('LOGGED_IN_KEY',    '~C7mcKY-|?Bm)iAd0><)|G>a!qttH-Bq9P?xmw*Iu?@5cOPXL|JyMtn3eD(kS5njFknj<;?V:l?l');
define('NONCE_KEY',        '/-eW4oCB?<XjtkZrTp$3sHKg6M_I(E/YdxLHjoALQxOW2>v03sw$DU^_cjv4D_Ta_P|hU');
define('AUTH_SALT',        '0FC8W39@_<J$~:fclH?Cas\`yE->w7-z?2eUY*ZUy;B@2Bkv\`7/koEFl<E|xo<;zyPHeCYCxFh#');
define('SECURE_AUTH_SALT', 'QM(BLBk;IIVWDzwW>WOjxH\`WcXITv3jGh5<?:!^_p(j/eb?uObHtGfj4ZZ0m!|d6b>|q?lJtkHkhw');
define('LOGGED_IN_SALT',   '=qf0>l$4NWtV(B#k2#1pg=$bhaag7\`<IVW$I4czwU4>Q!WA=0?wQqU0^ZM*hK^\`LfKEv6');
define('NONCE_SALT',       'HE=UK\`68Xx(^v?/JYc=!~X*B:7_|~$V_raj8~~~r^S^3Jfch8RcAqZ?R4-cM(DBXCG?gWgI');

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
define('WP_DEBUG', true);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');

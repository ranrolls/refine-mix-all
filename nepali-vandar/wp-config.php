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
define('DB_NAME', 'sociacir_nepali-vandar');

/** MySQL database username */
define('DB_USER', 'sociacir_nepali');

/** MySQL database password */
define('DB_PASSWORD', 'SU#G}[[TD#BF');

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
define('AUTH_KEY',         'X^qS8IuA|JHhX}RQW9xO4h!Y53].%S J0)ZC-4;?!!-)RFI.|z 60l|V|tza{%[_');
define('SECURE_AUTH_KEY',  'oX/K+Sieb/xvt[:oW#vyZ!R}0Or(W&1-d40.8y]DdWLE&S*@rr6M,/46ni{<0*Tc');
define('LOGGED_IN_KEY',    '@E*[0dgI-|k*;?}_<}|,hdx~*T^k1N.D^ )*![zF!zvyq5W%Q-GE]V&5M(Px`4$~');
define('NONCE_KEY',        'CXss)^?NwY8Q;KqO`:{}XYNeWQ.g{.xk6kB|bT`Ktq-q+/S`9dh#]cD7i/:_=O8^');
define('AUTH_SALT',        '&W`6uCpNpzQ| i|ExkAYMmdBn]l0+.<jUw.fRJsq)wF#>sqvHe_Oy1|_84L,7}$P');
define('SECURE_AUTH_SALT', 'kBHWdnJ/J`4},AS[B.l}7i*#t|T(@Oe_o{-G5deiPRu4#$!4T>kN-Ch3,_D}840|');
define('LOGGED_IN_SALT',   'ZT|+d`EvLg(8fHLDBMEx[1` /m/%USRY^X}`e-)g)H29.va^N-Z-M^o: <^+ T?x');
define('NONCE_SALT',       'p-sXtN2TVZwTKI^f__e1%UkLn@-aZ=F!eEc=4DB1:$c%`Psj*T)SB.S{aLr=i,/i');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

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
define('WP_DEBUG', false);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');

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
define('DB_NAME', 'blogname');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', '');

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
define('AUTH_KEY',         '{-+qy|:|v-$u&Qn@~&%F`S{ E)H%l]xb7,?D`0 -QLw@vZM|J^0<(n@Ly1%y;$gZ');
define('SECURE_AUTH_KEY',  'U-%Kv<Egk<CEu*Gm4-Uy%$oWi9W)#71ex8C;OJ]Yn*%tuWS4%1eV3B<n>*6-)K3y');
define('LOGGED_IN_KEY',    '~Cc@R&bc]q!<;@sA)jSPEej*K?kG&U*WUg#3eu*6<a-Dz:];5Zx$MBC&z2Kfp.Z&');
define('NONCE_KEY',        '/6aG);3h r5z;6GE5TUQx+/zL+hCyS*XwtgvYGeUxqJj$)=1=nO5q$+L0G]@;EE|');
define('AUTH_SALT',        '{/(q0EVri+~LB&>i|)yR9(xS|$.[cyIiDn20Y:(D_0|88gB1:$`+XOF|f`+g]NB{');
define('SECURE_AUTH_SALT', 't/qcvZ$xW;Z-TB~(8NAtFj+KYU6Xg,z*geH?tL@Msap}1-M`7uPW^/[FG4?Iu<* ');
define('LOGGED_IN_SALT',   'XSG^q;HSWr>/!>0w)*-<6D-1mE,F_6n56+jF)$?gBzUHYBbd0*|q?tn-s##34Ge*');
define('NONCE_SALT',       'p|}BE<F8(Dw{ayyQEfwG(fCc$w~7&YAkPIr rOS6Wbz .Nb1wa|DC{Z|-$$<gHF]');

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

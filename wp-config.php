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
define('DB_NAME', 'wp-nufcblog');

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
define('AUTH_KEY',         'V)WP@b+tG*dSxh=-^.xSy(<I$:xBLH?Xd/nmo7(:G.u,)|OLsMn($ oSpY^/F(qv');
define('SECURE_AUTH_KEY',  'Cf{{ F(hP8I EM1Z2a]6BM<TU7MCI 5{)3ze.R5yv;3gMURn3bnmz!854;nC44<h');
define('LOGGED_IN_KEY',    'p#,by<[BIjW^eu-{A9B#4eG&KGGPL{{gh/jW&zrNC,P}q_xj(E!$,4]W7T.1}|g]');
define('NONCE_KEY',        'wY?A;g<NCOD_WFc@u#Gt|8I7g3 [7h@.1`hlvRs4C2?{l!?jL^Ii]j%wO|+}v_v/');
define('AUTH_SALT',        '1`w7^B|b]}%4t7&@Had${x`_lgEtxK4B%35Ecvfto<L5k_x(Qqd<X/*q+F#WA$`Z');
define('SECURE_AUTH_SALT', 'w};$lI-ve<Na-4+M^.+];x]ets3A|= 7q>70R6o|$ik/k1,b~e=E&}v>TU4G~~o`');
define('LOGGED_IN_SALT',   '|$Wi{2y=Pm)y46kp G)Xa$@FD}31VIzg=-0Ol[h2%}IEj-c[#Orx)FkmUxM/r!ps');
define('NONCE_SALT',       'P-J;CsEArRw@7#fl<$1D|p|3uT`!+h>B6f]+>)]$a-XMJT6^E-ZuuuPW#.SPH*?y');

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

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
define('DB_NAME', 'graphictory');

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
define('AUTH_KEY',         'g+{pqTy8U6D=a!<,:@VuuE5id01DE# /&P-aa`-X#jLv5TI#M:!!>zO$O?0:e(Y*');
define('SECURE_AUTH_KEY',  '3nBb9Z3TebkJQ9+_#H[qH~lvDYrGZTFDww!IK4WgPf)?]p_21&[s O~(U/h}n1ih');
define('LOGGED_IN_KEY',    '[(YKa^l_lIgRs-)s4t9ljRgZ+}x2:j[Svy_%<{-{,!!.E[TM>IT^tvvHTKLlbU6z');
define('NONCE_KEY',        'UP*DKtqp0|x.&+}S56N)_7T_9Q[k-,OIORY}):24&E[<1U5S+jb:xgEtY|V&Z<#5');
define('AUTH_SALT',        'Nwao@z^@]#P:MERa!v*p#W8r]UbR$DCi4buET %l$hx]*h|E /TMSlwn>@)l79-]');
define('SECURE_AUTH_SALT', 'EZEzNSk=RJf_@UsiVl5Bcfr${9qh]b2:MHJC]g5jH^T;II;6?li&Bu>)Tcu9=o8i');
define('LOGGED_IN_SALT',   '0&x$8C|DHD6wKQq9TR=|~~*/T%+$X.sa<~G?lR>Ob98EVS^H|s0bykp$}CYVAyBI');
define('NONCE_SALT',       '4=Ly<Cy:#5WB2gHS&*I&2nY}Y.jCrq)LbM:O6`m4wMuNuVI?/+*7<$ 0Z5e (W&>');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'graphictory_';

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

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
define( 'DB_NAME', 'drivingDB7ftw9');

/** MySQL database username */
define( 'DB_USER', 'drivingDB7ftw9');

/** MySQL database password */
define( 'DB_PASSWORD', 'jYN5E0mYhP');

/** MySQL hostname */
define( 'DB_HOST', '127.0.0.1');

/** Database Charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8' );

/** The Database Collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY', '*aHP*ip6D#;aiLT*<t+HP2AmuXe]2+.PXAHu+em2A.{XfIP$iqy*iq6E<;biLT*<q');
define( 'SECURE_AUTH_KEY', 'W]t-GO5hpSa#;x~KS5Dpxah;5~#SaDO+_lt9H]2emPW.]tDL;6iqTa<;x*LT6Dqxa');
define( 'LOGGED_IN_KEY', 'Z:-!NV8Gs-dk18![VdGO-_ls9G[1dlOV_[sCG:5hpSZ#:w~KW9Gt-dl19_]WeHO+_');
define( 'NONCE_KEY', 'A<XfIPAI{3fnQX,{u$MU7Erybj7^>UcFMy^jr7F>cjMU^>rzFN07jrUc>0z^N4B');
define( 'AUTH_SALT', '9]aiLS*#pxDL;6iqTa<;x*LT6Dqxai;6*<TbELy*iq6.{XfIP$.muAI{2fmPX.u*');
define( 'SECURE_AUTH_SALT', '8Jzck08![ZgJR@|owCK:4goRZ|:w@KR4CowZh:5~|RZCKw~ho9C[VdGO-_ls9G[1d');
define( 'LOGGED_IN_SALT', 'J@go4C|}cFNz!ks8G[0ckNV![szGN08ksVd[4@|RZCKw~ho5C|:ZhKR~|s9G[1dlO');
define( 'NONCE_SALT', '6<TbEMy^jq7E<fnQX,{u$IQ3BnuYf{3$,QYBIv$fn3B>UcFMz^jr7F>0cjNU,}v@');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_';

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
define( 'WP_DEBUG', false );
define('FS_METHOD', 'direct');

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', dirname( __FILE__ ) . '/' );
}

/** Sets up WordPress vars and included files. */
require_once( ABSPATH . 'wp-settings.php' );

<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the installation.
 * You don't have to use the web site, you can copy this file to "wp-config.php"
 * and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * Database settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://wordpress.org/documentation/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'webprodi' );

/** Database username */
define( 'DB_USER', 'grace_agl' );

/** Database password */
define( 'DB_PASSWORD', '28052006' );

/** Database hostname */
define( 'DB_HOST', 'localhost:3308' );

/** Database charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

/** The database collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**#@+
 * Authentication unique keys and salts.
 *
 * Change these to different unique phrases! You can generate these using
 * the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}.
 *
 * You can change these at any point in time to invalidate all existing cookies.
 * This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         'vrkzHs27#L1fUs/&6O1=n.m5J1z&Su+KDpP&Wxf*u7Ve!O5CumfgJoPB2W4OtAV$' );
define( 'SECURE_AUTH_KEY',  '??{8_Abe7.`:), j< 2G pOK2flwz0#x3bLlktP{+;6P{-)h+Z>a+e3xev%VLPge' );
define( 'LOGGED_IN_KEY',    '<Pb35$e6k#{UE|I2R[#^nHl8dL^?+k0(dop]w)=}AE6:G4/Bb#}1]>m|=T+8< 4 ' );
define( 'NONCE_KEY',        '$/F:9E?K2I+Ysw`}^oh!s(3R4q,M{x[q6jFi_EeXkqM{IJ1HV]luc.Z!1CS~L$_&' );
define( 'AUTH_SALT',        '5B,z]uuU|fC{On6Xi{{v8.in0@hR;%RA_/3]9&~!`FFSB>)#Irq: lrNYRjX0w0!' );
define( 'SECURE_AUTH_SALT', 'Pu[;C=,doMJ^;)Bsa21~$0LN{Ns%/ngmb$w7>r`AaMZXtY|fusEupL+W+$/q>_`~' );
define( 'LOGGED_IN_SALT',   '9ePwlloFR_>e6McbjAD<[p3^cbV0M$A#Cuuy;5G!Rhji1JkU=9(8gA {8lgN$7f;' );
define( 'NONCE_SALT',       'rSx(1INYCqA@eh{4OwxWWQ(ejf%T*PbH$6,g?z?Xdi%LSXa~Lo8U@R1ik MvG]}5' );

/**#@-*/

/**
 * WordPress database table prefix.
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
 * visit the documentation.
 *
 * @link https://wordpress.org/documentation/article/debugging-in-wordpress/
 */
define( 'WP_DEBUG', false );

/* Add any custom values between this line and the "stop editing" line. */



/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';

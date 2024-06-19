<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the installation.
 * You don't have to use the website, you can copy this file to "wp-config.php"
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
define( 'DB_NAME', 'wp_portfolio' );

/** Database username */
define( 'DB_USER', 'root' );

/** Database password */
define( 'DB_PASSWORD', '' );

/** Database hostname */
define( 'DB_HOST', 'localhost' );

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
define( 'AUTH_KEY',         'dfgq)jCKtB aak;nQ)-y[tiy&$i{e5UKDTA]yVObEYYC_j2{v3.NVrfRYQ*UaA!P' );
define( 'SECURE_AUTH_KEY',  '>k[TYGD%)`]F4@etU{2#82~tydKW}bGXym 8i+@^o?AV;ZGS,pXJ%DdJz0&:DH.>' );
define( 'LOGGED_IN_KEY',    '^R4LB,rJwpD*)$o#@&G8zCL52?~$E~tv2}79D)(c|7Hxdvh@DNRumUw84p;?N-Cx' );
define( 'NONCE_KEY',        ' ufE8Zuvsz/<#U_o_H>~cY6GUB?b@GkL?Xt]F/0wF&MEB06:^VuCaEu5b0b:T?6k' );
define( 'AUTH_SALT',        '%UN]G G#XaEyw|*t#H/ZF50&^+b0x=GXcH::<o.uj $7Xa&Z$jRD)Tw{|TyR+FyV' );
define( 'SECURE_AUTH_SALT', 'yd,@O/1~=|?2y`~ffy:FUvd%4HQ_.Rp9}2_>3Y`3p|$w0k?Ui+I(8cAV;Y4nJIAy' );
define( 'LOGGED_IN_SALT',   '`YT(?9[_R(f&!+v5Pi8(Szi$e0-#^E_6-lA&F+{u2@:_,.8t;j<{,a~,cD~y0q-W' );
define( 'NONCE_SALT',       '7PGL87_oJr#7JW}3k$)uJW3zDwQ`u(+*Bfz~OIe;a$9#;b0TLWXEtiC{>K>SC[ZK' );

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


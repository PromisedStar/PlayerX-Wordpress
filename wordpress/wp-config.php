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
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'wordpress' );

/** MySQL database username */
define( 'DB_USER', 'root' );

/** MySQL database password */
define( 'DB_PASSWORD', '' );

/** MySQL hostname */
define( 'DB_HOST', 'localhost' );

/** Database Charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

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
define( 'AUTH_KEY',         'fryM&Oug8bZC-zg8eWLhATg(8BN}<X,zweQ:TWtvifg?3n=Nh^J?QV0{xq@CfB.2' );
define( 'SECURE_AUTH_KEY',  'f-E8s}Q}D%&Lw)rz#Fa)dYYrU261]@[q.]kN@`,/;06,Nuj=%<*=dN+,{~r{GcD:' );
define( 'LOGGED_IN_KEY',    ',V/3U/@SwvW XK{o:?H:#@< CzTHb_!RM7TuZ&^.MLOxQ?&*IhtdX_.2rFZlZ_(j' );
define( 'NONCE_KEY',        'R4wyRiNE5Z1FjfV/!spqPK%7S,L#Uc,r_oR0t6B}C3BGm8cYl!Co#vw4lmpqyN-p' );
define( 'AUTH_SALT',        'rPaZ(pv86WuJQ@q`h}X,%ZwYttzmI2.F!/upx2Tes#Pz2Mf`dEgj*7 .fLG1EY8*' );
define( 'SECURE_AUTH_SALT', '%=esWcVRKXY96&$6aB[:I3?VYP>aw=g|MiQl|{8,}iBTzv::>+fE$<tQk%pW?^K_' );
define( 'LOGGED_IN_SALT',   'iE<S:)0U?tX.i&}ew<nzdbWdF5?FHtm^%=0,8ex6b/,Q9CZmB1LlEP%i1H9dED?7' );
define( 'NONCE_SALT',       's(v!mdu4^LVw{HOpuyiE,Ei@A8YD-n>uMqj)r xH0-3udI/Q;r#lz#tsR6?qHV~T' );

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
 * visit the documentation.
 *
 * @link https://wordpress.org/support/article/debugging-in-wordpress/
 */
define( 'WP_DEBUG', false );

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';

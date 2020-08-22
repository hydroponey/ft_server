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
define( 'DB_PASSWORD', 'root' );

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
define( 'AUTH_KEY',         'U!k}KT-#1^r1RYD59T8nZsREt|QXhxCR;chU^Il:oIhF;^0CnSIWi>)kLa[IwxUj' );
define( 'SECURE_AUTH_KEY',  '2Q< jLVO/Hn&Df t v1}:B+}jz)PyB;X2COZ&jc$ycc?4I>a[!&_c4{p#f5Xw! x' );
define( 'LOGGED_IN_KEY',    'OA(o!}tbN2ncCwBg(#1c^xIVhNesZ4H!++K04<ms:{Q8hjpqDHgy%Vpa~3XNW3m[' );
define( 'NONCE_KEY',        'h5:I#nPsY5e}40=G|Oq|,njk_wWb1SO.9-9Ss0#4}ch?aF1{Y>Mr6O=]#[{tPnP;' );
define( 'AUTH_SALT',        'B_mU]y<<;-Y|oUiFK%t;)Yf8ca&lu:4Tnh~x.m.9.Pg>/9Mc8|X?`1&@SODd8.4-' );
define( 'SECURE_AUTH_SALT', 'zm%v$.Y,|e9O!%~&W,?;7XMr5>05yb r%B0VK|k{2+,Y9CVX!_-2ztLxsv%kK>V$' );
define( 'LOGGED_IN_SALT',   '!3##9xP&6Oex~BB-fX`,-<IRW4|I#1Ba7a$w>~Lbl0?Djtv0X__9@AH$<NLOE-oL' );
define( 'NONCE_SALT',       '9sx %f+4O}:8E/d1.0U+7S+bY`$PTzb^mVn/ruOPlwuuZVXgg0cGXZXEEK`qAnS ' );

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

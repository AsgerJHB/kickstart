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
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'asgerjhb_dk_kickstart_' );

/** Database username */
define( 'DB_USER', 'asgerjhb_dk_kickstart_' );

/** Database password */
define( 'DB_PASSWORD', 'gruppe03' );

/** Database hostname */
define( 'DB_HOST', 'asgerjhb.dk.mysql' );

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
define( 'AUTH_KEY',         '@R88}4nA+Q]N0A=B-}NqTRGz-*^z-|8^eFu^=iWW|P9DiaNsT5<%8g3npRK|/b55' );
define( 'SECURE_AUTH_KEY',  '9@{4_dvk7JB1)X8bF5?/T?8liT^4X|GCFz_.]8Xa;_Y5*OWm]dTgL`r?# %LPrb;' );
define( 'LOGGED_IN_KEY',    '7bV68K}E`M^ketJvn~1_$a#LgRZ++Kz8!#1<Lqj{B1VH%K`^/1)w:JTYmNEIX?5i' );
define( 'NONCE_KEY',        '/UZ{rhV?ENp@6ujjgOb>~Q2ZBD/(tN}8EF{Oo#njPVy3IXL.G;LIi ]wMKrJi(yL' );
define( 'AUTH_SALT',        '`y~@&XbM51Ua$%[YqUMG{PKC!g9/lrL7C3Rh@_GT#`IA@n#YgbEJn:pic:J<c6sq' );
define( 'SECURE_AUTH_SALT', '! *E2nk%>b?2]?)V/<c$8fvNo%#~,?3;>0lr^}J2{0v9A;8Tm9Snm(13YmK%K-CV' );
define( 'LOGGED_IN_SALT',   'aYYPF8:E0o&DR*H{Jf;TqN0S8f%8k<&Aq9xO)M{_=k2DZ}k_h`.i{d)h.]sxP7ok' );
define( 'NONCE_SALT',       'aWa$~OEl4}Ys|=o#e&^.q$s)h(zXPf)$DSoyvL19!YQjtL9X7.gg}7M.`B4[P,lt' );

/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'kickstart';

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

/* Add any custom values between this line and the "stop editing" line. */



/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';

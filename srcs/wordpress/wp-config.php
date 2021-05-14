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
define( 'DB_USER', 'user' );

/** MySQL database password */
define( 'DB_PASSWORD', 'user' );

/** MySQL hostname */
define( 'DB_HOST', 'mysql' );

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
define('AUTH_KEY',         '|^,79U/^P]>1y@Egv0}@+RbV6;l@W:Ay2Ba6qo{/j`P63tZ/HyCzIw9~q|f@S^7&');
define('SECURE_AUTH_KEY',  '5vyY|Z}+D743|Ef9l`s7_rv6V`(C8uO}K^|LY]Oy$OI:W6FsxH!*zE7HpRFubv*w');
define('LOGGED_IN_KEY',    'Ch7@Maadyj *+Y}0$/jp7:Y:px]-sy$*:8lq]HQK?OWJ!hJR{Cn|?WL} /EW!+sS');
define('NONCE_KEY',        'CD.{PoaTu^ouq>t>b]_NA G.XEe#k}[uZv9Y^G@/~ptx[a2{#Rn9pV7JtGsEH+Vh');
define('AUTH_SALT',        '68+WEo}9/^5{+=ERf_KU`#O3EEEr<-A`cT C7#{<Zq~$-b@U5ou V8;,BI,gv|x?');
define('SECURE_AUTH_SALT', 'jRdiL.8unDv7P]W_JM8Bn?~%xExW5B#Q9GU$ R-& Qta!Yh@75>++j_]nLx^`d#b');
define('LOGGED_IN_SALT',   '((6L24.>$SG}WLGv)1JB4+e8C|@qs/}bcmtm-*|Mj[X`/SllR @Z]?n/|z^$:$AQ');
define('NONCE_SALT',       '-C!my78ja,{;3K0czrqD=NH1Ax<m}?GoPr^y3%<YMqC5]_{X#%ZFr? :uB2h_  q');
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

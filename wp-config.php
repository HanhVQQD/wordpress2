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
define( 'DB_NAME', 'wordpress' );

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
define( 'AUTH_KEY',         'mCa}D/}z#GDlWk!^8]Hql_OZeKKd,gV:L<G/*v$)Lz-qX32&K,S.VX=)_-@t?^t<' );
define( 'SECURE_AUTH_KEY',  '@ae463BpG<+gkqnv7wwU|8zUI>7HV-y^4GMcir65 [S dS=q))$|f*Wo.N R1pg&' );
define( 'LOGGED_IN_KEY',    '02u.:s#jBGQmz$v=qTtI#S/<2mt$iWoYh6j@}{LuRzP`:p`s<M)wfW-YFqP>[_12' );
define( 'NONCE_KEY',        '-lXy&Dp1h0WB&IQEVWcnr6I6>-NDdA4B`O!f&qP.B#$Sj_@8+23xrX%$(1Qx.`Y%' );
define( 'AUTH_SALT',        'i]`tMC_nQ1%GIh(T5U7#YDftomr=^|}`h3D}I9{pF*pGvN}$CQd~Kr]Q53*IGeOK' );
define( 'SECURE_AUTH_SALT', '35I81n;le2FPItLb@C6XS=|?y.OPTmh!!cWjl2uTC8Fib$AT%xY#WX rXm+xxSg|' );
define( 'LOGGED_IN_SALT',   'H@sH(W*1$GoaO!-b:Zs23{0)|mL,fGnn!yQlRqFpyURT?2vCX|UP#Y: 1d5JO`eb' );
define( 'NONCE_SALT',       'd5m`ERMc 7~)Ax@E%.AEE{n=W~2SI?E91;XXahT`}pQk=jG1DOY%O]fH=[o-g!A>' );

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

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
define( 'AUTH_KEY',         'MB1z,C%W(LL4S/=CG]+cS!a<1 r7%D%}@Yp=$T6/so?g85EgiI<]YlhZ_DzxC:SZ' );
define( 'SECURE_AUTH_KEY',  '6NuO*6>q,L#tqEodMzb>N*lLe)K]QS:-*6l}!QeEE9+%R1)Hoc+LcoKNy|mpqMf}' );
define( 'LOGGED_IN_KEY',    '7n|4U@_ayX_bpi0mm&;Ev(vvs|lf@=~?j4ZTB7>yqlKV+W=`((h<ro)6l5Q+Sw`Z' );
define( 'NONCE_KEY',        '<}-,AD-`9NnziNy:Rx+0-:zojy7Dr]=CQQ(#&=FX&.&HRYQrmX1U:~-c18#+7oG}' );
define( 'AUTH_SALT',        '#qm#heM#V_Pt6wxe2k@(IJNuJq^,Q`/D]1m#[x-z[%Xp:^t,ZhIz ^Z:Kga?r)Ss' );
define( 'SECURE_AUTH_SALT', 'FH(uM:6,B{V[GS{^3I&BER<TmlD)vY-.mPi(?>0A(q)t+~bi#?Dw3]<G##*wEM2k' );
define( 'LOGGED_IN_SALT',   'B1N]{`r-[M?[NsJ[!+<SUsDnd.1+8*P{5=)C&oG$$xXh8Vng K$tdTmuB;^+zrX}' );
define( 'NONCE_SALT',       'B#Fa>brK|xu{mQ9Z%SQPFN|Ex#PgO|~I0_7w^W-*pbe,_I8<m |26{Den@!4:Ci5' );

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

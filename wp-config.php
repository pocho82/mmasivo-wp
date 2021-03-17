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
define( 'DB_NAME', 'seriewordpress' );

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
define( 'AUTH_KEY',         'yCzRIr:yy>&|S1w-t{O6l~@-e#oD bw<}CITL|sqY;qqs*F*(ep)h|g|M`qX!I%m' );
define( 'SECURE_AUTH_KEY',  ' Q%o60>hfaqlQF(nPDZW4{-WU/&a?~P&,fnT-qdhNifP.ZT6<r#TOEMeoWSlr&*T' );
define( 'LOGGED_IN_KEY',    '[2 YZZ@{K$RA7Pi9|*XZEmh~UJP+tOI9Wq^&u_s:I$ofL)}s^NEkNO(FfpO:,IUQ' );
define( 'NONCE_KEY',        '}5HOz6fS-qiW`H_d)E<BKVMP1v`)ApHy]8Nd)#XU3u|2$9p#Mv~n 7a}Oj(gdKsH' );
define( 'AUTH_SALT',        'Us%<EJKPT&w%y)n!4pyLr^*).F~A[/C%t5`7V$] 4gS,Tt-4JBdX_SNFN{)z^c3f' );
define( 'SECURE_AUTH_SALT', 'NZ9%`p~ ^|mhSfv}Q=7uC>&/ ],vjdU}ecTTGM]+ {X(c[R2enn{Nlu@E#TxY$-x' );
define( 'LOGGED_IN_SALT',   '[Rh#G?gT`fE[p-$K)8LcD9gLs;.G5M>-K-vz.?~;d/{kg(M{)O 32P!+3n-D>+~m' );
define( 'NONCE_SALT',       'xCXlYFrkM,(M4(QAg/%x6t 9awh~F6G:,YTHf}iuEIN_CK(-1xnm[>D!Ej&P#3lH' );

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'serieword_';

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

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
define('DB_NAME', 'getfoundfaststarter');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', '');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8mb4');

/** The Database Collate type. Don't change this if in doubt. */
define('DB_COLLATE', '');

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         '&D<_X ![+y=?PTLD{HK#e 0RFDbrw@0Ta$]!}hD)6wET1fZCrz/:9u]W4?=]-EW$');
define('SECURE_AUTH_KEY',  '}Es*lOPg.g$/$|0ua7GtrJK1.BC(enoxruTi~h g] qHi@AyT/#~2|:6mZjrA:I1');
define('LOGGED_IN_KEY',    'b~kPvz;b8:Vqp+|Np{UIQz[3NCWnn}E7gLZ2FM(o./:o0Dd&c^% {dC_4FJ+f,pR');
define('NONCE_KEY',        'Zj@w^gabA5^}N`cc I<t-8g#5G}dkY=,O5P6F}zZZ~|C6x`[)Y!YrwzF`|-FEFF%');
define('AUTH_SALT',        'm=)dX>w}Si%}P6XZwjZqY5l4Z]3=FF}3VTx91fgpIrF<A]-qfN<@KJf7+e?YU7Z:');
define('SECURE_AUTH_SALT', 'DRWEH482nh{(vfO,2V#Dw7{2lETrn2gmd>Fl~c(dME`Lqd}J6ppIAA9>KZa{p*ZV');
define('LOGGED_IN_SALT',   'C=q>/w9mjVgA$|Fjf<M*mJQX-U$Q5)&=-R#Sh-Oc3Y%k7RA&.>j,h=B|kaay0>bE');
define('NONCE_SALT',       '8tFKm0/diiTs&ey=q)Mnyo[8~-:OyMH6c+Af}JT]!?^e~NGth?~F:n9`70O[1sX0');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'gff_';

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
define('WP_DEBUG', true);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');

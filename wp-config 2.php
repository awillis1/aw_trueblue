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
define('DB_NAME', 'aw_trueblue');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', 'root');

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
define('AUTH_KEY',         'jWeX~&I~M* _67alhq_HI p|Heo#k<gqG hGd{8,I,ilJn[kT=A$NR!E sa9Z4!.');
define('SECURE_AUTH_KEY',  'Ow>^B+#)HV:hj}^WFYibc[Gb`EzkLMHNdZvUH.Rv-UY<qsNk1IfbhGB,?tJ~c7f;');
define('LOGGED_IN_KEY',    'fMY+Q-dw2NzLtM8BCT0b{0XnC+)Ue2/w&Kp@{]A;KV7Kbb/XYvL?2cpcqm}-M&T^');
define('NONCE_KEY',        'c?Pr0.KKfN71_:&qi=QUauMpmNgm/u{Xcj{>3{#ES)D)z$ WG%bxzCJ0e^TBzmQb');
define('AUTH_SALT',        '|v/$PMPD@i=@a+i*~yVlZRh<pd:a8|eW(A%rLI~c,  3t >!g#|H$W7IDHaJ>W.`');
define('SECURE_AUTH_SALT', '$~WjO8gVyw(vA$B+fST#9tvqGyc%@L[m<GF7o.v&uRhmr~n!kK~/FTZ6q#/?TwqO');
define('LOGGED_IN_SALT',   'g<-D]q?[ie2CK8J6&/eMA?)ICEsv>HadLSv$rr&Z@@mLb+nWYf7BWV;Ep)2@{jQ,');
define('NONCE_SALT',       'L]nRl*0npaLZ~t?wX=;;~gTGAxEBhuRsNpnQg?$`c_D`JBQ`F{!WX[x|,_@k[`_a');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

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
define('WP_DEBUG', false);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');

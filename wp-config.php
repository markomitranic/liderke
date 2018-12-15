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
define('DB_NAME', 'bfpeorgv_liderke');

/** MySQL database username */
define('DB_USER', 'bfpeorgv_llideri'); 

/** MySQL database password */
define('DB_PASSWORD', 'sWarM0071');

/** MySQL hostname */
define('DB_HOST', 'mysql');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8');

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
define('AUTH_KEY',         'W^3_gAXak)e_m1jY~qsCCH>.x-8W(4=r.-UH3Mr(pax-2JPPc=JA$(%$^}[[>S/|');
define('SECURE_AUTH_KEY',  'GDF:Ea 67]{Q=>r}9I2qqzY*ftT+x+YVZxVrhuj^nhB0y $dD.6A74~x+bermygB');
define('LOGGED_IN_KEY',    'qe`BrdAQeD>4?nl9Q*_pdy`t`UeNN1yrnXyWGo-7Nrm7+|Kw3m`$=Omb<5n:Kl&V');
define('NONCE_KEY',        '7SC)04#lbBET^LQe+U+9Ja=jX/y=nt,LLUV&IZxQHHGh}rWi]Sk%r*Ta|pz+$CP]');
define('AUTH_SALT',        '7N>R{I*m*_+$YJai+G+px`.]b.q$OD8XT6e1-TAkYJ]OSiaEy%<N:%H=]/.,Bp:-');
define('SECURE_AUTH_SALT', '+`hda/Wu;MeH9P)-Vz2.R*H=6HE^*Cm:5jJl7HxB4k^7);X%#Q8|8VC^pf{bspA+');
define('LOGGED_IN_SALT',   'O4^imr{F#Hg2HZKr{d$_1%xB@?|[%x>RIW()$~zl)S2<<JU^W!Ko4q+IqIMU&|5L');
define('NONCE_SALT',       '>A5$tPuu<(v(B|ye7f4(pueAvDK(@:)&-qw)h8{{)f(+kr9WQ-J{rIp3Qv5m1gF_');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'azlwp_';

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
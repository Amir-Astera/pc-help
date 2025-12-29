<?php
define('WP_AUTO_UPDATE_CORE', 'minor');// Эта настройка нужна, чтобы убедиться, что обновлениями WordPress можно корректно управлять в WordPress Toolkit. Удалите эту строку, если этот сайт WordPress больше не управляется WordPress Toolkit.
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

// ** MySQL settings ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'pchelpas_wp1' );

/** MySQL database username */
define( 'DB_USER', 'pchel_wp_ylj71' );

/** MySQL database password */
define( 'DB_PASSWORD', 'Vrs3Y81hC$' );

/** MySQL hostname */
define( 'DB_HOST', 'localhost:3306' );

/** Database Charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8' );

/** The Database Collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY', '7~iYI@593~9kC:-:PS4@sI&(0-J7j)KpfW2I:244KP+1rbEXp1((/j%22&Xz;9c+');
define('SECURE_AUTH_KEY', 'd6Y+8@w|@@n!8Q0ZOX(q-:vBm54x[+88w!%r@x0&[p[1jDIZrNx(&;)1c0!+k+01');
define('LOGGED_IN_KEY', '|1_]q&8#(f8qM6Bxh51uPbjxKs[tlCqT]Y-oxE~r5558~|e!hMrD45++E#A7Lja!');
define('NONCE_KEY', 'd4nXj/h/7)Ee]sM0e!w5K7|NT%Q)B74O4*4XX1oRc2OUomZy6E][7&s~b+E%94TX');
define('AUTH_SALT', ']qu7SYj3B0+67d5V4#e|4/W*8/@p9H;7/1Rk28!fy9!b6:Fx+X][2C#j7b0njUq[');
define('SECURE_AUTH_SALT', 'q6;pXdN0|[:CoyQ[V69Iu12/0V;-a3l6_X/oRnx36q0nn!sI*z&e3n3;gUc~w1h*');
define('LOGGED_IN_SALT', 'L%0O~#VM95]VGS|/-WxIX)6sx)q!614Gp_M93@Fj);5+h:lBCdnx)0~|XJuj7)60');
define('NONCE_SALT', '9_!u18[EzzC-4-n@;+U/]6K514))BK!3HG-4+&F06SU2pdq7CkA#te-_t6f5IDX7');

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'a2RgDr_';


define('WP_ALLOW_MULTISITE', true);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) )
	define( 'ABSPATH', dirname( __FILE__ ) . '/' );

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';

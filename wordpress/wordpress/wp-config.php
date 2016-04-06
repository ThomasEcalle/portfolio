<?php
/**
 * La configuration de base de votre installation WordPress.
 *
 * Le script de création wp-config.php utilise ce fichier lors de l'installation.
 * Vous n'avez pas à utiliser l'interface web, vous pouvez directement
 * renommer ce fichier en "wp-config.php" et remplir les variables à la main.
 * 
 * Ce fichier contient les configurations suivantes :
 * 
 * * réglages MySQL ;
 * * clefs secrètes ;
 * * préfixe de tables de la base de données ;
 * * ABSPATH.
 * 
 * @link https://codex.wordpress.org/Editing_wp-config.php 
 * 
 * @package WordPress
 */

// ** Réglages MySQL - Votre hébergeur doit vous fournir ces informations. ** //
/** Nom de la base de données de WordPress. */
define('DB_NAME', 'wordpress');

/** Utilisateur de la base de données MySQL. */
define('DB_USER', 'root');

/** Mot de passe de la base de données MySQL. */
define('DB_PASSWORD', '');

/** Adresse de l'hébergement MySQL. */
define('DB_HOST', 'localhost');

/** Jeu de caractères à utiliser par la base de données lors de la création des tables. */
define('DB_CHARSET', 'utf8mb4');

/** Type de collation de la base de données. 
  * N'y touchez que si vous savez ce que vous faites. 
  */
define('DB_COLLATE', '');

/**#@+
 * Clefs uniques d'authentification et salage.
 *
 * Remplacez les valeurs par défaut par des phrases uniques !
 * Vous pouvez générer des phrases aléatoires en utilisant 
 * {@link https://api.wordpress.org/secret-key/1.1/salt/ le service de clefs secrètes de WordPress.org}.
 * Vous pouvez modifier ces phrases à n'importe quel moment, afin d'invalider tous les cookies existants.
 * Cela forcera également tous les utilisateurs à se reconnecter.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         'mh-q)-eJ-SM6IzO.lYsA-5YbXq:Cs3z[qNFu!vI+x<z:Tjl4c|av>-0cZ[@!<k,,');
define('SECURE_AUTH_KEY',  '-:ekaAokL?8n=GS-X-Aej)iAlf@.5==jD9>/EyGdG6 Sx,C9c~Xk/X[9E^Y+nJC%');
define('LOGGED_IN_KEY',    'R>8SW%x;vC6Kun-kg5od;t+(Hc??wCnb-m6GF?bl+EGf=h>G`8/oiuCUe8165f+T');
define('NONCE_KEY',        'BF:!:JSp/M5o|nZPM,^N-)q73_p-g=@.s &*bCNaXCWkd%Yjyl$ma+$Ki++&I278');
define('AUTH_SALT',        '03w2/eH-Fsa*dayp_6|]a:U=!k98S98W[Wo!+o>7os]tBME:6^_uPFC9gBIMkNqH');
define('SECURE_AUTH_SALT', '*oPjHUO=dxI81r:?seeP03gO@HM@Nf ,EuY|~*$UNf}ck^OI}<>|2@%_C0#mU+3!');
define('LOGGED_IN_SALT',   'WK=kZHXX,FOo9ftyrK7+$DMTj-_Y>ou|)@Dfqd#7^McI@$tv^cv4I+_$QO_V|rn`');
define('NONCE_SALT',       ')R[5vr|#Hhx5+GMAjZBp{a3niPqN%NR`U(e?{9#.%:)*[&|hr{SHX_5bs##i|!z6');
/**#@-*/

/**
 * Préfixe de base de données pour les tables de WordPress.
 *
 * Vous pouvez installer plusieurs WordPress sur une seule base de données
 * si vous leur donnez chacune un préfixe unique. 
 * N'utilisez que des chiffres, des lettres non-accentuées, et des caractères soulignés!
 */
$table_prefix  = 'wp_';

/** 
 * Pour les développeurs : le mode déboguage de WordPress.
 * 
 * En passant la valeur suivante à "true", vous activez l'affichage des
 * notifications d'erreurs pendant votre essais.
 * Il est fortemment recommandé que les développeurs d'extensions et
 * de thèmes se servent de WP_DEBUG dans leur environnement de 
 * développement.
 * 
 * Pour obtenir plus d'information sur les constantes 
 * qui peuvent être utilisée pour le déboguage, consultez le Codex.
 * 
 * @link https://codex.wordpress.org/Debugging_in_WordPress 
 */ 
define('WP_DEBUG', false); 

/* C'est tout, ne touchez pas à ce qui suit ! Bon blogging ! */

/** Chemin absolu vers le dossier de WordPress. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Réglage des variables de WordPress et de ses fichiers inclus. */
require_once(ABSPATH . 'wp-settings.php');
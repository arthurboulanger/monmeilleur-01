<?php
/**
 * La configuration de base de votre installation WordPress.
 *
 * Ce fichier contient les réglages de configuration suivants : réglages MySQL,
 * préfixe de table, clefs secrètes, langue utilisée, et ABSPATH.
 * Vous pouvez en savoir plus à leur sujet en allant sur 
 * {@link http://codex.wordpress.org/fr:Modifier_wp-config.php Modifier
 * wp-config.php}. C'est votre hébergeur qui doit vous donner vos
 * codes MySQL.
 *
 * Ce fichier est utilisé par le script de création de wp-config.php pendant
 * le processus d'installation. Vous n'avez pas à utiliser le site web, vous
 * pouvez simplement renommer ce fichier en "wp-config.php" et remplir les
 * valeurs.
 *
 * @package WordPress
 */

// ** Réglages MySQL - Votre hébergeur doit vous fournir ces informations. ** //
/** Nom de la base de données de WordPress. */
define('DB_NAME', 'monmeilleur-01');

/** Utilisateur de la base de données MySQL. */
define('DB_USER', 'root');

/** Mot de passe de la base de données MySQL. */
define('DB_PASSWORD', 'root');

/** Adresse de l'hébergement MySQL. */
define('DB_HOST', 'localhost');

/** Jeu de caractères à utiliser par la base de données lors de la création des tables. */
define('DB_CHARSET', 'utf8');

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
define('AUTH_KEY',         'W4wCMZ@KSg_C{i9!wl%GZwGWP)&)9]M!%!ZJydheE3Oa?)yL#|Jr=d5%aY%!v[~x');
define('SECURE_AUTH_KEY',  'Ytm5c,OyYw#?|?2~zEfvUCoh,?U|e|lSL~k6|QA<M|vV!VFxkD9yPPqOyznS*dPE');
define('LOGGED_IN_KEY',    'OEb-sy.%7T~,h`p]%&oCzuW: z:]]pgCL<PE82Fk|`DHumt> rtZj*dcQjlc^B=+');
define('NONCE_KEY',        'oQ`Q%G,,^!bzS;cNqaN:8;s7pe%ex$k6~IE28L8=+|_QU{=/-Fmpz=#[quNm<{8*');
define('AUTH_SALT',        'o]S~;RA+tg(y8z,$FtU*Nb.|EW|h~(!jzDoLl@@!$`VJeb19Hm_2+$). Eia>xqm');
define('SECURE_AUTH_SALT', 'VfaD(u6pbkGdvV@q0n@Tgnn*u)E/WIdgU87lE)u EaUVXY!mXbf__5hHpv~JtB5~');
define('LOGGED_IN_SALT',   'Z*9t<;g+I]|JrLuBE2/Oz~%]vQ((?,_|8+Q$3D&zPkEpl@2C-C*@9R&F?Do}23+s');
define('NONCE_SALT',       '~+qIV&lTOT*?z9[aR*fgYt8X._J5CB9n,n_*L%;@@Aj}~YV33kgkxH3wS*r%pwq+');
/**#@-*/

/**
 * Préfixe de base de données pour les tables de WordPress.
 *
 * Vous pouvez installer plusieurs WordPress sur une seule base de données
 * si vous leur donnez chacune un préfixe unique. 
 * N'utilisez que des chiffres, des lettres non-accentuées, et des caractères soulignés!
 */
$table_prefix  = 'wp01_';

/** 
 * Pour les développeurs : le mode deboguage de WordPress.
 * 
 * En passant la valeur suivante à "true", vous activez l'affichage des
 * notifications d'erreurs pendant votre essais.
 * Il est fortemment recommandé que les développeurs d'extensions et
 * de thèmes se servent de WP_DEBUG dans leur environnement de 
 * développement.
 */ 
define('WP_DEBUG', false); 

/* C'est tout, ne touchez pas à ce qui suit ! Bon blogging ! */

/** Chemin absolu vers le dossier de WordPress. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Réglage des variables de WordPress et de ses fichiers inclus. */
require_once(ABSPATH . 'wp-settings.php');
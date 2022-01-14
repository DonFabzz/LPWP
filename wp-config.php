<?php
/**
 * La configuration de base de votre installation WordPress.
 *
 * Ce fichier est utilisé par le script de création de wp-config.php pendant
 * le processus d’installation. Vous n’avez pas à utiliser le site web, vous
 * pouvez simplement renommer ce fichier en « wp-config.php » et remplir les
 * valeurs.
 *
 * Ce fichier contient les réglages de configuration suivants :
 *
 * Réglages MySQL
 * Préfixe de table
 * Clés secrètes
 * Langue utilisée
 * ABSPATH
 *
 * @link https://fr.wordpress.org/support/article/editing-wp-config-php/.
 *
 * @package WordPress
 */

// ** Réglages MySQL - Votre hébergeur doit vous fournir ces informations. ** //
/** Nom de la base de données de WordPress. */
define( 'DB_NAME', 'wplicence' );

/** Utilisateur de la base de données MySQL. */
define( 'DB_USER', 'mmi19f14' );

/** Mot de passe de la base de données MySQL. */
define( 'DB_PASSWORD', 'Vuzimu5@' );

/** Adresse de l’hébergement MySQL. */
define( 'DB_HOST', 'localhost' );

/** Jeu de caractères à utiliser par la base de données lors de la création des tables. */
define( 'DB_CHARSET', 'utf8mb4' );

/**
 * Type de collation de la base de données.
 * N’y touchez que si vous savez ce que vous faites.
 */
define( 'DB_COLLATE', '' );

/**#@+
 * Clés uniques d’authentification et salage.
 *
 * Remplacez les valeurs par défaut par des phrases uniques !
 * Vous pouvez générer des phrases aléatoires en utilisant
 * {@link https://api.wordpress.org/secret-key/1.1/salt/ le service de clés secrètes de WordPress.org}.
 * Vous pouvez modifier ces phrases à n’importe quel moment, afin d’invalider tous les cookies existants.
 * Cela forcera également tous les utilisateurs à se reconnecter.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         't<j9[ 8WJN]D0rzhR+W0MN_UE1O=O/E}e3mqgbAj#JC<{#Wyi.Z@T`XDZ%0?sHP=' );
define( 'SECURE_AUTH_KEY',  '*s9=,poEV}G_)6*#]Ny&ZbZ=l;rhYwD^$A52q9pE<v,3RWbh)]+4+i~aIe_rA]}#' );
define( 'LOGGED_IN_KEY',    '#;Y-QhK2wqX:DO|1m&Dl}~#@/DuYZmQDuQNd=d(;]_e^uzG:pPhIj9roXW@]VI9Z' );
define( 'NONCE_KEY',        '[|r55^mNFU;j$uPcu~or/PrtE:O^{|$MMAZ1h75Bi{)ia}!$|v ;37n:nhTL/xk,' );
define( 'AUTH_SALT',        'LvCzEyKBG(< ZLsR^quS,m}enc>u4[%WX]3}_=td6P]M- ki`h@~W4uJ|P%z^J)$' );
define( 'SECURE_AUTH_SALT', '0tLzxPYa#oJ-jC8+~63X7#/xZQ4j5OSRsvDZ[2,Pz;!Y})wmP/h!&17|s]ho:tR7' );
define( 'LOGGED_IN_SALT',   'nHn$;RtjWK7`bP`Oo#}p;xqZ;]Z<T!NVK_fLnn7}Ci-#ZM`*eUSsUnvWe@<U;`W3' );
define( 'NONCE_SALT',       'jUmuG]iue7n}D$cZ-B{`fbn5cWKfP<ri^TU^+$)paEm!})k{0#pI!`VpU5ZRYHzJ' );
/**#@-*/

/**
 * Préfixe de base de données pour les tables de WordPress.
 *
 * Vous pouvez installer plusieurs WordPress sur une seule base de données
 * si vous leur donnez chacune un préfixe unique.
 * N’utilisez que des chiffres, des lettres non-accentuées, et des caractères soulignés !
 */
$table_prefix = 'wp_';

/**
 * Pour les développeurs : le mode déboguage de WordPress.
 *
 * En passant la valeur suivante à "true", vous activez l’affichage des
 * notifications d’erreurs pendant vos essais.
 * Il est fortement recommandé que les développeurs d’extensions et
 * de thèmes se servent de WP_DEBUG dans leur environnement de
 * développement.
 *
 * Pour plus d’information sur les autres constantes qui peuvent être utilisées
 * pour le déboguage, rendez-vous sur le Codex.
 *
 * @link https://fr.wordpress.org/support/article/debugging-in-wordpress/
 */
define( 'WP_DEBUG', false );

/* C’est tout, ne touchez pas à ce qui suit ! Bonne publication. */

/** Chemin absolu vers le dossier de WordPress. */
if ( ! defined( 'ABSPATH' ) )
  define( 'ABSPATH', dirname( __FILE__ ) . '/' );

/** Réglage des variables de WordPress et de ses fichiers inclus. */
define('WP_ALLOW_MULTISITE', true);
define( 'MULTISITE', true );
define( 'SUBDOMAIN_INSTALL', false );
define( 'DOMAIN_CURRENT_SITE', 'fabiensigrand.fr' );
define( 'PATH_CURRENT_SITE', '/wordpress/' );
define( 'SITE_ID_CURRENT_SITE', 1 );
define( 'BLOG_ID_CURRENT_SITE', 1 );

require_once( ABSPATH . 'wp-settings.php' );





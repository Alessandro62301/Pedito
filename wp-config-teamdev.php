<?php
/**
 * As configurações básicas do WordPress
 *
 * O script de criação wp-config.php usa esse arquivo durante a instalação.
 * Você não precisa usar o site, você pode copiar este arquivo
 * para "wp-config.php" e preencher os valores.
 *
 * Este arquivo contém as seguintes configurações:
 *
 * * Configurações do banco de dados
 * * Chaves secretas
 * * Prefixo do banco de dados
 * * ABSPATH
 *
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Configurações do banco de dados - Você pode pegar estas informações com o serviço de hospedagem ** //
/** O nome do banco de dados do WordPress */
define( 'DB_NAME', 'teamde42_pedito' );

/** Usuário do banco de dados MySQL */
define( 'DB_USER', 'teamde42' );

/** Senha do banco de dados MySQL */
define( 'DB_PASSWORD', '260Qw2iHgu' );

/** Nome do host do MySQL */
define( 'DB_HOST', 'teamdev.com.br' );

/** Charset do banco de dados a ser usado na criação das tabelas. */
define( 'DB_CHARSET', 'utf8mb4' );

/** O tipo de Collate do banco de dados. Não altere isso se tiver dúvidas. */
define( 'DB_COLLATE', '' );

/**#@+
 * Chaves únicas de autenticação e salts.
 *
 * Altere cada chave para um frase única!
 * Você pode gerá-las
 * usando o {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org
 * secret-key service}
 * Você pode alterá-las a qualquer momento para invalidar quaisquer
 * cookies existentes. Isto irá forçar todos os
 * usuários a fazerem login novamente.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         '}4rVWHe?VqspR/{J2x~;[n%=8y0cxwSUgGX$HfCg7Xfl8J42EY#6T1%,}(893c*f' );
define( 'SECURE_AUTH_KEY',  '^GD3}OyHcXZJO]O::{qo*-AwX!v~Lu&d>p|KeSU2X<U~hVc%gp0dM0;jq07H@vm_' );
define( 'LOGGED_IN_KEY',    ')<Pa8:(.k[Pr(GjjS+WrO}qa$IA_nSx9cHKYcT$*?4]qlN*TSAbLLN:b,XE$O0e ' );
define( 'NONCE_KEY',        'QZ*F~>hvs|z6}Ds$1qO+8swmTfhmjYogS_>a<,cjS<(2]WUuoah8B2a-[E(4%=nR' );
define( 'AUTH_SALT',        '=dCapw8wYNd-Yt?j7Lx,#<GhLoVOnJ18f/mB[sXnD/]U!u50T[mX8]u-P3UAFEuw' );
define( 'SECURE_AUTH_SALT', '9mu6DC2MY}]mt6`kXQ|EE^iY%z%$r%q6+2B%tlta1]w=B1=(:e.i!N=s|d;z1AF.' );
define( 'LOGGED_IN_SALT',   'mxjirpAe/h&eklF~PWNW8}gI%[:CP02Hc0AyA cc#8W1JK.P d1lkioax]OXNVqf' );
define( 'NONCE_SALT',       'NpI@Y$-&,0i>bQ|-DVUs.^&~*QE<{Nat]s> <p7gjW$na}N+@NGE9T6! N:SM4m<' );

/**#@-*/

/**
 * Prefixo da tabela do banco de dados do WordPress.
 *
 * Você pode ter várias instalações em um único banco de dados se você der
 * um prefixo único para cada um. Somente números, letras e sublinhados!
 */
$table_prefix = 'wp_';

/**
 * Para desenvolvedores: Modo de debug do WordPress.
 *
 * Altere isto para true para ativar a exibição de avisos
 * durante o desenvolvimento. É altamente recomendável que os
 * desenvolvedores de plugins e temas usem o WP_DEBUG
 * em seus ambientes de desenvolvimento.
 *
 * Para informações sobre outras constantes que podem ser utilizadas
 * para depuração, visite o Codex.
 *
 * @link https://wordpress.org/support/article/debugging-in-wordpress/
 */
define( 'WP_DEBUG', false );

/* Adicione valores personalizados entre esta linha até "Isto é tudo". */



/* Isto é tudo, pode parar de editar! :) */

/** Caminho absoluto para o diretório WordPress. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Configura as variáveis e arquivos do WordPress. */
require_once ABSPATH . 'wp-settings.php';

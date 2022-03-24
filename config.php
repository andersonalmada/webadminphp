<?php
if ( !defined('SERVER') )
	define('SERVER', 'http://localhost:3000/');

if ( !defined('IMAGES') )
	define('IMAGES', 'http://localhost/webadmin/uploads/');

if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** caminho no server para o sistema **/
if ( !defined('BASEURL') )
	define('BASEURL', '/webadmin/');

/** caminhos dos templates de header e footer **/
define('HEADER_TEMPLATE', ABSPATH . 'inc/header.php');
define('FOOTER_TEMPLATE', ABSPATH . 'inc/footer.php');
?>

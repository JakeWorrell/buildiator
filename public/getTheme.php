<?php
switch ($_GET['type']) {
	case 'tmpl':
		break;
	
	case 'css':
		header('Content-type: text/css');
		echo file_get_contents(__DIR__ .'/../themes/default/style.css');
		break;
	default:
		echo "error";
		break;
}
?>

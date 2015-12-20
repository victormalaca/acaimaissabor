<?php
/**
 *
 * PHP 5
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright 2005-2011, Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright 2005-2011, Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       Cake.View.Layouts
 * @since         CakePHP(tm) v 0.10.0.1076
 * @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
 */

$cakeDescription = __d('cake_dev', 'Cia do Sanduíche');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<?php echo $this->Html->charset(); ?>
	<title>
		<?php echo $cakeDescription . ": Login" ?>
	</title>
	<?php
		echo $this->Html->meta('icon');

		/*****************************
		 * CSS
		 *****************************/
//		echo $this->Html->css('cake.generic');

		/*****************************
		 * JavaScript
		 *****************************/
		echo $this->Html->script( array('jquery') );

		/*****************************
		 * CHARISMA e DATA TABLE
		 *****************************/
		echo $this->Html->css(
			array('charisma/css/bootstrap-cerulean', 'charisma/css/bootstrap-responsive', 'charisma/css/charisma-app', 'charisma/css/jquery-ui-1.8.21.custom', 'charisma/css/fullcalendar',
				  'charisma/css/fullcalendar.print', 'charisma/css/chosen', 'charisma/css/uniform.default', 'charisma/css/colorbox', 'charisma/css/jquery.cleditor',
				  'charisma/css/jquery.noty', 'charisma/css/noty_theme_default', 'charisma/css/elfinder.min', 'charisma/css/elfinder.theme',
				  'charisma/css/jquery.iphone.toggle', 'charisma/css/opa-icons', 'charisma/css/uploadify'
			)
		);

		echo $this->Html->script(
			array('/css/charisma/js/jquery-1.7.2.min', '/css/charisma/js/jquery-ui-1.8.21.custom.min', '/css/charisma/js/bootstrap-transition',
				  '/css/charisma/js/bootstrap-alert', '/css/charisma/js/bootstrap-modal', '/css/charisma/js/bootstrap-dropdown',
			 	  '/css/charisma/js/bootstrap-scrollspy', '/css/charisma/js/bootstrap-tab', '/css/charisma/js/bootstrap-tooltip',
				  '/css/charisma/js/bootstrap-popover', '/css/charisma/js/bootstrap-button', '/css/charisma/js/bootstrap-collapse',
				  '/css/charisma/js/bootstrap-carousel', '/css/charisma/js/bootstrap-typeahead', '/css/charisma/js/bootstrap-tour',
			 	  '/css/charisma/js/jquery.cookie', '/css/charisma/js/fullcalendar.min', '/css/charisma/js/jquery.dataTables.min',
				  '/css/charisma/js/excanvas', '/css/charisma/js/jquery.flot.min', '/css/charisma/js/jquery.flot.pie.min',
				  '/css/charisma/js/jquery.flot.stack', '/css/charisma/js/jquery.flot.resize.min', '/css/charisma/js/jquery.chosen.min',
				  '/css/charisma/js/jquery.uniform.min', '/css/charisma/js/jquery.colorbox.min', '/css/charisma/js/jquery.cleditor.min',
				  '/css/charisma/js/jquery.noty', '/css/charisma/js/jquery.elfinder.min', '/css/charisma/js/jquery.raty.min',
				  '/css/charisma/js/jquery.iphone.toggle', '/css/charisma/js/jquery.autogrow-textarea', '/css/charisma/js/jquery.uploadify-3.1.min',
				  '/css/charisma/js/jquery.history', '/css/charisma/js/charisma'
			)
		);

		/*****************************
		* PINES
		*****************************/

		//Bootstrap
		echo $this->Html->css('../js/pines/includes/bootstrap/css/bootstrap');
		//echo $this->Html->css('../js/pines/includes/bootstrap/css/bootstrap-responsive');
		echo $this->Html->script('../js/pines/includes/bootstrap/js/bootstrap.min');

		//Pines Notify
		echo $this->Html->script('../js/pines/jquery.pnotify.min');
		echo $this->Html->css('../js/pines/jquery.pnotify.default');
		echo $this->Html->css('../js/pines/jquery.pnotify.default.icons');


		//Folha de Estilo para exibir mensagem setada no SetFlash utilizando o Pines Notify
		echo $this->Html->css('../js/pines/setFlashPines');

		//Script para exibir mensagem setada no SetFlash utilizando o Pines Notify
		echo $this->Html->script('../js/pines/setFlashPines');


		/******************************************************
		* Masked Input Plugin 1.3
		* http://digitalbush.com/projects/masked-input-plugin/
		*******************************************************/

		echo $this->Html->script('jquery.maskedinput-1.3.min');


	?>
</head>
<body>

	<?php echo $content_for_layout; ?>
	<?php echo $this->Session->flash(); ?>

</body>
</html>
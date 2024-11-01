<?php
/**
 * Plugin Name: WP Code Editor Plus
 * Description: An admin coded editor (theme editor and plugin editor) systax highlighter with auto-complete for admin editor based on <a href="http://codemirror.net">Code Mirror 2</a>.  This project is an attempt to replicate offline code editing.
 * Author: RingZer0
 * Author URI: http://ringzer0devel.wordpress.com/
 * Version: 3.2.2
 * Requires at least: 2.6
 * Tested up to: 3.1.3
 * Stable tag: 3.2.2
 **/

if(preg_match('#' . basename(__FILE__) . '#', $_SERVER['PHP_SELF'])) { die('You are not allowed to call this page directly.'); }

define('WPCEP_LIBS',plugins_url('/lib',__FILE__));
define('WPCEP_IMGS',plugins_url('/img',__FILE__));

class wp_cm_syntax {
	public function __construct(){
		add_action('admin_init',array(&$this,'admin_init'));
		add_action('admin_head',array(&$this,'admin_head'));
	}
	public function admin_init(){
		wp_enqueue_script('jquery');	// For AJAX code submissions
		wp_enqueue_script('jquery-ui-core');
		wp_enqueue_script('jquery-ui-widget');
		wp_enqueue_script('jquery-ui-mouse');
		wp_enqueue_script('jquery-ui-resizable');
		wp_enqueue_script('jquery-ui-draggable');

		wp_enqueue_script('jquery-autocomplete',WPCEP_LIBS.'/jquery.autocomplete.js',array('jquery'),'1.1');
		wp_enqueue_style('jquery-autocomplete',WPCEP_LIBS.'/jquery.autocomplete.css');
	}
	public function admin_head(){
		if (!$this->is_editor())
			return;

		?>
			<script type="text/javascript">
				window.WPCEP_IMGS = '<?php echo WPCEP_IMGS; ?>';
			</script>
			<link rel="stylesheet" href="<?php echo WPCEP_LIBS; ?>/style.css" />
			<link rel="stylesheet" href="<?php echo WPCEP_LIBS; ?>/codemirror.css" />
			<script type="text/javascript" src="<?php echo WPCEP_LIBS; ?>/codemirror.js"></script>
			<script type="text/javascript" src="<?php echo WPCEP_LIBS; ?>/script.js.php"></script>
			<!--
				WP Code Editor Plus - Commenting out until there is need for separation between themes
				and plugin pages

				<script type="text/javascript" src="<?php echo WPCEP_LIBS; ?>/plugin-editor-script.js"></script>
				<script type="text/javascript" src="<?php echo WPCEP_LIBS; ?>/theme-editor-script.js"></script>
			-->

			<link rel="stylesheet" href="<?php echo WPCEP_LIBS; ?>/css.css" />
			<link rel="stylesheet" href="<?php echo WPCEP_LIBS; ?>/xml.css" />
			<link rel="stylesheet" href="<?php echo WPCEP_LIBS; ?>/javascript.css" />
			<link rel="stylesheet" href="<?php echo WPCEP_LIBS; ?>/clike.css" />
			<script type="text/javascript" src="<?php echo WPCEP_LIBS; ?>/xml.js"></script>
			<script type="text/javascript" src="<?php echo WPCEP_LIBS; ?>/javascript.js"></script>
			<script type="text/javascript" src="<?php echo WPCEP_LIBS; ?>/css.js"></script>
			<script type="text/javascript" src="<?php echo WPCEP_LIBS; ?>/clike.js"></script>
			<script type="text/javascript" src="<?php echo WPCEP_LIBS; ?>/php.js"></script>

			<link rel="stylesheet" href="<?php echo WPCEP_LIBS; ?>/css.css" />
			<script type="text/javascript" src="<?php echo WPCEP_LIBS; ?>/css.js"></script>

			<link rel="stylesheet" href="<?php echo WPCEP_LIBS; ?>/javascript.css" />
			<link rel="stylesheet" href="<?php echo WPCEP_LIBS; ?>/complete.css" />
			<script type="text/javascript" src="<?php echo WPCEP_LIBS; ?>/javascript.js"></script>
			<script type="text/javascript" src="<?php echo WPCEP_LIBS; ?>/complete.js"></script>

		<?php
	}
	private function is_editor(){
		if (!strstr($_SERVER['SCRIPT_NAME'],'editor.php'))
			return false;
		return true;
	}
}

if (is_admin())
	$aeh = new wp_cm_syntax();


?>

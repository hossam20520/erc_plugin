<?php
/**
 * @package     ErcPackage
 * 
 */
namespace Inc\Base;
use \Inc\Base\BaseController;

class Enqueue  extends BaseController{

public function register(){
    add_action('admin_enqueue_scripts',array($this, 'enqueue'));
}


function enqueue(){
    wp_enqueue_script('ErcStyle', $this->plugin_url .'/assets/js/main.js');
    wp_enqueue_style( 'ErcScript', $this->plugin_url .'/assets/css/main.css');
}

}
?>
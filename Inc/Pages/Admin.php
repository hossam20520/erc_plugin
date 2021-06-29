<?php
/**
 * @package     ErcPackage
 * 
 */

namespace Inc\Pages;

use \Inc\Api\SettingsApi;
use \Inc\Base\BaseController;
use \Inc\Api\CallBacks\AdminCallBacks;


class Admin extends BaseController{
  public $settings;
  public $callbacks;
  public $pages = array();
  public $subpages = array();
  


    public function register(){
 
        $this->settings = new SettingsApi();
        $this->callbacks = new AdminCallBacks();
        $this->setPages();
        $this->setSubPages();
        $this->settings->addPages( $this->pages)->withSubPage('Dashboard')->addSubPages($this->subpages)->register();
    }

  
public function setPages(){
    $this->pages = [ 
        [
        'page_title' => 'Erc Plugin',
        'menu_title' => 'Erc',
        'capability' => 'manage_options',
        'menu_slug' => 'Erc_plugin',
        'callback' => array($this->callbacks , 'adminDashboard' ),
        'icon_url' => 'dashicons-screenoptions',
        'position' => 110

        ]
     ];
}

public function setSubPages(){
    $this->subpages =   [ 
        [
    
        'parent_slug' => 'Erc_plugin',
        'page_title' =>  'Add Course',
        'menu_title' =>'Add Course',
        'capability' => 'manage_options',
        'menu_slug' => 'Erc_add_project',
        'callback' => array($this->callbacks , 'projectHomeAdd' ) 
        
        ],
        // [
            
        //     'parent_slug' => 'Erc_plugin',
        //     'page_title' =>  'Custom WIDGET',
        //     'menu_title' =>'WIDGET',
        //     'capability' => 'manage_options',
        //     'menu_slug' => 'Erc_WIDGET',
        //     'callback' => function() { echo '<h1>WIDGET MANGER </h1>'; }
        
        //     ]
    
        ];
}

}
?>

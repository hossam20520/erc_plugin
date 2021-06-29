<?php
/**
 * @package     ErcPackage
 * 
 */

namespace Inc\Api\CallBacks;
use Inc\Base\BaseController;

class AdminCallBacks extends BaseController{

public function adminDashboard(){
    return require_once("$this->plugin_path/Templates/admin.php");
}

public function projectHomeAdd(){
    return require_once("$this->plugin_path/Templates/projects.php");
}

public function projectInfoAdd(){
    return require_once("$this->plugin_path/Templates/project_info.php");
}


}
?>










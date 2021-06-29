<?php
/**
 * @package     ErcPackage
 * 
 */

namespace Inc\Base;


class Deactivate {
    public static function deactive(){
        flush_rewrite_rules( );
    }
}
?>
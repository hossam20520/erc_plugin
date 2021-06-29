<?php
/**
 * @package     ErcPackage
 * 
 */

namespace Inc\Base;


class Activate {
    public static function active(){
        flush_rewrite_rules( );
        // self::init_db_myplugin();
    }












    function init_db_myplugin() {

        // WP Globals
        global $table_prefix, $wpdb;
    
        // Customer Table
        $customerTable = $table_prefix . 'erc_courses';
    
        // Create Customer Table if not exist
        if( $wpdb->get_var( "show tables like '$customerTable'" ) != $customerTable ) {
    
            // Query - Create Table
            $sql = "CREATE TABLE `$customerTable` (";
            $sql .= " `id` int(11) NOT NULL auto_increment PRIMARY KEY, ";
            $sql .= " `id_course` int(11) NOT NULL, ";
            $sql .= " `course_name` varchar(500) NOT NULL, ";
            $sql .= " `days` int(11), ";
            $sql .= ") ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1;";
            // Include Upgrade Script
            require_once( ABSPATH . '/wp-admin/includes/upgrade.php' );
        
            // Create Table
            dbDelta( $sql );
        }
    
    }


}
?>


<?php
/*
Plugin Name: Phoenix Gear plugin
Description: Phoenix Gear Plugin for custom items
Author: Emmanuel Porfirio | Omni Gecko Solutions
Version: 1.0
*/
?>
<?php
//Functions After Initalize
    //add_action('customize_register', 'pho')
//Activations
//Application / Custom Post Type Activation
    function phoenix_gear_plugin_application_activation(){
        flush_rewrite_rules();
    }
    register_activation_hook( __FILE__, 'phoenix_gear_plugin_application_activation' );
//Deactivations
    ///Application / Custom Post Type Deactivation
    function phoenix_gear_plugin_application_de_activation() {
        //unregister_post_type( 'applications' );
        flush_rewrite_rules();
    }
    register_deactivation_hook( __FILE__, 'phoenix_gear_plugin_application_de_activation' );
//Unsinstallation
    //register_uninstall_hook(__FILE__, 'phoenix_gear_plugin_uninstall');
?>

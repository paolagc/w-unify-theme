<?php

add_action('admin_menu', 'social_networks_options_page');
function social_networks_options_page() { 
 	add_options_page('Social Networks', 'Social Networks', 'administrator', __FILE__, 'build_options_page');
}
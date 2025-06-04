<?php
/*
Plugin Name: Halo Admin Settings
Description: Plugin WordPress dengan pengaturan ucapan di dashboard admin.
Version: 1.1
Author: MalikSae.com
*/

// Load file settings
require_once plugin_dir_path(__FILE__) . 'includes/settings-page.php';

// Tampilkan ucapan di dashboard
add_action('admin_notices', function () {
    $message = get_option('halo_admin_message', 'Assalamualaikum, Admin!');
    echo '<div class="notice notice-success is-dismissible">';
    echo '<p><strong>' . esc_html($message) . '</strong></p>';
    echo '</div>';
});

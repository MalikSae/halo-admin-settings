<?php
// Tambah menu ke sidebar admin
add_action('admin_menu', function () {
    add_options_page(
        'Pengaturan Halo Admin',
        'Halo Admin',
        'manage_options',
        'halo-admin-settings',
        'halo_admin_settings_page_html'
    );
});

// HTML halaman pengaturan
function halo_admin_settings_page_html() {
    ?>
    <div class="wrap">
        <h1>Pengaturan Halo Admin</h1>
        <form method="post" action="options.php">
            <?php
            settings_fields('halo_admin_settings');
            do_settings_sections('halo-admin-settings');
            submit_button('Simpan Ucapan');
            ?>
        </form>
    </div>
    <?php
}

// Registrasi pengaturan
add_action('admin_init', function () {
    register_setting('halo_admin_settings', 'halo_admin_message');

    add_settings_section(
        'halo_admin_section',
        'Ucapan',
        null,
        'halo-admin-settings'
    );

    add_settings_field(
        'halo_admin_message',
        'Teks Ucapan',
        'halo_admin_message_field_cb',
        'halo-admin-settings',
        'halo_admin_section'
    );
});

function halo_admin_message_field_cb() {
    $value = get_option('halo_admin_message', 'Assalamualaikum, Admin!');
    echo '<input type="text" name="halo_admin_message" value="' . esc_attr($value) . '" class="regular-text">';
}

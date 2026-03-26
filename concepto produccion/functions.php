<?php
/**
 * Concepto & Producción — functions.php v2.0
 */

define('CP_WA', '573505175312');
define('CP_EMAIL', 'info@conceptoyproduccion.com');

function cp_enqueue_assets() {
    wp_enqueue_style(
        'google-fonts',
        'https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700;800;900&display=swap',
        [], null
    );
    wp_enqueue_style('cp-style', get_stylesheet_uri(), ['google-fonts'], '2.0');
    wp_enqueue_script('cp-scripts', get_template_directory_uri() . '/js/main.js', [], '2.0', true);
    wp_localize_script('cp-scripts', 'cpData', [
        'waNumber' => CP_WA,
        'ajaxUrl'  => admin_url('admin-ajax.php'),
    ]);
}
add_action('wp_enqueue_scripts', 'cp_enqueue_assets');

function cp_theme_setup() {
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    add_theme_support('html5', ['search-form','comment-form','comment-list','gallery','caption']);
    add_theme_support('custom-logo', [
        'height'      => 100,
        'width'       => 300,
        'flex-height' => true,
        'flex-width'  => true,
    ]);
    register_nav_menus(['primary' => __('Menú Principal', 'concepto-produccion')]);
}
add_action('after_setup_theme', 'cp_theme_setup');

// Remove WordPress generator tag (security)
remove_action('wp_head', 'wp_generator');

// Contact form handler
function cp_handle_contact_form() {
    if (!isset($_POST['cp_contact_nonce']) || !wp_verify_nonce($_POST['cp_contact_nonce'], 'cp_contact')) {
        wp_die('Solicitud no válida.');
    }
    $name    = sanitize_text_field($_POST['nombre']   ?? '');
    $email   = sanitize_email($_POST['email']         ?? '');
    $empresa = sanitize_text_field($_POST['empresa']  ?? '');
    $telefono= sanitize_text_field($_POST['telefono'] ?? '');
    $servicio= sanitize_text_field($_POST['servicio'] ?? '');
    $mensaje = sanitize_textarea_field($_POST['mensaje'] ?? '');
    $to      = CP_EMAIL;
    $subject = "✉ Nuevo contacto desde conceptoyproduccion.com — $name";
    $body    = "NUEVO MENSAJE DE CONTACTO\n";
    $body   .= "================================\n\n";
    $body   .= "Nombre:   $name\n";
    $body   .= "Email:    $email\n";
    $body   .= "Empresa:  $empresa\n";
    $body   .= "Teléfono: $telefono\n";
    $body   .= "Servicio: $servicio\n\n";
    $body   .= "Mensaje:\n$mensaje\n\n";
    $body   .= "================================\n";
    $body   .= "Enviado desde: " . home_url('/') . "\n";
    $headers = [
        'Content-Type: text/plain; charset=UTF-8',
        "Reply-To: $name <$email>",
    ];
    wp_mail($to, $subject, $body, $headers);
    wp_redirect(home_url('/?enviado=1#contacto'));
    exit;
}
add_action('admin_post_nopriv_cp_contact', 'cp_handle_contact_form');
add_action('admin_post_cp_contact', 'cp_handle_contact_form');

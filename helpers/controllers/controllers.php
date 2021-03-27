<?php
date_default_timezone_set('America/Lima');
// Hooks admin-post

// add_action( 'admin_post_nopriv_process_form', 'send_mail_data' );
add_action('admin_post_process_form', 'new_shipper_data');

// Funcion callback
function new_shipper_data()
{
    $wpdb = query_getWPDB();
    if ($_POST["action_name"] === "new-shipper") {
        // se va crear un shipper


        $nombreShipper = sanitize_text_field($_POST['nombreShipper']);
        $direccionShipper = sanitize_text_field($_POST['direccionShipper']);
        $direccion2Shipper = sanitize_text_field($_POST['direccion2Shipper']);
        $zipShipper = sanitize_text_field($_POST['zipShipper']);
        $paisShipper = sanitize_text_field($_POST['paisShipper']);
        $siteShipper = sanitize_text_field($_POST['siteShipper']);
        $ubigeoShipper = sanitize_text_field($_POST['ubigeoShipper']);
        $id_user = sanitize_text_field($_POST['id_user']);
        $fecha_actual = date("Y-m-d H:i:s");
        $table = "marken_shipper";
        $data = [
            'descripcion' => $nombreShipper, 'direccion' => $direccionShipper,
            'direccion2' => $direccion2Shipper, 'zip' => intval($zipShipper),
            'id_country' => intval($paisShipper), 'id_ubigeo' => intval($ubigeoShipper),
            'id_marken_site' => intval($siteShipper), 'id_usuario_created' => intval($id_user),
            'created_at' => $fecha_actual
        ];
        $format = array('%s', '%s', '%s', '%d', '%d', '%d', '%d', '%d', '%s');
        if ($wpdb->insert($table, $data, $format)) {
            wp_redirect(home_url("/marken_shipper/") . "?msg=" . 1);
        } else {
            wp_redirect(home_url("/marken_shipper/") . "?msg=");
        }
    } else {
        wp_redirect(home_url("/marken_shipper/") . "?msg=");
    }
}

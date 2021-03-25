<?php

/**
 * Carga un los assets solo cuando esta presente algun shortcode
 * @return void
 */
function aldem_head_js()
{
    if (aldem_verify_exists_shortcodes()) {
        wp_enqueue_style("boostrapCustomMin", "https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css", '', '1.0.0');

        // datatables
        wp_enqueue_style("aldemDatatablesCSS", "https://cdn.datatables.net/1.10.24/css/jquery.dataTables.min.css", '', '1.0.0');
        wp_enqueue_style("aldemDatatablesB4-CSS", "https://cdn.datatables.net/1.10.24/css/dataTables.bootstrap4.min.css", '', '1.0.0');
        wp_enqueue_style("aldemDatatablesB4-Responsive-CSS", "https://cdn.datatables.net/responsive/2.2.7/css/responsive.bootstrap4.min.css", '', '1.0.0');

        wp_enqueue_script("aldemDatatablesJS", "https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js", '', '1.0.0', true);
        wp_enqueue_script("aldemDatatablesB4-JS", "https://cdn.datatables.net/1.10.24/js/dataTables.bootstrap4.min.js", '', '1.0.0', true);
        wp_enqueue_script("aldemDatatablesResposiveJS", "https://cdn.datatables.net/responsive/2.2.7/js/dataTables.responsive.min.js", '', '1.0.0', true);
        wp_enqueue_script("aldemDatatablesB4-ResposiveJS", "https://cdn.datatables.net/responsive/2.2.7/js/responsive.bootstrap4.min.js
    ", '', '1.0.0', true);
        // FIN DE DATATABLES

        // registro css global para todo el tema
        wp_enqueue_style("customAldem", aldem_get_css_url_helper("styles"), '', '1.0.0');
    }
}
// se le agrega al wordpress
add_action('wp_head', 'aldem_head_js');

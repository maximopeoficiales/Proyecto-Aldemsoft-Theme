<?php
// Functions Adicionales creados por MaximoProg
// añado mi css custom
// registro css global para todo el tema
wp_register_style("customAldem", aldem_get_css_url_helper("styles.css"), '', '1.0.0');
// shortcode

// Add Shortcode
function aldem_pfrx_addshorcode()
{
     add_shortcode('aldem_marken_shipper', function () {
          ob_start();
          // include file (contents will get saved in output buffer)
          include(aldem_get_view_directory_helper() . "test.php");
          // save and return the content that has been output
          return  ob_get_clean();
     });
}
add_action('init', 'aldem_pfrx_addshorcode');

// obtiene direccion completa de una view/imagen/js/css
function aldem_get_view_directory_helper(): string
{
     return get_stylesheet_directory() . "/helpers/views/";
}
function aldem_get_image_url_helper($name): string
{
     return get_template_directory_uri() . "/helpers/public/imgs/$name";
}
function aldem_get_js_url_helper($name): string
{
     return get_template_directory_uri() . "/helpers/public/js/$name";
}
function aldem_get_css_url_helper($name): string
{
     return get_template_directory_uri() . "/helpers/public/css/$name";
}

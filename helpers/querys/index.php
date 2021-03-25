<?php
function query_getWPDB(): wpdb
{
    global $wpdb;
    return $wpdb;
}

function query_getShippers()
{
    $wpdb = query_getWPDB();
    $result = $wpdb->get_results("SELECT t1.id as id_shipper,t1.descripcion as nombre,t1.direccion,t2.descripcion as site FROM marken_shipper t1
    INNER JOIN marken_site t2
    WHERE t2.id_cliente_subtipo = 1");
    $wpdb->flush();
    return $result;
}
function query_getUsers()
{
    $wpdb = query_getWPDB();
    $result = $wpdb->get_results("SELECT * FROM wp_users");
    $wpdb->flush();
    return $result;
}

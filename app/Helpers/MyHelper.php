<?php
if (! function_exists('activate')) {
    function activate($ativo)
    {
        $links = Config::get('constants.links');
        $links[$ativo]='active';
        return $links;
    }
}

if (! function_exists('description_decode')) {
    function description_decode($description)
    {
        return html_entity_decode(str_replace(array('\r\n', '\r', '\n'), "<br />", $description)) ;
    }
}

if (! function_exists('order_by_pubDate')) {
    function order_by_pubDate($data){
        usort($data, function ( $a, $b ) {
            return  strtotime($b->pubDate) - strtotime($a->pubDate);
        });
        return $data;
    }
}
 ?>

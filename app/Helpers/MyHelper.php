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

if(! function_exists('mytheme_nl2p')){
    function mytheme_nl2p($string, $only_if_no_html = TRUE) {
        // Replace the input string by default unless we find a reason not to.
        $replace = TRUE;
        // If the only_if_no_html flag is set, then we only want to replace if no HTML is detected
        if ($only_if_no_html) {
            // Create a string of the input string with stripped tags
            $str2 = strip_tags($string);
            // If there is a difference, then HTML must have been in the input string.
            // Since HTML already exists, we do not want to replace new lines with HTML
            if ($str2 != $string) {
                $replace = FALSE;
            }
        }
        // Now return the replacement string if we are supposed to replace it.
        if ($replace) {
            return
            '<p>'
            .preg_replace('#(<br\s*?/?>\s*?){2,}#', '</p>'."\n".'<p>', nl2br($string))
            .'</p>';
        }
        // Otherwise, we just return the input string.
        return $string;
    }
}


 ?>

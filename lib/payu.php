<?php 
function generate_signature( $form, $privateKey, $posId ) {

    ksort($form);

    $content = '';
    foreach ($form as $key => $value) {
        $content .= $value;
    }
    $content .= $privateKey;
 
    $result = "signature=" . md5($content) . ";" .
              "algorithm=MD5" . ";" .
              "sender=" . $posId;
 
    return $result;
}
?>
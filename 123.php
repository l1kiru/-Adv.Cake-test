<?php

mb_internal_encoding("UTF-8");

function reverse($string){
    $rString = mb_str_split($string); 
    $len = mb_strlen($string) - 1; 
    for ($i = $len; $i >= 0; $i--) {
        $current = $len - $i;
        $uppercase_str = mb_strtoupper(mb_substr($string, $current, 1), 'UTF-8'); 
        if(mb_strpos($uppercase_str, mb_substr($string, $current, 1), 0, 'UTF-8') === 0){
            $rString[$current] = mb_strtoupper(mb_substr($string, $i, 1), 'UTF-8'); 
        }
        else{
            $rString[$current] = mb_strtolower(mb_substr($string, $i, 1), 'UTF-8'); 
        }
    }
    return implode($rString);
}

function multipartReverse($string){
    $excludedChars = [',', '.', ';', ':','!','?','@','"',"'",'`','~','#','№','$',
        '%','&','*','(',')','-','_','=','+','<','>','/','\\','|','[',']','{','}',' ','«','»'];
    $parts = [];
    $currentPart = '';
    for ($i = 0; $i < mb_strlen($string); $i++) { 
        $char = mb_substr($string, $i, 1); 
        if (in_array($char, $excludedChars)) {
            if (!empty($currentPart)) {
                $parts[] = $currentPart;
                $currentPart = '';
            }
            $parts[] = $char;
        } else {
            $currentPart .= $char;
        }
    }
    if (!empty($currentPart)) {
        $parts[] = $currentPart;
    }
    for($i = 0; $i < count($parts); $i++){
        if(mb_strlen($parts[$i]) > 1){ 
            $parts[$i] = reverse($parts[$i]);
        }
    }
    return implode($parts);
}

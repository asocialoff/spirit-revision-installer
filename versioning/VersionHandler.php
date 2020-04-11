<?php

/*
 * Deprecated function
 * name: chunk
 * reason: officially replaced by fixed_chunk in alpha v1.5.7
 */

function chunk($str, $n) {
    $ret = array();
    $i = null;
    $len = null;
    for ($i = 0, $len = count(array($str));$i < $len;$i += $n) {
        array_push($ret, substr($str, $i, $n));
    }
    return $ret;
}

// TODO: fix version number when > 1000 ( ex. 10.0.0 )
function fixed_chunk( $str )
{
    return wordwrap( $str , 1 , '.' , true );
}

if( basename(__FILE__, '.php') == "VersionHandler" )
{
    //echo ("Version template: " . fixed_chunk('785'));
}

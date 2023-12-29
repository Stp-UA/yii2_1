<?php

function truncate($str, $len)
{
    if (strlen($str) < $len + 1) {
        return $str;
    }
    $ret = substr($str, 0, $len);
    return substr($ret, 0, strrpos($ret, ' ')) . ' ...';
}
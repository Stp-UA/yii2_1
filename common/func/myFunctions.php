<?php

function truncate(string $str, int $len): string
{
    if (strlen($str) < $len + 1) {
        return $str;
    }
    $ret = substr($str, 0, $len);
    return substr($ret, 0, strrpos($ret, ' ')) . ' ...';
}
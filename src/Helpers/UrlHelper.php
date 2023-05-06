<?php

namespace Versonix\Interview\Helpers;

class UrlHelper
{
    public static function parseUrl(string $url)
    {
        $uriCount = strlen($url);
        $isParam = strpos($url, "?");

        if($url[0] == "/" && $uriCount > 1){
            $url = substr($url, 1, $uriCount);
        }

        if($isParam !== false){
            $url = substr($url, 0, $isParam - 1);
            if ($url === '') {
                $url = '/';
            }
        }

        return $url;
    }
}

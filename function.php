<?php
//returns true, if domain is availible, false if not
function isDomainAvailible($url)
{
//check, if a valid url is provided
    if(!filter_var($url, FILTER_VALIDATE_URL))
    {
        return false;
    }

//initialize curl
    $curlInit = curl_init($url);
    curl_setopt($curlInit,CURLOPT_CONNECTTIMEOUT,10);
    curl_setopt($curlInit,CURLOPT_HEADER,true);
    curl_setopt($curlInit,CURLOPT_NOBODY,true);
    curl_setopt($curlInit,CURLOPT_RETURNTRANSFER,true);

//get answer
    $response = curl_exec($curlInit);
    curl_close($curlInit);
    if ($response) return true;
    return false;
}

function Visit($url){
    $agent = "Mozilla/4.0 (compatible; MSIE 5.01; Windows NT 5.0)";$ch=curl_init();
    curl_setopt ($ch, CURLOPT_URL,$url );
    curl_setopt($ch, CURLOPT_USERAGENT, $agent);
    curl_setopt ($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt ($ch,CURLOPT_VERBOSE,false);
    curl_setopt($ch, CURLOPT_TIMEOUT, 5);
    curl_setopt($ch,CURLOPT_SSL_VERIFYPEER, FALSE);
    curl_setopt($ch,CURLOPT_SSLVERSION,3);
    curl_setopt($ch,CURLOPT_SSL_VERIFYHOST, FALSE);
    $page=curl_exec($ch);
    //echo curl_error($ch);
    $httpcode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    curl_close($ch);
    if($httpcode>=200 && $httpcode<400) return true;
    else return false;
}

function websitecheck($url){
    ini_set("default_socket_timeout", "05");
    set_time_limit(5);
    $f = fopen( $url , "r");
    $r = fread($f, 1000);
    fclose($f);
    return strlen($r);
}

?>

<div class="container">
    <h2>Method 1</h2>

<?php

function url_test($url) {
    $timeout = 10;
    $ch = curl_init();
    curl_setopt ($ch, CURLOPT_URL, $url);
    curl_setopt ($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt ($ch, CURLOPT_TIMEOUT, $timeout);
    $http_respond = curl_exec($ch);
    $http_respond = trim(strip_tags($http_respond));
    $http_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    if (($http_code == "200") || ($http_code == "302")) {
        return true;
    } else {
        // return $http_code;, possible too
        return false;
    }
    curl_close($ch);
}

$website = "philgo.com";
if(!url_test($website)) { echo "<div class='.down'>". $website ." is down!</div>"; }
else { echo "<div class='online'>". $website ." functions correctly.</div>"; }
?>
</div>





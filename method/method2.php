<div class="container">
    <h2>Method 2</h2>
    <?php
    function isSiteAvailable($url)
    {
        //check, if a valid url is provided
        if (!filter_var($url, FILTER_VALIDATE_URL)) {
            return 'URL provided wasnt valid';
        }

        //make the connection with curl
        $cl = curl_init($url);
        curl_setopt($cl,CURLOPT_CONNECTTIMEOUT,10);
        curl_setopt($cl,CURLOPT_HEADER,true);
        curl_setopt($cl,CURLOPT_NOBODY,true);
        curl_setopt($cl,CURLOPT_RETURNTRANSFER,true);

        //get response
        $response = curl_exec($cl);

        curl_close($cl);

        if ($response) return '<div class="online">Site seems to be up and running!</div>';

        return '<div class="down">Oops nothing found, the site is either offline or the domain doesnt exist</div>';
    }

    // check if site exists / is up
        $response = isSiteAvailable("http://philgo.com");
        echo $response;
    ?>
</div>
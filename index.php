<?php
include "function.php";
?>
<html>
<head>
    <style>
        .container {
            border: 1px solid #000000;
            background: rgba(0, 0, 0, 0.08);
            text-align: center;
        }
        .down {
            font-size: 3rem;
            color: red;
        }
        .online {
            font-size: 3rem;
            color: green;
        }

    </style>
    <?php
    header("Cache-Control: no-store, no-cache, must-revalidate"); // HTTP/1.1
    header("Cache-Control: post-check=0, pre-check=0", false);
    header("Expires: Sat, 26 Jul 1997 05:00:00 GMT"); // Date in the past
    header("Pragma: no-cache"); // HTTP/1.0
    header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
    ?>
</head>
<body>
<iframe src="http://www.philgo.com" style="width: 100%"></iframe>
<div class="container">
    <img src="logo.png">
    <h1>Website Check</h1>
    <?php
    $mysite = 'http://www.philgo.com';
    if ( (isDomainAvailible( $mysite )) && (Visit( $mysite )) && (websitecheck( $mysite ) > 1) ){
        echo "<div class='online'>$mysite Up and running!</div>";
    }
    else
    {
        echo "<div class='down'> Woops, $mysite nothing found there.</div>";
        echo '<embed src="alertsound.mp3" hidden="hidden" autostart="true"></embed>';

    }
    ?>
</div>

<script>
    setTimeout(function() {
        location.reload();
    }, 30000);
</script>
</body>
</html>
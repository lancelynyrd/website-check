<div class="container">
    <h2>Method 5</h2>
<?php
$host = 'philgo.com';
if($socket =@ fsockopen($host, 80, $errno, $errstr, 30)) {
    echo '<div class="online">online!</div>';
    fclose($socket);
} else {
    echo '<div class="down">offline.</div>';
}
?>
</div>

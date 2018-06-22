<?php

header("Content-Type: text/plain");

$img = file_get_contents("../img/42.png");
$base64_img = base64_encode($img);

echo "<html><body>
Hello Zaz<br />
<img src='data:image/png;base64,".$base64_img."'>
</body></html>"

?>
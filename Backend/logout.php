<?php
session_start();
session_destroy();
echo "Session terminated";
http_response_code(200);
?>

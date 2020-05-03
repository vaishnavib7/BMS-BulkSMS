<?php
ob_start();
require 'initapp.php';
session_destroy();
session_start();
conf('login.php','s','Logged Out Successfully. You can Login Again');

?>
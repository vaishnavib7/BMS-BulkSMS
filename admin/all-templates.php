<?php
require 'initapp.php';
$self='all-groups.php';
permission::permitted($self);
require ("views/$theme/all-templates.tpl.php");
?>
<?php
require 'initapp.php';
$self='all-templates.php';

$cmd=_get('_tName');
$cquery=ORM::for_table('templates')->where('tempName', $cmd);
$cquery->delete_many();
conf('all-templates.php','s','Deleted Successfully');

?>
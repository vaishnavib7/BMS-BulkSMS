<?php
require 'initapp.php';
$self='all-groups.php';

$cmd=_get('_grpid');
$cquery=ORM::for_table('accgroups')->find_one($cmd);
$cquery->delete();
conf('all-groups.php','s','Deleted Successfully');


?>
<?php
require 'initapp.php';
$self='add-new-templates.php';

if (isset($_POST['submit'])){

    $tempName=_post('tempName');
    $message=_post('message');

if ($tempName==''){
    conf($self,'e','Template Name is Empty');
}
if ($message==''){
    conf($self,'e','Template is Empty');
}

    if($tempName!=''){
        $d=ORM::for_table('templates')->where('tempName',$tempName)->find_one();
        if($d){
            conf($self,'e','This Template Name Already Exist');
        }
    }

    if($tempName!=''){
        $d=ORM::for_table('templates')->where('message',$message)->find_one();
        if($d){
            conf($self,'e','This Template Message Already Exist');
        }
    }


    $clientgrp= ORM::for_table('templates')->create();
    $clientgrp->tempName=$tempName;
    $clientgrp->message=$message;
    $clientgrp->save();
    

        conf("all-templates.php",'s','Template Added Successfully');
    }


else{
          conf($self,'e','Please Enter Template Information Again');

}


?>
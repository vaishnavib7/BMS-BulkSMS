<?php

$xheader='
<link rel="stylesheet" type="text/css" href="views/bms/assets/js/fuelux/css/fuelux.css" />
<link rel="stylesheet" type="text/css" href="views/bms/assets/js/fuelux/css/fuelux-responsive.min.css" />
<link rel="stylesheet" type="text/css" href="views/bms/assets/css/pygments.css" />
<link rel="stylesheet" type="text/css" href="views/bms/assets/js/bootstrap.wysihtml5/src/bootstrap-wysihtml5.css" />
';
$xfooter='
    <script src="views/bms/assets/js/jquery.parsley/parsley.js" type="text/javascript" ></script>
    <script src="views/bms/assets/js/fuelux/loader.min.js" type="text/javascript" ></script>
    <script src="views/bms/assets/js/modernizr.js" type="text/javascript" ></script>
      <script type="text/javascript">
    $(document).ready(function(){
        App.init();
      App.wizard();

    });



$(document).ready(function(){
    var $remaining = $(\'#remaining\'),
        $messages = $remaining.next();

    $(\'#message\').keyup(function(){
        var chars = this.value.length,
            messages = Math.ceil(chars / 160),
            remaining = messages * 160 - (chars % (messages * 160) || messages * 160);

        $remaining.text(remaining + \' characters\');
        $messages.text(messages + \' message(s)\');
    });
});

  </script>
';
 require ('theme/header.tpl.php');

 
?>

<script type="text/javascript">

    function generalTemplate(elemID) {
        var elem = document.getElementById(elemID);
        var text="EXHIBITION NAME\nat PLACE\non DATE(S)\nStall Price: PRICE\n\nFor More Details: \nVisit: WEBSITE\nCall To: NUMBER\n";
        elem.innerHTML ="";
        elem.innerHTML += text;
    }

    function comingUp(elemID) {
        var elem = document.getElementById(elemID);
        var text="EVENTS are coming up soon\n\nPlan your exhibition dates\nPost your Events on WEBSITE \nor call NUMBER\n";
        elem.innerHTML ="";
        elem.innerHTML += text;
    }

    function showHide(elemID,msg) {
        var elem = document.getElementById(elemID);
        var text = msg;

        elem.innerHTML ="";
        elem.innerHTML += text;
    }
    
</script>

    <div class="container-fluid" id="pcont">
        <div class="page-head">
            <h2><?php echo $Lan['Send_Bulk_SMS']; ?></h2>
            <ol class="breadcrumb">
                <li><a href="index.php"><?php echo $Lan['Home']; ?></a></li>
                <li class="active"><?php echo $Lan['Send_Bulk_SMS']; ?></li>
            </ol>
        </div>
        <div class="cl-mcont">
            <?php notify(); ?>
            <div class="row wizard-row">
                <div class="col-md-12 fuelux">
                    <div class="block-wizard">
                        <div id="wizard1" class="wizard wizard-ux">
                            <ul class="steps">
                                <li data-target="#step1" class="active"><?php echo $Lan['Choose_Clients']; ?><span class="chevron"></span></li>
                                <li data-target="#step2"><?php echo $Lan['Write_SMS']; ?><span class="chevron"></span></li>
                                <li data-target="#step3"><?php echo $Lan['Confirm_And_Send']; ?><span class="chevron"></span></li>
                            </ul>
                            <!--<div class="actions">
                                <button type="button" class="btn btn-xs btn-prev btn-default"> <i class="icon-arrow-left"></i><?php echo $Lan['Prev']; ?></button>
                                <button type="button" class="btn btn-xs btn-next btn-default" data-last="Finish"><?php echo $Lan['Next']; ?><i class="icon-arrow-right"></i></button>
                            </div>-->
                        </div>
                        <div class="step-content">
                            <form class="form-horizontal group-border-dashed" action="bulk-sms-send.php" method="post" data-parsley-namespace="data-parsley-" data-parsley-validate novalidate accept-charset="UTF-8">
                                <div class="step-pane active" id="step1">
                                    <div class="form-group no-padding">
                                        <div class="col-sm-7">
                                            <h3 class="hthin"><?php echo $Lan['Client_Group']; ?></h3>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-3 control-label"><?php echo $Lan['Select_Client_Groups']; ?></label>
                                        <div class="col-sm-6">
                                            <select class="select2" multiple name="clgroups[]">

                                                <?php
                                                 $clgroup=ORM::for_table('accgroups')->find_many();
                                                if ($clgroup->count()> 0) {
                                                foreach($clgroup as $value) {
                                                    $id = $value['id'];
                                                    $name = $value['groupname'];
                                                    ?>
                                                    <option value="<?php echo $id; ?>"><?php echo $name; ?></option>
                                                <?php
                                                }
                                                }
                                                ?>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-sm-3 control-label"><?php echo $Lan['Select_SMS_Gateway']; ?></label>
                                        <div class="col-sm-6">
                                            <select class="select2" name="gateway">
                                                <?php
                                                $sms_gat=ORM::for_table('sms_gateway')->where('status','Active')->find_many();
                                                foreach($sms_gat as $sgn){
                                                    $smgtid=$sgn['id'];
                                                    $smgname=$sgn['name'];
                                                    ?>
                                                    <option value="<?php echo $smgname; ?>"><?php echo $smgname; ?></option>
                                                    <?php
                                                }
                                                ?>


                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="col-sm-offset-2 col-sm-10">
                                            <button class="btn btn-default"><?php echo $Lan['Cancel']; ?></button>
                                            <button data-wizard="#wizard1" class="btn btn-primary wizard-next"><?php echo $Lan['Next_Step']; ?> <i class="fa fa-caret-right"></i></button>
                                        </div>
                                    </div>
                                </div>
                                <div class="step-pane" id="step2">
                                    <div class="form-group no-padding">
                                        <div class="col-sm-7">
                                            <h3 class="hthin"><?php echo $Lan['Write_SMS']; ?></h3>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="esubject" class="col-sm-3 control-label"><?php echo $Lan['Sender_ID']; ?></label>
                                        <div class="col-sm-7">
                                            <input type="text" required  class="form-control"  placeholder="<?php echo $Lan['Sender_ID']; ?>" name="sender_id" id="sender_id">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-3 control-label"><?php echo $Lan['Message']; ?></label>
                                        <div class="col-sm-7">
                                            <textarea style="height:150px;" class="form-control" id="message" name="message"></textarea>
                                            <p><strong><span id="remaining"></span>
                                                    <span id="messages"></span></strong></p>
                                        </div>
                                    </div>
                                    
                                    <div class="form-group">
                                        <label class="col-sm-3 control-label">General Message Templates</label>
                                        <div class="col-sm-7">
                                            <button type="button" style='margin-right:20px' onclick="generalTemplate('message')"> General </button>
                                            <button type="button" style='margin-right:20px' onclick="comingUp('message')"> Coming Up Soon </button>  
                                        </div>
                                    </div>

                                    <div class="form-group">
                                    <label class="col-sm-3 control-label">Custom Message Templates</label>
                                        <div class="col-sm-6">
                                            <select class="select2" name="criteria_title" id="chosen_a" data-placeholder="Select Template" onchange="showHide('message',this.value)" >
                                            
                                            <option value="">Select an Option</option>
                                                <?php
                                                 $clgroup=ORM::for_table('templates')->find_many();
                                                if ($clgroup->count()> 0) {
                                                foreach($clgroup as $value) {
                                                    $tempName = $value['tempName'];
                                                    $msg = $value['message'];
                                                    ?>
                                                    <option value="<?php echo $msg; ?>"><?php echo $msg; ?></option>

                                                <?php
                                                }
                                                }
                                                ?>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="col-sm-12">
                                            <button data-wizard="#wizard1" class="btn btn-default wizard-previous"><i class="fa fa-caret-left"></i> <?php echo $Lan['Previous']; ?></button>
                                            <button data-wizard="#wizard1" class="btn btn-primary wizard-next"><?php echo $Lan['Next_Step']; ?> <i class="fa fa-caret-right"></i></button>
                                        </div>
                                    </div>
                                </div>
                                <div class="step-pane" id="step3">
                                    <div class="form-group no-padding">
                                        <div class="col-sm-7">
                                            <h3 class="hthin"><?php echo $Lan['Confirm_And_Send']; ?></h3>
                                        </div>
                                    </div>
                                    <div class="form-group">

                                        <button type="submit" class="btn btn-info btn-block " name="submit"><i class="fa fa-mail-forward"></i> <?php echo $Lan['Confirm_And_Send']; ?></button>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-sm-12">
                                            <button data-wizard="#wizard1" class="btn btn-default wizard-previous"><i class="fa fa-caret-left"></i> <?php echo $Lan['Previous']; ?></button>

                                        </div>
                                    </div>
                                </div>
                            </form> 
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
<?php  require ('theme/bulk-email-footer.tpl.php'); ?>
<?php

$xheader='
<link rel="stylesheet" type="text/css" href="views/bms/assets/js/redactor-js/redactor/redactor.css" />
';
$xfooter='
    <script src="views/bms/assets/js/jquery.parsley/parsley.js" type="text/javascript" ></script>
    <script src="views/bms/assets/js/fuelux/loader.min.js" type="text/javascript" ></script>
    <script src="views/bms/assets/js/modernizr.js" type="text/javascript" ></script>
    <script src="views/bms/assets/js/redactor-js/redactor/redactor.js" type="text/javascript" ></script>

      <script type="text/javascript">
    $(document).ready(function(){
    App.init();
          $(\'#content\').redactor();
        });
  </script>
';
require ('theme/header.tpl.php');
?>

    <div class="container-fluid" id="pcont">
        <div class="page-head">
            <h2><?php echo $Lan['Create_New_Ticket']; ?></h2>
            <ol class="breadcrumb">
                <li><a href="index.php"><?php echo $Lan['Home']; ?></a></li>
                <li><a href="all-support-tickets.php"><?php echo $Lan['All_Support_Tickets']; ?></a></li>
                <li class="active"><?php echo $Lan['Create_New_Ticket']; ?></li>
            </ol>
        </div>
        <div class="cl-mcont">
            <?php notify(); ?>

            <div class="row">


                <div class="col-sm-12 col-md-12">
                    <div class="block-flat">
                        <div class="header">
                            <h3><?php echo $Lan['Create_New_Ticket']; ?></h3>
                        </div>
                        <div class="content">


                            <form class="form-horizontal group-border-dashed" role="form"  parsley-validate novalidate action="create-support-ticket.php" method="post">

                                <div class="form-group">
                                    <label class="col-sm-3 control-label"><?php echo $Lan['Ticket_For_Client']; ?></label>
                                    <div class="col-sm-6">
                                        <select class="select2" name="client">
                                            <?php
                                            $cquery=ORM::for_table('accounts')->find_one($cid);
                                            $name=$cquery['name'].' '.$cquery['lname'];
                                                ?>
                                                <option value="<?php echo $cid; ?>"><?php echo $name; ?></option>

                                        </select>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="subject" class="col-sm-3 control-label"><?php echo $Lan['Subject']; ?></label>
                                    <div class="col-sm-8">
                                        <input type="text" required  class="form-control" id="subject" placeholder="<?php echo $Lan['Subject']; ?>" name="subject">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="subject" class="col-sm-3 control-label"><?php echo $Lan['Message']; ?></label>
                                    <div class="col-sm-8">
                                        <textarea rows="4" class="form-control" id="content" name="message"></textarea>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-sm-3 control-label"><?php echo $Lan['Department']; ?></label>
                                    <div class="col-sm-6">
                                        <select class="select2" name="department">
                                            <?php
                                            $squery=ORM::for_table('supportdepartments')->where('show','Yes')->find_many();
                                            foreach ($squery as  $value) {
                                                ?>
                                                <option value="<?php echo $value['id'] ?>"><?php echo $value['name']; ?></option>
                                            <?php
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>


                                <div class="form-group">
                                    <div class="col-sm-offset-3 col-sm-9">
                                        <button type="submit" class="btn btn-primary" name="submit" ><?php echo $Lan['Create_Ticket']; ?></button>
                                        <button class="btn btn-default" type="reset"><?php echo $Lan['Cancel']; ?></button>
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
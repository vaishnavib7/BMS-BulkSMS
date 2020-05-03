<?php
$xfooter='
    <script src="views/bms/assets/js/jquery.parsley/parsley.js" type="text/javascript" ></script>
';
 require ('theme/header.tpl.php');
?>

    <div class="container-fluid" id="pcont">
        <div class="page-head">
            <h2><?php echo "Add new Template"; ?></h2>
            <ol class="breadcrumb">
                <li><a href="index.php"><?php echo $Lan['Home']; ?></a></li>
                <li><a href="all-groups.php"><?php echo "All  Templates"; ?></a></li>
                <li class="active"><?php echo "Add new Template"; ?></li>
            </ol>
        </div>
        <div class="cl-mcont">

            <?php notify(); ?>

            <div class="row">


                <div class="col-sm-12 col-md-12">
                    <div class="block-flat">
                        <div class="header">
                            <h3><?php echo "Add new Template"; ?></h3>
                        </div>
                        <div class="content">


                            <form class="form-horizontal group-border-dashed" role="form"  parsley-validate novalidate action="add-templates.php" method="post">
                                <div class="form-group">
                                    <label for="tempName" class="col-sm-3 control-label"><?php echo "Template Name"; ?></label>
                                    <div class="col-sm-7">
                                        <input type="text" required  class="form-control" id="tempName" placeholder="<?php echo "Name"; ?>" name="tempName">
                                    </div>
                                    
                                    <label for="message" class="col-sm-3 control-label"><?php echo "Message"; ?></label>
                                    <div class="col-sm-7">
                                        <input type="text" required  class="form-control" id="message" placeholder="<?php echo "Template"; ?>" name="message">
                                    </div>
                                </div>


                                <div class="form-group">
                                    <div class="col-sm-offset-3 col-sm-9">
                                        <button type="submit" class="btn btn-primary" name="submit" ><?php echo "Add Template"; ?></button>
                                        <button class="btn btn-default"><?php echo $Lan['Cancel']; ?></button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>



        </div>
    </div>

<?php  require ('theme/footer.tpl.php'); ?>
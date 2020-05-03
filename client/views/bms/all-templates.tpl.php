<?php

$xheader="
<link rel=\"stylesheet\" href=\"views/bms/assets/js/jquery.niftymodals/css/component.css\" />
";

$xfooter='
<script src="views/bms/assets/js/jquery.datatables/jquery.datatables.min.js" type="text/javascript"></script>
    <script src="views/bms/assets/js/jquery.datatables/bootstrap-adapter/js/datatables.js" type="text/javascript"></script>
    <script src="views/bms/assets/js/jquery.nestable/jquery.nestable.js" type="text/javascript"></script>
    <script src="views/bms/assets/js/jquery.niftymodals/js/jquery.modalEffects.js" type="text/javascript"></script>
    <script type="text/javascript">
      $(document).ready(function(){

        App.dataTables();
         $(\'.md-trigger\').modalEffects();
      $(\'.dataTables_filter input\').addClass(\'form-control\').attr(\'placeholder\',\'Search\');
      $(\'.dataTables_length select\').addClass(\'form-control\');


      });

</script>
';
 require ('theme/header.tpl.php');
?>

    <div class="container-fluid" id="pcont">
        <div class="page-head">
            <h2><?php echo "All Templates"; ?></h2>
            <ol class="breadcrumb">
                <li><a href="index.php"><?php echo $Lan['Home']; ?></a></li>
                <li class="active"><?php echo "All Templates"; ?></li>
            </ol>
        </div>
        <div class="cl-mcont">
            <?php notify(); ?>
            <div class="row">
                <div class="col-md-12">
                    <div class="block-flat">
                        <div class="header">
                            <h3><?php echo "All Templates"; ?></h3>
                        </div>
                        <div class="content">

                            <div class="table-responsive">
                                <table class="table table-bordered" id="datatable" >
                                    <thead>
                                    <tr>
                                        <th><?php echo $Lan['SL']; ?></th>
                                        <th><?php echo "Name"; ?></th>
                                        <th><?php echo "Message"; ?></th>
                                        <th class="center-align"><?php echo $Lan['Actions']; ?></th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                    $clgroup = ORM::for_table('templates')->order_by_asc('tempName')->find_many();
                                    $serial='0';
                                    if($clgroup->count()>0){
                                    foreach($clgroup as $value){
                                        $serial++;
                                        $tempName=$value['tempName'];
                                        $message=$value['message'];
                                    ?>

                                    <tr class="gradeA">
                                        <td><?php echo $serial; ?></td>
                                        <td><?php echo $value['tempName']; ?></td>
                                        <td><?php echo $message; ?></td>
                                        <td class="center-align">
                                            <a href="delete-template.php?_tName=<?php echo $tempName; ?>" class="btn btn-danger btn-xs" ><i class="fa fa-trash-o"></i><?php echo $Lan['Delete']; ?> </a>
                                        </td>
                                       
                                    </tr>
                                        <?php
                                    }
                                    }else{
                                        ?>
                                        <td><?php echo "No Message Templates"; ?></td>
                                        <td></td>
                                        <td></td>
                                        <td  class="center-align"></td>

                                        <?php
                                    }
                                        ?>
                                    </tbody>
                                </table>


                            </div>

            
                        </div>
                    </div>
                </div>
            </div>



        </div>
    </div>

<?php  require ('theme/footer.tpl.php'); ?>
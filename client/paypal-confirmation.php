<?php
require 'initapp.php';
$self = 'paypal-confirmation-message.php';
$cmd = _get('_status');


if ($cmd=='success'){
conf($self,'s','Payment Paid Successfully. Please wait for Admin Approval');
}

elseif ($cmd=='cancel'){

conf($self,'e','Cancelled the Payment. To make the payment please go to invoice manage page again');
}
elseif($cmd=='listener'){
    
conf($self,'e','Please check Paypal Notification Message.');
    
}
else {
conf($self,'e','There is some unknown problem. Please pay again with paypal');
    
}

?>

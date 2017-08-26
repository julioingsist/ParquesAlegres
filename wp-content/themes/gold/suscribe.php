<?php
 
    // Put your MailChimp API and List ID hehe
    $api_key = '7062a554cd8dc11051b1ee3d3f08d51e-us10';
    $list_id = 'a9182ed31a';
 
    // Let's start by including the MailChimp API wrapper
    include('./inc/MailChimp.php');
    // Then call/use the class
    use \DrewM\MailChimp\MailChimp;
    $MailChimp = new MailChimp($api_key);
 
    // Submit subscriber data to MailChimp
    // For parameters doc, refer to: http://developer.mailchimp.com/documentation/mailchimp/reference/lists/members/
    // For wrapper's doc, visit: https://github.com/drewm/mailchimp-api
    $result = $MailChimp->post("lists/$list_id/members", [
                            'email_address' => $_POST["email"],
                            'FNAME' => $_POST["fname"],
                            'LNAME' => $_POST["lname"],
                            'status'        => 'subscribed',
                        ]);
    // 'merge_fields'  => ['FNAME'=>$_POST["fname"], 'LNAME'=>$_POST["lname"]],
    if ($MailChimp->success()) {
        // Success message
        echo "<h4>Gracias, hemos recibido tus datos, nos pondremos en contacto contigo.</h4>";
    } else {
        // Display error
        echo $MailChimp->getLastError();
        // Alternatively you can use a generic error message like:
        // echo "<h4>Please try again.</h4>";
    }
?>
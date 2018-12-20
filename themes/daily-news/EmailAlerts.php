<?php
    /**
     * Template Name: EmailAlerts
    */

    $email = $_POST['email'];
    $name = $_POST['username'];
    $origin = $_POST['origin'];

    //$message = "User from " . wp_get_referer() . " just signed up for email alerts. \n\n<br/>\n\n Name: " . $name . "Yay! " . $origin;
    //wp_mail( 'dror@tipranks.com', $email . " Just Subscribed to email alerts in SmarterAnalyst! From " . $origin, $message);


	$data = [
	    'email'     => $_POST['email'],
	    'status'    => 'subscribed',
	    'firstname' => $_POST['username'],
	    'lastname'  => $_POST['origin']
	];

	function syncMailchimp($data) {
	    $apiKey = '5c8e2b4e6b61b785085a339dde8d44b3-us13';
	    $listId = '7daa62a7ea';

	    $memberId = md5(strtolower($data['email']));
	    $dataCenter = substr($apiKey,strpos($apiKey,'-')+1);
	    $url = 'https://' . $dataCenter . '.api.mailchimp.com/3.0/lists/' . $listId . '/members/' . $memberId;

	    $json = json_encode([
	        'email_address' => $data['email'],
	        'status'        => $data['status'] // "subscribed","unsubscribed","cleaned","pending"
	    ]);

	    $ch = curl_init($url);

	    curl_setopt($ch, CURLOPT_USERPWD, 'user:' . $apiKey);
	    curl_setopt($ch, CURLOPT_HTTPHEADER, ['Content-Type: application/json']);
	    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	    curl_setopt($ch, CURLOPT_TIMEOUT, 10);
	    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'PUT');
	    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
	    curl_setopt($ch, CURLOPT_POSTFIELDS, $json);                                                                                                                 

	    $result = curl_exec($ch);
	    $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
	    curl_close($ch);

	    return $httpCode .  $result;
	}

	$res = syncMailchimp($data);
?>

<h1 title="<? echo $res;?>"> Thank You!</h1>
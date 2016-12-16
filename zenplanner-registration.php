<?php

// Config
$homeUrl = '';
$token = ''; // Get this token seeing the source code of iframe
$sourceId = ''; // Get this token seeing the source code of iframe
$accountName = ''; 
$programId = '';
 
// Protect URL, accept only POST request
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // do post

    // Import simple_html_dom
    include_once('simple_html_dom.php');

    // Build a http resquest
    $request = array(
        'http' => array(
            'method' => 'POST',
            'content' => http_build_query(array(
                '__xsToken' => $token,
                'AddProspect' => 'true',
                'FirstName' => $_POST['FirstName'],
                'LastName' => $_POST['LastName'],
                'PrimaryEmail' => $_POST['PrimaryEmail'],
                'PrimaryPhone' => $_POST['PrimaryPhone'],
                'sourceId' => $sourceId
            )),
        )
    );

    $context = stream_context_create($request);

    $html = file_get_html('https://'. $accountName .'.sites.zenplanner.com/prospect.cfm?programId='. $programId, false, $context);

} else  {
    // If it's a GET request, redirect 
    header ('Location: '.$homeUrl);
}
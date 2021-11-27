<?php
use Kreait\Firebase\Factory;
use Kreait\Firebase\Messaging\CloudMessage;

// $factory = (new Factory)->withServiceAccount('pushnotif-332914-5bfa4f6c5b75.json');
$factory = (new Factory)->withServiceAccount('egovtest-3c158-d23be64eff7a.json');
/*
Insert notification via POST request
endpoint : index.php?action=api/insert-notif
body : 
    contents  -> text
    sent_at   -> datetime
    url       -> url
    user_id   -> integer
    user_name -> text
return :
    status -> success
    data   -> record data
*/

$conn  = conn();
$db    = new Database($conn);

$messaging = $factory->createMessaging();
$message = CloudMessage::fromArray([
    'topic' => 'bc_notif',
    'notification' => [
        'title'=>'Notifikasi Baru',
        'body' =>$_POST['contents']
    ],
    'data' => [
        'url' => $_POST['url']
    ]
]);
    
$messaging->send($message);

$notif = $db->insert('notifications',$_POST);

echo json_encode([
    'status' => 'success',
    'data'   => $notif
]);
die();
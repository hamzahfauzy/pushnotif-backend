<?php
use Kreait\Firebase\Factory;
use Kreait\Firebase\Messaging\CloudMessage;

$factory = (new Factory)->withServiceAccount('egov-labura-firebase-adminsdk-u8e1i-488c86f842.json');
/*
Insert notification via POST request
endpoint : index.php?action=api/insert-broadcast
body : 
    contents  -> text
    sent_at   -> datetime
    url       -> url
return :
    status -> success
    data   -> record data
*/

$conn  = conn();
$db    = new Database($conn);

$_POST['contents'] = preg_replace('"\b(https?://\S+)"', '<a href="$1" target="_blank">$1</a>', $_POST['contents']);
$_POST['contents'] = preg_replace('"\b(http?://\S+)"', '<a href="$1" target="_blank">$1</a>', $_POST['contents']);

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
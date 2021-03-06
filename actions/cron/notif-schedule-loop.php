<?php

use Kreait\Firebase\Factory;
use Kreait\Firebase\Messaging\CloudMessage;

$factory = (new Factory)->withServiceAccount('public/egov-labura-firebase-adminsdk-u8e1i-488c86f842.json');

$conn  = conn();
$db    = new Database($conn);

$query = "SELECT * FROM notifications WHERE active_status = 1 AND is_loop IS NOT NULL AND SUBSTRING(sent_at,12,5) = '".date('H:i')."'";
$db->query = $query;
$notifications = $db->exec('all');

foreach($notifications as $notif)
{
    $messaging = $factory->createMessaging();
    $message = CloudMessage::fromArray([
        'topic' => 'bc_notif',
        'notification' => [
            'title'=>'Notifikasi Baru',
            'body' =>$notif->contents
        ],
        'data' => [
            'url' => $notif->url
        ]
    ]);

    $message = $messaging->send($message);
}
<?php

$conn  = conn();
$db    = new Database($conn);
$notification = $db->single('notifications',[
    'id' => $_GET['id']
]);
$receivers = $db->all('notification_receivers',[
    'notification_id' => $_GET['id']
]);

return [
    'notification' => $notification,
    'receivers' => $receivers
];
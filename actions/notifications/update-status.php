<?php

$conn  = conn();
$db    = new Database($conn);

$db->update('notifications',[
    'active_status' => $_POST['active_status']
],[
    'id' => $_POST['id']
]);

echo '{"status":"success"}';
die();
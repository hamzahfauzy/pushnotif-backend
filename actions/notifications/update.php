<?php

$conn  = conn();
$db    = new Database($conn);
$notification = $db->single('notifications',[
    'id' => $_GET['id']
]);

if(request() == 'POST')
{
    $notif = $_POST['notifications'];

    $notif['contents'] = preg_replace('"\b(https?://\S+)"', '<a href="$1" target="_blank">$1</a>', $notif['contents']);
    $notif['contents'] = preg_replace('"\b(http?://\S+)"', '<a href="$1" target="_blank">$1</a>', $notif['contents']);

    if(!isset($notif['is_loop']))
        $notif['is_loop'] = 'NULL';

    $notif = $db->update('notifications',$notif,[
        'id' => $_GET['id']
    ]);
    if($notif)
    {
        set_flash_msg(['success'=>'Edit Notifikasi Berhasil']);
        header('location:index.php');
    }
}

return [
    'notification' => $notification,
];
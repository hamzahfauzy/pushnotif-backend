<?php

$conn  = conn();
$db    = new Database($conn);
$db->delete('notifications',[
    'id' => $_GET['id']
]);

set_flash_msg(['success'=>'Notifikasi Berhasil Dihapus']);
header('location:index.php');
die();
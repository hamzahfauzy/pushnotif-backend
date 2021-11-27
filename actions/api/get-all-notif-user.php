<?php

$conn  = conn();
$db    = new Database($conn);

$query = "SELECT * FROM notifications WHERE user_id=$_GET[user_id] or user_id is NULL ORDER BY sent_at DESC";
$db->query = $query;
$notifications = $db->exec('all');
foreach($notifications as $notif)
{
    $tanggal = date('Y-m-d',strtotime($notif->sent_at));
    $waktu = date('H:i',strtotime($notif->sent_at));
    $notif->tanggal = tgl_indo($tanggal) .' '.$waktu;
}
echo json_encode($notifications);
die();
<?php

$type = [
    'employee' => 'Pegawai',
    'broadcast' => 'Broadcast',
    'schedule' => 'Terjadwal'
];
$msg   = get_flash_msg('success');

return [
    'type' => isset($_GET['type']) ? $type[$_GET['type']] : '',
    'msg'  => $msg
];
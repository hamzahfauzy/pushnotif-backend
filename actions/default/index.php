<?php
$conn  = conn();
$db    = new Database($conn);
$msg   = get_flash_msg('success');
$notifications  = $db->all('notifications',[],[
    'id' => 'DESC'
]);

return [
    'notifications' => $notifications,
    'msg'   => $msg
];
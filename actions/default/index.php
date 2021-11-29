<?php
$conn  = conn();
$db    = new Database($conn);
$msg   = get_flash_msg('success');
$notifications  = $db->all('notifications',[],[
    'sent_at' => 'DESC'
]);

return [
    'notifications' => $notifications,
    'msg'   => $msg
];
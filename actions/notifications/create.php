<?php
use Kreait\Firebase\Factory;
use Kreait\Firebase\Messaging\CloudMessage;

try {
    //code...
$factory = (new Factory)->withServiceAccount('egov-labura-firebase-adminsdk-u8e1i-488c86f842.json');

if(request() == 'POST')
{
    $conn  = conn();
    $db    = new Database($conn);
    $notif = $_POST['notifications'];
    $notif['contents'] = preg_replace('"\b(https?://\S+)"', '<a href="$1" target="_blank">$1</a>', $notif['contents']);
    $notif['contents'] = preg_replace('"\b(http?://\S+)"', '<a href="$1" target="_blank">$1</a>', $notif['contents']);
    // $receivers = $_POST['receivers'];
    // $pegawais  = [];
    $messaging = $factory->createMessaging();
    $message = CloudMessage::fromArray([
        'topic' => 'bc_notif',
        'notification' => [
            'title'=>'Notifikasi Baru',
            'body' =>$notif['contents']
        ],
        'data' => [
            'url' => $notif['url']
        ]
    ]);
    
    $message = $messaging->send($message);

    $notif = $db->insert('notifications',$notif);
    if($notif)
    {
        set_flash_msg(['success'=>'Buat Notifikasi Berhasil']);
        header('location:index.php');
    }
}

$opds = simple_curl('layanan.labura.go.id/api/getSkpd','POST','user_key=64240-d0ede73ccaf823f30d586a5ff9a35fa5&pass_key=b546a6dfc4');
$opds = json_decode($opds['content']);

return [
    'opds' => $opds
];

} catch (\Throwable $th) {
    throw $th;
}
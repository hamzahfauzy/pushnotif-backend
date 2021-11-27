<?php
use Kreait\Firebase\Factory;
use Kreait\Firebase\Messaging\CloudMessage;

$factory = (new Factory)->withServiceAccount('pushnotif-332914-0af7675355ad.json');

if(request() == 'POST')
{
    $conn  = conn();
    $db    = new Database($conn);
    $notif = $_POST['notifications'];
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
    
    $messaging->send($message);

    $notif = $db->insert('notifications',$notif);
    if($notif)
    {
        set_flash_msg(['success'=>'Buat Notifikasi Berhasil']);
        header('location:index.php');
    }
    // if($notif)
    // {
    //     if(empty($receivers))
    //     {
    //         $pns = simple_curl('layanan.labura.go.id/api/getPegawai','POST','user_key=64240-d0ede73ccaf823f30d586a5ff9a35fa5&pass_key=b546a6dfc4&jenis_pegawai=pegawai');
    //         $tks = simple_curl('layanan.labura.go.id/api/getPegawai','POST','user_key=64240-d0ede73ccaf823f30d586a5ff9a35fa5&pass_key=b546a6dfc4&jenis_pegawai=tks');

    //         $pns = json_decode($pns['content']);
    //         $tks = json_decode($tks['content']);
    //         $pegawais = array_merge($pegawais,$pns,$tks);
    //     }
    //     else
    //     {
    //         foreach($receivers as $receiver)
    //         {
    //             $pns = simple_curl('layanan.labura.go.id/api/getPegawai','POST','user_key=64240-d0ede73ccaf823f30d586a5ff9a35fa5&pass_key=b546a6dfc4&jenis_pegawai=pegawai&skpd_id='.$receiver);
    //             $tks = simple_curl('layanan.labura.go.id/api/getPegawai','POST','user_key=64240-d0ede73ccaf823f30d586a5ff9a35fa5&pass_key=b546a6dfc4&jenis_pegawai=tks&skpd_id='.$receiver);

    //             $pns = json_decode($pns['content']);
    //             $tks = json_decode($tks['content']);
    //             $pegawais = array_merge($pegawais,$pns,$tks);
    //         }
    //     }

    //     foreach($pegawais as $pegawai)
    //     {
    //         $db->insert('notification_receivers',[
    //             'notification_id' => $notif->id,
    //             'user_id'         => $pegawai->user_id,
    //             'user_name'       => str_replace("'","",$pegawai->nama),
    //             'status'          => 'in queue',
    //         ]);
    //     }

    // }
}

$opds = simple_curl('layanan.labura.go.id/api/getSkpd','POST','user_key=64240-d0ede73ccaf823f30d586a5ff9a35fa5&pass_key=b546a6dfc4');
$opds = json_decode($opds['content']);

return [
    'opds' => $opds
];
<?php

return [
    'table_name' => 'notification_receivers',
    'fields' => [
        'id' => 'AUTO_INCREMENT',
        'notification_id' => 'INT',
        'user_id' => 'INT',
        'user_name' => 'VARCHAR',
        'status' => 'VARCHAR',
        'received_at' => 'DATETIME'
    ],
    'relations' => [
        'notification_id' => [
            'to' => 'notifications.id',
            'onDelete' => 'cascade',
            'onUpdate' => 'no action'
        ]
    ]
];
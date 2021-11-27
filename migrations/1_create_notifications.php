<?php

return [
    'table_name' => 'notifications',
    'fields' => [
        'id' => 'AUTO_INCREMENT',
        'contents' => 'TEXT',
        'sent_at' => 'DATETIME',
        'url' => 'VARCHAR'
    ]
];
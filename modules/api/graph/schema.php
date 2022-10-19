<?php

return [
    'query' => [
        'user' => '\app\modules\api\graph\queries\UsersQuery',
        'blog' => '\app\modules\api\graph\queries\BlogsQuery'
    ],
    'mutation' => [
        'user' => '\app\modules\api\graph\mutations\UsersMutation',
        'blog' => '\app\modules\api\graph\mutations\BlogsMutation'
    ],
    // you do not need to set the types if your query contains interfaces or fragments
    // the key must same as your defined class
    'types' => [
        'User' => '\app\modules\api\graph\types\UsersType',
        'Blog' => '\app\modules\api\graph\types\BlogsType'
    ],
];
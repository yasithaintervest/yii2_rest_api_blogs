<?php

return [
    'query' => [
        'user' => '\app\modules\api\graph\queries\UserQuery',
        'blog' => '\app\modules\api\graph\queries\BlogQuery'
    ],
    'mutation' => [
        'user' => '\app\modules\api\graph\mutations\UserMutation',
        'blog' => '\app\modules\api\graph\mutations\BlogMutation'
    ],
    // you do not need to set the types if your query contains interfaces or fragments
    // the key must same as your defined class
    'types' => [
        'User' => '\app\modules\api\graph\types\UserType',
        'Blog' => '\app\modules\api\graph\types\BlogType'
    ],
];
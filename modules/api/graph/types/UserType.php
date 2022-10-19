<?php

namespace app\modules\api\graph\types;

use app\models\User;
use yii\graphql\GraphQL;
use yii\graphql\base\GraphQLType;
use GraphQL\Type\Definition\Type;

class UserType extends GraphQLType
{
    protected $attributes = [
        'name' => 'user',
        'description' => 'user is user'
    ];

    public function fields()
    {
        $result = [
            'id' => ['type' => Type::id()],
            'username' => [
                'type' => Type::string(),
            ],
            'fieldWithError' => [
                'type' => Type::string(),
                'resolve' => function () {
                    throw new \Exception("This is error field");
                }
            ]
        ];
        return $result;
    }
}

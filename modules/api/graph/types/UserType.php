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
            //'username' => Types::username(),
            // 'email2' => Types::email(),
            // 'photo' => [
            //     'type' => GraphQL::type(ImageType::class),
            //     'description' => 'User photo URL',
            //     'args' => [
            //         'size' => Type::nonNull(GraphQL::type(ImageSizeEnumType::class)),
            //     ]
            // ],
            'username' => [
                'type' => Type::string(),
            ],
            // 'lastName' => [
            //     'type' => Type::string(),
            // ],
            // 'lastStoryPosted' => GraphQL::type(StoryType::class),
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

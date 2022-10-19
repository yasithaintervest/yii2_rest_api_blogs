<?php

namespace app\modules\api\graph\types;

use app\models\User;
use yii\graphql\GraphQL;
use yii\graphql\base\GraphQLType;
use GraphQL\Type\Definition\Type;

class BlogType extends GraphQLType
{
    protected $attributes = [
        'name' => 'Blog',
        'description' => 'Blog class'
    ];

    public function fields()
    {

        return array_merge([

            'id' => [
				'type' => Type::int(),
				'description' => 'The id of blog'
			],
            'title' => [
				'type' => Type::string(),
				'description' => 'The subtitle of blog'
			],
            'body' => [
				'type' => Type::string(),
				'description' => 'The body of blog'
			],
        ]);

    }
}

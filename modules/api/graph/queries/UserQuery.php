<?php

namespace app\modules\api\graph\queries;

use Yii;
use yii\graphql\GraphQL;
use GraphQL\Type\Definition\Type;
use yii\graphql\base\GraphQLQuery;

class UserQuery extends GraphQLQuery
{
    public function type() {
        return GraphQL::type(UserType::class);
    }

    public function args() {
        return [
            'id'=>[
                'id' => Type::id(),
                'username' => Type::string(),
            ],
        ];
    }



}
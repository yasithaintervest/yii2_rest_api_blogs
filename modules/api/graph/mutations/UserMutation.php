<?php

namespace app\modules\api\graph\mutations;

use yii\graphql\GraphQL;
use yii\graphql\base\GraphQLMutation;
use app\modules\api\graph\types\UserType;


class UserMutation extends GraphQLMutation
{

	public function type()
	{
		return GraphQL::type(UserType::class);
	}

	public function args()
	{

		return UserType::fields();
	}
}

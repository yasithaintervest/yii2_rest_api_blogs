<?php

namespace app\modules\api\graph\mutations;

use Yii;
use yii\graphql\GraphQL;
use GraphQL\Type\Definition\Type;
use yii\graphql\base\GraphQLMutation;
use app\modules\api\graph\types\UserType;


class UserMutation extends GraphQLMutation {

	public function type() {
		return GraphQL::type(UserType::class);
	}

	public function args() {
		$fields = UserType::fields();
		return $fields;
	}
}

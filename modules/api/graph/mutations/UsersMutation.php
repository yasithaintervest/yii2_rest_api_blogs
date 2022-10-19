<?php

namespace api\modules\v0_0_1\graph\mutations;

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

		// $fields['assign_users'] = [
		// 	'type' => Type::string(),
		// 	'description' => 'Uses a comma seperated list of user ids to assign to a business'
		// ];

		// $fields['remove_users'] = [
		// 	'type' => Type::string(),
		// 	'description' => 'Uses a comma seperated list of user ids to remove from a business'
		// ];

		$fields['first_user_id'] = [
			'type' => Type::int(),
			'description' => 'For creation, works like assign_users but single ID'
		];

		// $fields['first_user_is_owner'] = [
		// 	'type' => Type::int(),
		// 	'description' => 'For creation, is the first user an owner?'
		// ];

		// $fields['updated_indexes'] = [
		// 	'type' => Type::string(),
		// 	'description' => 'which image IDs have been changed?'
		// ];

		return $fields;
	}
}

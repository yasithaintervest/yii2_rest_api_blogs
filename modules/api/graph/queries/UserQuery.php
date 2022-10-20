<?php

namespace app\modules\api\graph\queries;

use app\models\User;
use app\modules\api\graph\types\UserType;
use Yii;
use yii\graphql\GraphQL;
use GraphQL\Type\Definition\Type;
use yii\graphql\base\GraphQLQuery;

class UserQuery extends BaseQuery
{

    public $modelName = 'app\models\User';

	protected $attributes = [
		'name' => 'user',
		'description' => 'Returns all user\'s matching the provided arguments'
	];

	public function type() {
		return Type::listOf(GraphQL::type(UserType::class));
	}

	public function args() {
		$args = array_merge(parent::getCommonArgs(), [
			'limit',
			'query'
		]);

		$fields = UserType::fields();

		$fields['ids'] = [
			'type' => Type::listOf(Type::int()),
			'description' => 'An array of Auto-incrementing integer unique to a record. Generated automatically on create'
		];

		$fields['query'] = [
			'type' => Type::string(),
			'description' => 'A string used to search titles'
		];

		$fields['limit'] = [
			'type' => Type::int(),
			'description' => 'Limit the number of results'
		];

		return array_filter($fields, function ($key) use ($args) {
			return in_array($key, $args);
		}, ARRAY_FILTER_USE_KEY);
	}
}


   




<?php

namespace app\modules\api\graph\queries;
use app\modules\api\graph\types\BlogType;
use yii\graphql\GraphQL;
use GraphQL\Type\Definition\Type;

class BlogQuery extends BaseQuery
{

	public $modelName = 'app\models\Blog';

	protected $attributes = [
		'name' => 'Blogs',
		'description' => 'Returns all blog\'s matching the provided arguments'
	];

	public function type() {
		return Type::listOf(GraphQL::type(BlogType::class));
	}

	public function args() {
		$args = array_merge($this->getCommonArgs(), [
			'limit',
			'query',
			'type'
		]);

		$fields = BlogType::fields();

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
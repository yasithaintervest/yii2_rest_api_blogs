<?php

namespace app\modules\api\graph\queries;

use Yii;
use yii\graphql\GraphQL;
use GraphQL\Type\Definition\Type;
use yii\graphql\base\GraphQLQuery;
use GraphQL\Type\Definition\ResolveInfo;
use yii\web\HttpException;

class BaseQuery extends GraphQLQuery {

	public function getCommonArgs() {
		return [
			'id',
			'created_at',
			'updated_at',
			
		];
	}

	public function getClassName() {
		$class_name = get_class($this);
		$namespace = explode('\\', $class_name);
		$class_name = $namespace;
		$class_name = array_pop($class_name);
		$class_name = str_replace('Query', '', $class_name);

		$namespace = '\\' . implode('\\', [
			$namespace[0],
			$namespace[1],
			$namespace[2],
			'models',
			$class_name
		]);

		return $namespace;
	}

	public function resolve($value, $args, $context, ResolveInfo $info) {
		$name = 'view';

		$resolveMethod = 'resolve' . ucfirst($name);
		if (method_exists($this, $resolveMethod)) {
			$resolver = array($this, $resolveMethod);
			$args = func_get_args();

			if (isset($args[1]['ids'])) {
				$args[1]['id'] = $args[1]['ids'];
				unset($args[1]['ids']);
			}

			return call_user_func($resolver, ...$args);
		} else {
			return $this->performSearch($value, $args, $context, $info);
		}

		return null;
	}

	public function performSearch($value, $args, $context, ResolveInfo $info) {
		if (isset($this->modelName)) {
			$model_name = $this->modelName;
		} else {
			$model_name = $this->getClassName();
		}

		if (isset($args['ids'])) {
			$args['id'] = $args['ids'];
			unset($args['ids']);
		}

		$term = '';
		if (isset($args['query'])) {
			$term = strtolower($args['query']);
			unset($args['query']);
		}

		$limit = null;
		if (isset($args['limit'])) {
			$limit = $args['limit'];
			unset($args['limit']);
		}

		$orderBy = null;
		if (isset($args['orderBy'])) {
			$orderBy = $args['orderBy'];
			unset($args['orderBy']);
		}

		$query = $model_name::find();
		// $query->where (['active' => 1]);
		$query->andWhere($args);

		if ($orderBy != null) {
			$query->orderBy($orderBy);
		}

		if ($limit != null) {
			$query->limit($limit);
		}

		foreach (explode(" ", $term) as $word) {
			$query->andFilterWhere(['like', 'LOWER(title)', $word]);
		}

		return $query->all();
	}
}

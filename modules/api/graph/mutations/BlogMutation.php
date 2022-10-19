<?php

namespace app\modules\api\graph\mutations;

use app\modules\api\graph\types\BlogType;
use Yii;
use yii\graphql\GraphQL;
use GraphQL\Type\Definition\Type;
use yii\graphql\base\GraphQLMutation;



class BlogMutation extends GraphQLMutation {

	public function type() {
		return GraphQL::type(BlogType::class);
	}

	public function args() {
		return BlogType::fields();
		 
	}
}

<?php

namespace app\modules\api\controllers;



class GraphqlController extends ApiController
{
	public function actions()
	{
		return [
			'index' => [
				'class' => 'yii\graphql\GraphQLAction'
			]
		];
	}
}

<?php

namespace app\modules\api\controllers;



class GraphqlController extends ApiController {
	public $modelClass = 'app\models\User' ;
	public $hosts = ['*'];

	function actions() {
		return [
			'index'=>[
                'class'=>'yii\graphql\GraphQLAction',
				'checkAccess'=> [$this,'checkAccess'],
            ],
		];
	}

	

	protected function verbs() {
		return [
			'index' => ['POST', 'PUT', 'DELETE'],
		];
	}

	public function actionError() {
		return 'error';
	}
}

<?php

namespace app\modules\api\controllers;


use app\modules\api\resources\BlogResource;
use yii\filters\auth\HttpBearerAuth;

use yii\web\Response;
use yii\helpers\ArrayHelper;

class BlogController extends ApiController
{

    public $modelClass = BlogResource::class;
    public $serializer = [
        'class' => 'yii\rest\Serializer',
        'collectionEnvelope' => 'blogs',
    ];


    public function actions()
    {

        return ArrayHelper::merge(parent::actions(), [
            'index' => [
                'pagination' => [
                    'pageSize' => 10,
                ],
                'sort' => [
                    'defaultOrder' => [
                        'created_at' => SORT_DESC,
                    ],
                ],
            ],
        ]);
    }
}

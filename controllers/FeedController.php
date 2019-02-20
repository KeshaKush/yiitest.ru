<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace app\controllers;

use Yii;
use app\models\Feed;
use yii\web\Controller;
use yii\data\Pagination;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;

/**
 * Description of FeedController
 *
 * @author User
 */
class FeedController extends Controller {
    
    public function behaviors(){
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout'],
                'rules' => [
                    [
                        'allow' => true,
                        'actions' => ['login', 'signup'],
                        'roles' => ['?'],
                    ],
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ]
        ];
    }
    
    public function actions(){
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }
    
    public function actionIndex(){
        $query = Feed::find()->orderBy(['id' => SORT_DESC]);
        
        $countQuery = clone $query;
        
        $pages = new Pagination([
            'totalCount' => $countQuery->count(),
            'pageSize' => 2,
            'pageSizeParam' => false,
            'forcePageParam' => false
        ]);
        
        $data = $query->offset($pages->offset)
            ->limit($pages->limit)
            ->all();
        
        return $this->render('feed', [
            'data' => $data,
            'pages' => $pages,
        ]);
    }
    
    public function actionShow() {
        $id = Yii::$app->request->get('id');
        $data = Feed::findOne($id);
        return $this->render('single', compact('data'));
    }
    
}

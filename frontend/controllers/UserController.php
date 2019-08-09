<?php

namespace frontend\controllers;

use common\services\UserService;
use Yii;
use common\essences\User;
use common\essences\UserSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * UserController implements the CRUD actions for User model.
 */
class UserController extends Controller
{

    private $userService;


    function __construct($id, $module, UserService $userService,$config = [])
    {
        $this->userService = $userService;
        parent::__construct($id, $module, $config);
    }

    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all User models.
     * @return mixed
     */


    /**
     * Displays a single User model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        $user = $this->userService->userRepository->getUserById($id);
        $lastVisitedTime = $this->userService->getNormalLastVisitedTime($user);
        $createdAtTime = $this->userService->getCreatedAtTime($user);
        return $this->render('view', [
            'model' => $user,
            'last_visit' => $lastVisitedTime,
            'created_at_time'=> $createdAtTime,
        ]);
    }

}

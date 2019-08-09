<?php

namespace frontend\controllers;

use common\services\CommentService;
use Yii;
use common\essences\Person;
use common\essences\PersonSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use common\services\PersonService;

/**
 * PersonController implements the CRUD actions for Person model.
 */
class PersonController extends Controller
{

    public $personService;
    public $commentService;

    public function __construct($id, $module, PersonService $personService, CommentService $commentService, $config = [])
    {
        $this->personService = $personService;
        $this->commentService = $commentService;
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


    public function actionActor($id)
    {
        $actor = $this->personService->personRepository->getActorById($id);
        $comments = $this->commentService->comm->getCommentsForPerson($id);

        return $this->render('view', [
            'model' => $actor,
            'role' => 'actor',
            'comments' => $comments,
        ]);
    }

    public function actionProducer ($id)
    {
        $producer = $this->personService->personRepository->getProducerById($id);
        $comments = $this->commentService->comm->getCommentsForPerson($id);

        return $this->render('view', [
            'model' => $producer,
            'role' => 'producer',
            'comments' => $comments,
        ]);
    }



}

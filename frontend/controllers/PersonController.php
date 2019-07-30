<?php

namespace frontend\controllers;

use Yii;
use common\essences\Person;
use common\essences\PersonSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use common\services\PersonService;
use common\repositories\PersonRepository;

/**
 * PersonController implements the CRUD actions for Person model.
 */
class PersonController extends Controller
{

    public $personService;

    public function __construct($id, $module, PersonService $personService, $config = [])
    {
        $this->personService = $personService;
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

        return $this->render('view', [
            'model' => $actor,
            'role' => 'actor',
        ]);
    }

    public function actionProducer ($id)
    {
        $producer = $this->personService->personRepository->getProducerById($id);

        return $this->render('view', [
            'model' => $producer,
            'role' => 'producer',
        ]);
    }



}

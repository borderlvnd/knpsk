<?php

namespace frontend\controllers;

use Yii;
use common\essences\Genre;
use common\essences\GenreSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use common\services\GenreService;

/**
 * GenreController implements the CRUD actions for Genre model.
 */
class GenreController extends Controller
{

    public $genreService;


    public function __construct($id, $module, GenreService $genreService, $config = [])
    {
        $this->genreService = $genreService;
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
     * Lists all Genre models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new GenreSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Genre model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        $genre = $this->genreService->genreRepository->getGenreById($id);
        return $this->render('view', [
            'model' => $genre,
        ]);
    }
}

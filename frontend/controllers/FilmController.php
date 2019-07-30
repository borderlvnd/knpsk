<?php

namespace frontend\controllers;

use Yii;
use common\essences\Film;
use common\essences\FilmSearch;
use yii\data\Pagination;
use common\services\FilmService;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * FilmController implements the CRUD actions for Film model.
 */
class FilmController extends Controller
{
    /**
     * {@inheritdoc}
     */

    private $filmService;

    public function __construct($id, $module, FilmService $filmService, $config = [])
    {
        $this->filmService = $filmService;
        parent::__construct($id, $module, $config);
    }

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
     * Lists all Film models.
     * @return mixed
     */
    public function actionIndex()
    {
        $query = Film::find();
        $count = $query->count();
        $pagination = new Pagination(['totalCount' => $count, 'pageSize' => 5]);
        $films = $query->offset($pagination->offset)
            ->limit($pagination->limit)
            ->all();

        return $this->render('index', [
            'films' => $films,
            'pagination' => $pagination,
        ]);
}

    /**
     * Displays a single Film model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        $film = $this->filmService->FilmRepository->getById($id);

        return $this->render('view', [
            'model' => $film,
        ]);
    }

}

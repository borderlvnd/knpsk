<?php

namespace frontend\controllers;

use common\essences\FilmGenre;
use common\essences\UserFilms;
use common\services\CommentService;
use common\services\FilmPersonService;
use common\services\UserFilmsService;
use common\services\PersonService;
use Yii;
use common\essences\Film;
use common\essences\FilmSearch;
use yii\data\Pagination;
use common\services\FilmService;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use common\services\FilmGenreService;


/**
 * FilmController implements the CRUD actions for Film model.
 */
class FilmController extends Controller
{
    /**
     * {@inheritdoc}
     */

    private $filmService;
    private $filmGenreService;
    private $filmPersonService;
    private $personService;
    private $userFilmService;
    private $commentService;

    public function __construct(
        $id,
        $module,
        FilmService $filmService,
        FilmGenreService $filmGenreService,
        FilmPersonService $filmPersonService,
        PersonService $personService,
        UserFilmsService $userFilmService,
        CommentService $commentService,
        $config = []
    ) {
        $this->filmService = $filmService;
        $this->filmGenreService = $filmGenreService;
        $this->filmPersonService = $filmPersonService;
        $this->personService = $personService;
        $this->userFilmService = $userFilmService;
        $this->commentService = $commentService;
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
        $q = $this->filmService->film->getAllFilms();
        $count = $q->count();
        $pagination = new Pagination(['totalCount' => $count, 'pageSize' => 5]);
        $films = $q->offset($pagination->offset)
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
        $film = $this->filmService->film->getById($id);
        $rating = $this->filmService->getAvg($id);
        $film_ids = $this->filmGenreService->findFilmsLikeThis($id);
        $films = $this->filmService->film->getAllByIds(['id' => $film_ids]);
        $peoples_film = $this->filmPersonService->filmPersonRepository->getPersonsIds($id);
        $producer = $this->personService->personRepository->getProducerById($peoples_film);
        $actors = $this->personService->personRepository->getAllActorsByFilmId($peoples_film);
        $comments = $this->commentService->comm->getMainCommentsForFilm($id);


        return $this->render('view', [
            'model' => $film,
            'rating' => $rating,
            'films' => $films,
            'producer' => $producer,
            'actors' => $actors,
            'comments' => $comments,
        ]);
    }

    /**
     * Add film to favorites.
     * @param integer $id
     * @return mixed
     **/

    public function actionFavorites($id)
    {
        $user_id = Yii::$app->user->id;
        $this->userFilmService->addToFavorites($id, $user_id);
        return $this->redirect(['view', 'id' => $id]);
    }

}

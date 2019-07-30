<?php

namespace frontend\controllers;

use Yii;
use common\essences\Comment;
use common\essences\CommentSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use common\repositories\CommentRepository;
use common\services\CommentService;
use yii\filters\AccessControl;
use yii\helpers\Url;

/**
 * CommentController implements the CRUD actions for Comment model.
 */
class CommentController extends Controller
{
    private $commentRepository;
    private $commentService;

    public function __construct(
        $id,
        $module,
        CommentRepository $commentRepository,
        CommentService $commentService,
        $config = []
    ) {
        parent::__construct($id, $module, $config);
        $this->commentRepository = $commentRepository;
        $this->commentService = $commentService;
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
     * Lists all Comment models.
     * @return mixed
     */
    public function actionCreate()
    {
        $comment = new Comment();
        $post = Yii::$app->request->post();
        if ($comment->load($post) && $comment->save()) {
            Yii::$app->session->setFlash('success', 'Your comment was added');
        }
        return $this->redirect(Yii::$app->request->referrer);
    }


    /**
     * Displays a single Comment model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
//        /* @var $comment Comment */
//        $comment = $this->commentRepository->getById($id);
//        if ($comment->createdBy == Yii::$app->user->id) {
//            $this->commentService->del($comment);
//        }
//        return $this->redirect(Yii::$app->request->referrer);
    }

    public function actionUpdate($id)
    {
        /* @var $comment Comment*/
        $comment = $this->commentRepository->getById($id);
        $post = Yii::$app->request->post();
        if ($comment->load($post) && $comment->save()) {
            $this->commentRepository->save($comment);
        }
        return $this->redirect(Yii::$app->request->referrer);
    }
}

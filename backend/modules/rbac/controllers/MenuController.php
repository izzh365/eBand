<?php

namespace backend\modules\rbac\controllers;

use backend\modules\rbac\models\Route;
use Yii;
use backend\modules\rbac\models\Menu;
use backend\modules\rbac\models\searchs\Menu as MenuSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use backend\modules\rbac\components\Helper;

/**
 * MenuController implements the CRUD actions for Menu model.
 *
 * @author Misbahul D Munir <misbahuldmunir@gmail.com>
 * @since 1.0
 */
class MenuController extends Controller
{

    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                ],
            ],
        ];
    }

    /**
     * Lists all Menu models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new MenuSearch;
        $dataProvider = $searchModel->search(Yii::$app->request->getQueryParams());

        return $this->render('index', [
                'dataProvider' => $dataProvider,
                'searchModel' => $searchModel,
        ]);
    }

    /**
     * Displays a single Menu model.
     * @param  integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
                'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Menu model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Menu;

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            Helper::invalidate();
            return $this->redirect(['view', 'id' => $model->id]);
        } else {

            //菜单列表
            $menus = Menu::find()->select(['id','name'])->asArray()->all();
            $menusLists = [];
            $menusLists[0]='空';
            foreach ($menus as $item){
                $menusLists[$item['id']] = $item['name'];
            }
            //路由列表
            $routeModel = new Route();
            $routes = $routeModel->getRoutes();
            $routesLists = [];

            foreach ($routes['assigned'] as $item){
                $routesLists[0] = '空';
                if(strripos($item,'*') ===false){
                    $routesLists[$item] = $item;
                }

            }

            return $this->render('create', [
                    'model' => $model,
                    'menus'=>$menusLists,
                    'routes' =>$routesLists,
            ]);
        }
    }

    /**
     * Updates an existing Menu model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param  integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->menuParent) {
            $model->parent_name = $model->menuParent->name;
        }



//        echo "<pre>";
//        var_dump(Yii::$app->request->post());
//        echo '++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++';
//        $model->load(Yii::$app->request->post());
//
//        var_dump($model);
//        exit;


        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            Helper::invalidate();
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            //菜单列表
            $menus = Menu::find()->select(['id','name'])->where(['!=','id',$id])->asArray()->all();
            $menusLists = [];
            $menusLists[0]='空';
            foreach ($menus as $item){
                $menusLists[$item['id']] = $item['name'];
            }
            //路由列表
            $routeModel = new Route();
            $routes = $routeModel->getRoutes();
            $routesLists = [];
            foreach ($routes['assigned'] as $item){
                $routesLists[0] = '空';
                if(strripos($item,'*') ===false){
                    $routesLists[$item] = $item;
                }
            }

            return $this->render('update', [
                    'model' => $model,
                    'menus'=>$menusLists,
                    'routes' =>$routesLists,
            ]);
        }
    }

    /**
     * Deletes an existing Menu model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param  integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();
        Helper::invalidate();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Menu model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param  integer $id
     * @return Menu the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Menu::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}

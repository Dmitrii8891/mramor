<?php
namespace common\components;
use common\models\SeoDataSearch;
use yii\base\Widget;


class SeoData extends Widget
{
    public $item_id;
    public $model;

    public function init(){

        parent::init();

    }


    public function run()
    {
        if($this->item_id && $this->model){
            $widgetData = $this->findModel();
        } else {
            $widgetData= new \common\models\SeoData();
        }


        return $this->render('seoData',['model'=>$widgetData]);
    }

    protected function findModel()
    {
        if (($model = \common\models\SeoData::findOne(['item_id'=>$this->item_id, 'model'=>$this->model])) !== null) {
            return $model;
        } else {
            return new \common\models\SeoData();
        }
    }
}
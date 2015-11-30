<?php
namespace common\components;
use common\models\SiteSearchForm;
use yii\base\Widget;


class SiteSearch extends Widget
{
    public function init(){

        parent::init();

    }


    public function run()
    {
        $model = new SiteSearchForm();
        return $this->render('siteSearch', array('model'=>$model));
    }
}
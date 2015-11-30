<?php
namespace frontend\components;
use frontend\models\Page;
use yii\base\Widget;
use yii\helpers\Url;

class StaticInfo extends Widget
{
    public  $page;

    public function init(){
        parent::init();

    }


    public function run()
    {
        $model = new Page();
        $page = $model->getPageTranslit($this->page);

        return $page->body;
    }

}
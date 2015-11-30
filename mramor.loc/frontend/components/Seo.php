<?php
namespace frontend\components;
use common\models\SeoDataSearch;
use common\models\SeoData;
use yii\base\Widget;
use yii\helpers\Url;

class Seo extends Widget
{
    private $url;
    private $source;
    public  $row;

    public function init(){
        $this->url   = Url::canonical();
        $this->source = 'seo';
        parent::init();

    }


    public function run()
    {
        $widgetData = $this->findModel();

        return $widgetData->{$this->row};
    }

    protected function findModel()
    {
        if (($model = SeoData::findOne(['url'=>$this->url, 'model'=>$this->source])) !== null) {
            return $model;
        } else {
            return new SeoDataSearch();
        }
    }
}
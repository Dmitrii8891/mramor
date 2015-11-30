<?php
namespace app\components;
use Yii;
use yii\base\Widget;
use yii\helpers\Html;
use yii\helpers\Url;

use frontend\models\Filters;

class FiltersWidget extends Widget{
	public $message;
    public $data;
    public $filter;
	
	public function init(){
		parent::init();
	}

    public function getAllFilters(){
        return [
            ['filter'=>'filter_one','translit'=>'assortment'],
            ['filter'=>'filter_two', 'translit'=>'color'],
            ['filter'=>'filter_three','translit'=>'country']
        ];
    }


    private function getCorrectPost(){
        $post = Yii::$app->request->get('filter');

        if(!empty($post)){

            $post = explode('/',$post);

            $res = array();
            foreach($post as $row){

                $sub_str = explode('=',$row);
                $res[$sub_str[0]] = $sub_str[1];
            }

             return $post = $res;

        } else {

            return $post = array();
        }
    }

    public function filters_param($id){

        $post = $this->getCorrectPost();

        if(isset($post[$this->filter]) && !empty($post[$this->filter])){
            $l = explode(';',$post[$this->filter]);
        } else{
            $l = array();
        }

        $f=0;
        foreach($l as $key=>$q){

            if($id==$q){
                $f++;
                unset($l[$key]);
            }
        }

        if($f==0)$l[] = $id;

        sort($l);
        $filters = $this->getAllFilters();
        $result = array();
        foreach( $filters  as $filter){
            if($filter['translit'] == $this->filter){

                $active = (!empty($l)?implode(';',$l):null);
                if($active){
                    $result[$filter['translit']] = "{$filter['translit']}=". $active;
                }

            } else {

                $one_row = (isset($post[$filter['translit']]) && !empty($post[$filter['translit']]))?$post[$filter['translit']]:null;
                if($one_row){
                    $result[$filter['translit']] = $filter['translit'].'='.$one_row;
                }

            }
        }

        return implode('/',$result);

    }


    public function getUrlTo($id){
        $filters = $this->filters_param($id);
    
        return '/f/'.$filters;

    }

    public function checked($id){

        $post = $this->getCorrectPost();

        if(!empty($post[$this->filter]))$l = explode(';',$post[$this->filter]);
        else $l = array();
        foreach($l as $key=>$q){
            if($id==$q){return true;}
        }
        return false;
    }
	
	public function run(){
        return $this->render('filterWidget',[
            'rows' =>$this->data,
            'filter' =>$this->filter,
        ]);
	}
}
?>
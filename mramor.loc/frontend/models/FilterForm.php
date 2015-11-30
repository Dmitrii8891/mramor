<?php
namespace frontend\models;

use yii\base\Model;
use Yii;

class FilterForm extends Model
{


    private static $instance;
    public $cars;
    public $work_type;
    public $state;
    public $year;
    public $activeCar;


    static function getInstance(){
        if(empty(self::$instance)) {
            self::$instance = new FilterForm();
        }
        return self::$instance;
    }

    public function rules()
    {
        return [
            [[ 'cars', 'work_type', 'year'], 'string', 'max' => 255],
            [['year', 'state'], 'integer'],
        ];
    }

    public function attributeLabels()
    {
        return [
            'state' => '',
            'cars' => 'Модель автомобиля',
            'work_type' => 'Тип',
            'year' => 'Год выпуска',
        ];
    }

    public function setActiveCar($id = false){
        if($id){

           $this->cars = $id;
        } else {
            $this->cars =  (new Cars())->getActiveCarId();
        }
    }
}
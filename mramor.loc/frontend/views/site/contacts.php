<?php
use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \frontend\models\ContactForm */

$this->title = 'Контакты';
?>
<script src="http://maps.google.com/maps/api/js?sensor=false"></script>
<div class="items-index index_contact_page ">

    <h1><?= Html::encode($this->title) ?></h1>

    <p class="bold_row" >г. Киев, ул. Березняковская, 29Б</p>
    <div>
        <p class="bold_row">Отдел запчастей</p>
        <p>(044) 360-70-47 (Александр)</p>
        <p>(067) 800-01-14 (Александр)</p>
        <p>(093) 744-40-44</p>

        <p class="bold_row" >Мастер-приемщик</p>
        <p>(067) 378-77-76</p>
    </div>
    <div class="work_days">
        <p class="bold_row">Режим работы</p>
        <p>Пн.- Сб. с 9 до 19</p>
        <p>Вс. - Выходной</p>
    </div>
    <div id="google-map-contacts" style="width: 660px; height: 550px;"></div>
</div>
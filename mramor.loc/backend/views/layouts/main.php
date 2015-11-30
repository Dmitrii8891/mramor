<?php
    use yii\widgets\Breadcrumbs;
    use yii\widgets\Menu;
?>
<?php $this->beginContent('@app/views/layouts/layout.php') ?>
<div class="wrap">


    <div class="container">
        <div class="left_block">
            <?php
                echo Menu::widget([
                    'options' => ['class' => 'nav nav-pills nav-stacked'],
                    'items' => [
                        ['label' => 'Вид камня', 'url' => ['type-of-stone/index']],
                        ['label' => 'Цвета', 'url' => ['colors/index']],
                        ['label' => 'Страна', 'url' => ['country/index']],
                        ['label' => 'Категории', 'url' => ['category/index' ]],
                        ['label' => 'Камень', 'url' => ['stone/index']],
                        ['label' => 'Изделия', 'url' => ['goods/index']],
                        ['label' => 'Услуги', 'url' => ['standard-services/index']],
                        ['label' => 'Статьи', 'url' => ['articles/index']],
                        ['label' => 'Акции', 'url' => ['events/index'],],
                        ['label' => 'Статические страницы', 'url' => ['page/index']],
                        //['label' => 'Заказы', 'url' => ['order/index']],
                        ['label' => 'Консультация', 'url' => ['quick-order/index']],
                        //['label' => 'Обратный звонок', 'url' => ['callback/index']],
                        ['label' => 'Запрос "Подробнее"', 'url' => ['details-request/index']],
                        ['label' => 'Подписки', 'url' => ['subscribe/index']],
                        ['label' => 'SEO', 'url' => ['seo-data/index']],
                    ],
                ]);
            ?>
        </div>
        <div class="right_block">
            <?= Breadcrumbs::widget([
                'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
            ]) ?>
            <?= $content ?>
        </div>
    </div>
</div>
<?php $this->endContent() ?>
<div class="images_gallery">
    <ul class="thumbnails">
        <?php $i=0; foreach($model->getGallery() as $image): ?>
            <?php if($i++==0) :?>
                <li class="big_item">
                    <a href="<?= $model->minImg($image, 'original'); ?>" title="" data-options="thumbnail: '<?= $image ?>'" class="thumbnail">
                        <img src="<?= $image ?>" alt="">
                    </a>
                </li>
             <?php else:?>
            <li class="small_items">
                <a href="<?= $model->minImg($image, 'original'); ?>" title="" data-options="thumbnail: '<?= $model->minImg($image, 44,44); ?>'" class="thumbnail">
                    <img src="<?= $model->minImg($image, 44,44); ?>" alt="" >
                </a>
            </li>
            <?php endif;?>
        <?php endforeach; ?>
    </ul>
</div>



<script type="text/javascript">

    $(function() {
        $('.thumbnail').iLightBox(
            {
                skin: 'metro-black',
                path: 'horizontal',
                maxScale: 1.3,
                overlay: {
                    opacity: .8
                },
                styles: {
                    nextOffsetX: 75,
                    nextOpacity: .55,
                    prevOffsetX: 75,
                    prevOpacity: .55
                },
                thumbnails: {
                    normalOpacity: .9,
                    activeOpacity: 1
                },
                controls: {
                    thumbnail: 1,
                    arrows: 1
                }
            });
    });

</script>
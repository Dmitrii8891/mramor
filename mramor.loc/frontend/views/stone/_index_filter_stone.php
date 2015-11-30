<ul>
    <?php $i=1; foreach($rows as $row): ?>
        <?php if($i==1): ?>
            <li class="active" data-type="<?=$row->id?>"><a href="#"><?= $row->name ?></a></li>
        <?php else: ?>
            <li  data-type="<?=$row->id?>"><a href="#"><?= $row->name ?></a></li>
        <?php endif; ?>
    <?php endforeach;?>
</ul>
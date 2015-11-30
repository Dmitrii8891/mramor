<ul>
    <?php $i=1; foreach($rows as $row): ?>
        <?php if($i++==1): ?>
            <li class="active" data-color="<?=$row->id?>"><a href="#"><?= $row->name ?></a></li>
        <?php else: ?>
            <li  data-color="<?=$row->id?>"><a href="#"><?= $row->name ?></a></li>
        <?php endif; ?>
    <?php endforeach;?>
</ul>
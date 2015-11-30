<ul class="filter-box-two">
    <?php $i=1; foreach($rows as $row): ?>
        <li><input class="filter-two" type="checkbox" name="<?=$filter?>[]" id="<?= $row->translit?>" value="<?=$row->id?>"><label for="<?= $row->translit?>"><?= $row->name ?></label></li>
    <?php endforeach;?>
</ul>
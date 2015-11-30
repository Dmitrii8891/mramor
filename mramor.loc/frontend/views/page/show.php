<?php
$this->title = $page->title;
$this->params['breadcrumbs'][] = $this->title;
echo $page->body;
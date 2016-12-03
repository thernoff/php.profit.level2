<?php
use Application\Models\News;

require __DIR__ . '/../../autoload.php';

if (isset($_GET['id'])){
	$id = $_GET['id'];
	$item = News::findById($id);
}else{
	$item = [];
}


include __DIR__ . '/../../Application/Views/news/article.php';
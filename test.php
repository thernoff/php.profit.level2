<?php

require __DIR__ . '/autoload.php';
use Application\Models\News;

echo "Новые возможности<br>";
function getFilter(){
	return function($x){
		return str_replace(' ', '', $x);
	};
}

$func = getFilter();

echo $func('dfd dfdf dfdf dfdf');

function generate(){
	for ($x=1; $x<10; $x++){
		yield $x*2;
	}
}
echo '<br>';
$news = new News();
foreach ($news->findAllByGenerate() as $article){
	//echo $article->title;
	//echo "<br>";
}

$a = News::findAll();
var_dump($a);
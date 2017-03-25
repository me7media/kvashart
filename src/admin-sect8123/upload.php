<?php
$g_config['isLoadInMainTpl'] = false;


    $whitelist = array("gif","bmp", "jpeg", "jpg", "png");         
	$error = true;

// Создаем подключение к DB серверу
		global $g_databases; 		

//работа с данными
$obj_type = POST('obj_type');
$obj_title = POST('obj_title');
$obj_descr = POST('obj_descr');

// Все загруженные файлы помещаются в эту папку
$uploaddir = 'i/uploads/';
$thumbsdir ='upl/photos/thumbs/';
$picturesdir = 'upl/photos/';
$font = 'i/font/arial.ttf';
// Вытаскиваем необходимые данные
$file = POST('value');
$name = POST('name');

$date=date('Y-m-d');

switch ($obj_type) {

case 1:
   $razdel=1;
    break;
case $obj_type>=2:
    $razdel=2;
    break;
case $obj_type>=5:
    $razdel=3;
    break;
case $obj_type>=8:
    $razdel=4;
    break;
case $obj_type>=9:
    $razdel=5;
    break;
};



if($file){


// Получаем расширение файла
$getMime = explode('.', $name);
$mime = end($getMime);
    
 foreach  ($whitelist as  $item) {
		if(preg_match("/$item\$/i",$mime)) $error = false;
    }
}
if(!$error) { 
// Выделим данные
$data = explode(',', $file);

// Декодируем данные, закодированные алгоритмом MIME base64
$encodedData = str_replace(' ','+',$data[1]);
$decodedData = base64_decode($encodedData);

// Вы можете использовать данное имя файла, или создать произвольное имя.
// Мы будем создавать произвольное имя!
$randomName = substr_replace(sha1(microtime(true)), '', 12).'.'.$mime;

// Создаем изображение на сервере
if(file_put_contents($uploaddir.$randomName, $decodedData)) {

	// Записываем данные изображения в БД
    //запись картинок
    $rtr=$randomName;
    $sqlimg = 'INSERT INTO `media` (`id`, `src`, `razdel`, `obj`,`date`) VALUES
("", "'.$rtr.'", "'.$razdel.'", "'.$obj_type.'", "'.$date.'")';
    $sqli = $g_databases->db->query($sqlimg);
     if(!$sqli)
    {MsgErr ('<center><p><b>Database ERROR!</b></p></center>');}

     $sql = "SELECT * FROM media WHERE src='{$rtr}'";
        $sql_obj = $g_databases->db->query($sql);
    foreach ($sql_obj as $result_obj) { 
          /*выборка медиа*/
     $id=$result_obj['id'];
        

	echo $randomName.":ok:".$id;
    }
      
}

    if(file_exists($uploaddir.$randomName)){ 
        //Вотермарка

                $image = WideImage::loadFromFile($uploaddir.$randomName);
                $canvas = $image->getCanvas();
                $canvas->useFont($font , 16, $image->allocateColor(0, 0, 0));
                $canvas->writeText('right', 'bottom', 'KvashArt');
                $canvas->useFont($font , 16, $image->allocateColor(255, 255, 255));
                $canvas->writeText('right – 1', 'bottom – 1', 'KvashArt');
                $image->saveToFile($picturesdir.$randomName);
        //thumb  
$image_handle = imagecreatefromjpeg($uploaddir.$randomName); 
$img = WideImage::load($image_handle);
$img_resize = $img->resize('50%')->saveToFile($thumbsdir.$randomName); //сохранение в папке


}

}else MsgErr ('<center><p><b>Не верный формат файла!</b></p></center>');
?>
<?php
$g_config['isLoadInMainTpl'] = false;


    $whitelist = array("gif","bmp", "jpeg", "jpg", "png");         
	$error = true;
/// Создаем подключение к DB серверу
		global $g_databases; 		

//работа с данными
$obj_type = POST('obj_type');
$obj_title = POST('obj_title');
$obj_descr = POST('obj_descr');

//cоздаем директории

FileSys::MakeDir(BASEPATH.'upl/photos/');
FileSys::MakeDir(BASEPATH.'upl/photos/thumbs/');
/// Вытаскиваем необходимые данные
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


/// Получаем расширение файла
$getMime = explode('.', $name);
$mime = end($getMime);
    
 foreach  ($whitelist as  $item) {
		if(preg_match("/$item\$/i",$mime)) $error = false;
     
    }
}

if(!$error) { 
/*// Выделим данные
$data = explode(',', $file);

// Декодируем данные, закодированные алгоритмом MIME base64
$encodedData = str_replace(' ','+',$data[1]);
$decodedData = base64_decode($encodedData);

/*/// Вы можете использовать данное имя файла, или создать произвольное имя.
// Мы будем создавать произвольное имя!
$randomName = substr_replace(sha1(microtime(true)), '', 12).'_photo.'.$mime;

/// Создаем изображения на сервере
//загружаем фотку в бинарную строку

       $img = WideImage::load($file);
    $file = "";
    	//загружаем ватермарку
    $watermark = WideImage::load(BASEPATH.'i/img/logo.png');
//накладываем ватермарку

	$new = $img->merge($watermark, 'center', 'bottom - 150', 50);
    $watermark = "";
//сохраняем оригинал с размером 600px по большей стороне (можно поставить больше, 600 для теста)
       $new->resize(600)->saveToFile(BASEPATH.'upl/photos/'.$randomName, 80);
    $new = "";

//делаем тумб 350 по большей из сторон и сохраняем
    $img_resize = $img->resizeDown(350, 350, 'inside');
	$img_resize->saveToFile(BASEPATH.'upl/photos/thumbs/'.$randomName, 80);
     
     if(file_exists(BASEPATH.'upl/photos/thumbs/'.$randomName)){ 
/// Записываем данные изображения в БД
    //запись картинок
    $sqlimg = 'INSERT INTO `media` (`id`, `src`, `razdel`, `obj`,`date`) VALUES
("", "'.$randomName.'", "'.$razdel.'", "'.$obj_type.'", "'.$date.'")';
    $sqli = $g_databases->db->query($sqlimg);
     if(!$sqli)
    {MsgErr ('Database ERROR!');}
    else

     $sql = "SELECT * FROM media WHERE src='{$randomName}'";
        $sql_obj = $g_databases->db->query($sql);
    foreach ($sql_obj as $result_obj) { 
          /*выборка медиа*/
     $id=$result_obj['id'];
	$a='ok';
    }
} else {$a='Не удается загрузить файл!';}
} else {$a='Не верный формат файла!';};

echo $randomName.":".$a.":".$id.":".$name;
?>
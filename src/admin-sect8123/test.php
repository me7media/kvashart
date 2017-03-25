<?php
$g_config['isLoadInMainTpl'] = false;

//загружаем фотку в бинарную строку, в случае с твоей загрузкой файла используем $decodedData = base64_decode($encodedData);
$data = BASEPATH . 'i/uploads/ab7daa176d8c.jpg';
$data = file_get_contents($data);

//имя файла, расширение и проверку на формат файла нужно будет добавить
$name = 'ab7daa176d8c.jpg';

//cоздаем директории
FileSys::MakeDir(BASEPATH.'upl/photos/');
FileSys::MakeDir(BASEPATH.'upl/photos/thumbs/');

	$img = WideImage::loadFromString($data);
	$prefix = substr(sha1(time()), -6);
	$image_name = $prefix.'_photo.jpg';
	
	//загружаем ватермарку
	$watermark = WideImage::load(BASEPATH.'i/img/logo.png');
	
	//накладываем ватермарку
	$new = $img->merge($watermark, 'center', 'bottom - 150', 50);
	
	//сохраняем оригинал с размером 600px по большей стороне (можно поставить больше, 600 для теста)
	$new->resize(600)->saveToFile(BASEPATH.'upl/photos/'.$image_name, 80);
	
	//делаем тумб 350 по большей из сторон и сохраняем
	$img_resize = $img->resizeDown(350, 350, 'inside');
	$img_resize->saveToFile(BASEPATH.'upl/photos/thumbs/'.$image_name, 80);
	
echo '<img src="'.Root('upl/photos/thumbs/'.$image_name).'">';
echo '<img src="'.Root('upl/photos/'.$image_name).'">';
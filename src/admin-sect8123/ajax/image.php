<?php
$g_config['isLoadInMainTpl'] = false;

$obj_id = Post('obj_id', 0); //передаем номер записи, для которой загружаются картинки

define('UPLOAD_DIR', BASEPATH.'/upl'); // папка, куда будем все складывать

FileSys::MakeDir(UPLOAD_DIR.'/photos/'); //создаем папку, если ее нет
FileSys::MakeDir(UPLOAD_DIR.'/photos/thumbs/');  //создаем папку для превью, если ее нет

if(isset($_FILES['photos'])){
			
		$imgs = WideImage::load('photos');
		
		foreach ($imgs as $n=>$img){
			
				$prefix = substr(sha1($_FILES['photos']['name'][$n].time()), -4); //генерируем префикс
				$image_name = $prefix.'_photo.jpg';
				
				$img->resize(1280)->saveToFile(UPLOAD_DIR.'/photos/'.$image_name, 80); //обрезка оригинального изображения до 1280 px и сжатие качества до 80%
				
				$img_resize = $img->resize(560, 320); //размер превьюшки 
				//$img_resize = $img_resize->crop('center', 'center', 560, 320); 
				$img_resize->saveToFile(UPLOAD_DIR.'/photos/thumbs/'.$image_name);
				
				if(file_exists(UPLOAD_DIR.'/photos/'.$image_name) && file_exists(UPLOAD_DIR.'/photos/thumbs/'.$image_name)){ 
					//проверяем, сохранилось ли и тлько тогда пишем в БД
					$image = new MediaModel();
					$image->item_id = $item->id;
					$image->type = $typemedia;
					$image->value = $image_name;
					$image->Flush();	
				}
			
		}
	
	$photos_ids = $item->media->FindFieldByType($obj_id);//здесь делаем запрос в БД и тянем записи с медиа для данной новости (записи) 
		if(count($photos_ids)) {
			foreach ($photos_ids as $photo_id) {
				$photo = new MediaModel($photo_id);
				//выводим ответ
				echo '<img src="'.UPLOAD_DIR.'/photos/thumbs/'.$photo->value.'">';
			}
		}
}
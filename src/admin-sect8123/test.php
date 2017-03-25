<?php
$g_config['isLoadInMainTpl'] = false;

//��������� ����� � �������� ������, � ������ � ����� ��������� ����� ���������� $decodedData = base64_decode($encodedData);
$data = BASEPATH . 'i/uploads/ab7daa176d8c.jpg';
$data = file_get_contents($data);

//��� �����, ���������� � �������� �� ������ ����� ����� ����� ��������
$name = 'ab7daa176d8c.jpg';

//c������ ����������
FileSys::MakeDir(BASEPATH.'upl/photos/');
FileSys::MakeDir(BASEPATH.'upl/photos/thumbs/');

	$img = WideImage::loadFromString($data);
	$prefix = substr(sha1(time()), -6);
	$image_name = $prefix.'_photo.jpg';
	
	//��������� ����������
	$watermark = WideImage::load(BASEPATH.'i/img/logo.png');
	
	//����������� ����������
	$new = $img->merge($watermark, 'center', 'bottom - 150', 50);
	
	//��������� �������� � �������� 600px �� ������� ������� (����� ��������� ������, 600 ��� �����)
	$new->resize(600)->saveToFile(BASEPATH.'upl/photos/'.$image_name, 80);
	
	//������ ���� 350 �� ������� �� ������ � ���������
	$img_resize = $img->resizeDown(350, 350, 'inside');
	$img_resize->saveToFile(BASEPATH.'upl/photos/thumbs/'.$image_name, 80);
	
echo '<img src="'.Root('upl/photos/thumbs/'.$image_name).'">';
echo '<img src="'.Root('upl/photos/'.$image_name).'">';
<?php
global $g_databases;
$email = trim(Post('email'));
$name = trim(Post('name'));
$subject = trim(Post('subject'));
$phone = trim(Post('phone'));
if(POST('submit')&&!POST('formail')){
    if(SendMail("vgoogle@i.ua", "Письмо", "$subject от $name контакты: $email, $phone")){
        echo MsgOk('Ваш заказ отправлен!');} else echo MsgErr('Ошибка отправки!!!');
};

if (POST('formail')){
$formail=trim(POST('formail'));

			if ( $email && IsValidEmail($email) ) {
				if ($name) {
					if($subject) {
if(SendMail("vgoogle@i.ua", "Новый заказ", "$formail, $subject от $name контакты: $email, $phone")){                echo MsgOk('Ваш заказ отправлен!');} else echo MsgErr('Ошибка отправки!!!');
                    } else echo MsgErr('Неверные коментарии!');
                }else echo MsgErr('Непозволимое имя!'); 
            }else echo MsgErr('Проверьте правильность написания email');
        };

if(GET('w')){
$res=GET('w');
          /*выборка медиа*/
     $sql = "SELECT * FROM media WHERE src='{$res}'";
        
$sql_media = $g_databases->db->query($sql);
    //Запрос к базе с проверкой
    if(!$sql_media)
    {//redirect main
    IncludeCom('404'); ExitCom();}
    else
    {
         foreach ($sql_media as $result) { 
$name = $result['title'];
$date = $result['date'];
$descr = $result['des'];
$cont = "Хотите заказать работу: ".$result['title'].".\n";
$formail="Заказ работы: ".$result['title']." http//kvashart.com/i/uploads/".$res;
         }
    };
    
    
    $g_config['isLoadInMainTpl'] = false;
echo '<link href="i/css/bootstrap.min.css" rel="stylesheet">
    <link href="i/css/font-awesome.min.css" rel="stylesheet">
    <link href="i/css/style.css" rel="stylesheet">
    <link href="i/css/theme-color.css" rel="stylesheet">';
}
?>



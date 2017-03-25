<?php

//Админ часть
//переменные
global $g_databases;
$selected='';
$f='';
$razd=array();
$date=date('Y-m-d');
////Масивы селекта
if (!GET('i')){
$razd[1]="Коллекции";
$razd[2]="Превращение одежды";
$razd[3]="Фешн коллекции";
$razd[4]="Аксессуары";
$razd[5]="Подушки буквы (АВ)";
$razd[6]="Детские подушки";
$razd[7]="Декоративные";
$razd[8]="Галерея";
$razd[9]="Ирина Кваша";
}
if (GET('i') == 'news'){
$razd[8]="Галерея";
$razd[9]="Ирина Кваша";
}
if (GET('i') == 'list'){
$razd[1]="Коллекции";
$razd[2]="Превращение одежды";
$razd[3]="Фешн коллекции";
$razd[4]="Аксессуары";
$razd[5]="Подушки буквы (АВ)";
$razd[6]="Детские подушки";
$razd[7]="Декоративные";
}
$options='<option value="0">Выбрать раздел</option>';

    ////Апдейт медиа БД
function media_add($parid){
    global $g_databases;
//захватываем сразу все массивы и кидаем их в переменные для дальнейшей работы
$media_ids = POST('media_id');
$names = POST('name');
$descrs = POST('descr');

$errors = array(); //пустой массив для возможных ошибок

foreach ($names as $key => $image_name ) {

if( empty($names[$key]) || empty($descrs[$key]) ) $errors[] = 'Заполните данные к картинке ' . $image_name; 
	else {

    $sqlimg = 'UPDATE media SET title="'.$names[$key].'", des="'.$descrs[$key].'", obj="'.$parid.'" WHERE id="'.$key.'"';
    $sqli = $g_databases->db->query($sqlimg);
     if(!$sqli)
    {echo '<center><p><b>Error 2</b></p></center>';}
     }}
    if($errors) Msg(implode('<br>', $errors));
else echo MsgOk('Информация добавлена в раздел, '. count($media_ids) . ' ФАЙЛ(ОВ)А и описаний к ним.');
};
///
//редактирование объекта и удаление его...
if (GET('req')){ 
   $obj = GET('obj');
    ///Удаление
     if (GET('req')=='del'){
        echo MsgOk('Запись удалена!!!');
         $sql = "SELECT * FROM media WHERE obj='{$obj}'";
    $sql_req = $g_databases->db->query($sql);
         foreach ($sql_req as $v) {
    $src=$v['src'];
             unlink('upl/photos/'.$src);
             unlink('upl/photos/thumbs/'.$src);
         };
         
         $sql = "DELETE FROM obj WHERE id='{$obj}' AND parid='0' LIMIT 1";
    $sql_req = $g_databases->db->query($sql);
         $sql = "DELETE FROM media WHERE obj='{$obj}'";
    $sql_req = $g_databases->db->query($sql);
         
         ExitCom();
    };
    
    if(GET('req')=='rw'){
$pv="value";$name='';$descr='';    
    
    $sql = "SELECT * FROM obj WHERE id='{$obj}' AND parid='0'";
    $sql_req = $g_databases->db->query($sql);

    foreach ($sql_req as $opt) {$rid=$opt['razdel']; $name=$opt['name']; $descr=$opt['descr'];}
    
$sql = "SELECT * FROM media WHERE obj='{$obj}'";
    $sql_req = $g_databases->db->query($sql);

foreach ($sql_req as $v) {
    $id=$v['id']; $title=$v['title']; $descr=$v['des']; $src=$v['src'];

$f.='<div class="in_block" id="img-'.$id.'"><div class="row"><div class="col-md-5 col-sm-5 col-xs-12"><br><div class="col-md-12 col-sm-12 col-xs-12"><label>Изображение:</label><div class="col-md-12 col-sm-12 col-xs-12"><div id="'.$src.'" class="image" style="background: url(../../upl/photos/thumbs/'.$src.');background-size: cover;"><a href="#"  class="drop-button" onclick="if_del('.$id.')">Удалить изображение</a></div></div></div><div class="col-md-12 col-sm-12 col-xs-12 status"></div></div><div class="col-md-6 col-sm-6 col-xs-5"><br><div class="col-md-12 col-sm-12 col-xs-12"><label>Название:</label><div class="col-md-12 col-sm-12 col-xs-12"><input class="form-control" name="name['.$id.']" id="'.$src.'" value="'.$title.'"></div></div><div class="col-md-12 col-sm-12 col-xs-12"><label>Описание:</label><div class="col-md-12 col-sm-12 col-xs-12"><textarea name="descr['.$id.']" class="form-control" style="height:100px; id="'.$src.'">'.$descr.'</textarea></div></div></div></div></div><input type="hidden"  name="fd['.$id.']" value="'.$id.'"><input type="hidden" id="'.$id.'" name="del['.$id.']" value=""><a href="#" onclick="re_del('.$id.')" style="display:none;"  id="img-del-'.$id.'"> Изображение '.$title.' удалено! Вернуть?!</a>';
};}; 
}else{
    
$pv="placeholder";    
$name="Введите название";
$descr="Введите описание";
    

    
    //ввод в бд новой записи
if(POST('obj_type')&&!POST('req')){

$obj_type = POST('obj_type');
$obj_title = POST('obj_title');
$obj_descr = POST('obj_descr');

        if ($obj_type==1){$razdel=1;}
        if ($obj_type>=2){$razdel=2;}
        if ($obj_type>=5){$razdel=3;}
        if ($obj_type>=8){$razdel=4;}
        if ($obj_type>=9){$razdel=5;}
    
$sqlio = 'INSERT INTO `obj` (`id`, `parid`, `razdel`, `obj`, `name`, `descr`, `date`) VALUES
("", "0", "'.$obj_type.'", "'.$razdel.'", "'.$obj_title.'", "'.$obj_descr.'", "'.$date.'")';
    $sqlo = $g_databases->db->query($sqlio);
     if(!$sqlo)
    {echo '<center><p><b>Error 1</b></p></center>';}
 $parid= $g_databases->db->selectCol("SELECT MAX(id) mid FROM obj"); 
       $parid=$parid[0];
    if(POST('descr')){ media_add($parid);}///Апдейт медиа БД


}
}
foreach ($razd as $key => $opt){
        if (GET('req')=='rw'){if($key==$rid){$selected='selected';}else $selected='';};
        $options.='<option value="'.$key.'" '.$selected.'>'.$opt.'</option>';}

    if(POST('req')){
        ///Удаляем медиа файлы если необходимо
if(POST('fd')){$fd=POST('fd');$del=POST('del');foreach ($fd as $key ) {
   if( !empty($del[$key])){if($del[$key]=='del'){$sql="DELETE FROM  `media` WHERE  `id` ='.$key.' LIMIT 1";}}}
        ///Апдейт обэктов БД
               $obj = GET('obj');
$obj_type = POST('obj_type');
$obj_title = POST('obj_title');
$obj_descr = POST('obj_descr');
        if ($obj_type==1){$razdel=1;}
        if ($obj_type>=2){$razdel=2;}
        if ($obj_type>=5){$razdel=3;}
        if ($obj_type>=8){$razdel=4;}
        if ($obj_type>=9){$razdel=5;}
$sqlio = 'UPDATE obj SET obj="'.$obj_type.'", razdel="'.$razdel.'", name="'.$obj_title.'", descr="'.$obj_descr.'", date="'.$date.'" WHERE id="'.$obj.'"';
    $sqlo = $g_databases->db->query($sqlio);
               
               if (POST('delete')){
        //удаление не нужного
    $sql = "SELECT * FROM media WHERE obj='' AND title=''";
    $sql_req = $g_databases->db->query($sql);
  foreach ($sql_req as $opt) {$src=$opt['src'];              unlink('upl/photos/'.$src);unlink('upl/photos/thumbs/'.$src);
    $sql = "DELETE FROM media WHERE obj='' AND title='' AND src='{$src}'";
    $sql_req = $g_databases->db->query($sql);}
               };
   
        ///Апдейт медиа БД
       if(POST('descr')){ media_add($obj);}
    }
    echo MsgOk('Информация изменена');
    };
?>
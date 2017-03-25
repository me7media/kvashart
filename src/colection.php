<?php
$r = GET('r', 1);
$c = GET('c', 1);
$w = GET('w', 1);
global $g_databases; 
     /*выборка из базы*/
 
if(!GET('c')&&!GET('w')){
 $sql = "SELECT * FROM obj WHERE razdel='{$r}' AND parid='0'";
    
        $sql_obj = $g_databases->db->query($sql);
    //Запрос к базе с проверкой
    if(!$sql_obj)
    {  
    //redirect main
    IncludeCom('404'); ExitCom();
    }
    else
    { 
        
    foreach ($sql_obj as $result_obj) { 
        
        
$name = $result_obj['name'];
$date = $result_obj['date'];
$descr = $result_obj['descr'];

          //выборка медиа//
     $sql = "SELECT * FROM media WHERE obj='{$result_obj['id']}'";
        
$sql_media = $g_databases->db->query($sql);

        
        //выборка//
        foreach ($sql_media as $result_media){
    }}}
$src = $result_media['src']; ///Вывод последней картинки
};


if(GET('c')||GET('w')){
    
    if(!GET('c')){$i=GET('w');}
    else {$i=GET('c');};
 $sql = "SELECT * FROM obj WHERE razdel='{$r}' AND id='{$i}' AND parid='0'";
    
        $sql_obj = $g_databases->db->query($sql);
    //Запрос к базе с проверкой
    if(!$sql_obj)
    {
    
    //redirect main
    IncludeCom('404'); ExitCom();
    }
    else
    { 
        
    foreach ($sql_obj as $result_obj) { 
        
        
$name = $result_obj['name'];
$date = $result_obj['date'];
$descr = $result_obj['descr'];

          //выборка медиа//
     $sql = "SELECT * FROM media WHERE obj='{$result_obj['id']}'";
        
$sql_media = $g_databases->db->query($sql);
    //Запрос к базе с проверкой
    if(!$sql_media)
    {//redirect main
    IncludeCom('404'); ExitCom();}
    else
    { 
        
        //выборка//
        foreach ($sql_media as $result_media){
    }}}}
$src = $result_media['src']; ///Вывод последней картинки
}
//////Обзор категории
if(GET('r')>1){

     //выборка из базы//
          //выборка объектов//
 $sql = "SELECT * FROM obj WHERE razdel='{$r}' AND parid='kat'";
    
        $sql_obj = $g_databases->db->query($sql);


    foreach ($sql_obj as $result_obj) { 
        
        
$name = $result_obj['name'];
$descr = $result_obj['descr'];
$razd = $result_obj['razdel'];
$date = $result_obj['date'];
          //выборка медиа//


          //выборка медиа//
     $sql = "SELECT src FROM media WHERE razdel='{$result_obj['razdel']}' LIMIT 1";
$sql_media = $g_databases->db->query($sql);
    //Запрос к базе с проверкой

        
        //выборка//

        foreach ($sql_media as $result_media){
            

            $src =$result_media['src'];
                }
    }}
?> 
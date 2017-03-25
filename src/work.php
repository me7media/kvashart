<?php

global $g_databases; 
    if(GET('r')>1){
$r = GET('r', 5);
$w = GET('w', 1);

     /*выборка из базы*/
          /*выборка объектов*/
 $sql = "SELECT * FROM obj WHERE razdel='{$r}' AND id='{$w}' AND parid='0'";
    
        $sql_obj = $g_databases->db->query($sql);
    //Запрос к базе с проверкой
    if(!$sql_obj)
    {
        
    //redirect main
    IncludeCom('404'); ExitCom();}
    else
    { 
            $i=0;
            $work_src=array();
            $work_title=array();
            $work_descr=array();
    foreach ($sql_obj as $result_obj) { 
        
        
$name = $result_obj['name'];
$date = $result_obj['date'];
$descr = $result_obj['descr'];

          /*выборка медиа*/
     $sql = "SELECT * FROM media WHERE obj='{$result_obj['id']}' LIMIT 3";

$sql_media = $g_databases->db->query($sql);
    //Запрос к базе с проверкой
    if(!$sql_media)
    {
        //redirect main
    IncludeCom('404'); ExitCom();}
    else
    { 
        
        /*выборка*/

        foreach ($sql_media as $result_media){
            
     $work_title[$i] = $result_media['title'];
     $work_descr[$i] = $result_media['des'];
            $work_src[$i] =$result_media['src'];

            $i=$i+1;
    }
    }}}}
else {
       
    //redirect main
    IncludeCom('404'); ExitCom();
}

?> 
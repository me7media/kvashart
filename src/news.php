 <?php

global $g_databases; 
    if(GET('r')>7){
$r = GET('r', 8);
$n = GET('n', 1);

     /*выборка из базы*/
          /*выборка объектов*/
 $sql = "SELECT * FROM obj WHERE razdel='{$r}' AND id='{$n}' AND parid='0'";
    
        $sql_obj = $g_databases->db->query($sql);
    //Запрос к базе с проверкой
    if(!$sql_obj)
    {
        
    //redirect main
    IncludeCom('404'); ExitCom();}
    else
    { 
            $i=0;
            $news_src=array();
            $news_title=array();
            $news_descr=array();
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
            
     $news_title[$i] = $result_media['title'];
     $news_descr[$i] = $result_media['des'];
            $news_src[$i] =$result_media['src'];

            $i=$i+1;
    }
    }}}
    }
else {    
    //redirect main
    IncludeCom('404'); ExitCom();}




?> 
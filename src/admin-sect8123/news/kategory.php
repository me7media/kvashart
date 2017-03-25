<table class="bordered" width="90%" align="center">
     <?php  global $g_databases;

     /*выборка из базы*/
          /*выборка объектов*/
 $sql = "SELECT * FROM obj WHERE parid='kat'";
    
        $sql_obj = $g_databases->db->query($sql);
    //Запрос к базе с проверкой
    if(!$sql_obj)
    {echo '<center><p><b>Database ERR!</b></p></center>';}
    else
    { 
    foreach ($sql_obj as $result_obj) { 
        
        
$name = $result_obj['name'];
$descr = $result_obj['descr'];
$razdel = $result_obj['razdel'];
$obj = $result_obj['obj'];

        if($razdel==2){$razd="РОСПИСЬ ПО ТКАНИ";}else{$razd="ПОДУШКИ";};

          /*выборка медиа*/
     $sql = "SELECT * FROM media WHERE obj='{$result_obj['id']}' LIMIT 1";
$sql_media = $g_databases->db->query($sql);
    //Запрос к базе с проверкой
    if(!$sql_media)
    {echo '<center><p><b>Database ERRORR!</b></p></center>';}
    else
    { 
        
        /*выборка*/

        foreach ($sql_media as $result_media){
            

            $src = $result_media['src'];

    echo '<tr>
                    <td><a href="../../colection?r='.$obj.'" class="thumb">
                        <img src="../../'.$src.'" title="'.$name.'" style="height:50px;"></a></td>
                        <td><a href="../../colection?r='.$obj.'" class="thumb"><h4>'.$name.'</h4></a> 
                        <p>Раздел: '.$razd.'</p></td>
                        <td><a href="\admin-sect8123/news/add?req=kw&obj='.$result_obj['id'].'" class="thumb">Редактировать</a></td>
                        <td><a href="#" class="thumb">Удалить</a></td>
                </tr>';
            
    }
    }}}

    ?>
</table>
</br>
<a href="#" class="btn btn-success">Добавить категорию</a>
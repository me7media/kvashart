     <?php

     class MozaikModel {
     
     
     
public function pull_colections($list) {
    
        global $g_databases; 
    $sql = "SELECT * FROM obj WHERE parid='0'";
    
        $sql_obj = $g_databases->db->query($sql);
    //Запрос к базе с проверкой
    if(!$sql_obj)
    {echo '<center><p><b>Database ERROR!</b></p></center>';}
    else
    {

    foreach ($sql_obj as $result_obj) { 
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
        $link=array();
        $rid=$result_obj['razdel'];
            
        if ($rid==1){$razdel=1;};
        if ($rid>=2){$razdel=0;};
        if ($rid>=5){$razdel=0;};
        if ($rid>=8){$razdel=4;};
        if ($rid>=9){$razdel=5;};

        $roid=$result_obj['id'];    
            $link[0]='\work?r='.$rid.'&w='.$roid;
            $link[1]='\colection?r='.$rid.'&c='.$roid;
            $link[2]='\work?r='.$rid.'&w='.$roid;
            $link[3]='\work?r='.$rid.'&w='.$roid;
            $link[4]='\news?r='.$rid.'&n='.$roid;
            $link[5]='\news?r='.$rid.'&n='.$roid;
            
            if($list==1){
             /*блок вывода*/
   echo '<div class="portfolio-item cat'.$razdel.'" style="position: absolute; left: 0px; top: 0px;">
   <a href="'.$link[$razdel].'" class="thumb">
                        <img src="upl/photos/thumbs/'.$result_media['src'].'" alt="">
                        <div class="portfolio-hover">
                            <div class="portfolio-description">
                                <h4>'.$result_obj['name'].'</h4>
                                <p>'.$result_obj['descr'].'</p>
                            </div>
                        </div>
                    </a>
                </div>';}
            else {
                
                if($rid==1){$razd="Коллекции";}
                else if ($rid==2){$razd="Роспись по ткани";}
                else if($rid==3){$razd="Превращение одежды ";}
                else if ($rid==4){$razd="Фешн коллекции";}
                else if($rid==5){$razd=" Аксессуары ";}
                else if ($rid==6){$razd=" Подушки буквы (АВ) ";}
                else if($rid==7){$razd=" Декоративные ";}
                else if ($rid==8){$razd=" Галерея ";}
                else if($rid==9){$razd="Ирина Кваша";};
                echo '<tr>
                    <td><a href="'.$link[$razdel].'" class="thumb">
                <img src="../../upl/photos/thumbs/'.$result_media['src'].'" title="'.$result_media['name'].'" style="height:50px;"></a></td>
                        <td><a href="'.$link[$razdel].'" class="thumb"><h4>'.$result_media['title'].'</h4></a> 
                        <p>Раздел: '.$razd.'</p></td>
                        <td><a href="#" class="thumb">Редактировать</a></td>
                        <td><a href="#" class="thumb">Удалить</a></td>
                </tr>';
            }}

    }}}}


         ////////Выборка для категорий
public function pull_colection($r) {
    
        global $g_databases; 
     /*выборка из базы*/
          /*выборка объектов*/
  $sql = "SELECT * FROM obj WHERE razdel='{$r}' AND parid='0'";
    
        $sql_obj = $g_databases->db->query($sql);
    //Запрос к базе с проверкой
    if(!$sql_obj)
    {echo '<center><p><b>Database ERROR!</b></p></center>';}
    else
    { 
        
    foreach ($sql_obj as $result_obj) {

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
            
            
         /*определение ссылки*/
         $link=array();
            
        $rid=$result_obj['razdel'];
            
        if ($rid==1){$razdel=1;}
        if ($rid>=2){$razdel=0;}
        if ($rid>=5){$razdel=0;}
        if ($rid>=8){$razdel=4;}
        if ($rid>=9){$razdel=5;}

        $roid=$result_obj['id'];    
            
            $link[0]='\work?r='.$rid.'&w='.$roid;
            $link[1]='\colection?r='.$rid.'&c='.$roid;
            $link[2]='\work?r='.$rid.'&w='.$roid;
            $link[3]='\work?r='.$rid.'&w='.$roid;
            $link[4]='\news?r='.$rid.'&n='.$roid;
            $link[5]='\news?r='.$rid.'&n='.$roid;
            
             /*блок вывода*/
   echo '<div class="portfolio-item cat'.$razdel.'" style="position: absolute; left: 0px; top: 0px;">
   <a href="'.$link[$razdel].'" class="thumb">
                        <img src="upl/photos/thumbs/'.$result_media['src'].'" alt="'.$result_obj['name'].'">
                        <div class="portfolio-hover">
                            <div class="portfolio-description">
                                <h4>'.$result_obj['name'].'</h4>
                                <p>'.$result_obj['descr'].'</p>
                            </div>
                        </div>
                    </a>
                </div>';

    }}}}}

         ////////Выборка для колекций

public function pull_colect($r, $c) {
    
        global $g_databases; 
     /*выборка из базы*/
          /*выборка объектов*/
    
          /*выборка медиа*/
     $sql = "SELECT * FROM media WHERE obj='{$c}'";

$sql_media = $g_databases->db->query($sql);
    //Запрос к базе с проверкой
    if(!$sql_media)
    {echo '<center><p><b>Database ERRORR!</b></p></center>';}
    else
    { 
        
        /*выборка*/
        foreach ($sql_media as $result_media){
         /*определение ссылки*/
         $link=array();
        $rid=$r;
            
        if ($rid==1){$razdel=1;}
        if ($rid>=2){$razdel=0;}
        if ($rid>=5){$razdel=0;}
        if ($rid>=8){$razdel=4;}
        if ($rid>=9){$razdel=5;}

        $roid=$result_media['id'];    
            $link[0]='\work?r='.$rid.'&w='.$roid.'';
            $link[1]='\colection?r='.$rid.'&c='.$c.'#';
            $link[2]='\work?r='.$rid.'&w='.$roid.'';
            $link[3]='\work?r='.$rid.'&w='.$roid.'';
            $link[4]='\news?r='.$rid.'&n='.$roid.'';
            $link[5]='\news?r='.$rid.'&n='.$roid.'';
            
            
             /*блок вывода*/
            
            

            /*блок вывода*/
   echo '<div class="portfolio-item cat'.$razdel.'" style="position: absolute; left: 0px; top: 0px;">
   <a href="upl/photos/'.$result_media['src'].'" rel="gallery" data-caption="'.$result_media['title'].' <a href=\'\offer?w='.$result_media['src'].'\' id=\'offer\'>Заказать</a>" class="fancybox thumb" >
   <img src="upl/photos/thumbs/'.$result_media['src'].'" alt="">
                        <div class="portfolio-hover">
                            <div class="portfolio-description">
                                <h4>'.$result_media['title'].'</h4>
                                <p>'.$result_media['des'].'</p>
                            </div>
                        </div>
                    </a>
                </div>';

    }
    
    }
}
         
  public function pull_list() {
      
        global $g_databases; 
    $sql = "SELECT * FROM obj WHERE parid='0'";
    
        $sql_obj = $g_databases->db->query($sql);
    //Запрос к базе с проверкой
    if(!$sql_obj)
    {echo '<center><p><b>Database ERROR!</b></p></center>';}
    else
    {

    foreach ($sql_obj as $result_obj) { 
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
        $link=array();
        $rid=$result_obj['razdel'];
            
        if ($rid==1){$razdel=1;};
        if ($rid>=2){$razdel=0;};
        if ($rid>=5){$razdel=0;};
        if ($rid>=8){$razdel=4;};
        if ($rid>=9){$razdel=5;};

        $roid=$result_obj['id'];    
            $link[0]='\work?r='.$rid.'&w='.$roid;
            $link[1]='\colection?r='.$rid.'&c='.$roid;
            $link[2]='\work?r='.$rid.'&w='.$roid;
            $link[3]='\work?r='.$rid.'&w='.$roid;
            $link[4]='\news?r='.$rid.'&n='.$roid;
            $link[5]='\news?r='.$rid.'&n='.$roid;

               if($rid<8){$gr="0";} else {$gr="00";}          
$razd[1]="Коллекции";
$razd[2]="Превращение одежды";
$razd[3]="Фешн коллекции";
$razd[4]="Аксессуары";
$razd[5]="Подушки буквы (АВ)";
$razd[6]="Детские подушки";
$razd[7]="Декоративные";
$razd[8]="Галерея";
$razd[9]="Ирина Кваша";
            
            
                echo '<tr class="fancybox" data-fancybox-group="'.$gr.'" data-filter="'.$rid.'">
                    <td><a  href="'.$link[$razdel].'" class="thumb">
                <img src="../../upl/photos/thumbs/'.$result_media['src'].'" title="'.$result_media['title'].'" style="height:50px;"></a></td>
                        <td><a href="'.$link[$razdel].'" class="thumb"><h4>'.$result_obj['name'].'</h4></a> 
                        <p>Раздел: '.$razd[$rid].'</p></td>
                        <td><a href="\admin-sect8123/news/add?req=rw&obj='.$result_obj['id'].'" class="thumb">Редактировать</a></td>
                        <td><a href="\admin-sect8123/news/add?req=del&obj='.$result_obj['id'].'" class="thumb">Удалить</a></td>
                </tr>';
            }}

    }}}
         
         
};
?>
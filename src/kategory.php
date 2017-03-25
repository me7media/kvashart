<?php 
function    get_kat(){
       global $g_databases; 
$r = GET('r', 5);

     /*выборка из базы*/
    
          /*выборка объектов*/
    
    $sql = "SELECT * FROM obj WHERE parid='kat'";
    
        $sql_obj = $g_databases->db->query($sql);
    foreach ($sql_obj as $result_obj) { 
        
        
$name = $result_obj['name'];
$descr = $result_obj['descr'];
$razd = $result_obj['razdel'];
$obj = $result_obj['obj'];
        
          /*выборка медиа*/

$sql = "SELECT src FROM media WHERE obj='{$result_obj['razdel']}' LIMIT 1";
        //"SELECT src FROM media WHERE razdel='{$result_obj['razdel']}' LIMIT 1"
$sql_media = $g_databases->db->query($sql);
        
        /*выборка*/

        foreach ($sql_media as $result_media){

            $src = $result_media['src'];
            

    echo '<div class="portfolio-item cat'.$razd.' " style="position: absolute; left: 0px; top: 0px;">
                    <a href="colection?r='.$obj.'" class="thumb">
                        <img src="'.$src.'" alt="">
                        <div class="portfolio-hover">
                            <div class="portfolio-description">
                                <h4>'.$name.' </h4>
                                <p> '.$descr.'</p>
                            </div>
                        </div>
                    </a>
                </div>';
            
    }}
}
    
?>
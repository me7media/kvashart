   <?php



/*$dblocation = "localhost"; // »м¤ сервера
$dbuser = "root"; // »м¤ пользовател¤
$dbpasswd = ""; // ѕароль
$dbname = "kvash" ; // им¤ базы
mysql_connect($dblocation,$dbuser,$dbpasswd) or die ("Can't");
mysql_select_db($dbname) or die ("Can not");
*/
$r= "1";
$link = "colection";
     class DatabaseFunc {
     
     public $host = "localhost";
     public $user = "root";
     public $pass = "";
     public $db = "kvash";
     public $mysqli;
     
     public function pull_latest_post($r) {
            $this->mysqli = new mysqli($this->host,$this->user,$this->pass,$this->db);
     /*выборка из базы*/
          /*выборка объектов*/
     $sql_obj = mysqli_query($this->mysqli,"SELECT * FROM obj WHERE razdel='$r'") or die("Failed" . mysqli_error($this->mysqli));
     while($result_obj = mysqli_fetch_array($sql_obj)) {
         $base_razdel=$result_obj['razdel'];
         $base_obj=$result_obj['obj'];
          /*выборка медиа*/
     $sql_media = mysqli_query($this->mysqli,"SELECT * FROM media WHERE razdel='$base_razdel' AND obj='$base_obj'") or die("Failed" . mysqli_error($this->mysqli));
     while($result_media = mysqli_fetch_array($sql_media)) {
         /*определение ссылки*/
         if($result_obj['razdel']==1){$link='colection';}
         /*блок вывода*/
?> 
               <div class="portfolio-item cat0" style="position: absolute; left: 0px; top: 0px;">
                    <a href="\<?php echo $link;?>" class="thumb">
                        <img src="<?php echo $result_media['src'];?>" alt="">
                        <div class="portfolio-hover">
                            <div class="portfolio-description">
                                <h4><?php echo   $result_obj['name'];?></h4>
                                <p><?php echo   $result_obj['descr'];?></p>
                            </div>
                        </div>
                    </a>
                </div>
<?php
}
}
}
     }
?>    

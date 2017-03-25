<script>
        function subm(){
document.getElementById('subm').style = 'display:none';
document.getElementById('nav_kat').style = 'display:none';
        };
        function submd(){
 document.getElementById('subm').style = 'display:block';
        };
        function displ(){
document.getElementById('nav_kat').style = 'display:block';
document.getElementById('subm').style = 'display:block';
        };
    </script>
                   <div class=" text-center ">
                <ul class="portfolio-filter">
                    <li class="active"><a href="#" onClick="subm();" data-filter="">Все</a></li>
                    <li><a href="#" onClick="submd();"  data-filter=".cat1">Картины</a></li>
                    <li><a href="#" onClick="displ();" data-filter=".cat2">Роспись по ткани</a></li>
                    <li><a href="#" onClick="displ();" data-filter=".cat3">Подушки</a></li>
                    <li><a href="#" onClick="submd();" data-filter=".cat4">Галерея</a></li>
                    <li><a href="#" onClick="submd();" data-filter=".cat5">Ирина Кваша</a></li>
                </ul>
    </br>
    <center>
<div id="subm" style = 'display:none'>
<h class="portfolio">
    <div class="portfolio-item cat1">
              <p>Колекции</p>
               </div>
</h>
<h class="portfolio">
    <div class="portfolio-item cat2">
              <p>Разделы</p>
               </div>
</h>   
<h class="portfolio">
    <div class="portfolio-item cat3">
              <p>Предложения</p>
               </div>
</h>
<h class="portfolio">
    <div class="portfolio-item cat4">
              <p>Новости</p>
               </div>
</h>
<h class="portfolio">
    <div class="portfolio-item cat5">
              <p>События</p>
               </div>
</h>         
    </div>               
</center>
  <div class="portfolio portfolio-masonry col-3 gutter " style="position: relative; height: 1092px;">   
<div class="cat2 cat3" id="nav_kat" style="display:none;">
 
<?php get_kat()?>

</div>             
     </div>
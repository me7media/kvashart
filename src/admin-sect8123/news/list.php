<?php if(GET("i")=="list"){?>
 <div id="galleryTab">
  <a data-rel="0"  href="javascript:;" class="filter active">Все</a>
  <a data-rel="1" href="javascript:;" class="filter">Коллекции</a>
  <a data-rel="2" href="javascript:;" class="filter">Превращ. одежды</a>
  <a data-rel="3" href="javascript:;" class="filter">Фешн колл.</a>
  <a data-rel="4" href="javascript:;" class="filter">Аксессуары</a>
  <a data-rel="5" href="javascript:;" class="filter">Подушки (АВ)</a>
  <a data-rel="6" href="javascript:;" class="filter">Детские под.</a>
  <a data-rel="7" href="javascript:;" class="filter">Декоратив.</a>
</div>
<?php };?>
<?php if(GET("i")=="news"){?>
<div id="galleryTab">
  <a data-rel="10"  href="javascript:;" class="filter active">Все</a>
  <a data-rel="8" href="javascript:;" class="filter">Галерея</a>
  <a data-rel="9" href="javascript:;" class="filter">Ирина Кваша</a>
</div>
<?php };?>
</br></br></br>
	<table class="bordered" width="90%" align="center">
<?php
$g_lang['m_title'] = 'Список';


$MozaikModel = new  MozaikModel();

   $MozaikModel->pull_list();
    ?>
</table>
</br>
<a class="btn btn-success" href="<?= SiteRoot($g_config['admin_sector']['page'] .'/news/add') ?>">Добавить запись</a>
<script type="text/javascript" src="../../i/js/jquery.min.js"></script>

<!-- Админ часть-->
<div id="queue"></div>
<div class="row marketing">

        <div class="col-lg-12">
			<form id="newsform" action="" role="form" method="post" enctype="multipart/form-data">
			
			  <div class="form-group">
				<label>Создать <small>*</small>:</label>
				<select class="form-control selectpicker" name="obj_type" id="obj_type" onchange="ds_img(this.value)">
<?= $options;?>
				</select>
			  </div>
			  <div class="form-group">
				<label>Название <small>*</small>:</label>
				<input id="obj_title"  name="obj_title" class="form-control" <?= $pv;?>="<?= $name;?>">
			  </div>
			  <div class="form-group">
				<label for="exampleInputPassword1">Описание <small>*</small>:</label>
				
			  </div>
			  <input type="text" name="obj_descr" id="obj_descr" class="form-control"  <?= $pv;?>="<?= $descr;?>">
<!--
* HTML5 DROP
-->
         <div id="toch">
       <center><h3> Выберите раздел публикации </h3></center>
          </div>
          <div id="toche"  style="display:none;">
          <center><h4>Для корректного отображения страници вам необходимо выбрать (3) изображения!!!</h4></center>
          </div>
<div id="uplb">
	<center><h3>Добавить файлы</h3></center>
       
        <center><div id="frm">
        	<input type="file" id="uploadbtn" accept="image/*" multiple name="image"/>
            </div>
        </center>
        	        <!-- Кнопки загрузить и удалить, а также количество файлов -->
<center>
        	<div id="upload-button">

                	<span>0 Файлов</span>
					
                    <!-- Прогресс бар загрузки -->
                	<div id="loading">
						<div id="loading-bar">
							<div class="loading-color"></div>
						</div>
						<div id="loading-content"></div>
					</div>
			</div>
</center>
</div>
    <!-- Область предпросмотра -->
	<div id="uploaded-holder"> 
		<center>
			<h3>Загруженные изображения</h3>
			</center>
		<div id="dropped-files">
           <div id="file-name-holder">
		<div id="uploaded-files">


		</div>
		<div id="upl">
<?= $f;?>
		</div>
					  
	</div>

        </div>
	</div>
	</div>
                     <div id="toc">
          <center><h3>Добавьте описания и нажмите "Сохранить".</h3></center>
          </div>            
<div class="col-md-4 col-sm-4 col-xs-12 col-md-offset-4" style="margin-top: 15px;">
	<input type="button"  id="submitImgs" value="Загрузить" class="upload btn btn-info btn-block" style="display:none;">
   <?php if(GET('req')){ echo '<input type="hidden" name="req" value="req">';}?>
    <button  id="submitForm" onclick='document.getElementById("newsform").submit();' value="Сохранить" class="btn btn-info btn-block">Сохранить</button>
</div>
			  </form>
    <div id="delr" style="display:none;"></div>
        </div>
        
<head>
    
		<!-- <link href="<?= Root('i/adm/css/selectpicker/bootstrap-select.css')?>" rel="stylesheet">-->
</head>
<bodyend>

<script src="<?= Root('i/js/javascript.js')?>"></script>
<script>
    <?php  if(!GET('req')){ 
        echo
        "document.getElementById('submitForm').style = 'display:none';
        document.getElementById('toc').style = 'display:none';
        document.getElementById('uploaded-files').style = 'display:none';
        document.getElementById('uploaded-holder').style = 'display:none';
        document.getElementById('uplb').style = 'display:none';";
        
}
    else{
        echo
        "document.getElementById('uploaded-files').style = 'display:block';
        document.getElementById('uploaded-holder').style = 'display:block';
        document.getElementById('toch').style = 'display:none';";
    };?>
    
    
        function if_del(id)
    {   
        document.getElementById(id).value = 'del';
        document.getElementById('img-'+id+'').style = 'display:none';
        document.getElementById('img-del-'+id+'').style = 'display:block';
        
    };
   function  re_del(id)
        {   
        document.getElementById(id).value = '';
        document.getElementById('img-'+id+'').style = 'display:block';
        document.getElementById('img-del-'+id+'').style = 'display:none';
        
    };
    function ds_img(type)
    {
        
            if(type>1){
         document.getElementById('uplb').style = 'display:block';
         document.getElementById('toch').style = 'display:none';
         document.getElementById('toche').style = 'display:block';
        } else if (type<2){
         document.getElementById('uplb').style = 'display:block';
         document.getElementById('toch').style = 'display:none';
         document.getElementById('toche').style = 'display:none';
        };
    }
    
    
    </script>
	<!--  Selectpicker -->
		<!-- <script src="<?= Root('i/adm/js/selectpicker/bootstrap-select.min.js')?>"></script>-->
</bodyend>
 </div>
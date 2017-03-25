var $ = jQuery.noConflict();

$(document).ready(function() {
     var ii=0;
	// В dataTransfer помещаются изображения которые перетащили в область div
	//jQuery.event.props.push('dataTransfer');
	
	// Максимальное количество загружаемых изображений за одни раз
	var maxFiles = 10;
	var minFiles = 3;
	// Оповещение по умолчанию
	var errMessage = 0;
	
	// Кнопка выбора файлов
	var defaultUploadBtn = $('#uploadbtn');
	
	// Массив для всех изображений
	var dataArray = [];
	// Область информер о загруженных изображениях - скрыта


	// При нажатии на кнопку выбора файлов
	defaultUploadBtn.on('change', function() {
        ii++;
        dataArray.splice(0, dataArray.length);
   		// Заполняем массив выбранными изображениями
   		var files = $(this)[0].files;
    
   		// Проверяем на максимальное количество файлов
		if (files.length <= maxFiles) {
			// Передаем массив с файлами в функцию загрузки на предпросмотр
          loadInView(files);
            
            
			// Очищаем инпут файл путем сброса формы
            $('#frm').each(function(){
	        	    this.reset();
			});
            
     var v = $(this)[0].value;
  v = v.search(/^.*\.(?:jpg|jpeg|bmp|png|gif)\s*$/ig)
  if(v){
     alert("Неправильный формат файла\n Форма будет очищена");
	//  Очищаем инпут файл путем сброса формы
	$('#frm').each(function(){
	        	    $('#frm').reset();
			});
			
  }
           
		} else {
			alert('Вы не можете загружать больше '+maxFiles+' изображений!'); 
			files.length = 0;
		}
        
    });
	
	// Функция загрузки изображений на предросмотр
	function loadInView(files) {
		// Показываем обасть предпросмотра
		$('#uploaded-holder').show();
		
		// Для каждого файла
		$.each(files, function(index, file) {
						
			// Несколько оповещений при попытке загрузить не изображение
			if (!files[index].type.match('image.*')) {
				
				if(errMessage == 0) {
					$('#drop-files p').html('Эй! только изображения!');
					++errMessage
				}
				else if(errMessage == 1) {
					$('#drop-files p').html('Стоп! Загружаются только изображения!');
					++errMessage
				}
				else if(errMessage == 2) {
					$('#drop-files p').html("Не умеешь читать? Только изображения!");
					++errMessage
				}
				else if(errMessage == 3) {
					$('#drop-files p').html("Хорошо! Продолжай в том же духе");
					errMessage = 0;
				}
				return false;
			}
			
			// Проверяем количество загружаемых элементов
			if((dataArray.length+files.length) <= maxFiles) {
				// показываем область с кнопками
				$('#upload-button').css({'display' : 'block'});
			} 
			else { alert('Вы не можете загружать больше '+maxFiles+' изображений!'); return true; }
			
            
            
            
			// Создаем новый экземпляра FileReader
			var fileReader = new FileReader();
				// Инициируем функцию FileReader
				fileReader.onload = (function(file) {
		
					return function(e) {
						
						dataArray.push({name : file.name, value : fileReader.result});
					addImage((dataArray.length-1));
                         
					};
				})(files[index]);
			// Производим чтение картинки по URI
			fileReader.readAsDataURL(file);
		});
return false;
		
	};
    
	// Процедура добавления эскизов на страницу
	function addImage(ind) {
       
		// Если индекс отрицательный значит выводим весь массив изображений
		if (ind < 0 ) { 
		start = 0; end = dataArray.length; 
		} else {
		// иначе только определенное изображение 
		start = ind; end = ind+1; } 
        
        
		// Оповещения о загруженных файлах
		if(dataArray.length == 0) {
			// Если пустой массив скрываем кнопки и всю область
			$('#upload-button').hide();
			$('#uploaded-holder').hide();
		} else if (dataArray.length == 1) {
			$('#upload-button span').html("Был выбран 1 файл. ^^^ Добавить еще^^^");
		} else {
			$('#upload-button span').html("были выбраны "+dataArray.length+" файла. ^^^ Добавить еще^^^");
		}
		// Цикл для каждого элемента массива
		for (i = start; i < end; i++) {
		
		$('#loading-content').html('Загружаем '+dataArray[0].name);
		
        var totalPercent = 100 / dataArray.length;
		var x = 0; 
            
            var type = $('#obj_type').val();
            if(type==1){maxFiles=10; minFiles=10;} else {minFiles=3;maxFiles=3;};
            if(dataArray.length <= minFiles) {
			// размещаем загруженные изображения
			if(dataArray.length <= maxFiles) { 

j=ii;
var k = '<div id="img-'+i+j+'" class="image" style="background: url('+dataArray[i].value+'); background-size: cover;"><a href="#" id="img-'+i+j+'" class="drop-button">';
var nm = ''+dataArray[i].name+'';
var bl = '<div class="in_block" id="img-'+i+j+'">';
//var ddel = '<span id="img-'+i+j+'" style="display:none;"><span>';
//var dmass = '<li id="img-'+i+j+'" style="display:none;" >'+nm+'  Был удален! <a href="#" class="fde" rel="img-'+i+j+'"> Востановить?!</a></li>';
          /// Загружаем страницу и передаем значения, используя HTTP POST запрос 
                $("#loading").show();
                
			$.post('upload', dataArray[i], function(data) {
                
				++x;
				// data формируется в upload.php
				var dataSplit = data.split(':');
		if(dataSplit[1] == 'ok') {

//$('#delr').append(ddel);$('#uploaded-files').append(dmass)
$('#uploaded-files').append(bl+'<li><a href="../../upl/photos/'+dataSplit[0]+'">'+nm+'</a> загружен успешно!</li><div class="row"><div class="col-md-5 col-sm-5 col-xs-12"><br><div class="col-md-12 col-sm-12 col-xs-12"><label>Изображение:</label><div class="col-md-12 col-sm-12 col-xs-12">'+k+'Удалить изображение</a></div></div></div><div class="col-md-12 col-sm-12 col-xs-12 status"></div></div><div class="col-md-6 col-sm-6 col-xs-5"><br><div class="col-md-12 col-sm-12 col-xs-12"><label>Название:</label><div class="col-md-12 col-sm-12 col-xs-12"><input class="form-control" name="name['+dataSplit[2]+']" id="'+dataSplit[0]+'"></div></div><div class="col-md-12 col-sm-12 col-xs-12"><label>Описание:</label><div class="col-md-12 col-sm-12 col-xs-12"><textarea name="descr['+dataSplit[2]+']" class="form-control" style="height:100px; id="'+dataSplit[0]+'"></textarea></div></div></div></div><input type="hidden" name="media_id['+dataSplit[2]+']" value="'+nm+'"></div>');
         
				/// Изменение бара загрузки
				$('#loading-bar .loading-color').css({'width' : totalPercent*(x)+'%'});
				/// Если загрузка закончилась
				if(totalPercent*(x) == 100) {
					/// Загрузка завершена
					$('#loading-content').html('Загрузка завершена!');
					
					/// Вызываем функцию удаления всех изображений после задержки 1 секунда
					setTimeout(restartFiles, 1000);
				/// Если еще продолжается загрузка	
				} else if(totalPercent*(x) < 100) {
					// Какой файл загружается
					$('#loading-content').html('Загружается '+nm);
				};
				/// Изменение бара загрузки
				$('#loading-bar .loading-color').css({'width' : totalPercent*(x)+'%'});
				// Формируем в виде списка все загруженные изображения

				} else {
	$('#uploaded-files').append('<li><a href="../../upl/photos/'+dataSplit[0]+'">'+nm+'</a> Не загружен!</li>');
            ii--;j--;i--;
				}
				
			});
        // Показываем список загруженных файлов
		$('#uploaded-files').show();
		$('#submitImgs').hide();
		$('#dropped-files #upl').hide(); 
                
			}else {alert('Не менее 3 файлов!');$('#submitForm').show();$('#upl').show();}///мало
                } else {alert('Не более 3 файлов!');$('#submitForm').show();$('#upl').hide();}///3

		}
        
		return false;
	}
	// Функция удаления всех изображений
	function restartFiles() {
	
		// Установим бар загрузки в значение по умолчанию
		$('#loading-bar .loading-color').css({'width' : '0%'});
		$('#loading').css({'display' : 'none'});
	//	$('#loading-content').html(' ');
        
        ////подсчет картинок и визуализация кнопок
        var type = $('#obj_type').val();
        
        if(i>0){l=i;};
        if(j>1){l=j;};
        
        if(type==1){
         if(l<1){$('#submitForm').hide();$('#upl').show();$('#uplb').show();}
            else{$('#submitForm').show();$('#upl').hide();};} 
        else {
         if(l>=3){$('#submitForm').show();$('#upl').hide(); $('#toche').hide();$('#toc').show();}
            else{$('#submitForm').hide();$('#upl').show();
                 };};
		// Очищаем массив
		dataArray.length = 1;
		
		return false;
	}
	/*/// востановление удаленного
		 $(".fde").on("click","a[rel^='img']", function() {
        ii++;j++;i++;
		// получаем название id
 		var elid = $(this).attr('id');
		// создаем массив для разделенных строк
		var temp = new Array();
		// делим строку id на 2 части
		temp = eid.split('-');
		// получаем значение после тире тоесть индекс изображения в массиве
		dataArray.splice(temp[1],1);
      
    var to =  $('#uploaded-files');
    var tt =  $('#delr span[id^='+eid+']').html();
   alert(tt);
        to.append(tt);
        
        $('li[id^='+eid+']').hide()
        
         ////подсчет картинок и визуализация кнопок
        var type = $('#obj_type').val();
        
          if(i>0){l=i+1;} else if(j>1){l=j;};
        if(type==1){if(l<1){$('#submitForm').hide();$('#upl').show();$('#uplb').show();}
                    else{ $('#submitForm').show();$('#upl').hide();};} 
        else {
        if(l>3){$('#submitForm').show();$('#upl').hide(); $('#toche').hide();$('#toc').show();$('#uplb').hide();}
            else{$('#submitForm').hide();$('#upl').show();$('#uplb').show();};
                };
    });
    */
	// Удаление только выбранного изображения 
	$("#dropped-files").on("click","a[id^='img']", function() {
        ii--;j--;i--;
        var lnk = '<input type="hidden" name="delete" value="del">';
        $('#dropped-files').append(lnk);
		// получаем название id
 		var elid = $(this).attr('id');
		// создаем массив для разделенных строк
		var temp = new Array();
		// делим строку id на 2 части
		temp = elid.split('-');
		// получаем значение после тире тоесть индекс изображения в массиве
		dataArray.splice(temp[1],1);
        var to =  $('#delr span[id^='+elid+']');
        var tt =  $('div[id^='+elid+']').html();
        to.append(tt);
        $('div[id^='+elid+']').remove()
        $('li[id^='+elid+']').show()
        $('#upload-button span').html("");
        
        ////подсчет картинок и визуализация кнопок
        var type = $('#obj_type').val();
        
        if(i>0){l=i;};
        if(j>1){l=j;};
        
        if(type==1){
         if(l<1){$('#submitForm').hide();$('#upl').show();$('#uplb').show();}
            else{$('#submitForm').show();$('#upl').hide();};} 
        else {
         if(l>=3){$('#submitForm').show();$('#upl').hide(); $('#toche').hide();$('#toc').show();}
            else{$('#submitForm').hide();$('#upl').show();
                 };};
        
	});
	
   
		});
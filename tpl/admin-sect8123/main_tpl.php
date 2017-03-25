<!DOCTYPE html>
<html lang="<?= LANG?>">
	<head>
		<title><?= L('m_title')?></title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="icon" href="<?= Root('favicon.ico')?>" type="image/x-icon" />
        <link rel="shortcut icon" href="<?= Root('favicon.ico')?>" type="image/x-icon" />
		

        <link rel="stylesheet" href="<?= Root('i/css/bootstrap.min.css')?>">
		<link rel="stylesheet" href="<?= Root('i/css/bootstrap-theme.min.css')?>">
		<link rel="stylesheet" href="<?= Root('i/css/admin_style.css')?>">
		<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
		        <!-- extraPacker -->
		
		<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script>window.jQuery || document.write('<script src="../../i/js/jquery-1.11.1.min.js"><\/script>');</script>
		<!-- Include all compiled plugins (below), or include individual files as needed -->
		<script src="<?= Root('i/js/bootstrap.min.js')?>"></script>
		<script src="<?= Root('i/js/bootstrap-typeahead.min.js')?>"></script>
		<script> var ajax_root = '<?= Root() ?>'; </script>
        <meta name="robots" content="noindex, nofollow">
	</head>
    <body>
	    <div class="container-narrow">
			<div class="masthead">
				<?php IncludeCom($g_config['admin_sector']['page'].'/admin_menu', array('menu' => $menu))?>
				<h3 class="muted">Админ панель</h3>
		  	</div>
			<br/>
            <div id="legend">
	          	<legend><?= $current['name'] ?></legend>
            </div>
            <div><?= $content?></div>
            
            <!--<div class="container-form"> </div>-->
            <hr>
          	<div class="footer">
				&copy; Powered by <a href="#">Us)</a>
		  	</div>	    </div>
	</body>
</html>
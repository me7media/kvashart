    <head>
		<script src="<?= Root('i/wysibb/jquery.wysibb.js?v=3')?>"></script>
		<link rel="stylesheet" href="<?= Root('i/wysibb/theme/default/wbbtheme.css')?>" />
		<script src="<?= Root('i/wysibb/lang/ru.js')?>"></script>
        <script type="text/javascript">

		var wbbOpt = {
			buttons: "bold,underline,|,bullist,numlist,|,link,|,quote,removeFormat",
			imgupload: false,
		}
        </script>
    </head>


    <textarea id="<?= $name?>" name="<?= $name?>"><?= $value?></textarea>

<bodyend>	
<script type="text/javascript">
$(function() {
  $("#<?= $name?>").wysibb(wbbOpt);
})
</script>
</bodyend>
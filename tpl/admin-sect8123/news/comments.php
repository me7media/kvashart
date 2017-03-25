<div class="col-lg-12">
	<div id="comments" class="company-page-comments clearfix">
		<h5 class="title">Всего комментариев (<span id="comm-count"><?= $comments_count ?></span>)</h5>
			<ul class="comments custom-list">

	<?= $comments_list ?>

			</ul>
	</div>
</div>
<? IncludeCom("dev/paginator", array(
    "pageUrl"      => GetCurUrl("page=" . M_PAGINATOR_PAGE), // Ссылка на нужную страницу списка через GetCurUrl()
    "firstPageUrl" => GetCurUrl("page=" . M_DELETE_PARAM),   // Ссылка на первую страницу списка через GetCurUrl()
    "total"        => $comments_count,
    "perPage"      => $per_page,
    "curPage"      => $page
)); 

?>
<bodyend>

<script>
$('.status').on('click', '.delicon', function(){
	var photo_id = $(this).data("id");
	$.ajax({
	  type: "POST",
	  url: "/admin-sect8123/ajax/image",
	  data: { action: "del", photo_id: photo_id },
	  success: function(data) {
		 $( "#upload-screen .status" ).html( data.html);
		  displayNotify(data);
	  },
	  dataType: 'json'
	});
	return false;
});
</script>  
</bodyend>
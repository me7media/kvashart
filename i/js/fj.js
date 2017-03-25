$(document).ready(function() {
	$(".fancybox").fancybox({
        
	'titleFormat':function(itemTitle, itemArray, itemIndex, itemOpts) {
                  return itemTitle + '<span> Image ' + (itemIndex + 1) + ' of ' + itemArray.length + '</span>';
				}
	});
    $("#offer").fancybox({
				'width'				: '75%',
				'height'			: 'auto',
				'autoScale'			: false,
				'transitionIn'		: 'none',
				'transitionOut'		: 'none',
				'type'				: 'iframe'

});
 $('.fancybox').fancybox({
  beforeShow : function(){
   this.title =  $(this.element).data("caption");
  }
 });
});
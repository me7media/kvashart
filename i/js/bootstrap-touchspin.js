$(function(){

    $('.spinner .btn:first-of-type').on('click', function() {
      var btn = $(this);
      var input = btn.closest('.spinner').find('input');
      var input_step = input.attr('step') != undefined ? parseInt(input.attr('step')) : 1;
      if (input.attr('max') == undefined || parseInt(input.val()) < parseInt(input.attr('max'))) {    
        input.val(parseInt(input.val(), 10) + input_step);
      } else {
        btn.next("disabled", true);
      }
	  input.trigger("change");
    });
    $('.spinner .btn:last-of-type').on('click', function() {
      var btn = $(this);
      var input = btn.closest('.spinner').find('input');
	  var input_step = input.attr('step') != undefined ? parseInt(input.attr('step')) : 1;
      if (input.attr('min') == undefined || parseInt(input.val()) > parseInt(input.attr('min'))) {    
        input.val(parseInt(input.val(), 10) - input_step);
      } else {
        btn.prev("disabled", true);
      }
	  input.trigger("change");
    });

})
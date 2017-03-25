<?php IncludeCom('../../dev/init_fancybox')?>
<style>
    .filter {
  border: 1px solid #ccc;
  color: #333333;
  float: left;
  font-size: 12px;
  margin: 0 12px 0 0;
  padding: 5px 15px;
  text-align: center;
  text-decoration: none;
 -webkit-border-radius: 3px;
    -moz-border-radius: 3px;
         border-radius: 3px;
}
.filter:hover {
  background-color: #f8f8f8;
 -webkit-box-shadow: -2px 2px 5px 1px #a3a3a3;
    -moz-box-shadow: -2px 2px 5px 1px #a3a3a3;
         box-shadow: -2px 2px 5px 1px #a3a3a3;
  margin: -1px 11px 1px 1px;
  border-bottom: solid 1px #aaa;
  border-left: solid 1px #aaa;
}
.filter.active {
  background-color: #e2e2e2;
  border: 1px solid #ccc;
  color: #000;
  cursor: default;
  margin: 0 12px 0 0;
 -webkit-box-shadow: none;
    -moz-box-shadow: none;
         box-shadow: none;  
}
</style>

<script>

    jQuery(function ($) {
    // fancybox
    // filter selector
    $(".filter").on("click", function () {
    var $this = $(this);
    // if we click the active tab, do nothing
    if (!$this.hasClass("active")) {
      $(".filter").removeClass("active");
      $this.addClass("active"); // set the active tab
      var $filter = $this.data("rel"); // get the data-rel value from selected tab and set as filter
      $filter == '0' ? // if we select "view all", return to initial settings and show all
       $(".fancybox").attr("data-fancybox-group", "group1").not(":visible").fadeIn() 

        : // otherwise
        $(".fancybox").fadeOut(0).filter(function () { 
          return $(this).data("filter") == $filter; // set data-filter value as the data-rel value of selected tab
        }).attr("data-fancybox-group", $filter).fadeIn(1000); // set data-fancybox-group and show filtered elements
    } // if
        // if we click the active tab, do nothing
    if (!$this.hasClass("active")) {
      $(".filter").removeClass("active");
      $this.addClass("active"); // set the active tab
      var $filter = $this.data("rel"); // get the data-rel value from selected tab and set as filter
      $filter == '01' ? // if we select "view all", return to initial settings and show all
       $(".fancybox").attr("data-fancybox-group", "group2").not(":visible").fadeIn() 

        : // otherwise
        $(".fancybox").fadeOut(0).filter(function () { 
          return $(this).data("filter") == $filter; // set data-filter value as the data-rel value of selected tab
        }).attr("data-fancybox-group", $filter).fadeIn(1000); // set data-fancybox-group and show filtered elements
    } // if
        
        
            if (!$this.hasClass("active")) {
      $(".filter").removeClass("active");
      $this.addClass("active"); // set the active tab
      var $filter = $this.data("rel"); // get the data-rel value from selected tab and set as filter
      $filter == '0' ? // if we select "view all", return to initial settings and show all
       $(".fancybox").attr("data-fancybox-group", "0").not(":visible").fadeIn() 

        : // otherwise
        $(".fancybox").fadeOut(0).filter(function () { 
          return $(this).data("filter") == $filter; // set data-filter value as the data-rel value of selected tab
        }).attr("data-fancybox-group", $filter).fadeIn(1000); // set data-fancybox-group and show filtered elements
    } // if
        // if we click the active tab, do nothing
    if (!$this.hasClass("active")) {
      $(".filter").removeClass("active");
      $this.addClass("active"); // set the active tab
      var $filter = $this.data("rel"); // get the data-rel value from selected tab and set as filter
      $filter == '10' ? // if we select "view all", return to initial settings and show all
       $(".fancybox").attr("data-fancybox-group", "00").not(":visible").fadeIn() 

        : // otherwise
        $(".fancybox").fadeOut(0).filter(function () { 
          return $(this).data("filter") == $filter; // set data-filter value as the data-rel value of selected tab
        }).attr("data-fancybox-group", $filter).fadeIn(1000); // set data-fancybox-group and show filtered elements
    } // if
        
        
  }); // on

        
}); // ready
</script>


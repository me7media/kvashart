
    function InitFancyBox()
    {
        if ($('.fancybox').has())
        {
            $('.fancybox').fancybox
            ({
                'titleShow'     : true,
                'transitionIn'  : 'elastic',
                'transitionOut' : 'elastic'
            });
        };

        if ($('.fancybox-simple').has())
        {
            $('.fancybox-simple').fancybox
            ({
                'titleShow'     : true,
                'transitionIn'  : 'elastic',
                'transitionOut' : 'elastic'
            });
        };

        if ($('.fancyboxes a').has())
        {
            $('.fancyboxes a').fancybox
            ({
                'titleShow'     : true,
                'transitionIn'  : 'elastic',
                'transitionOut' : 'elastic'
            });
        };

        if ($('.fancyboxes a[rel=group]').has())
        {
            $('.fancyboxes a[rel=group]').fancybox
            ({
                'transitionIn'      : 'elastic',
                'transitionOut'     : 'elastic',
                'titlePosition'     : 'over',
                'titleFormat'       : function(title, currentArray, currentIndex, currentOpts)
                {
                    return '<span id=\"fancybox-title-over\"><strong>' + (currentIndex + 1) + ' / ' + currentArray.length + (title.length ? '</strong> &nbsp; ' + title : '') + '</span>';
                }
            });
        };

        if ($('.fancyboxes a[rel=group]').has())
        {
            $('.fancybox-media').fancybox
            ({
                openEffect  : 'none',
                closeEffect : 'none',
                helpers : {
                              media : {}
                          }
            });
        }
    }


    $(document).ready
    (
        function()
        {
            InitFancyBox();
        }
    );
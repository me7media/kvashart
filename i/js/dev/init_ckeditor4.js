    $(document).ready(function()
    {
        if(typeof CKEDITOR != 'undefined')
        {
            CKEDITOR.disableAutoInline = true;

            $(".js')?>-ckeditor4").each(function()
            {
                $(this).attr("contentEditable", 'true'); // иначе панелька будет в режиме readonly        
                var config = 
                {
                    scayt_autoStartup:    false, // включаем проверку орфографии по умолчанию                                                                                                                                          
                    autoGrow_onStartup:   true, // Whether to have the auto grow happen on editor creation.                                                                                                                    
                    filebrowserUploadUrl: "/ajax/uploader", // The location of the script that handles file uploads. If set, the Upload tab will appear in the Link, Image, and Flash dialog windows.
                
                    readOnly: false,
                };
                if (typeof g_ckeditor4_contentCss !== "undefined" && g_ckeditor4_contentCss != "")
                {
                    config.contentsCss = g_ckeditor4_contentCss; // Подменяем css файл чтобы всё было в стилистике сайта
                }
                if ($(this).attr("mode") == "short")
                {
                    config.toolbarGroups = 
                    [
                        { name: 'clipboard',   groups: [ 'undo' ] },
                        { name: 'basicstyles', groups: [ 'basicstyles' ] },
                        //'/',
                        { name: 'paragraph',   groups: [ 'list', 'indent', 'blocks', 'align' ] },
                        { name: 'links'  },
                    ];
                }
                else
                {
                    config.toolbar = 
                    [
                        {
                            name: 'document', 
                            groups: 
                            [
                                'mode', 
                                'document', 
                                'doctools' 
                            ], 
                            items: 
                            [ 
                                'Source', 
                                //'-', 
                                //'Save', 
                                //'NewPage', 
                                //'Preview', 
                                //'Print', 
                                //'-', 
                                //'Templates' 
                            ] 
                        },
                        { 
                            name: 'clipboard', 
                            groups: 
                            [ 
                                'clipboard', 
                                'undo' 
                            ], 
                            items: 
                            [ 
                                'Cut', 
                                'Copy', 
                                'Paste', 
                                'PasteText', 
                                'PasteFromWord', 
                                '-', 
                                'Undo', 
                                'Redo' 
                            ] 
                        },
                        { 
                            name: 'editing',   
                            groups: 
                            [ 
                                'find', 
                                'selection', 
                                'spellchecker' 
                            ], 
                            items: 
                            [ 
                                'Find', 
                                'Replace', 
                                '-', 
                                'SelectAll', 
                                '-', 
                                'Scayt' 
                            ] 
                        },
                        { 
                            name: 'tools',  
                            items: 
                            [
                                'Maximize',
                                //'ShowBlocks' 
                            ] 
                        },
                        { 
                            name: 'others', 
                            items: 
                            [
                                '-' 
                            ]
                        },
                        { 
                            name: 'about',  
                            items: 
                            [
                                'About'
                            ] 
                        },
                        //{ 
                        //    name: 'forms',     
                        //    items: 
                        //    [ 
                        //        'Form', 
                        //        'Checkbox', 
                        //        'Radio', 
                        //        'TextField', 
                        //        'Textarea', 
                        //        'Select', 
                        //        'Button', 
                        //        'ImageButton', 
                        //        'HiddenField' 
                        //    ] 
                        //},
                        '/',
                        { 
                            name: 'styles', items: 
                            [
                                //'Styles',
                                'Format',
                                //'Font',
                                //'FontSize' 
                            ] 
                        },
                        { 
                            name: 'basicstyles', 
                            groups: 
                            [
                                'basicstyles', 
                                'cleanup' 
                            ], 
                            items: 
                            [ 
                                'Bold', 
                                'Italic', 
                                'Underline', 
                                'Strike', 
                                'Subscript', 
                                'Superscript', 
                                '-', 
                                'RemoveFormat' 
                            ] 
                        },
                        { 
                            name: 'colors', 
                            items: 
                            [
                                'TextColor',
                                'BGColor' 
                            ] 
                        },
                        { 
                            name: 'paragraph',   
                            groups: 
                            [
                                'list', 
                                'indent', 
                                'blocks', 
                                'align', 
                                'bidi' 
                            ], 
                            items: 
                            [ 
                                'NumberedList', 
                                'BulletedList', 
                                '-', 
                                'Outdent', 
                                'Indent', 
                                //'-', 
                                //'Blockquote', 
                                //'CreateDiv', 
                                '-', 
                                'JustifyLeft', 
                                'JustifyCenter', 
                                'JustifyRight', 
                                //'JustifyBlock', 
                                //'-', 
                                //'BidiLtr', 
                                //'BidiRtl', 
                                //'Language' 
                            ] 
                        },
                        { 
                            name: 'links',       
                            items: 
                            [ 
                                'Link', 
                                'Unlink', 
                                //'Anchor' 
                            ] 
                        },
                        { 
                            name: 'insert',
                            items: 
                            [
                                'Image', 
                                'Flash', 
                                'Table', 
                                'HorizontalRule', 
                                //'Smiley', 
                                'SpecialChar', 
                                'PageBreak', 
                                'Iframe' 
                            ] 
                        },
                    ];
                }
                var id = $(this).attr("id");
                if (!CKEDITOR.dom.element.get(id).getEditor())
                {
                    CKEDITOR.replace(id, config);
                }
            });
        }
    });

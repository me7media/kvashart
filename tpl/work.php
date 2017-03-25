<?php IncludeCom('dev/init_fancybox')?>

           <div class="container">
            

            <div class="row">
                <div class="col-md-12">

                   <div class=" auth-txt gray-bg">
                        <div class="media">
                            <div class=" media-left plr30">
                              
                                    <img class="media-object" src="upl/photos/thumbs/<?= $work_src[0];?>" style="height: 250px;">
                            
                            </div>
                            <div class="media-body v-mid pr30">
                                <h4 class="text-uppercase"><?= $name;?></h4>
                                <time datetime="2014-09-25T05:33:30+00:00"><?= $date;?></time>
                                <p><?= $descr;?></p>
                                <div class="col-md-12 col-md-offset-6">
                    <a href='\offer?w=<?= $work_src[0];?>' id='offer' class="btn btn-read">Заказать работу</a>
                                </div>
            </div>
        </div>
    </div>

    </div>
</div>
            
            
            
                    <!--blog post-->
     <div class="latest-blog-post">
                        <div class="row">
                            <div class="col-md-4">
                                <a href="upl/photos/<?= $work_src[0];?>" rel="gallery" class="fancybox"><img src="upl/photos/thumbs/<?= $work_src[0];?>" alt=""></a>
                                <h3><a href="#"><?=$work_title[0];?></a></h3>
                                <div class="cat">
                                    <?=$work_descr[0];?>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <a href="upl/photos/<?= $work_src[1];?>" rel="gallery" class="fancybox"><img src="upl/photos/thumbs/<?= $work_src[1];?>" alt=""></a>
                                <h3><a href="#"><?=$work_title[1];?></a></h3>
                                <div class="cat">
                                    <?=$work_descr[1];?>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <a href="upl/photos/<?= $work_src[2];?>" rel="gallery" class="fancybox"><img src="upl/photos/thumbs/<?= $work_src[2];?>" alt=""></a>
                                <h3><a href="#"><?=$work_title[2];?></a></h3>
                                <div class="cat">
                                    <?=$work_descr[2];?>
                                </div>
                            </div>
                    </div>
            </div>
                    <!--blog post-->

                
        </div>
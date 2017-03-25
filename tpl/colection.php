<?php IncludeCom('dev/init_fancybox')?>

            <div class="container">

            <div class="row">
                <div class="col-md-12">

                    <div class=" auth-txt gray-bg">
                        <div class="media">
                            <div class="media-left plr30">
                              
                                    <img class="media-object" src="upl/photos/thumbs/<?= $src;?>" style="height: 250px;">
                            
                            </div>
                            <div class="media-body v-mid pr30">
                                <h4 class="text-uppercase"><?= $name;?></h4>
                                <time><?= $date;?></time>
                                <p><?= $descr;?></p>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <!--Раздел Мозаик-->


<div class="container">
				
<div class="portfolio-box" id="gallery">
<div class="portfolio portfolio-masonry col-3 gutter " style="position: relative;">

<?php
    
$MozaikModel = new  MozaikModel();

    if(!GET('w')&&!GET('n')&&!GET('c')&&!GET('r')){$MozaikModel->pull_colections(1);}
    else if(GET('r')&&!GET('c')&&!GET('n')&&!GET('w')){$MozaikModel->pull_colection(GET('r'));}
    else if(GET('c')!=NULL){$MozaikModel->pull_colect(GET('r'),GET('c'));}
?>   
</div>
</div></div>



          <!--portfolio-->
        <div class="portfolio-box">

    <?php IncludeCom('/kategory') ?>
    <div class="portfolio portfolio-masonry col-3 gutter " style="position: relative; height: 1092px;" >
    <?php 
            
    $MozaikModel = new  MozaikModel();

    if(!GET('w')&&!GET('n')&&!GET('c')&&!GET('r')){$MozaikModel->pull_colections(1);}
    else if(GET('r')!=NULL&&!GET('c')&&!GET('n')&&!GET('w')){$MozaikModel->pull_colection(GET('r'));}
    else if(GET('c')!=NULL){$MozaikModel->pull_colect(GET('r'),GET('c'));}
            
            ?>
</div>
        </div>
        <!--portfolio-->

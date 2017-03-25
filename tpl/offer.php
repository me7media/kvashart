</br>
<?php

if(!POST('formail')){
if(GET('w')){
?><div class="container">
            <div class="row"> <center>
                            <div class="media-left plr30">
                              
                                    <img class="media-object" src="upl/photos/thumbs/<?= $res;?>" style="height: 110px;">
                            
                            </div>
                            <div class="media-right">
                               <p>Заказ работы:</p>
                                <h4 class="text-uppercase"><?= $name;?></h4>
                                <p><?= $descr;?></p>
                </div></center>
                </div>
</div>
<?php };?>
           </br>
            <div class="container">
                        <div class="row">
                            <div class="col-md-12">
                                <form class="contact-comments" action="\offer" method="post">
                                    <div class="row">
                                        <div class="col-md-4 ">
                                            <div class="form-group">
                                                <!-- Name -->
<input type="text" name="name" id="name" class=" form-control" placeholder="Ваше имя *" maxlength="100" required="">
                                            </div>
                                        </div>

                                        <div class="col-md-4 form-group">
                                            <div class="form-group">
                                                <!-- Email -->
<input type="email" name="email" id="email" class=" form-control" placeholder="Email *" maxlength="100" required="">
                                            </div>
                                        </div>

                                        <div class="col-md-4 form-group">
                                            <div class="form-group">
                                                <!-- Subject -->
<input type="text" name="subject" id="subject" class=" form-control" placeholder="Телефон *" maxlength="100">
                                            </div>
                                        </div>
                                            
                                        <div class="col-md-12 form-group">
                                            <div class="form-group">
                                                <!-- Comment -->
                                                <textarea name="comments" id="comments" class=" form-control" placeholder="Ваши коментарии" maxlength="400"><?php if(GET('w')){echo $cont;};?></textarea>
                                            </div>
                                            <div class="form-group text-center">
              <button type="submit" name="submit" value="submit" class="btn btn-read ">
                                                    Отправить
                                                </button>
                                            </div>
                                        </div>

                                    </div>
<input type="hidden" name="formail"  value="<?php if(GET('w')){echo $formail;} ?>">
                                </form>
                            </div>
                        </div>
                    </div>        
<?php } else {$g_config['isLoadInMainTpl'] = false;}; ?>
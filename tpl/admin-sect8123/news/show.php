<div class="row">
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <div class="x_panel">
                                <div class="x_title">
                                    <h2><span style="color: #fff; border-radius: 0;" class="label label-<?= $news_type['color']?>"><?= $news_type['name'] ?></span> <?= $news->title ?> <small><?= $news->status ? '' : '(черновик)' ?></small></h2>
                                    <div class="clearfix"></div>
                                </div>
                                <div class="x_content">

                                    <div style="border:0px solid #e5e5e5;" class="col-md-9 col-sm-9 col-xs-12">

                                        <p><?= bbcode($news->description) ?></p>
                                        <br>
										 <div class="col-md-12 col-sm-12 col-xs-12">
											<div id="news<?= $pid ?>" class="product_gallery">
											<? 	if(count($photos_ids)) {
													foreach ($photos_ids as $media_id) {
														$photo = new MediaModel($media_id); ?>
															<a href="<?= Root('upl/cp/'.$company->id.'/photos/'.$photo->value) ?>" title="<?= $news->title ?>" data-gallery="#blueimp-gallery-news<?= $pid ?>"><img alt="<?= $news->title ?>" width="100%" src="<?= Root('upl/cp/'.$company->id.'/photos/thumbs/'.$photo->value) ?>"></a>
											<?
													}
												} ?>
											</div>
										</div>

                                    </div>

								<div class="col-md-3 col-sm-3 col-xs-12">

                                        <section class="panel">
                                                <div class="project_detail">
													<p class="title">Компания:</p>
                                                    <p><img width="24px" src="<?= MediaModel::MainImgPath($company->id, $company->logo_image) ?>" alt=""> <a target="_blank" href="<?= $company->item_url ?>"><?= $company->name ?></a></p>
                                                    <p class="title">Разместил сотрудник:</p>
                                                    <p><img width="24px" src="<?= Root($author->avatar_80x80) ?>"> <?=  $author->fio_short ?></p>
                                                <div class="text-center mtop20">
													
													<? if($news->user_id == USER_ID) : ?>
													<a class="btn btn-xs btn-danger" href="<?= SiteRoot($g_config['admin_sector']['page'].'/news/add?pid='.$pid) ?>"><i class="fa fa-edit"></i> Редактировать</a> <a class="btn btn-xs btn-default" href="#" disabled><?= $news->status ? 'опубликовано' : 'черновик' ?></a><? endif; ?>
													<a target="_blank" class="btn btn-xs btn-warning btn-block" href="<?= $company->item_url ?>"><i class="fa fa-share"></i> Страница компании</a>
                                                    <a class="btn btn-sm btn-primary btn-block" href="<?= SiteRoot($g_config['admin_sector']['page'].'/dialogs/new?touser='.$news->user_id) ?>"><i class="fa fa-envelope"></i> Написать</a>
                                                </div>
                                                </div>

                                                <br>
                                                <!--<h5>Прикрепленные файлы</h5>
                                                <ul class="list-unstyled project_files">
                                                    <li><a href=""><i class="fa fa-file-word-o"></i> Functional-requirements.docx</a>
                                                    </li>
                                                    <li><a href=""><i class="fa fa-file-pdf-o"></i> UAT.pdf</a>
                                                    </li>
                                                    <li><a href=""><i class="fa fa-mail-forward"></i> Email-from-flatbal.mln</a>
                                                    </li>
                                                    <li><a href=""><i class="fa fa-picture-o"></i> Logo.png</a>
                                                    </li>
                                                    <li><a href=""><i class="fa fa-file-word-o"></i> Contract-10_12_2014.docx</a>
                                                    </li>
                                                </ul>
                                                <br>-->

     

                                        </section>

                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
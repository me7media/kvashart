			  	<form class="form-horizontal" action='<?= GetCurUrl()?>' method="POST">
					<input type="hidden" name="is_login" value="1">
		            <fieldset>
	
                          <div class="container-input">
									<div class="form-group">
										<div class="col-lg-12">
											<?= $msg?>
										</div>
									</div>
                                  <div class="form-group">
                                    <label class="col-sm-2 control-label">Логин</label>
                                    <div class="col-sm-10">
                                     <input type="text" class="form-control" id="inputLogin" autocomplete="on" name="login" value="<?= Post("login")?>" placeholder="Введите ваш логин">
                                    </div>
                                  </div>
                                  <div class="form-group">
                                    <label class="col-sm-2 control-label">Пароль</label>
                                    <div class="col-sm-10">
                                      <input type="password" class="form-control" id="inputPassword" autocomplete="on" name="pwd" placeholder="Введите ваш пароль">
                                    </div>
                                  </div>
        		              	  <div class="control-group">
        							<div class="row">
        								<div class="col-md-2"></div>
        								<div class="col-md-8">
        		                			<!-- Button -->
        		                			<div class="controls">
        		                  				<button class="btn btn-primary" type="submit">Войти</button>
        		                			</div>
        								</div>
        								<div class="col-md-2"></div>
        							</div>
        		              	  </div>
                          </div>  

		            </fieldset>
	        	</form> 
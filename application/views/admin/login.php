<body>
    <div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <div class="login-panel panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title"><?=lang('login_panel_title')?></h3>
                    </div>
                    <div class="panel-body">
                        <form role="form" id="login">
                              <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>" />
                        <div style="display: none;" class="alert alert-success login_from_response"><div class="login_from_response_inner"></div></div>
                          <div style="display: none;" class="alert alert-danger login_from_response_error"><div class="login_from_response_error_inner"></div></div>
                            <fieldset>
                                <div class="form-group">
                                    <input class="form-control validate[required,custom[email]]" placeholder="<?=lang('login_email')?>" name="identity" type="email" autofocus>
                                </div>
                                <div class="form-group">
                                    <input class="form-control validate[required]" placeholder="<?=lang('login_password')?>" name="password" type="password" value="">
                                </div>
                                <div class="checkbox">
                                    <label>
                                        <input name="remember" type="checkbox"><?=lang('login_remember')?>
                                    </label>
                                </div>
                                <!-- Change this to a button or input when using this as a form -->
                                <button type="submit" class="btn btn-lg btn-success btn-block"><?=lang('login_submit')?></button>
                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

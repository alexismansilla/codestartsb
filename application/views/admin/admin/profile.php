<div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header"><?=lang('profile_header')?></h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                           <?=lang('profile_panel')?>
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-6">
                                 <div style="display: none;" class="alert alert-success profile_from_response"><div class="profile_from_response_inner"></div></div>
                          <div style="display: none;" class="alert alert-danger profile_from_response_error"><div class="profile_from_response_error_inner"></div></div>
                                    <form role="form" id="profile">
                                     <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>" />
                                        <div class="form-group">
                                            <label><?=lang('profile_username')?></label>
                                            <input class="form-control validate[required,maxSize[20],minSize[4]]" value="<?=$this->ion_auth->user()->row()->username?>" name="username" placeholder="<?=lang('profile_username')?>">
                                        </div>
                                        <div class="form-group">
                                            <label><?=lang('profile_email')?></label>
                                            <input class="form-control validate[required,custom[email]]" name="email" value="<?=$this->ion_auth->user()->row()->email?>" placeholder="<?=lang('profile_email')?>">
                                        </div>
                                        <button type="submit" class="btn btn-default"><?=lang('profile_submit')?></button>
                                    </form>
                                    <hr>
                                     <div style="display: none;" class="alert alert-success password_from_response"><div class="password_from_response_inner"></div></div>
                          <div style="display: none;" class="alert alert-danger password_from_response_error"><div class="password_from_response_error_inner"></div></div>
                                    <form role="form" id="password">
                                     <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>" />
                                        <div class="form-group">
                                            <label><?=lang('profile_cpassword')?></label>
                                            <input class="form-control validate[required,minSize[8]]" type="password" name="password" placeholder="<?=lang('profile_cpassword')?>">
                                        </div>
                                        <div class="form-group">
                                            <label><?=lang('profile_npassword')?></label>
                                            <input type="password" class="form-control validate[required,minSize[8]]" id="npassword" name="npassword" placeholder="<?=lang('profile_npassword')?>">
                                        </div>
                                        <div class="form-group">
                                            <label><?=lang('profile_n2password')?></label>
                                            <input type="password" class="form-control validate[required,equals[npassword],minSize[8]]" name="n2password" placeholder="<?=lang('profile_n2password')?>">
                                        </div>
                                        <button type="submit" class="btn btn-default"><?=lang('profile_password_submit')?></button>
                                    </form>
                                </div>

                            </div>
                            <!-- /.row (nested) -->
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
        </div>
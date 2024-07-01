<?php 
include('common/head-section.php');
$data=$this->session->flashdata('msg');
if(empty($data))
{
}
else{
?>
<div class="alert_open jp_alert_wrapper jp_success ap_msg msg">
    <div class="jp_alert_inner">
        <p class="ng-binding"><?= $controller->set_language_v('validation_email_veri'); ?></p>
    </div>
</div>
<?php  }  ?>
<div class="alert_close jp_alert_wrapper jp_error ap_msg msg">
    <div class="jp_alert_inner">
        <p class="ng-binding"></p>
    </div>
</div>

<body class="jp_authentication" <?php include('module/bg_img.php'); ?>>

    <body onload="read_cookie();" <?php if(!empty($this->email)) { echo "class='jp_login'"; } ?>>
        <div class="jp_loading_wrapper">
            <div class="jp_loading_inner">
                <img src="<?= base_url('assets/images/loader01.gif')?>" alt="" />
            </div>
        </div>
        <div class="jp_main_wrapper">
            <div class="jp_auth_box_wrapper">
                <div class="container">
                    <div class="jp_auth_box">
                        <div class="jp_auth_form">
                            <h3 class="jp_auth_title" id="login_heading">
                                <?= $controller->set_language('login_heading'); ?></h3>
                            <div class="jp_radio_list">
                                <div class="jp_radio">
                                    <input type="radio" name="login_option" value="Seeker" class="r" id="seeker"
                                        checked />
                                    <label for="seeker"
                                        id="login_option1"><?= $controller->set_language('login_option1'); ?></label>
                                </div>
                                <div class="jp_radio">
                                    <input type="radio" name="login_option" value="Recruiter" class="r"
                                        id="Recruiter" />
                                    <label for="Recruiter"
                                        id="login_option2"><?= $controller->set_language('login_option2'); ?></label>
                                </div>
                            </div>
                            <? form_open('Home/login1/recruiter'); ?>
                            <form id="f1">
                                <div class="jp_input_wrapper">
                                    <label id="email_login"><?= $controller->set_language('email_login'); ?></label>
                                    <input type="text" name="email" id="email"
                                        value="<?= $this->input->cookie('email_user',true); ?>" class="form-control" />
                                </div>
                                <div class="jp_input_wrapper margin-bottom-10">
                                    <label
                                        id="password_login"><?= $controller->set_language('password_login'); ?></label>
                                    <input type="password" name="ps" id="ps" class="form-control"
                                        value="<?= $this->input->cookie('password_user',true); ?>" />
                                </div>
                                <div class="jp_checkbox_list">
                                    <div class="jp_checkbox">
                                        <?php if($this->input->cookie('password_user',true)) {  ?>
                                        <input type="checkbox" checked name="remember" value="Yes" id="remember" />
                                        <?php } else { ?>
                                        <input type="checkbox" name="remember" value="Yes" id="remember" />
                                        <?php } ?>
                                        <label for="remember">Remember me</label>
                                    </div>
                                </div>
                            </form>
                            <div class="jp_input_wrapper text-right">
                                <a href="#jp_forgot_password" class="forgot_password jp_popup_link"
                                    id="forgot_password"><?= $controller->set_language('forgot_password'); ?></a>
                            </div>
                            <div class="jp_input_wrapper text-center">
                                <button id="lbtn" class="jp_btn"><?= $controller->set_language('login_btn'); ?></button>
                            </div>
                            <?php
                    $google_login_url=$this->google->get_login_url();
                    $a="ghfg";
                     ?>

                            <div class="jp_input_wrapper text-center">
                                <div class="jp_auth_bottomText">
                                    <p><span id="register_msg"><?= $controller->set_language('register_msg'); ?></span>
                                        <a
                                            href="<?= base_url('home/register'); ?>"><span><?= $controller->set_language('Register_keyword'); ?></span></a>
                                    </p>
                                </div>
                                <span class="jp_or"><?= $controller->set_language('l_or_keyword'); ?></span><br>
                                <a href="<?= base_url(); ?>"
                                    class="jp_backhome"><?= $controller->set_language('l_back_to_home'); ?></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <!-- Forgot Password popup start -->
        <div id="jp_forgot_password" class="jp_popup_wrapper">
            <div class="jp_popup_close"></div>
            <div class="jp_popup_inner">
                <div class="jp_popup_header">
                    <h3><?= $controller->set_language('forgot_ps_heading'); ?></h3>
                    <span class="icon">
                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="66px"
                            height="67px">
                            <path fill-rule="evenodd" fill="#6a64e7"
                                d="M32.815,66.188 C14.747,66.188 0.046,51.490 0.046,33.423 C0.046,15.356 14.747,0.659 32.815,0.659 C50.885,0.659 65.585,15.357 65.585,33.424 C65.585,51.492 50.885,66.188 32.815,66.188 ZM32.815,3.182 C16.137,3.182 2.569,16.748 2.569,33.424 C2.569,50.099 16.137,63.666 32.815,63.666 C49.492,63.666 63.061,50.099 63.061,33.424 C63.061,16.748 49.494,3.182 32.815,3.182 ZM40.424,19.763 C38.332,19.763 36.637,21.457 36.637,23.550 C36.637,25.640 38.333,27.337 40.424,27.337 C42.516,27.337 44.212,25.640 44.212,23.550 C44.212,21.457 42.516,19.763 40.424,19.763 ZM24.652,19.763 C22.560,19.763 20.865,21.457 20.865,23.550 C20.865,25.640 22.561,27.337 24.652,27.337 C26.744,27.337 28.440,25.640 28.440,23.550 C28.440,21.457 26.746,19.763 24.652,19.763 ZM49.091,42.548 C49.867,41.848 49.926,40.651 49.226,39.875 C48.523,39.102 47.328,39.042 46.552,39.740 C42.796,43.135 37.937,45.003 32.872,45.003 C27.789,45.003 22.918,43.126 19.158,39.713 C18.387,39.011 17.187,39.067 16.485,39.842 C15.781,40.616 15.841,41.814 16.615,42.515 C21.073,46.561 26.847,48.789 32.873,48.789 C38.876,48.787 44.638,46.573 49.091,42.548 Z" />
                        </svg>
                    </span>
                </div>
                <div class="jp_popup_body">
                    <div class="jp_radio_list">
                        <div class="jp_radio">
                            <input type="radio" name="s1" value="Seeker" id="s1" checked>
                            <label for="s1"><?= $controller->set_language('forgot_ps_option1'); ?></label>
                        </div>
                        <div class="jp_radio">
                            <input type="radio" name="s1" value="Recruiter" id="s2">
                            <label for="s2"><?= $controller->set_language('forgot_ps_option2'); ?></label>
                        </div>
                    </div><br>

                    <div class="jp_input_wrapper">
                        <label><?= $controller->set_language('forget_ps_email'); ?></label>
                        <input type="text" id="email_forget" class="form-control" />
                    </div>
                    <div class="jp_input_wrapper text-center">
                        <button class="jp_btn"
                            id="forget_ps_btn"><?= $controller->set_language('forgot_ps_btn'); ?></button>
                    </div>
                </div>
            </div>
        </div>
        <input type="hidden" name="email_empty" id="email_empty"
            value="<?= $controller->set_language_v('validaton_email_empty'); ?>" class="form-control">
        <input type="hidden" name="ps_empty" id="ps_empty"
            value="<?= $controller->set_language_v('validaton_password_empty'); ?>" class="form-control">
        <input type="hidden" name="not_match" id="not_match"
            value="<?= $controller->set_language_v('validation_login_error'); ?>" class="form-control">
        <input type="hidden" name="email_veri" id="email_veri"
            value="<?= $controller->set_language_v('validation_email_veri'); ?>" class="form-control">
        <input type="hidden" name="ps_short" id="ps_short"
            value="<?= $controller->set_language_v('validation_password_short'); ?>" class="form-control">
        <input type="hidden" name="account_dis" id="account_dis"
            value="<?= $controller->set_language_v('validation_account_dis'); ?>" class="form-control">
        <input type="hidden" name="valid_email" id="valid_email"
            value="<?= $controller->set_language_v('validation_valid_email'); ?>" class="form-control">
        <input type="hidden" name="ps_send" id="ps_send"
            value="<?= $controller->set_language_v('validation_new_ps_send'); ?>" class="form-control">
        <input type="hidden" name="ps_not_send" id="ps_not_send"
            value="<?= $controller->set_language_v('ps_not_change'); ?>" class="form-control">
        <!-- Forgot Password popup end -->
        <!-- site jquery start -->
        <script src="<?= base_url('assets/js/lib/jquery-3.1.1.min.js'); ?>"></script>
        <script src="<?= base_url('assets/js/lib/bootstrap.min.js') ?>"></script>
        <script src="<?= base_url('assets/js/custom.js'); ?>"></script>
        <script type="text/javascript" src="<?= base_url('assets/js/bootstrap-datepicker.min.js'); ?>"></script>
        <!-- site jquery end -->
    </body>

    </html>
    <script>
    $('document').ready(function() {
        setInterval(function() {
            $('.msg').removeClass('alert_open');
        }, 5000);
    });
    </script>
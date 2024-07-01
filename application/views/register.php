<?php include('common/head-section.php'); ?>
<div class="alert_close jp_alert_wrapper jp_error msg">
    <div class="jp_alert_inner">
        <p class="ng-binding">Please Profile Update</p>
    </div>
</div>

<body <?php include('module/bg_img.php'); ?> onload="read_cookie();" class="jp_authentication"
    <?php if(!empty($this->email)) { echo "class='jp_login'"; } ?>>
    <div class="jp_loading_wrapper">
        <div class="jp_loading_inner">
            <img src="<?= base_url('assets/images/loader01.gif');?>" alt="" />
        </div>
    </div>
    <div class="jp_main_wrapper">
        <div class="jp_auth_box_wrapper">
            <div class="container">
                <div class="jp_auth_box">
                    <div class="jp_auth_form">
                        <h3 class="jp_auth_title"><?= $controller->set_language('register_page_heading'); ?></h3>
                        <div class="jp_radio_list">
                            <div class="jp_radio">
                                <input type="radio" name="login_option" class="s" value="seeker" id="seeker" checked />
                                <label for="seeker"><?= $controller->set_language('register_option1'); ?></label>
                            </div>

                        </div>
                        <? form_open('Home/Seeker_login'); ?>
                        <form id="f1">
                            <div class="jp_input_wrapper">
                                <label><?= $controller->set_language('register_email'); ?></label>
                                <input type="text" name="email" id="email" class="form-control" />
                            </div>
                            <div class="jp_input_wrapper">
                                <label><?= $controller->set_language('register_name'); ?></label>
                                <input type="text" name="name" id="name" class="form-control" />
                            </div>
                            <div class="jp_input_wrapper">
                                <label><?= $controller->set_language('resister_mno'); ?></label>
                                <input type="text" name="mno" id="mno" class="form-control" />
                            </div>
                            <div class="jp_input_wrapper">
                                <label><?= $controller->set_language('register_ps'); ?></label>
                                <input type="password" name="ps" id="ps" class="form-control" />
                            </div>
                            <div class="jp_input_wrapper">
                                <label><?= $controller->set_language('register_cps'); ?></label>
                                <input type="password" name="rps" id="rps" class="form-control" />
                            </div>
                        </form>

                        <div class="jp_input_wrapper text-center">
                            <button id="reg_btn"
                                class="jp_btn"><?= $controller->set_language('register_page_heading'); ?></button>
                        </div>

                        <div class="jp_input_wrapper text-center">
                            <div class="jp_auth_bottomText">
                                <p><span id="login_msg"><?= $controller->set_language('login_msg'); ?></span> <a
                                        href="<?= base_url('home/login'); ?>"><?= $controller->set_language('login_keyword'); ?></a>
                                </p>
                            </div>

                            <span class="jp_or"><?= $controller->set_language('r_or'); ?></span><br>
                            <a href="<?= base_url(); ?>"
                                class="jp_backhome"><?= $controller->set_language('r_back_to_home'); ?></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <input type="hidden" name="email_empty" id="email_empty"
        value="<?= $controller->set_language_v('validaton_email_empty'); ?>" class="form-control">
    <input type="hidden" name="ps_empty" id="ps_empty"
        value="<?= $controller->set_language_v('validaton_password_empty'); ?>" class="form-control">
    <input type="hidden" name="not_match" id="not_match"
        value="<?= $controller->set_language_v('validation_ps_not'); ?>" class="form-control">
    <input type="hidden" name="name_empty" id="name_empty"
        value="<?= $controller->set_language_v('validation_name_empty'); ?>" class="form-control">
    <input type="hidden" name="mno_empty" id="mno_empty"
        value="<?= $controller->set_language_v('validation_mno_empty'); ?>" class="form-control">
    <input type="hidden" name="ps_short" id="ps_short"
        value="<?= $controller->set_language_v('validation_password_short'); ?>" class="form-control">
    <input type="hidden" name="cps_empty" id="cps_empty"
        value="<?= $controller->set_language_v('validation_cps_empty'); ?>" class="form-control">
    <input type="hidden" name="valid_email" id="valid_email"
        value="<?= $controller->set_language_v('validation_valid_email'); ?>" class="form-control">
    <input type="hidden" name="cps_short" id="cps_short"
        value="<?= $controller->set_language_v('validation_cps_short'); ?>" class="form-control">
    <input type="hidden" name="valid_mno" id="valid_mno"
        value="<?= $controller->set_language_v('validation_valid_mno'); ?>" class="form-control">
    <input type="hidden" name="eyes" id="eyes" value="<?= $controller->set_language_v('validation_email_exists'); ?>"
        class="form-control">
    <input type="hidden" name="myes" id="myes" value="<?= $controller->set_language_v('validation_mno_exists'); ?>"
        class="form-control">
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
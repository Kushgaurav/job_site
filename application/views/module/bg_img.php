<?php $img = $res->bg_img;
if ($img) {
    echo "style='background-image: url(" . base_url($res->bg_img) . ")'";
} else {
    echo "style='background-image: url(" . base_url('assets/images/single_title_bg.jpg') . ")'";
}

<?php

function add_theme_widgets() {
    $activate = array(
        'widget-footer' => array(
            'wg_footer-0',
        )
    );
    update_option('widget_wg_footer', array(
        0 => array('footer' => '    <footer>
                    <div class="footer1">
                    <a href="/" style="background-image:url(https://ophim1.cc/logo-ophim-5.png)"></a>
                    <ul>
                    <li>
                    <a href="#">Hỏi đáp - Hướng dẫn</a>
                    </li>
                    <li>
                    <a href="#">Điều khoản sử dụng</a>
                    </li>
                    <li>
                    <a href="#">Chính sách riêng tư</a>
                    </li>
                    <li>
                    <a href="#">Nguyên tắc Cộng Đồng</a>
                    </li>
                    <li>
                    <a href="#">Liên hệ Quảng Cáo</a>
                    </li>
                    </ul>
                    <div>Copyright ©2022 OPhimCMS.</div>
                    </div>
                    </footer>')
    ));
    update_option('sidebars_widgets',  $activate);

}

add_action('after_switch_theme', 'add_theme_widgets', 10, 2);
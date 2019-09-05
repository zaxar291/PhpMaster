<?php
/**
 * Created by PhpStorm.
 * User: gener
 * Date: 9/3/2019
 * Time: 3:29 PM
 */

class View {

    public function GenerateContent($content_view, $template_view, $settings, $data = "")
    {
        include $template_view;
    }

    public function GenerateAjaxContent($content_view, $settings, $data) {
        //TODO: sort($data);
        include $content_view;
    }
}
<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Lweb_setting {

    //Setting update form
    public function setting_add_form() {
        $CI = & get_instance();
        $CI->load->model('Web_settings');
        $setting_detail = $CI->Web_settings->retrieve_setting_editdata();
        $language = $CI->Web_settings->languages();
        $data = array(
            'title' => display('update_setting'),
            'logo' => $setting_detail[0]['logo'],
            'invoice_logo' => $setting_detail[0]['invoice_logo'],
            'currency' => $setting_detail[0]['currency'],
            'currency_position' => $setting_detail[0]['currency_position'],
            'favicon' => $setting_detail[0]['favicon'],
            'footer_text' => $setting_detail[0]['footer_text'],
            'language' => $language,
            'rtr' => $setting_detail[0]['rtr'],
            'captcha' => $setting_detail[0]['captcha'],
            'site_key' => $setting_detail[0]['site_key'],
            'secret_key' => $setting_detail[0]['secret_key'],
            'discount_type' => $setting_detail[0]['discount_type'],
        );
        $setting = $CI->parser->parse('web_setting/web_setting', $data, true);
        return $setting;
    }

}

?>
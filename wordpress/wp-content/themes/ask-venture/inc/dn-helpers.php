<?php

//=DATE==============================================================================
if(!function_exists('dateDifference_vn')){
    function dateDifference_vn($date_1 , $date_2 , $differenceFormat = '%a' ){
        if(!$date_1){
            $datetime2 = date('d/m/Y H:i:s');
            $datetime2 = DateTime::createFromFormat('d/m/Y H:i:s', $datetime2);
        }
        if(!$date_2){
            $datetime2 = date('d/m/Y H:i:s');
            $datetime2 = DateTime::createFromFormat('d/m/Y H:i:s', $datetime2);
        }

        $args = array(
            'd/m/Y H:i:s','d/m/Y H:i','H:i d/m/Y','d/m/Y',
            'Y-m-d','Y/m/d','Y/m/d H:i:s','Y/m/d H:i'
        );

        foreach ($args as $date_format) {
            if(validateDate($date_1,$date_format)){
                $datetime1 = DateTime::createFromFormat($date_format, $date_1);
                break;
            }
        }

        foreach ($args as $date_format) {
            if(validateDate($date_2,$date_format)){
                $datetime2 = DateTime::createFromFormat($date_format, $date_2);
                break;
            }
        }

        $interval = date_diff($datetime1, $datetime2);

        return $interval->format($differenceFormat);

    }
}
if(!function_exists('validateDate')){
    function validateDate($date, $format = 'Y-m-d')
    {
        $d = DateTime::createFromFormat($format, $date);
        // The Y ( 4 digits year ) returns TRUE for any integer with any number of digits so changing the comparison from == to === fixes the issue.
        return $d && $d->format($format) === $date;
    }
}

if(!function_exists('dntheme_date_format')){
    function dntheme_date_format($date, $format_string = 'Y-m-d',$format_default="Y/m/d H:i:s"){
        if($date){
            $d = DateTime::createFromFormat($format_string, $date);
            return $d->format($format_default);
        }
    }
}
if(!function_exists('split_daterange')){
    function split_daterange($daterange='')
    {
        $data = array();
        $explode_date   = explode('-',$daterange);
        $date_start     = explode('/',$explode_date[0]);
        $date_end       = explode('/',$explode_date[1]);

        //==========================
        $data['after']['year']      = $date_start[2];
        $data['after']['month']     = $date_start[0];
        $data['after']['day']       = $date_start[1];
        //==========================
        $data['before']['year']     = $date_end[2];
        $data['before']['month']    = $date_end[0];
        $data['before']['day']      = $date_end[1];

        return $data;
    }
}
//=End DATE===============================================================================================

if(!function_exists('dntheme_number_format')){
    function dntheme_number_format($value,$unit = 'VN??',$value_zero = 'text'){
        if(is_numeric($value)){
            $value = dntheme_just_number($value);
            return '<span class="amount" data-price="'.$value.'">'.number_format($value,0,".",".").'<span class="-text">'.$unit.'</span></span>';
        }
        if($value_zero == 'number') return 0;
        return __('Gi?? li??n h???','dntheme');
    }
}

if(!function_exists('dntheme_remove_space')){
    function dntheme_remove_space($string='')
    {
        if($string){
            $string = preg_replace('/\s+/', '', $string);
        }
        return $string;
    }
}
if(!function_exists('dntheme_just_number')){
    function dntheme_just_number($number='')
    {
        return preg_replace('/[^0-9]/', '', $number);
    }
}

/**
 * Get link facebook
 * @author DoanNguyen
 * @version 1.1.1
 */
if(!function_exists('dntheme_get_facebook')){
    function dntheme_get_facebook($facebook_link = '',$field ='all'){
        global $dn_options;
        $facebook_id = '';
        $author_facebok = array(
            'link' =>'#',
            'chat' =>'#'
        );
        if(!$facebook_link){
            $facebook_link = $dn_options['fb'];
        }

        $facebook_id = dntheme_get_fbid($facebook_link);

        if($facebook_id){
            $author_facebok['link'] = 'https://www.facebook.com/'.$facebook_id;
            $author_facebok['chat'] = 'https://m.me/'.$facebook_id;
        }

        if($field =='all'){
            return $author_facebok;
        }elseif ($field =='link' || $field =='chat') {
            return $author_facebok[$field];
        }
        return;
    }
}


/**
 * Filter link facebook
 * @author DoanNguyen
 * @version 1.1.1
 */
if(!function_exists('dntheme_get_fbid')){
    function dntheme_get_fbid($link=''){
        $facebook_id = $link;

        $facebook_url = explode("/",$link);

        if(count($facebook_url) >=2){

            $re = '/www\.messenger\.com/m';
            preg_match_all($re, $link, $matches, PREG_SET_ORDER, 0);
            if($matches){
                preg_match('/t\/([0-9]*)/m', $link, $matchesz);
                return end($matchesz);
            }

            $facebook_url = explode("/",$link)[3];

            $pos = strpos($link, 'profile.php');

            if ($pos !== false) {
                preg_match_all('/^profile\.php\?id=(.*?)\D/m', $facebook_url, $matches, PREG_SET_ORDER, 0);

                if(!$matches){
                    preg_match_all('/^profile\.php\?id=(.*)/m', $facebook_url, $matches, PREG_SET_ORDER, 0);
                }
                $facebook_id = $matches[0][1];
            } else {

                $fb_new_id = (count(explode('-',$facebook_url)) >1) ? end(explode('-',$facebook_url)) : $facebook_url;

               if(is_numeric($fb_new_id)) $facebook_id = $fb_new_id;
               else $facebook_id = explode("?",$facebook_url)[0];
            }
        }

        return $facebook_id;
    }
}

if (!function_exists('dntheme_replace_string_vietnam')) {
    function dntheme_replace_string_vietnam($str) {
        $str = preg_replace("/(??|??|???|???|??|??|???|???|???|???|???|??|???|???|???|???|???)/", 'a', $str);
        $str = preg_replace("/(??|??|???|???|???|??|???|???|???|???|???)/", 'e', $str);
        $str = preg_replace("/(??|??|???|???|??)/", 'i', $str);
        $str = preg_replace("/(??|??|???|???|??|??|???|???|???|???|???|??|???|???|???|???|???)/", 'o', $str);
        $str = preg_replace("/(??|??|???|???|??|??|???|???|???|???|???)/", 'u', $str);
        $str = preg_replace("/(???|??|???|???|???)/", 'y', $str);
        $str = preg_replace("/(??)/", 'd', $str);

        $str = preg_replace("/(??|??|???|???|??|??|???|???|???|???|???|??|???|???|???|???|???)/", 'A', $str);
        $str = preg_replace("/(??|??|???|???|???|??|???|???|???|???|???)/", 'E', $str);
        $str = preg_replace("/(??|??|???|???|??)/", 'I', $str);
        $str = preg_replace("/(??|??|???|???|??|??|???|???|???|???|???|??|???|???|???|???|???)/", 'O', $str);
        $str = preg_replace("/(??|??|???|???|??|??|???|???|???|???|???)/", 'U', $str);
        $str = preg_replace("/(???|??|???|???|???)/", 'Y', $str);
        $str = preg_replace("/(??)/", 'D', $str);
        return $str;
    }
}

if (!function_exists('dntheme_filter_phone_fake')) {
    function dntheme_filter_phone_fake($number='')
    {
        // Allow only Digits, remove all other characters.
        $number = preg_replace("/[^\d]/","",$number);
        // get number length.
        $length = strlen($number);
        // if number = 10
        if($length == 10) {
            $number = preg_replace("/^1?(\d{4})(\d{3})(\d{3})$/", "$1 $2 $3", $number);
        }
        return $number;
    }
}

if (!function_exists('dntheme_ytb_id')) {
    function dntheme_ytb_id($url='')
    {
        // $path = parse_url($url, PHP_URL_PATH);
        $query = parse_url($url, PHP_URL_QUERY);
        parse_str($query, $args);
        return $args['v'];
    }
}
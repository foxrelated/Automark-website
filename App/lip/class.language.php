<?php
  class language{

  private static $key_locale;
  private static  $locale;
  private static $default_language;
    public function  __construct(){
            $encoding = 'UTF-8';
             self::$key_locale=array_keys(system::get('language_array'));
             self::$locale=system::get('language_array');

            if(isset($_GET['lang']) and in_array($_GET['lang'],self::$key_locale)){
                       session::put("lang",$_GET['lang']);
                }
            // gettext setup
            if(session::get("lang")){
                    $locale=system::get('language_array/'.session::get("lang")."/code");
                    self::$default_language=session::get("lang");
              }else{
                    $locale=system::get('language_array/'.system::_data('default_language')."/code");
                    self::$default_language=system::_data('default_language');
              }
              //var_dump($_GET);die;
              // Include Language file
			if(session::get("lang")){
				
			 require_once( APP_PATH."/languages/lang_".session::get("lang").".php");
			}else{
			 require_once (APP_PATH."/languages/lang_ar.php");
			}

            T_setlocale(LC_ALL,$locale);

            // Set the text domain as 'messages'

            $domain = 'messages';

            T_bindtextdomain($domain, APP_PATH .'/languages');
            T_bind_textdomain_codeset($domain, $encoding);
            T_textdomain($domain);
        
        
    }
public static function qtrans_en($lang){
	$arr='';

    $lang=array_filter($lang);
		foreach( $lang as $key => $value){
                if($value){
                  if(count($lang)==1){
                     $key=1;
                  }
			$arr .= "<!--:$key-->".$value."<!--:-->";
            }
		}
        var_dump($arr);
		return $arr;
}
public static function getLang($text,$lang=''){
	 $v=self::qtrans_split($text);
	if(isset($lang) and $lang!=''){
		$def=$lang;
	}else{
		$def=self::$default_language;
	}
   
   
	return $v[$def];
}

 private static function qtrans_isEnabled($lang) {

	return in_array($lang, self::$key_locale);
}
private static function qtrans_split($text,$quicktags=true) {

	$split_regex = "#(<!--[^-]*-->|\[:[a-z]{2}\])#ism";
	$current_language = "";
	$result = array();
	foreach(self::$locale as $language=>$v) {
		$result[$language] = "";
	}

// split text at all xml comments
	$blocks = preg_split($split_regex, $text, -1, PREG_SPLIT_NO_EMPTY|PREG_SPLIT_DELIM_CAPTURE);
	
	foreach($blocks as $block) {
		# detect language tags
		if(preg_match("#^<!--:([a-z]{2})-->$#ism", $block, $matches)) {
			if(self::qtrans_isEnabled($matches[1])) {
				 $current_language = $matches[1];
			} else {
				$current_language = "invalid";
			}
			continue;
		// detect quicktags
		} elseif($quicktags && preg_match("#^\[:([a-z]{2})\]$#ism", $block, $matches)) {
			if(self::qtrans_isEnabled($matches[1])) {
				$current_language = $matches[1];
			} else {
				$current_language = "invalid";
			}
			continue;
		// detect ending tags
		} elseif(preg_match("#^<!--:-->$#ism", $block, $matches)) {
			$current_language = "";
			continue;
		// detect defective more tag
		} elseif(preg_match("#^<!--more-->$#ism", $block, $matches)) {
			foreach(self::$locale as $language=>$v) {
				$result[$language] .= $block;
			}
			continue;
		}
		// correctly categorize text block
		if($current_language == "") {
			// general block, add to all languages
			foreach(self::$locale as $language=>$v) {
				$result[$language] .= $block;
			}
		} elseif($current_language != "invalid") {
			// specific block, only add to active language
			$result[$current_language] .= $block;
		}
	}
	foreach($result as $lang => $lang_content) {
		$result[$lang] = preg_replace("#(<!--more-->|<!--nextpage-->)+$#ism","",$lang_content);
	}
	return $result;
}
  }

?>
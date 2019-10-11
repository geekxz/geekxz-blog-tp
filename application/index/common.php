<?php
function remove_xss($val)
{
   $val = str_replace('&lt;','<',$val);
   $val = str_replace('&gt;','>',$val);
   $val = strip_tags($val, '<img><p><b><i><a><strike><pre><code><font><blockquote><span><ul><li><table><tbody><tr><td><ol><iframe><embed>');
   $val = preg_replace('/([\x00-\x08,\x0b-\x0c,\x0e-\x19])/', '', $val);
   $search = 'abcdefghijklmnopqrstuvwxyz';
   $search .= 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
   $search .= '1234567890!@#$%^&*()';
   $search .= '~`";:?+/={}[]-_|\'\\';
   for ($i = 0; $i < strlen($search); $i++) {
      $val = preg_replace('/(&#[xX]0{0,8}'.dechex(ord($search[$i])).';?)/i', $search[$i], $val);
      $val = preg_replace('/(�{0,8}'.ord($search[$i]).';?)/', $search[$i], $val);
   }
   $ra1 = array('embed', 'iframe', 'frame', 'ilayer', 'layer', 'javascript', 'vbscript', 'expression', 'applet', 'meta', 'xml', 'blink', 'link', 'script', 'object', 'frameset', 'bgsound', 'title', 'base');
   $ra2 = array('onabort', 'onactivate', 'onafterprint', 'onafterupdate', 'onbeforeactivate', 'onbeforecopy', 'onbeforecut', 'onbeforedeactivate', 'onbeforeeditfocus', 'onbeforepaste', 'onbeforeprint', 'onbeforeunload', 'onbeforeupdate', 'onblur', 'onbounce', 'oncellchange', 'onchange', 'onclick', 'oncontextmenu', 'oncontrolselect', 'oncopy', 'oncut', 'ondataavailable', 'ondatasetchanged', 'ondatasetcomplete', 'ondblclick', 'ondeactivate', 'ondrag', 'ondragend', 'ondragenter', 'ondragleave', 'ondragover', 'ondragstart', 'ondrop', 'onerror', 'onerrorupdate', 'onfilterchange', 'onfinish', 'onfocus', 'onfocusin', 'onfocusout', 'onhelp', 'onkeydown', 'onkeypress', 'onkeyup', 'onlayoutcomplete', 'onload', 'onlosecapture', 'onmousedown', 'onmouseenter', 'onmouseleave', 'onmousemove', 'onmouseout', 'onmouseover', 'onmouseup', 'onmousewheel', 'onmove', 'onmoveend', 'onmovestart', 'onpaste', 'onpropertychange', 'onreadystatechange', 'onreset', 'onresize', 'onresizeend', 'onresizestart', 'onrowenter', 'onrowexit', 'onrowsdelete', 'onrowsinserted', 'onscroll', 'onselect', 'onselectionchange', 'onselectstart', 'onstart', 'onstop', 'onsubmit', 'onunload');
   $ra = array_merge($ra1, $ra2);
   $found = true;
   while ($found == true) {
      $val_before = $val;
      for ($i = 0; $i < sizeof($ra); $i++) {
         $pattern = '/';
         for ($j = 0; $j < strlen($ra[$i]); $j++) {
            if ($j > 0) {
               $pattern .= '(';
               $pattern .= '(&#[xX]0{0,8}([9ab]);)';
               $pattern .= '|';
               $pattern .= '|(�{0,8}([9|10|13]);)';
               $pattern .= ')*';
            }
            $pattern .= $ra[$i][$j];
         }
         $pattern .= '/i';
         $replacement = substr($ra[$i], 0, 2).'<x>'.substr($ra[$i], 2);
         $val = preg_replace($pattern, $replacement, $val);
         if ($val_before == $val) {
            $found = false;
         }
      }
   }
   return $val;
}
function thumb($src = '', $width = 500, $height = 500, $type = 1, $replace = false) {
    $src = './'.$src;
    if(is_file($src) && file_exists($src)) {
        $ext = pathinfo($src, PATHINFO_EXTENSION);
        $name = basename($src, '.'.$ext);
        $dir = dirname($src);
        if(in_array($ext, array('gif','jpg','jpeg','bmp','png'))) {
            $name = $name.'_thumb_'.$width.'_'.$height.'.'.$ext;
            $file = $dir.'/'.$name;
            if(!file_exists($file) || $replace == TRUE) {
                $image = \think\Image::open($src);
                $image->thumb($width, $height, $type);
                $image->save($file);
            }
            $file=str_replace("\\","/",$file);
            $file = '/'.trim($file,'./');
            return $file;
        }
    }
    $src=str_replace("\\","/",$src);
    $src = trim($src,'./');
    return $src;
}
function conpic($content,$width,$height,$number,$type = 3) {
  		  $conpic = htmlspecialchars_decode($content);
		  preg_match_all('<img.*?src=\"(.*?.*?)\".*?>',$conpic,$match);
		  foreach($match[1] as $key => $val) {
			  if($key < $number){ 
				  $str = thumb($val,$width,$height,$type);
				  echo '<img src="/upload/'.$str.'">';
			  }
		  }
}
function datapic($content,$width,$height,$number,$type = 3) {
  		  $conpic = htmlspecialchars_decode($content);
		  preg_match_all('<img.*?src=\"(.*?.*?)\".*?>',$conpic,$match);
		  foreach($match[1] as $key => $val) {
			  if($key < $number){ 
				  $str = thumb($val,$width,$height,$type);
				  return $str;
			  }
		  }
}
function content_zh($str,$strs=0,$strss)
{
    $str = htmlspecialchars_decode($str);
	$str = strip_tags($str);
	$str = mb_substr($str,$strs,$strss,'utf-8');
	return $str;
}
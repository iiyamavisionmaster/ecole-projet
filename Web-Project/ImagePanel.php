#!/usr/bin/env php
<?php
// index.php for  in /home/ilaria/Documents/imagepanel/temp
// 
// Made by BELKADI Ayoub
// Login   <belkad_a@etna-alternance.net>
// 
// Started on  Sat Apr  8 02:02:43 2017 BELKADI Ayoub
// Last update Sat Apr  8 11:21:16 2017 BELKADI Ayoub
//
echo shell_exec("clear");
$opt=get_opt($argv);
$i = 0;
$url_tab =array();
$type = array(false,false,false);
while(isset($opt[$i]))
  {
    if(preg_match_all('/^http/i', $opt[$i], $array_final))
      {
	$url_tab=get_online_img($opt[$i],$url_tab);
      }
    $i++;
  }
if(!empty($url_tab)){
  if(preg_grep("/^s/",$opt))
    {
      sort($url_tab);
    }
  $l = array_search('l', $opt);
  if(preg_grep("/^j/",$opt))
    $type[0] = true;
  if(preg_grep("/^p/",$opt))
    $type[1] = true;
  if(preg_grep("/^g/",$opt))
    $type[2] = true;  
  if(preg_grep("/^l/",$opt))
    put_img_panel($url_tab, $argv[$argc-1], $type, $opt[$l + 1]);
  else
    put_img_panel($url_tab, $argv[$argc-1], $type);
}
else
  echo "\033[31m\nNo image to get.\nHowever i would be more than happy if you try an other url!\033[0m (∩▂∩)\n\n";

    
  
function LoadJpeg($imgname)
{
  $im = @imagecreatefromjpeg($imgname);
  if(!$im)
    {
      $im  = imagecreatetruecolor(150, 30);
      $bgc = imagecolorallocate($im, 255, 255, 255);
      $tc  = imagecolorallocate($im, 0, 0, 0);
      imagefilledrectangle($im, 0, 0, 200, 200, $bgc);
      imagestring($im, 1, 5, 5, 'Erreur de chargement ' . $imgname, $tc);
    }
  return $im;
}
function LoadPng($imgname)
{
  $im = @imagecreatefrompng($imgname);
  if(!$im)
    {
      $im  = imagecreatetruecolor(150, 30);
      $bgc = imagecolorallocate($im, 255, 255, 255);
      $tc  = imagecolorallocate($im, 0, 0, 0);
      imagefilledrectangle($im, 0, 0, 200, 200, $bgc);
      imagestring($im, 1, 5, 5, 'Erreur de chargement ' . $imgname, $tc);
    }
  return $im;
}
function LoadGif($imgname)
{
  $im = @imagecreatefromgif($imgname);
  if(!$im)
    {
      $im  = imagecreatetruecolor(150, 30);
      $bgc = imagecolorallocate($im, 255, 255, 255);
      $tc  = imagecolorallocate($im, 0, 0, 0);
      imagefilledrectangle($im, 0, 0, 200, 200, $bgc);
      imagestring($im, 1, 5, 5, 'Erreur de chargement ' . $imgname, $tc);
    }
  return $im;
}

function get_opt($argv)
{
  $array_temp = array();
  $shortopts  = "";
  $shortopts .= "l:";
  $shortopts .= "gjnNps";
  $options = getopt($shortopts);
  $i = 0;
  foreach ($options as $key => $value)
    {
      array_push($array_temp,$key);
      if($key == "l")
	array_push($array_temp,$value);
    }
  array_push($array_temp,"---");
  $i = 0;
  while(isset($argv[$i]))
    {
      if(preg_match_all('/^http|^www/i', $argv[$i], $array_final))
	{
	  array_push($array_temp,$argv[$i]);	  
	}
      $i++;
    }
  
  array_push($array_temp, $argv[$i -1]);

  return $array_temp; 
}
function get_online_img($url, $final_tab_img)
{
  $page = file_get_contents($url);
  $contents = $page;
  $pattern = "/<img\s[^>]*?src\s*=\s*['\"]([^'\"]*?)['\"][^>]*?>/";
  $matches = array();
  preg_match_all($pattern,$contents,$matches);
  $tab_img = $matches[0];
  $array_final=array();
  $array_final2=array();  
  $tab_url = array();
  $tab_img = $matches[0];
  $i = 0;
  while(isset($tab_img[$i])){
    preg_match_all('/(src=\'([^\']+)\')|(src="([^"]+)")/i', $tab_img[$i], $array_final);
    $i++;
    array_push($tab_url, $array_final[4][0]."\n");
  }
  $tab_url=array_unique($tab_url);
  foreach ($tab_url as $key => $value){
    $temp = str_replace("src", "", $value);
    $temp = str_replace("=", "", $temp);
    $temp = str_replace(" ", "", $temp);
    $temp = str_replace('"', '', $temp);
    $temp = str_replace('\n', "", $temp);
    array_push($final_tab_img, $temp);
  }
  return $final_tab_img;
}
function put_img_panel($url_tab,$base, $type, $l = 0)
{
  
  $i = 0;
  echo "I found ".count($url_tab)." images\n";
  $len = count($url_tab)/25;
  $imagejpg = imagecreatetruecolor(1000, 1000*$len) ;
  $imagepng = imagecreatetruecolor(1000, 1000*$len) ;
  $imagegif = imagecreatetruecolor(1000, 1000*$len) ;
  $hauteurjpg = 0;
  $xjpg = 0;
  $jjpg = 0;
  $hauteurpng = 0;
  $xpng = 0;
  $jpng = 0;
  $hauteurgif = 0;
  $xgif = 0;
  $jgif = 0;
  $treated = 0;
  $ljpg = 0;
  $lpng = 0;
  $lgif = 0;
  while (isset($url_tab[$i]))
    {
      $i++;
      if(isset($url_tab[$i]))
	{
	  if(preg_match_all('/http/i', $url_tab[$i], $array_final) && preg_match_all('/(jpg|png|gif|jpeg)/i', $url_tab[$i], $array_final))
	    {
	      $treated ++;
	      $var = $url_tab[$i];
	      $var = rtrim($var);
	      echo $var."  ==> 100% done\n";
	      
	      if(preg_match_all('/(jpg|jpeg)/i', $url_tab[$i]) && $type[0] == true)
		{
		  $jjpg++;
		  $insert = LoadJpeg($var);
		  imagecopyresized($imagejpg, $insert, $xjpg, $hauteurjpg, 0, 0, 200, 200, imagesx($insert), imagesy($insert));
		  if($l != 0 && $jjpg % $l == 0)
		    {
		      imagejpeg( $imagejpg, $base.$ljpg.".jpg") ;
		      $ljpg ++;
		      $imagejpg = imagecreatetruecolor(1000, 1000*$len) ;
		      $hauteurjpg = 0;
		    }
		  else
		    imagejpeg( $imagejpg, $base.".jpg") ;
		  $xjpg = $xjpg + 200;
		  if($jjpg % 5 == 0)
		    {
		      $hauteurjpg = $hauteurjpg + 200;
		      $xjpg = 0;
		    }
		  
		}
	      else if(preg_match_all('/(png)/i', $url_tab[$i]) && $type[1] == true )
		{
		  $jpng++;
		  $insert = LoadPng($var);
		  imagecopyresized($imagepng, $insert, $xpng, $hauteurpng, 0, 0, 200, 200, imagesx($insert), imagesy($insert));
                  if($l != 0 && $jpng % $l == 0)
		    {
		      imagejpeg( $imagepng, $base.$lpng.".jpg") ;
		      $lpng ++;
		      $imagepng = imagecreatetruecolor(1000, 1000*$len) ;
		      $hauteurpng = 0;
		    }
		  else
		    imagepng( $imagepng, $base.".png") ;
		  $xpng = $xpng + 200;
		  if($jpng % 5 == 0)
		    {
		      $hauteurpng = $hauteurpng + 200;
		      $xpng = 0;
		    }
		  
		}
	      else if(preg_match_all('/(gif)/i', $url_tab[$i]) && $type[2] == true)
		{
		  $jgif++;
		  $insert = LoadGif($var);
		  imagecopyresized($imagegif, $insert, $xgif, $hauteurgif, 0, 0, 200, 200, imagesx($insert), imagesy($insert));
		  if($l != 0 && $jgif % $l == 0)
		    {
		      imagejpeg( $imagegif, $base.$lgif.".jpg") ;
		      $lgif ++;
		      $imagegif = imagecreatetruecolor(1000, 1000*$len) ;
		      $hauteurgif = 0;
		    }
		  else
		    imagejpeg( $imagegif, $base.".gif") ;
		  $xgif = $xgif + 200;
		  if($jgif % 5 == 0)
		    {
		      $hauteurgif = $hauteurgif + 200;
		      $xgif = 0;
		    }
		  
		}
	    }
	  else
	    {
	      echo "\033[31mFalse link to image or non-workable link ::\033[0m".$url_tab[$i]." \n";
	    }
	}
    }
  imagedestroy($imagejpg);
  imagedestroy($imagepng);
  imagedestroy($imagegif);
  echo "\n".$treated." images handled. Feel free to contact me : ayoub.belkadi@gmail.com \nGoodbye (⌐■_■)\n";
  return 0;
}
?>

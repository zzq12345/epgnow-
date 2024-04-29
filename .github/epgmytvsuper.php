<?php

header( 'Content-Type: text/plain; charset=UTF-8');
ini_set("max_execution_time", "3000000");
//htaccess php_value max_execution_time 0;
ini_set('date.timezone','Asia/Shanghai');
$fp="epgmysuper.xml";//压缩版本的扩展名后加.gz
$dt1=date('Ymd');//獲取當前日期
$dt2=date('Ymd',time()+24*3600);//第二天日期
$dt21=date('Ymd',time()+48*3600);//第三天日期
$dt22=date('Ymd',time()-24*3600);//前天日期
$dt3=date('Ymd',time()+7*24*3600);
$dt4=date("Y/n/j");//獲取當前日期
$dt5=date('Y/n/j',time()+24*3600);//第二天日期
$dt7=date('Y');//獲取當前日期
$dt6=date('YmdHi',time());
$dt11=date('Y-m-d');
$time111=strtotime(date('Y-m-d',time()))*1000;
$dt12=date('Y-m-d',time()+24*3600);
$dt10=date('Y-m-d',time()-24*3600);
$w1=date("w");//當前第幾周
if ($w1<'1') {$w1=7;}
$w2=$w1+1;
function match_string($matches)
{
    return  iconv('UCS-2', 'UTF-8', pack('H4', $matches[1]));
    //return  iconv('UCS-2BE', 'UTF-8', pack('H4', $matches[1]));
    //return  iconv('UCS-2LE', 'UTF-8', pack('H4', $matches[1]));
}


function compress_html($string) {
    $string = str_replace("\r", '', $string); //清除换行符
    $string = str_replace("\n", '', $string); //清除换行符
    $string = str_replace("\t", '', $string); //清除制表符
    return $string;
}

function escape($str) 
{ 
preg_match_all("/[\x80-\xff].|[\x01-\x7f]+/",$str,$r); 
$ar = $r[0]; 
foreach($ar as $k=>$v) 
{ 
if(ord($v[0]) < 128) 
$ar[$k] = rawurlencode($v); 
else 
$ar[$k] = "%u".bin2hex(iconv("UTF-8","UCS-2",$v)); 
} 
return join("",$ar); 
} 




//適合php7以上
function replace_unicode_escape_sequence($match)
{       
		return mb_convert_encoding(pack('H*', $match[1]), 'UTF-8', 'UCS-2BE');     
}          


$dt1=date('Ymd');//獲取當前日期
$dt2=date('Ymd',time()+24*3600);//第二天日期
$w1=date("w");//當前第幾周

$chn="<?xml version=\"1.0\" encoding=\"UTF-8\"?>\n<!DOCTYPE tv SYSTEM \"http://api.torrent-tv.ru/xmltv.dtd\">\n<tv generator-info-name=\"mytvsuper\" generator-info-url=\"https://www.tdm.com.mo/c_tv/?ch=Satellite\">\n";


$idn5=69999;
$cid5=array(

array('C18','myTV SUPER 18台'),
array('TVG','黃金翡翠台 '),
array('J','翡翠台'),

array('B','TVB-Plus'),
array('C','無綫新聞台'),


array('P','明珠台'),

array('CTVC','千禧經典台'),
array('CTVS','亞洲劇台'),
array('CDR3','華語劇台'),
array('CTVE','娛樂新聞台'),
array('CWIN','綜藝旅遊台'),
array('CCOC','戲曲台'),

array('KID','SUPER-Kids-Channel'),
array('ZOO','ZooMoo'),
array('CNIKO','Nickelodeon'),
array('CNIJR','Nick Jr'),
array('CCLM','粵語片台'),
array('CMAM','美亞電影台 '),
array('CTHR','Thrill'),
array('CCCM','天映經典頻道 '),

array('CRTX','ROCK Action'),


array('CKIX','KIX'),

array('LNH','Love Nature HD'),
array('LN4','Love Nature 4K'),
array('SMS','Global Trekker'),

array('CRTE','ROCK 綜藝娛樂'),
array('CAXN','AXN'),
array('GEM','GEM'),


array('CANI','Animax'),
array('CJTV','tvN'),
array('CTS1','無線衛星亞洲台'),
array('CRE','創世電視'),
array('FBX','FASHION ONE'),
array('CMEZ','Mezzo Live HD'),
array('DTV','東方衛視海外版'),

array('PCC','鳳凰中文'),
array('PIN','鳳凰資訊'),
array('PHK','鳳凰香港'),
array('CMN1','神州新聞台'),
array('CTN2','無綫新聞台'),
array('CCNA','亞洲新聞台'),
array('CJAZ','半島電視台英語頻道'),
array('CF24','France 24 '),
array('CDW1','DW新聞台'),
array('CNHK','NHK World-Japan'),
array('CARI','Arirang TV'),

array('EVT1','myTV SUPER直播足球1台'),
array('EVT2','myTV SUPER直播足球2台'),
array('EVT3','myTV SUPER直播足球3台'),
array('EVT4','myTV SUPER直播足球4台'),
array('EVT5','myTV SUPER直播足球5台'),



 );

$nid5=sizeof($cid5);

for ($idm5 = 1; $idm5 <= $nid5; $idm5++){
 $idd5=$idn5+$idm5;
   $chn.="<channel id=\"".$cid5[$idm5-1][1]."\"><display-name lang=\"zh\">".$cid5[$idm5-1][1]."</display-name></channel>\n";
                                         }
for ($id5 = 1; $id5 <= $nid5; $id5++){

https://content-api.mytvsuper.com/v1/epg?network_code=B&from=20240422&to=20240429&platform=web
 $url5='https://content-api.mytvsuper.com/v1/epg?network_code='.$cid5[$id5-1][0].'&from='.$dt1.'&to='.$dt1.'&platform=web';
$idd5=$id5+$idn5;
    $ch5 = curl_init();
    curl_setopt($ch5, CURLOPT_URL, $url5);
    curl_setopt($ch5, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch5, CURLOPT_SSL_VERIFYPEER, FALSE);
    curl_setopt($ch5, CURLOPT_SSL_VERIFYHOST, FALSE);
     curl_setopt($ch5,CURLOPT_ENCODING,'Vary: Accept-Encoding');
   
 $re5 = curl_exec($ch5);
   $re5=compress_html($re5);
  $re5=str_replace('&','&amp;',$re5);
    curl_close($ch5);
//print $re5;
 $url51='https://content-api.mytvsuper.com/v1/epg?network_code='.$cid5[$id5-1][0].'&from='.$dt2.'&to='.$dt2.'&platform=web';

$idd5=$id5+$idn5;
    $ch51 = curl_init();
    curl_setopt($ch51, CURLOPT_URL, $url51);
    curl_setopt($ch51, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch51, CURLOPT_SSL_VERIFYPEER, FALSE);
    curl_setopt($ch51, CURLOPT_SSL_VERIFYHOST, FALSE);
     curl_setopt($ch51,CURLOPT_ENCODING,'Vary: Accept-Encoding');
    $re51 = curl_exec($ch51);
   $re51=compress_html($re51);
  $re51=str_replace('&','&amp;',$re51);
    curl_close($ch51);
//print  $re51;

preg_match_all('/"start_datetime":"(.*?)",/i',$re51,$um51,PREG_SET_ORDER);//播放時間
preg_match_all('/programme_title_tc":"(.*?)",/i',$re51,$un51,PREG_SET_ORDER);//播放節目
preg_match_all('/"episode_synopsis_tc":"(.*?)",/i',$re51,$uk51,PREG_SET_ORDER);//播放節目介绍

//print_r($um51);
//print_r($un51);
//print_r($uk51);


//$re5 = preg_replace('/\s(?=)/', '',$re5);
//preg_match('/divclass="epg-list(.*?)epg-list"/i',$re5,$u5);//

preg_match_all('/"start_datetime":"(.*?)",/i',$re5,$um5,PREG_SET_ORDER);//播放時間
preg_match_all('/programme_title_tc":"(.*?)",/i',$re5,$un5,PREG_SET_ORDER);//播放節目
preg_match_all('/"episode_synopsis_tc":"(.*?)",/i',$re5,$uk5,PREG_SET_ORDER);//播放節目介绍
//print_r($um5);
//print_r($un5);
//print_r($uk5);



$trm5=count($um5);
for ($k5 = 0; $k5 <= $trm5-2 ; $k5++) {  
 $chn.="<programme start=\"".str_replace(':','',str_replace('-','',str_replace(' ','',$um5[$k5][1]))).'00 +0800'."\" stop=\"".str_replace(':','',str_replace('-','',str_replace(' ','',$um5[$k5+1][1]))).'00 +0800'."\" channel=\"".$cid5[$id5-1][1]."\">\n<title lang=\"zh\">".str_replace('<','&lt;',str_replace('&','&amp;',str_replace('>',' &gt;',trim($un5[$k5][1]))))."</title>\n<desc lang=\"zh\">".str_replace('<','&lt;',str_replace('&','&amp;',str_replace('>',' &gt;',trim($uk5[$k5][1]))))."</desc>\n</programme>\n";
                                                                                           }                                                                                                                                                                                                                       

 
   $chn.="<programme start=\"".str_replace(':','',str_replace('-','',str_replace(' ','',$um5[$trm5-1][1]))).'00 +0800'."\" stop=\"".$dt2.'060000 +0800'."\" channel=\"".$cid5[$id5-1][1]."\">\n<title lang=\"zh\">".str_replace('<','&lt;',str_replace('&','&amp;',str_replace('>',' &gt;',trim($un5[$trm5-1][1]))))."</title>\n<desc lang=\"zh\">".str_replace('<','&lt;',str_replace('&','&amp;',str_replace('>',' &gt;',trim($uk5[$trm5-1][1]))))." </desc>\n</programme>\n";                                                                                                                                        








$trm51=count($um51);
for ($k51 = 0; $k51 <= $trm51-2 ; $k51++) {  
     
                                        
 $chn.="<programme start=\"".str_replace(':','',str_replace('-','',str_replace(' ','',$um51[$k51][1]))).'00 +0800'."\" stop=\"".str_replace(':','',str_replace('-','',str_replace(' ','',$um51[$k51+1][1]))).'00 +0800'."\" channel=\"".$cid5[$id5-1][1]."\">\n<title lang=\"zh\">".str_replace('<','&lt;',str_replace('&','&amp;',str_replace('>',' &gt;',trim($un51[$k51][1]))))."</title>\n<desc lang=\"zh\">".str_replace('<','&lt;',str_replace('&','&amp;',str_replace('>',' &gt;',trim($uk51[$k51][1]))))."</desc>\n</programme>\n";
                                                                                           }                                                                                                                                                                                                                       

 
   $chn.="<programme start=\"".str_replace(':','',str_replace('-','',str_replace(' ','',$um51[$trm51-1][1]))).'00 +0800'."\" stop=\"".$dt21.'060000 +0800'."\" channel=\"".$cid5[$id5-1][1]."\">\n<title lang=\"zh\">".str_replace('<','&lt;',str_replace('&','&amp;',str_replace('>',' &gt;',trim($un51[$trm51-1][1]))))."</title>\n<desc lang=\"zh\">".str_replace('<','&lt;',str_replace('&','&amp;',str_replace('>',' &gt;',trim($uk51[$trm51-1][1]))))." </desc>\n</programme>\n";                                                                                                     

}
//新加坡mewatch
$id100=600000;//起始节目编号
$cid100=array(
 // array('5002',' Russia Today'),
  array('97098','Channel 5 '),
 array('97104','Channel 8'),
 array('97084','Channel Suria'),
 array('97096','Channel Vasantham'),
 array('97072','CNA'),
 array('97129','Channel U'),
  array('20695','EGG'),
array('97073','meWATCH LIVE 1'),
array('97078','meWATCH LIVE 2'),
array('186574','oktolidays'),

);

$nid100=sizeof($cid100);


for ($idm100= 1; $idm100 <= $nid100; $idm100++){
 $idd100=$id100+$idm100;
   $chn.="<channel id=\"".$cid100[$idm100-1][1]."\"><display-name lang=\"zh\">".$cid100[$idm100-1][1]."</display-name></channel>\n";
}



for ($idm100= 1; $idm100 <= $nid100; $idm100++){

$url98='https://cdn.mewatch.sg/api/schedules?channels='.$cid100[$idm100-1][0].'&date='.$dt10.'&duration=24&ff=idp%2Cldp%2Crpt%2Ccd&hour=16&intersect=true&lang=en&segments=all';
 $idd100=$id100+$idm100;
$ch98=curl_init();
curl_setopt($ch98,CURLOPT_URL,$url98);
curl_setopt($ch98,CURLOPT_SSL_VERIFYPEER,false);
curl_setopt($ch98,CURLOPT_SSL_VERIFYHOST,false);
curl_setopt($ch98,CURLOPT_RETURNTRANSFER,1);
$re98=curl_exec($ch98);
curl_close($ch98);
$re98 = preg_replace_callback('/\\\\u([0-9a-f]{4})/i', 'replace_unicode_escape_sequence', $re98);// 適合php7
$re98=str_replace('&','&amp;',$re98);
 
 $data98=json_decode($re98)[0]->schedules;
$tuu98=count($data98);

for ( $i98=0 ; $i98<=$tuu98-1 ; $i98++ ) {
$startDate98=json_decode($re98)[0]->schedules[$i98]->startDate;
$endDate98=json_decode($re98)[0]->schedules[$i98]->endDate;
$title98=json_decode($re98)[0]->schedules[$i98]->item->title;

$secondaryLanguageTitle98=json_decode($re98)[0]->schedules[$i98]->item->secondaryLanguageTitle;
$description99=json_decode($re98)[0]->schedules[$i98]->item->description;
$seasonNumber98=json_decode($re98)[0]->schedules[$i98]->classification->seasonNumber;
$episodeNumber98=json_decode($re98)[0]->schedules[$i98]->classification->episodeNumber;
$startDate98=str_replace('Z','',$startDate98);
$startDate98=str_replace('T','',$startDate98);
$startDate98=str_replace('-','',$startDate98);
$startDate98=str_replace(':','',$startDate98);
$endDate98=str_replace('T','',$endDate98);
$endDate98=str_replace('Z','',$endDate98);
$endDate98=str_replace(':','',$endDate98);
$endDate98=str_replace('-','',$endDate98);
$chn.="<programme start=\"".$startDate98.' +0000'."\" stop=\"".$endDate98.' +0000'."\" channel=\"".$cid100[$idm100-1][1]."\">\n<title lang=\"zh\">".$secondaryLanguageTitle98.$title98.$seasonNumber98.$episodeNumber98."</title>\n<desc lang=\"zh\">".$description98."</desc>\n</programme>\n";

}

$url99='https://cdn.mewatch.sg/api/schedules?channels='.$cid100[$idm100-1][0].'&date='.$dt11.'&duration=24&ff=idp%2Cldp%2Crpt%2Ccd&hour=16&intersect=true&lang=en&segments=all';
 $idd100=$id100+$idm100;
$ch99=curl_init();
curl_setopt($ch99,CURLOPT_URL,$url99);
curl_setopt($ch99,CURLOPT_SSL_VERIFYPEER,false);
curl_setopt($ch99,CURLOPT_SSL_VERIFYHOST,false);
curl_setopt($ch99,CURLOPT_RETURNTRANSFER,1);
$re99=curl_exec($ch99);
curl_close($ch99);
$re99 = preg_replace_callback('/\\\\u([0-9a-f]{4})/i', 'replace_unicode_escape_sequence', $re99);// 適合php7
//print $re ;
//$re99 = preg_replace('/\s(?=)/', '',$re);
 $re99=str_replace('&','&amp;',$re99);
 $data99=json_decode($re99)[0]->schedules;
$tuu99=count($data99);

for ( $i99=0 ; $i99<=$tuu99-1 ; $i99++ ) {
$startDate99=json_decode($re99)[0]->schedules[$i99]->startDate;
$endDate99=json_decode($re99)[0]->schedules[$i99]->endDate;
$title99=json_decode($re99)[0]->schedules[$i99]->item->title;
$secondaryLanguageTitle99=json_decode($re99)[0]->schedules[$i99]->item->secondaryLanguageTitle;
$description99=json_decode($re99)[0]->schedules[$i99]->item->description;
$seasonNumber99=json_decode($re99)[0]->schedules[$i99]->classification->seasonNumber;
$episodeNumber99=json_decode($re99)[0]->schedules[$i99]->classification->episodeNumber;
$startDate99=str_replace('Z','',$startDate99);
$startDate99=str_replace('T','',$startDate99);
$startDate99=str_replace('-','',$startDate99);
$startDate99=str_replace(':','',$startDate99);
$endDate99=str_replace('T','',$endDate99);
$endDate99=str_replace('Z','',$endDate99);
$endDate99=str_replace(':','',$endDate99);
$endDate99=str_replace('-','',$endDate99);
$chn.="<programme start=\"".$startDate99.' +0000'."\" stop=\"".$endDate99.' +0000'."\" channel=\"".$cid100[$idm100-1][1]."\">\n<title lang=\"zh\">".$secondaryLanguageTitle99.$title99.$seasonNumber99.$episodeNumber99."</title>\n<desc lang=\"zh\">".$description99."</desc>\n</programme>\n";

}


$url100='https://cdn.mewatch.sg/api/schedules?channels='.$cid100[$idm100-1][0].'&date='.$dt12.'&duration=24&ff=idp%2Cldp%2Crpt%2Ccd&hour=16&intersect=true&lang=en&segments=all';
 $idd100=$id100+$idm100;
$ch100=curl_init();
curl_setopt($ch100,CURLOPT_URL,$url100);
curl_setopt($ch100,CURLOPT_SSL_VERIFYPEER,false);
curl_setopt($ch100,CURLOPT_SSL_VERIFYHOST,false);
curl_setopt($ch100,CURLOPT_RETURNTRANSFER,1);
$re100=curl_exec($ch100);
curl_close($ch100);
$re100 = preg_replace_callback('/\\\\u([0-9a-f]{4})/i', 'replace_unicode_escape_sequence', $re100);// 適合php7
//print $re ;
//$re99 = preg_replace('/\s(?=)/', '',$re);
 $re100=str_replace('&','&amp;',$re100);
 $data100=json_decode($re100)[0]->schedules;
$tuu100=count($data100);

for ( $i100=0 ; $i100<=$tuu100-1 ; $i100++ ) {
$startDate100=json_decode($re100)[0]->schedules[$i100]->startDate;
$endDate100=json_decode($re100)[0]->schedules[$i100]->endDate;
$title100=json_decode($re100)[0]->schedules[$i100]->item->title;

$secondaryLanguageTitle100=json_decode($re100)[0]->schedules[$i100]->item->secondaryLanguageTitle;
$description100=json_decode($re100)[0]->schedules[$i100]->item->description;
$seasonNumber100=json_decode($re100)[0]->schedules[$i00]->classification->seasonNumber;
$episodeNumber100=json_decode($re100)[0]->schedules[$i100]->classification->episodeNumber;
$startDate100=str_replace('Z','',$startDate100);
$startDate100=str_replace('T','',$startDate100);
$startDate100=str_replace('-','',$startDate100);
$startDate100=str_replace(':','',$startDate100);
$endDate100=str_replace('T','',$endDate100);
$endDate100=str_replace('Z','',$endDate100);
$endDate100=str_replace(':','',$endDate100);
$endDate100=str_replace('-','',$endDate100);
$chn.="<programme start=\"".$startDate100.' +0000'."\" stop=\"".$endDate100.' +0000'."\" channel=\"".$cid100[$idm100-1][1]."\">\n<title lang=\"zh\">".$secondaryLanguageTitle100.$seasonNumber100.$title100.$episodeNumber100."</title>\n<desc lang=\"zh\">".$description100."</desc>\n</programme>\n";

}

}


/*
$id4=800099;
$cid4=array(

  array('102','东方卫视'),

array('107','上海新闻综合HD'),
array('109',' 第一财经'),
array('108','五星体育HD'),
    array('104','都市频道HD'),
    array('105','东方影视HD'),
    array('106','纪实人文频道HD'),
    array('789','欢笑剧场HD'),
   array('787','全纪实HD'),

    );
$nid4=sizeof($cid4);




for ($idm4 = 1; $idm4 <= $nid4; $idm4++){

 $idd4=$id4+$idm4;
   $chn.="<channel id=\"".$idd4."\"><display-name lang=\"zh\">".$cid4[$idm4-1][1]."</display-name></channel>\n";
}




for ($idm4 = 1; $idm4 <= $nid4; $idm4++){
 $idd4=$id4+$idm4;

//$urk4='https://www.kbro.com.tw/do/getpage_catvtable.php?callback=result&action=get_channelprogram&channelid='.$cid4[$idm4-1][0].'&showtime='.$dt1;

$urk4='https://epg.bobo.itvsh.cn/epg/api/channel/channel_'.$cid4[$idm4-1][0].'.json';


$ch4=curl_init();
curl_setopt($ch4,CURLOPT_URL,$urk4);
curl_setopt($ch4,CURLOPT_SSL_VERIFYPEER,false);
curl_setopt($ch4,CURLOPT_SSL_VERIFYHOST,false);
curl_setopt($ch4,CURLOPT_RETURNTRANSFER,1);
$rek4=curl_exec($ch4);
curl_close($ch4);
//$rek4 = preg_replace_callback('/\\\\u([0-9a-f]{4})/i', 'replace_unicode_escape_sequence', $rek4);// 適合php7
preg_match_all('|"starttime":"(.*?)",|i',$rek4,$un4,PREG_SET_ORDER);//播放節目內容
preg_match_all('|"endtime":"(.*?)",|i',$rek4,$ul4,PREG_SET_ORDER);//播放節目開始時間
preg_match_all('|"title":"(.*?)",|i',$rek4,$uk4,PREG_SET_ORDER);//播放節目結束時間
$ryut4=count($uk4);



for ($k4 = 0; $k4 <= $ryut4-2; $k4++){
    $chn.="<programme start=\"".$un4[$k4][1].' +0800'."\" stop=\"".$ul4[$k4][1].' +0800'."\" channel=\"".$idd4."\">\n<title lang=\"zh\">".str_replace('<spanclass="live-btn">播放中</span>','',$uk4[$k4+1][1])."</title>\n<desc lang=\"zh\"> </desc>\n</programme>\n";

                                                               }


                                                                                           }


*/

/*
   $chn.="<channel id=\"800300\"><display-name lang=\"zh\">taiwanplus</display-name></channel>\n";









$urk3='https://www.taiwanplus.com/api/video/live/schedule/8';





$ch3=curl_init();
curl_setopt($ch3,CURLOPT_URL,$urk3);
curl_setopt($ch3,CURLOPT_SSL_VERIFYPEER,false);
curl_setopt($ch3,CURLOPT_SSL_VERIFYHOST,false);
curl_setopt($ch3,CURLOPT_RETURNTRANSFER,1);
//curl_setopt ( $ch3, CURLOPT_POST, 1 );
//curl_setopt ( $ch3, CURLOPT_POSTFIELDS, $encryptString3 );
$headers3=[
'Host: www.taiwanplus.com',
'Connection: keep-alive',
'sec-ch-ua: "Microsoft Edge";v="105", "Not)A;Brand";v="8", "Chromium";v="105"',
'sec-ch-ua-mobile: ?0',
'User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/105.0.0.0 Safari/537.36 Edg/105.0.1343.53',
'sec-ch-ua-platform: "Windows"',
'Referer: https://www.taiwanplus.com/',
'dnt: 1',
'sec-gpc: 1',
];
curl_setopt( $ch3, CURLOPT_HTTPHEADER, $headers3);
curl_setopt($ch3,CURLOPT_ENCODING,'Vary: Accept-Encoding');
$rek3=curl_exec($ch3);
curl_close($ch3);
preg_match_all('/"dateTime":"(.*?)",/i',$rek3,$ul3,PREG_SET_ORDER);//播放節目開始時間
preg_match_all('/"title":"(.*?)",/i',$rek3,$uk3,PREG_SET_ORDER);//播放節目結束時間
preg_match_all('/"shortDescription":"(.*?)",/i',$rek3,$un3,PREG_SET_ORDER);//播放節目開始時間
$ryut3=count($uk3);
//print_r($ul3);
//print_r($uk3);
//print_r($un3);
//print $ryut3;

for ($k3 =0; $k3 <= $ryut3-2; $k3++){

$chn.="<programme start=\"".str_replace('/','',str_replace(':','',str_replace(' ','',$ul3[$k3][1]))).'0000 +0800'."\" stop=\"".str_replace('/','',str_replace(':','',str_replace(' ','',$ul3[$k3+1][1]))).'0000 +0800'."\" channel=\"800300\">\n<title lang=\"zh\">".$uk3[$k3][1]."</title>\n<desc lang=\"zh\">".$un3[$k3][1]."</desc>\n</programme>\n";




                                                               }
*/
/*
$w6=date('w');
$week6=array(
	"0"=>"星期日",
	"1"=>"星期一",
	"2"=>"星期二",
	"3"=>"星期三",
	"4"=>"星期四",
	"5"=>"星期五",
	"6"=>"星期六"
);




$date6=date('m-d')  ;

$time6 = date('YmdHis');

$id6=800119;
$cid6=array(

 array('111131','384','东方卫视'),

     array('1312','382',' 新闻综合'),
array('1321','382','外语频道'),
    array('1318','382视','都市频道HD'),
    array('1324','382','炫动卡通'),
    array('1317','382','纪实人文频道HD'),
    array('1346062','382','第一财经'),
   array('1383','382','东方财经'),
  array('6880440','438','七彩戏剧'),

    );
$nid6=sizeof($cid6);




for ($idm6 = 1; $idm6 <= $nid6; $idm6++){

 $idd6=$id6+$idm6;
   $chn.="<channel id=\"".$idd6."\"><display-name lang=\"zh\">".$cid6[$idm6-1][2]."</display-name></channel>\n";
}




for ($idm6= 1; $idm6 <= $nid6; $idm6++){
 $idd6=$id6+$idm6;



$urk6='https://bp-api.bestv.com.cn/cms/api/live/play';




$udid6 = "6a0d339b385034f";
$sign6 = md5("channelid=199999&curModel=0&devid=1899999&modelType=1&osVersion=23&platform=android&roleType=1&time=".$time6."&udid=".$udid6."&userId=0&version=4807C8F5954G8B61A93EDT4594BB8C318852");


$data6 = array(
"sign" =>"".$sign6."",
"time" => "".$time6."",
"userId" => "0",
"devid" => "1899999",
"date" => "".$date6." ".$week6[$w6]."",
"curModel" => 0,


"channelCode"=>"Umai:CHAN/".$cid6[$idm6-1][0]."@BESTV.SMG.SMG",
"modelType" => "1",
"platform" => "android",
"deviceToken"=> "AksiiCTAJ2Ge193fUCh3bOLHv6e2vwDYkvUV2srE9Mb7",
"roleId" =>"",
"roleType" => "1",
"version" => 4807,
"osVersion" =>23,
"channelid" => "199999",
"udid" => "6a0d339b385034f",

);

$encryptString6 = json_encode($data6,true);
$encryptString6=preg_replace_callback('/\\\\u([0-9a-f]{4})/i', 'replace_unicode_escape_sequence', $encryptString6);// 適合php7
$encryptString6=stripslashes($encryptString6);







$ch6=curl_init();
curl_setopt($ch6,CURLOPT_URL,$urk6);
curl_setopt($ch6,CURLOPT_SSL_VERIFYPEER,false);
curl_setopt($ch6,CURLOPT_SSL_VERIFYHOST,false);
curl_setopt($ch6,CURLOPT_RETURNTRANSFER,1);
curl_setopt ( $ch6, CURLOPT_POST, 1 );
curl_setopt ( $ch6, CURLOPT_POSTFIELDS, $encryptString6 );

$headers6=array(
'User-Agent: bestv app  android 4807 tencent',
'userId: 0',


'device_token: AksiiCTAJ2Ge193fUCh3bOLHv6e2vwDYkvUV2srE9Mb7',
'udid: 6a0d339b385034f',
'Content-Type: application/json; charset=utf-8',
//'Content-Length: '.$cid6[$idm6-1][1],
'Host: bp-api.bestv.com.cn',
'Connection: Keep-Alive',
//'Accept-Encoding: gzip',





);
curl_setopt( $ch6, CURLOPT_HTTPHEADER, $headers6);

//curl_setopt($ch6,CURLOPT_ENCODING,'Vary: Accept-Encoding');


$rek6=curl_exec($ch6);
curl_close($ch6);
//print $rek6;
preg_match_all('|"timestamp":(.*?),|i',$rek6,$un6,PREG_SET_ORDER);//播放節目內容
preg_match_all('|"endTimeStamp":(.*?),|i',$rek6,$ul6,PREG_SET_ORDER);//播放節目開始時間
preg_match_all('|"title":"(.*?)",|i',$rek6,$uk6,PREG_SET_ORDER);//播放節目結束時間
$ryut6=count($uk6);

for ($k6 = 1; $k6 <= $ryut6-2; $k6++){



    $chn.="<programme start=\"".date('YmdHis', $un6[$k6][1]/1000)
.' +0800'."\" stop=\"".date('YmdHis', $ul6[$k6][1]/1000)
.' +0800'."\" channel=\"".$idd6."\">\n<title lang=\"zh\">".str_replace('<spanclass="live-btn">播放中</span>','',$uk6[$k6+1][1])."</title>\n<desc lang=\"zh\"> </desc>\n</programme>\n";

                                                               }


                                                                                           }

//2蓮花衛視
$chn.="<channel id=\"蓮花衛視\"><display-name lang=\"zh\">蓮花衛視</display-name></channel>\n";
$data2='d='.strtotime('today').'';
$data222='d='.strtotime('tomorrow').'';

$url2='http://www.macaulotustv.cc/index.php/index/getdetail.html';
$ch2 = curl_init();
    curl_setopt($ch2, CURLOPT_URL, $url2);
    curl_setopt($ch2, CURLOPT_RETURNTRANSFER, 1);

curl_setopt ( $ch2, CURLOPT_POST, 1 );
curl_setopt ( $ch2, CURLOPT_POSTFIELDS, $data2 );
//curl_setopt($ch2, CURLOPT_COOKIE, $cookie2);
$rk2 = curl_exec ( $ch2 );
curl_close ( $ch2 );
$re2= preg_replace_callback('/\\\\u([0-9a-f]{4})/i', 'replace_unicode_escape_sequence', $rk2);// 適合php7


//$re2= preg_replace_callback("#\\\u([0-9a-f]{4})#", 'match_string', $rk2);
$re2=str_replace('\t','',$re2);
$re2=str_replace('"','',$re2);
$re2=str_replace('\/','',$re2);
preg_match_all('|<em>(.*?)<em>|i',$re2,$um2,PREG_SET_ORDER);//播放時間
preg_match_all('|<span>(.*?)<span>|i',$re2,$un2,PREG_SET_ORDER);//播放節目
$trm2=count($um2);

  for ($k2 =0; $k2<=$trm2-2;$k2++) {

        $chn.="<programme start=\"".$dt1.str_replace(':','',$um2[$k2][1]).'00 +0800'."\" stop=\"".$dt1.str_replace(':','',$um2[$k2+1][1]).'00 +0800'."\" channel=\"蓮花衛視\">\n<title lang=\"zh\">".$un2[$k2][1]."</title>\n<desc lang=\"zh\"> </desc>\n</programme>\n";
                                   }
$chn.="<programme start=\"".$dt1.str_replace(':','',$um2[$trm2-1][1]).'00 +0800'."\" stop=\"".$dt1.'240000 +0800'."\" channel=\"蓮花衛視\">\n<title lang=\"zh\">".$un2[ $trm2-1][1]."</title>\n<desc lang=\"zh\"> </desc>\n</programme>\n";


$ch222 = curl_init();
    curl_setopt($ch222, CURLOPT_URL, $url2);
    curl_setopt($ch222, CURLOPT_RETURNTRANSFER, 1);

curl_setopt ( $ch222, CURLOPT_POST, 1 );
curl_setopt ( $ch222, CURLOPT_POSTFIELDS, $data222 );
//curl_setopt($ch222, CURLOPT_COOKIE, $cookie2);
$rk222 = curl_exec ( $ch222 );
curl_close ( $ch222 );
$re222= preg_replace_callback('/\\\\u([0-9a-f]{4})/i', 'replace_unicode_escape_sequence', $rk222);// 適合php7
//$re222= preg_replace_callback("#\\\u([0-9a-f]{4})#", 'match_string', $rk222);
$re222=str_replace('\t','',$re222);
$re222=str_replace('"','',$re222);
$re222=str_replace('\/','',$re222);


preg_match_all('|<em>(.*?)<em>|i',$re222,$um222,PREG_SET_ORDER);//播放時間
preg_match_all('|<span>(.*?)<span>|i',$re222,$un222,PREG_SET_ORDER);//播放節目
$trm222=count($um222);

  for ($k222 =0; $k222<=$trm222-2;$k222++) {

        $chn.="<programme start=\"".$dt2.str_replace(':','',$um222[$k222][1]).'00 +0800'."\" stop=\"".$dt2.str_replace(':','',$um222[$k222+1][1]).'00 +0800'."\" channel=\"蓮花衛視\">\n<title lang=\"zh\">".$un222[$k222][1]."</title>\n<desc lang=\"zh\"> </desc>\n</programme>\n";
                                   }
$chn.="<programme start=\"".$dt2.str_replace(':','',$um222[$trm222-1][1]).'00 +0800'."\" stop=\"".$dt2.'240000 +0800'."\" channel=\"蓮花衛視\">\n<title lang=\"zh\">".$un222[ $trm222-1][1]."</title>\n<desc lang=\"zh\"> </desc>\n</programme>\n";


*/
 $chn.="</tv>\n";
//print  $chn;

file_put_contents($fp, $chn);

?>

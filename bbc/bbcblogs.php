<?php
header("Content-Type:application/xml; mimetype=UTF-8");
$contents = file_get_contents("http://www.bbc.co.uk/blogs/profile.shtml?userid=".$_GET['userid']); 
preg_match_all('/"(.*?)#P"/',$contents,$matches);
//print_r($matches);
$blogposts=array_unique($matches[1]);
preg_match('/<a href="\?userid=\d*">(.*?)<\/a>/',$contents,$match);
$username=$match[1];
//print_r($blogposts);
$selfurl="http://".$_SERVER['SERVER_NAME'].$_SERVER['REQUEST_URI'];
?>
<rss version="2.0" xmlns:atom="http://www.w3.org/2005/Atom"> 
  <channel> 
    <title>Comments for <?=$username?></title> 
    <language>en-gb</language> 
    <pubDate><? print date('r'); ?></pubDate>
    <description>The comments from blog posts which <?=$username?> has recently commented on</description>
    <link><?=$selfurl?></link>
    <atom:link href="<?=$selfurl?>" rel="self" type="application/rss+xml" />
    <?
foreach($blogposts as $url){
	$content= file_get_contents($url);
	preg_match('/a href="(.*?)">View these comments in RSS<\/a>/',$content,$match);
	$rss=simplexml_load_file("http://bbc.co.uk".$match[1]);
	foreach($rss->channel->item as $item){
		$item->pubDate=date('r',strtotime($item->pubDate));
		$item->guid=$item->link;
		print $item->asXML()."\n    ";
	}
}
?> 
  </channel> 
</rss>

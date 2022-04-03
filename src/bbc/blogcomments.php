<?php

require("../backend/init.php");
if($_GET['userid']){
	$contents = file_get_contents("http://www.bbc.co.uk/blogs/profile.shtml?userid=".$_GET['userid']);
	preg_match_all('/"(.*?)#P"/',$contents,$matches);
	$blogposts=array_unique($matches[1]);
	preg_match('/<a href="\?userid=\d*">(.*?)<\/a>/',$contents,$match);
	$username=$match[1];
}
if(!$username){
	$backend=new Backend("Projects",false);
	$backend->addTitle("BBC Blog Comments");
	if(isset($_GET['userid']))$backend->addWarning("Userid '".$_GET['userid']."' not found");
	$backend->addOutput("<form action=\"/bbc/blogcomments\" method=\"GET\"><label>Please insert your BBC Blogs user id:<input name=\"userid\" type=\"text\" value=\"".htmlspecialchars($_GET['userid'])."\"/></label><input type=\"submit\" value=\"Get Comments\"/></form>");
	$backend->addOutput("<img src=\"/img/bloguserid\" alt=\"Your userid forms part of your profile's URL.\" style=\"float:right; margin:1em 0 1em 1em; max-width:70%; border:solid thin;\"/>");
	$backend->addTitle("How to Find your user id",2);
	$backend->addOutput("<p>When logged into your BBCiD, follow the link to your blog profile by clicking on your username in the comments section of any BBC blog page.  Your userid forms part of your profile's URL.</p>");
	$backend->addTitle("What is returned",2);
	$backend->addOutput("<p>An RSS feed is returned.  The feed contains all the comments which have been made on any of the blog posts which you have recently commented on.  The helps to track conversations which happen in these comments without having to go through each post manually.</p>");
	$backend->addTitle("How it works",2);
	$backend->addOutput("<p><ol>");
	$backend->addText("The first page of the user's blog profile is fetched to find their username and the posts they have recently commented on.","li");
	$backend->addText("Duplicates are removed (where they have commented on the same post mulitple times)","li");
	$backend->addText("In turn, each of the blog posts are fetched.","li");
	$backend->addText("Each posts contains a hidden link \"View these comments in RSS\" - this is used to get an RSS page of comments","li");
	$backend->addText("The RSS items from all the blog posts are then returned as a single RSS feed.","li");
	$backend->addOutput("</ol></p>");
	$backend->printit();
}

header("Content-Type:application/rss+xml; mimetype=UTF-8");
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

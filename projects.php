<?php


function projsort( $a, $b )
{ 
  if(  $a->order ==  $b->order ){ return 0 ; } 
  if(!$a->order)return 1;
  if(!$b->order)return -1;
  return ($a->order < $b->order) ? -1 : 1;
} 

function displayproject($project){
	global $backend;
	if($project->plang){
		$backend->addOutput("<div class=\"plangs\"><span class=\"label\">Programming Languages used: </span>");
		if ($project->plango) $langs = array_merge($project->plang, $project->plango);
		else $langs = $project->plang;
		foreach($langs as $plang){
			if($aditionalplangs++)$backend->addText(", ");
			$backend->addOutput("<a href=\"/projects/lang/".htmlspecialchars(strtolower(str_replace(" ", "_", $plang)))."\">");
			$backend->addText($plang);
			$backend->addOutput("</a>");
		}
		$backend->addOutput("</div>");
	}
	if($project->tech){
		$backend->addOutput("<div class=\"tech\"><span class=\"label\">");
		if($project->plang)$backend->addText("Other ");
		$backend->addText("Technologies used: ");
		$backend->addOutput("</span>");
		foreach($project->tech as $tech){
			if($aditionaltechs++)$backend->addText(", ");
			$backend->addText($tech);
		}
		$backend->addOutput("</div>");
	}
	if($project->homepage){
		$homepagelabel="Homepage";
		foreach(explode(" ",$project->homepage) as $url){
			$url=htmlspecialchars($url);
			if($homepagehtml){
				$homepagehtml.=", ";
				$homepagelabel="Homepages";
			}
			$homepagehtml.="<a href=\"{$url}\">{$url}</a>";
		}
		$backend->addOutput("<div class=\"homepage\"><span class=\"label\">{$homepagelabel}: </span>");
		$backend->addOutput($homepagehtml);
		$backend->addOutput("</div>");
	}
	if($project->me){
		$backend->addOutput("<div class=\"mypart\"><span class=\"label\">My Contribution: </span>");
		$backend->addText($project->me);
		$backend->addOutput("</div>");
	}
	if($project->download){
		$backend->addOutput("<div class=\"download\"><span class=\"label\">Download: </span><a href=\"");
		$backend->addText($project->download);
		$backend->addOutput("\">");
		$backend->addText($project->download);
		$backend->addOutput("</a></div>");
	}
	if($project->source){
		$backend->addOutput("<div class=\"source\"><span class=\"label\">Source Code: </span><a href=\"");
		$backend->addText($project->source);
		$backend->addOutput("\">");
		$backend->addText($project->source);
		$backend->addOutput("</a></div>");
	}
	$backend->addOutput("<div id=\"project\">");
	$backend->addOutput($project->content);
	$backend->addOutput("</div>");

}







require("backend/init.php");
foreach(glob("projectpages/*.php") as $name){
	include $name;
	preg_match("~projectpages/(.*)\\.php~",$name,$match);
	$projectpage->url=$match[1];
	$projectpages[$projectpage->url]=$projectpage;
	unset($projectpage);
}
$backend=new Backend("Projects");
if($project=$projectpages[$backend->subpage]){
	$backend=new Backend("Projects",true);
	if($backend->mimetype=="application/rdf+xml"){
		$backend->addOutput('<rdf:RDF
	xmlns:rdf="http://www.w3.org/1999/02/22-rdf-syntax-ns#"
	xmlns:rdfs="http://www.w3.org/2000/01/rdf-schema#"
	xmlns:foaf="http://xmlns.com/foaf/0.1/"
	xmlns:owl="http://www.w3.org/2002/07/owl#"
	xmlns:dbp="http://dbpedia.org/property/"
	xmlns:doap="http://usefulinc.com/ns/doap#"
	xmlns:mo="http://purl.org/ontology/mo/">
	<doap:Project rdf:about="'.htmlspecialchars($backend->noext).'#project">');
	if($project->title){
		$backend->addText($project->title,"doap:name");
		$backend->addText($project->title,"rdfs:label");
	}
	if($project->summary){
		$backend->addText($project->summary,"doap:description");
	}
	if($project->homepage){
		$backend->addOutput('<doap:homepage rdf:resource="'.htmlspecialchars($project->homepage).'"/>'."\n");
		$backend->addOutput('<foaf:homepage rdf:resource="'.htmlspecialchars($project->homepage).'"/>'."\n");
	}
	if($project->img)$backend->addOutput('<foaf:depiction rdf:resource="'.htmlspecialchars($project->img).'"/>'."\n");
	if($project->plang)foreach($project->plang as $plang){
		$backend->addText($plang,"doap:programming-language");
	}
	$backend->addOutput("\n\t".'</doap:Project>
</rdf:RDF>');
		$backend->printit();
	}
	$backend->addTitle("Projects",null);
	if($project->minor)$backend->addTitle("Minor Projects",null);
	$backend->addTitle($project->title);
	displayproject($project);
	$backend->addOutput("<a href=\"/projects\" class=\"navlink\">Return to all projects</a>");
	$backend->printit();
}
if($backend->subpage == "lang") {
	$langs = array();
	$techs = array();
	foreach ($projectpages as $project) {
		if (!empty($project->plang)) $langs = array_merge($langs, $project->plang);
		if (!empty($project->tech)) $techs = array_merge($techs, $project->tech);
	}
	$backend->addTitle("Projects",null);
	
	if ($backend->subsubpage) {
		foreach ($langs as $lang) {
			if (strtolower(str_replace("_", " ", $backend->subsubpage)) == strtolower($lang)) {
						
				$backend->addTitle($lang);
				$backend->addText("Projects I've used $lang in:");
				$backend->addOutput("<ul>");
				foreach ($projectpages as $project) {
					if (!empty($project->plang) and in_array($lang, $project->plang)) {
						$backend->addOutput("<li><a href=\"/projects/".htmlspecialchars($project->url)."\">");
						$backend->addText($project->title);
						$backend->addOutput("</a></li>");
						
					}
				}
							
				$backend->addOutput("</ul>");
				$backend->printit();
				
			}
		}
	}
	$backend->addTitle("Languages I've used");
	natcasesort($langs);
	natcasesort($techs);
	$backend->addText("Here's some of the programming languages I've used (in one way or another):");
	$backend->addOutput("<ul>");
	foreach (array_unique($langs) as $lang) {
		if (empty($lang)) continue;
		$backend->addOutput("<li><a href=\"/projects/lang/".htmlspecialchars(strtolower(str_replace(" ", "_", $lang)))."\">");
		$backend->addText($lang);
		$backend->addOutput("</a></li>");
	}
	$backend->addOutput("</ul>");
	$backend->addText("And other tech I've used:");
	$backend->addOutput("<ul>");
	foreach (array_unique($techs) as $tech) {
		if (empty($tech)) continue;
		$backend->addOutput("<li>");
		$backend->addText($tech);
		$backend->addOutput("</li>");
	}
	$backend->addOutput("</ul>");
	$backend->printit();
}
if($backend->subpage)$backend->redirect("/projects/");
$backend->addTitle("Projects");
//$backend->addText("Here are some of my more recent projects, past and present:");
usort($projectpages,'projsort');
$backend->addOutput("<div id=\"thumbs\">");
foreach($projectpages as $project){
	if($project->subtype)continue;
	if(glob("/srv/lukeblaney.co.uk/img/projects/thumbs/".$project->url.".*")){
		$img=htmlspecialchars($project->url);
		unset($extraclass);
	}
	else{
		$img="default";
		$extraclass=" defaultthumb";
	}
	$backend->addOutput("\t<a href=\"#".htmlspecialchars($project->url)."\"><img class=\"projectthumb{$extraclass}\" src=\"/img/projects/thumbs/{$img}\" alt=\"".htmlspecialchars($project->title)."\" title=\"".htmlspecialchars($project->title)."\" id=\"".htmlspecialchars($project->url)."thumb\" /></a>\n");
}
$backend->addOutput("\t<a href=\"#minor\"><img class=\"projectthumb defaultthumb\" src=\"/img/projects/thumbs/default\" alt=\"Minor Contributions\" title=\"Minor Contributions\" id=\"minorthumb\" /></a>");
$backend->addOutput("</div>\n");
foreach($projectpages as $project){
	if($project->subtype)continue;
	$backend->addOutput("<div id=\"".htmlspecialchars($project->url)."\" class=\"projsummary\">");
	if($project->img)$backend->addOutput(" <a href=\"/projects/".htmlspecialchars($project->url)."\"><img class=\"projectpic\" src=\"".htmlspecialchars($project->img)."\" alt=\"\" /></a>");
	$backend->addTitle($project->title,2,"/projects/".$project->url);
	$backend->addOutput($project->summary);
	//displayproject($project);
	if($project->content)$backend->addOutput(" <a href=\"/projects/".htmlspecialchars($project->url)."\" class=\"navlink\">More Info...</a>");
	$backend->addOutput("</div>\n");
}
$backend->addOutput("<div id=\"minor\" class=\"projsummary\">");
$backend->addTitle("Minor Contributions",3);
$backend->addOutput("<p>A couple of projects which I wasn't really involved much in.  But I get a mention on their websites, so  I'm including them anyway.</p>");
foreach($projectpages as $project){
	if($project->subtype!="minor")continue;
	$backend->addOutput("<div id=\"".htmlspecialchars($project->url)."\">");
	$backend->addTitle($project->title,3,"/projects/".$project->url);
	$backend->addOutput($project->summary);
	$backend->addOutput("</div>");
}
$backend->addOutput("</div>");
$backend->printit();

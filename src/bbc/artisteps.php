<?php
require("../backend/init.php");
$backend=new Backend("Projects",false);
$backend->addTitle("BBC");

$backend->addTitle("Artist Brands");
$backend->addOutput("<p>Uses <a href='http://dbtune.org/bbc/playcount/'>DBTune playcount</a></p>");

if ($_GET['mbid']) {
	$uri = "http://dbtune.org/musicbrainz/resource/artist/".$_GET['mbid'];
	$data = querySparql("SELECT ?brand ?count WHERE { ?pc pc:object <{$uri}>.
	?brand pc:playcount ?pc. ?pc pc:count ?count FILTER (?count>1)} LIMIT 50");
	foreach ($data as $row) {
		if (!preg_match("~.*/(\w*)#(.*)~", (string)$row->uri, $m)) continue;
		$pid = $m[1];
		$type = $m[2];
		if ($type == 'brand') $type = 'progbrand';
		$img = "http://www.bbc.co.uk/iplayer/images/{$type}/{$pid}_178_100.jpg";
		$url = "http://www.bbc.co.uk/programmes/{$pid}";
		$backend->addOutput("<a href='$url' title='".(string)$row->literal." Plays'><img src='{$img}' /></a>");
	}
}
else {
	$backend->addOutput("<form><label>Music Brainz ID<input name='mbid' /></label></form>");
}
$backend->printit();

function querySparql($sparql){
	$url="http://dbtune.org/bbc/playcount/store/evaluateQuery";
	$params = array(
		'query' => $sparql,
		'format' => 'application/sparql-results+xml',
		'queryLanguage' => 'SPARQL',
	);
	$data = http_build_query($params);
	$url .= '?' . $data;
	$xml = simplexml_load_file($url);
	return $xml;
}


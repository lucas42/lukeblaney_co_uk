<?php
require_once("conneg.php"); // download from http://www.w3.org/2005/04/conneg.phi
$conneg = new contentNegotiation();
$contenttype=$conneg->compareQ("application/xhtml+xml,text/html,application/rdf+xml");
$uri=$_SERVER['REQUEST_URI'];
$extention=substr($uri,strrpos($uri,".")+1);
if ($contenttype=="application/rdf+xml" || $extention=="rdf") {
	header("Content-Type: application/rdf+xml;charset=UTF-8");
	?>
<rdf:RDF
	xmlns:rdf="http://www.w3.org/1999/02/22-rdf-syntax-ns#"
	xmlns:rdfs="http://www.w3.org/2000/01/rdf-schema#"
	xmlns:foaf="http://xmlns.com/foaf/0.1/"
	xmlns:owl="http://www.w3.org/2002/07/owl#"
	xmlns:dbp="http://dbpedia.org/property/"
	xmlns:mo="http://purl.org/ontology/mo/">
	<foaf:PersonalProfileDocument rdf:about="<?=htmlspecialchars($uri)?>">
		<rdfs:label>Description of the person Luke Blaney</rdfs:label>
		<foaf:maker rdf:resource="#thing"/>
		<foaf:primaryTopic rdf:resource="#thing"/>
	</foaf:PersonalProfileDocument>
	<foaf:Person rdf:about="#thing">
		<owl:sameAs rdf:resource="http://www.bedlamtheatre.co.uk/people/2#Agent"/>
		<owl:sameAs rdf:resource="http://www.bbc.co.uk/users/lucas42#me"/>
		<foaf:name>Luke Blaney</foaf:name>
		<foaf:givenName>Luke</foaf:givenName>
		<foaf:familyName>Blaney</foaf:familyName>
		<foaf:nick>lucas42</foaf:nick>
		<foaf:homepage rdf:resource="http://lukeblaney.co.uk./"/>
		<foaf:schoolHomepage rdf:resource="http://www.lagancollege.com/"/>
		<foaf:schoolHomepage rdf:resource="http://www.inf.ed.ac.uk/"/>
		<foaf:schoolHomepage rdf:resource="http://www.ph.ed.ac.uk/"/>
		<foaf:account>
			<foaf:OnlineAccount>
				<foaf:accountServiceHomepage rdf:resource="http://twitter.com" />
				<foaf:accountName>lucas42</foaf:accountName>
			</foaf:OnlineAccount>
		</foaf:account>
		<foaf:account>
			<foaf:OnlineAccount>
				<foaf:accountServiceHomepage rdf:resource="http://www.facebook.com" />
				<foaf:accountName>lucas42</foaf:accountName>
			</foaf:OnlineAccount>
		</foaf:account>
		<foaf:account>
			<foaf:OnlineAccount>
				<foaf:accountServiceHomepage rdf:resource="http://id.bbc.co.uk/" />
				<foaf:accountName>lucas42</foaf:accountName>
			</foaf:OnlineAccount>
		</foaf:account>
		<foaf:made rdf:resource="http://purl.org/theatre"/>
		<foaf:made rdf:resource="http://www.bedlamtheatre.co.uk"/>
		<foaf:made rdf:resource="http://vixens.eusa.ed.ac.uk"/>
		<foaf:depiction rdf:resource="/handstand"/>
		<foaf:knows rdf:resource="http://www.bedlamtheatre.co.uk/people/1#Agent"/>
		<foaf:tel rdf:resource="tel:+447896438064"/>
		<foaf:plan>To get a job in the real world</foaf:plan>
		<foaf:geekcode>GCS/GS d- a-- C++ L+++ W++++ w-- !5>++ !X>++ DI+</foaf:geekcode>
	</foaf:Person>
	<foaf:Group>
		<foaf:name>Edinburgh University Theatre Company</foaf:name>
		<foaf:homepage rdf:resource="http://www.bedlamtheatre.co.uk/"/>
		<foaf:member rdf:resource="#thing"/>
	</foaf:Group>
	<foaf:Group>
		<foaf:name>Edinburgh University Cheerleading Society</foaf:name>
		<foaf:nick>The Vixens</foaf:nick>
		<foaf:homepage rdf:resource="http://vixens.eusa.ed.ac.uk/"/>
		<foaf:member rdf:resource="#thing"/>
	</foaf:Group>
	<foaf:Group>
		<foaf:name>Edinburgh University Juggling Society</foaf:name>
		<foaf:homepage rdf:resource="http://juggling.eusa.ed.ac.uk/"/>
		<foaf:member rdf:resource="#thing"/>
	</foaf:Group>
</rdf:RDF>
<?

} else {
	header("Content-Type: {$contenttype};charset=UTF-8\n\n");
	if ($contenttype=="application/xhtml+xml") {
			print"<?xml version=\"1.0\" encoding=\"UTF-8\"?>";
	}
?>
<!DOCTYPE html>
			<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
<title>Luke Blaney</title>
<link rel="alternate" type="application/rdf+xml" href="/.rdf" />
<link rel="stylesheet" type="text/css" href="/style" />

</head>
<body>
	<h1><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
   <image x="0" y="0" width="60" height="257" xlink:href="/handstand" opacity=".5"/>
   
   <clipPath id="name"><text transform="rotate(90, 10, 15)" font-weight="bold" font-size="35">Luke Blaney</text></clipPath><g clip-path="url(#name)">
   <image x="0" y="0" width="60" height="257" xlink:href="/handstand"/>
 </g>
 
</svg></h1>
<div id="thing">
<a href="http://uk.linkedin.com/in/lukeblaney">LinkedIn Profile</a>
<a href="http://twitter.com/lucas42">twitter.com/lucas42</a>
</div>
</body>
</html>
<?
}

<?php

require("backend/init.php");
$backend=new Backend("CV",false,true);
$backend->addTitle("Curriculum Vitae");



if($backend->mimetype=="application/rdf+xml"){
	$backend->addOutput('<rdf:RDF
	xmlns:rdf="http://www.w3.org/1999/02/22-rdf-syntax-ns#"
	xmlns:rdfs="http://www.w3.org/2000/01/rdf-schema#"
	xmlns:foaf="http://xmlns.com/foaf/0.1/"
	xmlns:owl="http://www.w3.org/2002/07/owl#"
	xmlns:dbp="http://dbpedia.org/property/"
	xmlns:doap="http://usefulinc.com/ns/doap#"
	xmlns:mo="http://purl.org/ontology/mo/"
	xmlns:cv="http://purl.org/captsolo/resume-rdf/0.2/cv#">
	<cv:CV rdf:about="/cv">
		<cv:aboutPerson rdf:resource=\"http://lukeblaney.co.uk/#me\" />');
	//if($cv->)$backend->addText($cv->,"cv:");
	//if($cv->)$backend->addText($cv->,"cv:");
	//if($cv->)$backend->addText($cv->,"cv:");


	$backend->addOutput("\n\t".'</cv:CV>
</rdf:RDF>');
		$backend->printit();
	}
$backend->addOutput("My CV is available <a href=\"/cv.pdf\">as a pdf</a>.");
//$backend->addOutput("It is no longer up-to-date as I have a job and stuff.", 'p');
$backend->printit();

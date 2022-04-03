<?php

require("backend/init.php");
$backend=new Backend("About",true,false,true);
$backend->addOpenId();
if($backend->mimetype=="application/rdf+xml")$backend->addOutput('<rdf:RDF
	xmlns:rdf="http://www.w3.org/1999/02/22-rdf-syntax-ns#"
	xmlns:rdfs="http://www.w3.org/2000/01/rdf-schema#"
	xmlns:foaf="http://xmlns.com/foaf/0.1/"
	xmlns:owl="http://www.w3.org/2002/07/owl#"
	xmlns:dbp="http://dbpedia.org/property/"
	xmlns:mo="http://purl.org/ontology/mo/">
	<foaf:PersonalProfileDocument rdf:about="http://lukeblaney.co.uk'.htmlspecialchars($backend->uri).'">
		<rdfs:label>Description of the person Luke Blaney</rdfs:label>
		<foaf:maker rdf:resource="'.htmlspecialchars($backend->noext).'#me"/>
		<foaf:primaryTopic rdf:resource="'.htmlspecialchars($backend->noext).'#me"/>
	</foaf:PersonalProfileDocument>
	<foaf:Person rdf:about="'.htmlspecialchars($backend->noext).'#me">
		<owl:sameAs rdf:resource="http://www.bedlamtheatre.co.uk/people/2#Agent"/>
		<owl:sameAs rdf:resource="http://www.bbc.co.uk/users/lucas42#me"/>
		<foaf:name>Luke Blaney</foaf:name>
		<foaf:givenName>Luke</foaf:givenName>
		<foaf:familyName>Blaney</foaf:familyName>
		<foaf:nick>lucas42</foaf:nick>
		<foaf:homepage rdf:resource="http://lukeblaney.co.uk/"/>
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
		<foaf:account>
			<foaf:OnlineAccount>
				<foaf:accountServiceHomepage rdf:resource="http://lanyrd.com/" />
				<foaf:accountName>lucas42</foaf:accountName>
			</foaf:OnlineAccount>
		</foaf:account>
		<foaf:account>
			<foaf:OnlineAccount>
				<foaf:accountServiceHomepage rdf:resource="http://ubuntuforums.org/" />
				<foaf:accountName>lucas42</foaf:accountName>
			</foaf:OnlineAccount>
		</foaf:account>
		<foaf:openid rdf:resource="http://id.lukeblaney.co.uk/"/>
		<foaf:weblog rdf:resource="http://blog.lukeblaney.co.uk/"/>
		<foaf:made rdf:resource="http://purl.org/theatre"/>
		<foaf:made rdf:resource="http://www.bedlamtheatre.co.uk"/>
		<foaf:made rdf:resource="http://vixens.eusa.ed.ac.uk"/>
		<foaf:depiction rdf:resource="/img/luke1"/>
		<foaf:knows rdf:resource="http://www.bedlamtheatre.co.uk/people/1#Agent"/>
		<foaf:tel rdf:resource="tel:+447896438064"/>
		<foaf:plan>To get a job in the real world</foaf:plan>
		<foaf:geekcode>GCS/S d- a-- C++ L+++ W++++ w-- !5>++ !X>++ DI+</foaf:geekcode>
		<rdfs:comment>Computer Science &amp; Physics graduate and web developer from Belfast, currently based in Edinburgh</rdfs:comment>
	</foaf:Person>
	<foaf:Organization>
		<foaf:name>Edinburgh University Theatre Company</foaf:name>
		<foaf:homepage rdf:resource="http://www.bedlamtheatre.co.uk/"/>
		<foaf:member rdf:resource="/#me"/>
	</foaf:Organization>
	<foaf:Organization>
		<foaf:name>Edinburgh University Cheerleading Society</foaf:name>
		<foaf:nick>The Vixens</foaf:nick>
		<foaf:homepage rdf:resource="http://vixens.eusa.ed.ac.uk/"/>
		<foaf:member rdf:resource="/#me"/>
	</foaf:Organization>
	<foaf:Organization>
		<foaf:name>Edinburgh University Juggling Society</foaf:name>
		<foaf:homepage rdf:resource="http://juggling.eusa.ed.ac.uk/"/>
		<foaf:member rdf:resource="/#me"/>
	</foaf:Organization>
</rdf:RDF>');

elseif($backend->mimetype=="application/xrds+xml")$backend->addOutput('
<xrds:XRDS
  xmlns:xrds="xri://$xrds"
  xmlns:openid="http://openid.net/xmlns/1.0"  
  xmlns="xri://$xrd*($v*2.0)">
  <XRD>
    <Service priority="5">
      <Type>http://openid.net/signon/1.1</Type>
      <URI>http://www.myopenid.com/server</URI>
      <openid:Delegate>http://id.lukeblaney.co.uk/</openid:Delegate>
    </Service>
  </XRD>
</xrds:XRDS>');

else{
	$backend->addOutput("<img src=\"/img/luke1\" alt=\"A pic of 
me\" class=\"right\" style=\"margin:0 2em 0 2em; height:10em;\" 
/>");

/*
 $backend->addOutput("<div style=\"width:30em; margin:2em auto;\">I'm a <span title=\"And I can use title attributes.\">web developer</span>, and <span title=\"I was thinking of putting down PHP as my main language.  In the end, I decided not to, and put down Irish instead.\">according to the 2011 UK Census</span>, I develop the web.  By day, I do <span title='Or \"web\" apps as I prefer to call them.'>fashionable HTML5 web app thingys</span>, by night I prefer the less fashionable <a href=\"http://en.wikipedia.org/wiki/Semantic_Web#content\" title=\"Am I linking to an Information Resource, or a Non-information resource?\">Semantic Web</a>.  If you want to read about some of the stuff I've done, check out my <a href=\"/projects\" title=\"All the fancy animation uses CSS only - none of your old fashioned DHTML\">projects pages</a>  (It doesn't include work stuff - its <span title=\"Yes, *all* of it, even countless numbers of wordpress upgrades.\">all top secret</span>, if I told you about it, <span title=\"Though, come to think of it - would telling somebody secret stuff and then killing them still count as a breach of contract?\">I'd have to kill you.</span>) </div>

 ");
 */
$backend->addOutput("<div style=\"width:30em; margin:2em auto;\">I'm a web developer, mainly PHP and javascript, but I like to play with <a href=\"/projects/lang/\">lots of other languages too</a>.  I'm originally from Belfast, now living in London via Edinburgh.</div>");
}
$backend->printit();

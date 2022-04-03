<?php
$projectpage->title="Bedlam Theatre Website";
$projectpage->summary="I was webmaster of the Edinburgh University Theatre Company in my last year of University.";
$projectpage->plang[]="PHP";
$projectpage->plang[]="Javascript";
$projectpage->tech[]="Linked Data";
$projectpage->tech[]="RDF";
$projectpage->tech[]="mySQL";
$projectpage->tech[]="BBC Glow";
$projectpage->tech[]="HTML5";
$projectpage->img="/img/projects/bedlam";
$projectpage->homepage="http://www.bedlamtheatre.co.uk";
$projectpage->me="I kept the existing style and bits of the content, but completely rewrote the backend.";
$projectpage->order=1;



$projectpage->content="

<p>I was webmaster of the Edinburgh University Theatre Company in my last year of University.  I redesigned the website using a linked data approach and created alternate RDF views where applicable.  I also added a login system to allow members of the Company to edit relevant parts of the site and which allowed various admin tasks to be done online.</p>

<div class=\"imgholder right\">
<img src=\"/img/projects/theaont\" alt=\"Theatre Ontology\" />
<span class=\"caption\">
A diagram of the <a href=\"http://purl.org/theatre\">Theatre Ontology</a>.
</span>
</div>

<h2>Domain Driven Design</h2>
<p>I was unable to find an existing Ontology for theatre, so went about designing my own.  There are several approaches to modelling theatre data, one of the simplest being a number of performances linked to one show.  However, I wanted a system which would be able to handle the same show being produced multiple times sometimes decades apart.  For this I needed to distinguish between shows and productions.</p>
<p>It was important to be able to give a list of people involved in each project.  <a href=\"http://xmlns.com/foaf/spec/\">FOAF</a> has the properties <em>currentProject</em> and <em>pastProject</em>, however these were unsuitable for a number of reasons, the main one being that they didn't provide a way of indicating what the person did.  Instead I used the concept of roles.  Each role consists of an agent, project and position; for acting roles the position is the portrayal of a character.  Characters are themselves agents, which allows for people like Shakespeare who is the writer of many shows, but is also a character in others.</p>

<div class=\"imgholder left\">
<img src=\"/img/projects/shakespeare\" alt=\"A page on William Shakespeare\" />
<span class=\"caption\">
A page about <a href=\"http://www.bedlamtheatre.co.uk/people/79\">William Shakespeare</a>.
</span>
</div>
<h2>The web as a CMS</h2>
<p>There is a lot of information already on the web about theatre.  Wikipedia has information about many well-known plays and their writers.  Also, many of the EUTC's alumni have gone on to become 
notable enough to have their own Wikipedia articles.  Some alumni have also appeared on various BBC programmes.  Rather than recreating all this information, I have incorporated existing 
information into the site.  An example of this is the page on <a href=\"http://www.bedlamtheatre.co.uk/people/79\">Shakespeare</a>.  His picture was found using DBpedia.  The information about him 
comes from Wikipedia.  And at the bottom of the page there is are some BBC programmes taken from <a href=\"http://www.bbc.co.uk/programmes/people\">bbc.co.uk/programmes/people</a>.</p>
<h2>There's no such thing as the archive</h2>
<p>The previous system was quite disjointed.  New productions were proposed on paper.  Some of the larger productions had a webpage which was live until their run finished.  There was an online 
archive hosted by our alumni organisation, but it often took about a year for shows to be added to it.  Each of these things were completely separate and maintained by different people.</p>
<p>To create some sort of consistency, I implemented online proposals.  Now, as soon as a proposal is marked as successful, it is given a permanent web presence.  Each production has a URL which 
stays the same before, during and after its run.  Basic information is taken from the proposal form, which can then be edited and added to by members of the production team.

</p>
<h2>Automated Permissions</h2>
<p>It is often difficult to manage large numbers of permissions manually.  Things can get overlooked when circumstances change and the system can be open to abuse by whoever sets the permissions.  Rather than granting permissions to particular people, I decided permissions should be set based on positions.  So, for example, a producer has permission to edit their productions or the productions manager of a season can edit all productions in that season.  These positions are those which appear on the credits list on the website.  So by adding someone as a director, you are also giving them permission to edit that production.</p>
<p>To prevent any abuse, I made sure that the part of the system which grants permissions doesn't have information about who is signed in, only their positions and projects.  This meant that 
whenever anyone asked me to make an exception \"just this once\" I was able to honestly tell them that the system wouldn't let me.</p>


<h2>Links</h2>
Relevant bits and pieces from around the web:
<ul>
<li><a href=\"http://purl.org/ontology/po/\">The Programmes Ontology</a> - the BBC</li>
<li><a href=\"http://derivadow.com/2009/01/13/the-web-as-a-cms/\">The web as a CMS</a> - Tom Scott</li>
<li><a href=\"http://jonathan.tweed.name/2008/12/30/theres_no_such_thing_as_the_archive/\">There’s no such thing as the archive</a> - Jonathan Tweed</li>
<!--<li><a href=\"\"></a></li>
<li><a href=\"\"></a></li>
<li><a href=\"\"></a></li>
<li><a href=\"\"></a></li>
<li><a href=\"\"></a></li>
<li><a href=\"\"></a></li>
<li><a href=\"\"></a></li>
<li><a href=\"\"></a></li>
<li><a href=\"\"></a></li>
<li><a href=\"\"></a></li>
<li><a href=\"\"></a></li>
<li><a href=\"\"></a></li>
<li><a href=\"\"></a></li>-->
</ul>
";



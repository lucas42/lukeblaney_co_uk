<?php
$projectpage->url="allfeeds";
$projectpage->title="All feeds [working title]";
$projectpage->summary="Gets updates from various sources and formats them.";
$projectpage->plang[]="Javascript";
$projectpage->plang[]="PHP";
$projectpage->tech[]="mySQL";
$projectpage->tech[]="AJAX";
$projectpage->homepage="";
$projectpage->me="All of it.";
$projectpage->order=4;
$projectpage->content="
<div class=\"imgholder left smaller\">
<img src=\"/img/afss5\" alt=\"allfeeds\" />
<span class=\"caption\">
A screenshot of allfeeds
</span>
</div>
<p>
Allfeeds is part of my <a href=\"/projects/lucOS\">lucOS</a> project.  It combines status updates from a variety of sources and displays them in a way that makes sense to me.

</p>
<p>
<h2>Getting Updates</h2>
Status updates are taken from Twitter, Facebook, RSS feeds, BBC blog comments and Audioboo and stored in a mySQL database.<br/>
These updates are then parsed to find links, hashtags, BBC programme Ids, postcodes, ISBNs, emoticons, chemical symbols and references to other users.<br/>
When found, these are replaced by appropriate media (eg pictures, videos etc.)<br/>
A javascript client then uses ajax to fetch these updates from the database.
</p>
<p>
<div class=\"imgholder right smaller\">
<img src=\"/img/afss15\" alt=\"BBC Radio 4's profile\" />
<span class=\"caption\">
BBC Radio 4's profile.
</span>
</div>
<h2>Organising Agents</h2>
Some people use mulitple social networks, some even have multiple accounts on the same network, so its important to differentiate between Agents and Personas.  Each agent can have mulitple personas (each of which is linked to an account).  Agents can also be part of groups, which are themselves agents.
For example, BBC Radio 4 is an agent.  It has two personas: their twitter account and their blog.  It is part of the BBC group, but is also a group itself.
</p>
<p>
<h2>Styling Updates</h2>
Updates are styled based on the agent who sent them.
Agents can be assigned values for their background, main text colour, border/links colour and border radius.  Agents inherit style from any groups they are in, though their own style can override 
this.
</p>

<p>
<h2>Formatting Links</h2>
	One of the most useful features of allfeeds is that it imports relevant media and information from other websites.  For example, if someone includes a link to an img hosting service, then 
I use the API to automatically get the relevant picture and title/caption and embed it in the tweet.  For sites without an API, then I resort to screen scrapping.  <br/>For video sites,  the relevant video is embedded in the update using the HTML5 video tag.  Using HTML5 has many benefits: I don't need any plugins installed.  I can use javascript event listeners to pause and resume any music I have playing in the built-in audio player when the video plays / finishes.  I can use CSS3 transforms to rotate the video if its the wrong way up (or just for fun).  I can easily adjust the volume for the video using the same control as for my audio player.<br/>
For audio sites (such as audioboo)  I can either interrupt what's playing in my audio player, or queue it up to play as part of the current playlist.<br/>
Links to BBC programmes or iplayer are replaced with the relevant thumbnail and if a copy of the programme is found on my harddrive, then the option to play is given.  I also create a list of programmes mentioned so I can see what is the most popular.<br/>
<div class=\"imgholder left smaller\">
<img src=\"/img/afss10\" alt=\"RDF example\" />
<span class=\"caption\">
Displaying info taken from RDF
</span>
</div>
When looking up links, allfeeds sends a preference for RDF using conneg.  If RDF is returned, then it is parsed to look for suitable information to embed in the update.<br/>
</p>
<p>
However, it's not just links that are formatted.  Common marks used for <strong>*emphasis*</strong> are styled appropriately.  Common emoticons are embeded.  Subscripts and superscripts are 
inserted in places such as H<sub>2</sub>O, 2<sup>nd</sup> and E=mc<sup>2</sup>.  Numbers labeled as ISBNs are replaced by a picture of a book (created by combining the cover from amazon and the 
bulk of the book from a picture of my own).  Hashtags in twitter and audiobook updates are linked to the search result for that hashtag.  I also use fanhubz's SPARQL endpoint to check if a hashtag corresponds to a BBC programme, in which case I treat it as such.  I do the same for any strings that are clearly BBC programme IDs.  I also link common RDF namespace identifiers to their URLs, and link shorthands used often by people I follow (e.g. \"/progs\").
</p>

";

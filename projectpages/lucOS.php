<?php
$projectpage->url="lucOS";
$projectpage->title="lucOS";
$projectpage->summary="A personal project which attempts to make a web-based operating system";
$projectpage->plang[]="Javascript";
$projectpage->plang[]="PHP";
$projectpage->tech[]="mySQL";
$projectpage->tech[]="AJAX";
$projectpage->homepage="";
$projectpage->me="All of it.";
$projectpage->order=3;
$projectpage->content="
<div class=\"imgholder left smaller\">
<img src=\"/img/afss5\" alt=\"lucOS\" />
<span class=\"caption\">
A screenshot of lucOS
</span>
</div>
<p>
lucOS is a custom web application built in javascript utilising HTML5 and CSS3 technologies.  My ultimate aim of this project is to create a system which will cater for all my day-to-day computing needs but can be accessed from anywhere.  In a world of cloud computing, this is my attempt to create my own personalised cloud.

</p>
<p>
lucOS consists of many different modules.  Each module can import dependencies and check which other modules have been imported.  This allows modules to run independently, but also to integrate 
with each other when they are run together.
</p>

<p>
<h2><a href=\"/projects/allfeeds\">Social Updates</a></h2>
On loading lucOs, the most obvious module is <a href=\"/projects/allfeeds\">allfeeds</a>, which combines status updates from a variety of sources and displays them in a way that makes sense to me.
</p>
<p>
<h2>Audio Player</h2>
lucOS has a built-in audio player which uses HTML5 audio elements.  It has basic playlist features, including queuing up individual tracks, loading m3u playlists, loading all the tracks in a given folder (recursively) and shuffling the playlist.  It stores a copy of the current playlist in a mySQL table so that it can be resumed the next time lucOS is loaded.
</p>
<p>
<h2><a href=\"/projects/progs\">Programmes</a></h2>
lucOS keeps track of all the programmes I watch and makes it easy for me to work out what to watch next.  It also remembers which BBC programmes my friends have mentioned in status updates, through links, hashtags or just mentioning the programme id.
</p>
<p>
<h2>Making it Open-Source?</h2>
I have occasionally considered making lucOS available to others open source, however its probably been a bit too customised for me to be any use to anyone else in its current form.  One example of this is that the system is bilingual: some words are in English, others are in Irish.

</p>
";

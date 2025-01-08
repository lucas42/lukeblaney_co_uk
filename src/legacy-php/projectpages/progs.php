<?php
$projectpage->url="progs";
$projectpage->title="Progs";
$projectpage->summary="A programme which tracks which TV and Radio programmes I've listened to/watched and lets me know what episode comes next.";
$projectpage->plang[]="Bash";
$projectpage->plang[]="Java";
$projectpage->plang[]="PHP";
$projectpage->tech[]="mySQL";
$projectpage->img="/img/projects/progs";
$projectpage->me="All of it.";
$projectpage->order=5;
$projectpage->content="
	<h2>Bash script</h2>
		<p>It started as a bash script.  It would take a directory of media files and use a hidden file to store the name of the latest episode I'd watched.  It relied on the path names to decide what order I should watch them in.</p>
		
	<h2>Java</h2>
		<p>I later wrote a simple Java web server to give the script a web interface.  I also removed the hidden files from each folder and replaced them with a centralised list of all the episodes that I had watched.  This allowed the system to be multi-user.</p>
		
	<h2>PHP</h2>
		<p>Recently I rewrote the whole thing in PHP as part of my <a href=\"/projects/lucOS\">lucOS</a> project.  I used a mySQL database instead of a text file to store which episodes I had seen.</p>
		
	<h2>BBC Programmes</h2>
		<p>As part of the Java system, BBC programme IDs were detected so that the web interface could use the BBC's iPlayer pictures and descriptions.  However, episodes were still ordered alphabetically based on these pids.  This method was unexpectedly accurate for most programmes, although there were a couple of programmes where this didn't work correctly.</p>
		<p>In the PHP version of the system, rdf files for BBC programmes are looked up.  For many programmes, this includes the order of episodes.  For programmes which don't list the order, the system bases the order on episode titles.  For episodes whose title are a date, the system parses this date, for other programmes, they are sorted alphabetically.</p>


";

<?php
$projectpage->url="lucOS2";
$projectpage->title="lucOS 2.0";
$projectpage->summary="A collection of subprojects which interact with each other.";
$projectpage->plang[]="C";
$projectpage->plang[]="Java";
$projectpage->plang[]="Javascript";
$projectpage->plang[]="Haskell";
$projectpage->plang[]="Perl";
$projectpage->plang[]="Python";
$projectpage->plang[]="Ruby";
$projectpage->plang[]="";
$projectpage->tech[]="SQLite";
$projectpage->tech[]="AJAX";
$projectpage->tech[]="node.js";
$projectpage->tech[]="HTML5";
$projectpage->tech[]="Offline manifests";
$projectpage->tech[]="";
$projectpage->homepage="";
$projectpage->me="All of it.";
$projectpage->order=11;
$projectpage->content="
<p>
This project follows on from <a href=\"/projects/lucOS\">lucOS 1</a>.  As I developed the project more and more, I found it getting slower and more bloated.  Everything was loaded at once, which was just too much if I only wanted to do one thing.  Also, I'd just started a job as a Web Developer using PHP and didn't want to end up doing more PHP in my spare time.
</p>
<p>
lucOS 2.0 breaks everything down into modules.  Each module is self-contained, but interacts with other modules and APIs.  Modules are written in whatever language I felt like trying out that day.</p>
<p>
<h2>Media Manager</h2>
The media manager keeps track of what music I'm listening to right now, including whether it's paused and the current volume.  It also stores a playlist of the next few tracks in memory and when it's running out of tracks, it requests more from the Media Selector.  The Media Manager also polls VLC to make sure music isn't playing when I'm trying to watch something.  It is written in Java and runs a http server so that other modules can communicate with it.
</p>
<p>
<h2>Media Player</h2>
The media player is a simple html page which esentially consists of a video element.  It does long poll requests to the Media Manager to find out what it should be playing and how loud.  It also reports back to the Media Manager to let it know the track's progress.  If a track is audio only, the Media Player can also show some artwork.
</p>
<p>
<h2>Media Selector</h2>
The media selector works out what I should listen to.  It takes a random selection tracks from my music sqlite database based on a weighting.  It is written in perl and runs a http server so that other modules can communicate with it.  It also has a simple web UI to make it easier to update track metadata.
</p>
<p>
<h2>Media Fingerprinter</h2>
This is a C program which fingerprints all the media in my collection using <a href=\"http://acoustid.org/chromaprint\">the Chromaprint library</a>.  It then writes this into a myslite database.  By associating metadata with a fingerprint rather than a file path, I am free to move files about as much as I want.  Rerunning the program will update all the paths in the database without disturbing the metadata.
</p>
<p><h2>Media metadata</h2>
I currently have four ways of updating metadata in my media library (well, five if you include manually editing the database):
<ul><li>A python script which reads id3 (or similar) tags.</li>
<li>A python script which looks up the acoustic fingerprints using the <a href=\"http://acoustid.org/webservice\">Acoustid web API</a>.</li>
<li>A C program which lets me add metadata to a directory of files recursively.</li>
<li>The web UI part of the Media Selector which lets me edit data on a file by file basis.</li>
</ul>
</p>
<p><h2>Media weighter</h2>
This is a haskell program which goes through each track and assigns it a number.  Currently this number is quite simple, based on factors such as a rating I have given it, whether it's a Xmas track etc.  In time I hope to make this more complex and include factors such as the time of day, how recently the track has been played, what the weather is like, what mood I'm in etc.
</p>
<p><h2>Media controller</h2>
This is a html page which lets me pause, change the volume and skip tracks.  Keeping it separate from the media player means I can have music playing on my desktop, but being controlled by a tablet or phone.
</p>
<p><h2>Notes library</h2>
This is a lightweight client-side javascript library and node.js server.  It essentially keeps track of a store of key/value pairs.  The data is kept on the client in localstorage so that it is available offline.  A list of offline changes are kept so that the data can be synced with the server when the device goes online agian.
</p>
<p><h2>Todo lists</h2>
This is a \"Web app\" which uses the notes library.  Items can be added and ticked off both on and offline.  Each todo list has its own webpage, but the use of a manifest file means new pages can be added on the fly, even offline.
</p>
<p><h2>Travel</h2>
This as a ruby app which uses the <a href=\"http://www.tfl.gov.uk/businessandpartners/syndication/16493.aspx#17615\">TFL departure boards API</a> to show the depature times of London Underground 
trains at each station.  It can also show a list of upcoming stations for a given train.  Using HTML5 app-cache and localstorage technoloies it works offline, allowing for its use on 
parts of the underground which have no internet access.
</p>
";

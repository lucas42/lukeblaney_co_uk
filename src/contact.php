<?php

require("backend/init.php");
$backend=new Backend("Contact");
$backend->addTitle("Contact");
$backend->addOutput("<div class=\"email\"><span class=\"label\">Email Address: </span><a href=\"mailto:web.NOSPAM.site@lukeblaney.co.uk\">web.NOSPAM.site@lukeblaney.co.uk</a></div>");
//$backend->addText("You may want to remove the \".NOSPAM.\" from the email address before emailing me, but then again you don't have to; it'll get to me either way.");
$backend->addText("On many websites I use the username lucas42, however neither Luke Blaney nor lucas42 are unique identifiers to me.  I'm thinking of trying to find a totally unique username, but haven't come up with a good one yet.","p");
$backend->addTitle("Other Sites",2);
$backend->addOutput("<div>Here are some of the sites I have a presence on:
<ul>
<li><a href=\"http://twitter.com/lucas42\">Twitter</a></li>
<li><a href=\"http://www.linkedin.com/in/lukeblaney\">LinkedIn</a></li>
<li><a href=\"http://www.facebook.com/lucas42\">Facebook</a></li>
<li><a href=\"http://en.wikipedia.org/wiki/User:Lucas42\">Wikipedia</a></li>
<li><a href=\"http://ga.wikipedia.org/wiki/%C3%9As%C3%A1ideoir:Lucas42\">Vicipéid (Irish language Wikipedia)</a></li>
<li><a href=\"http://www.bedlamtheatre.co.uk/people/2\">Bedlam Theatre</a></li>
<li><a href=\"http://lanyrd.com/people/lucas42/\">Lanyrd</a></li>
<li><a href=\"http://www.youtube.com/user/lukeblaney\">Youtube (no video yet though)</a></li>
<li><a href=\"http://dblp.uni-trier.de/db/indices/a-tree/b/Blaney:Luke.html\">DBLP</a></li>
<li><a href=\"http://ubuntuforums.org/member.php?u=203368\">Ubuntu Forums</a></li>
<li><a href=\"http://www.lastfm.com/user/lucas42\">Last FM</a></li>
<li><a href=\"http://about.me/lucas42\">about.me</a></li>
<li><a href=\"https://github.com/lucas42\">Github</a></li>
<li><a href=\"http://stackoverflow.com/users/420101/lucas\">Stack Overflow</a></li>
<!--<li><a href=\"\"></a></li>
<li><a href=\"\"></a></li>-->
</ul>
</div>");
$backend->printit();

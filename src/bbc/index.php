<?php

require("../backend/init.php");
$backend=new Backend("Projects",false);

$backend->addTitle("BBC");
$backend->addOutput("<a href=\"/bbc/blogcomments\">Get Blog Comments RSS</a> (probably doesn't work since they changed their comments module)");
$backend->addOutput("<br /><a href=\"/bbc/artisteps\">Artist Brands</a>");
$backend->printit();

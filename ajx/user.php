<?php

require("../backend/init.php");
$backend=new Backend("About");
$backend->addOutput("<script type=\"text/javascript\" src=\"https://ajax.googleapis.com/ajax/libs/jquery/1.5.1/jquery.min.js\" />\n");
$backend->addOutput("<script type=\"text/javascript\" src=\"/ajx/finder\" />\n");
$backend->addTitle("Who");
$backend->addText("Who are you?","p");
$backend->addText("Who? Who?","p");
$backend->addText("Who? Who?","p");
$backend->printit();

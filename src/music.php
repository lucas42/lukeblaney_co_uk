<?php

require("backend/init.php");
$backend=new Backend("music");
$backend->addTitle("Music");

$backend->addOutput("<img src=\"/img/lockdown-compositions.jpg\" alt=\"Photo of a physical copy of The Lockdown Compositions\" style=\"height:300px; float:right\"/>");
$backend->addTitle("The Lockdown Compositions", 2);
$backend->addText("A selection of musical works composed between 2020 and 2022, in and around the time of stay-at-home orders being issued globally as a response to the novel coronavirus pandemic.","p");
$backend->addOutput("A very limited run of paperback copies was printed in late 2022.  It is also available <a href=\"/media/The%20Lockdown%20Compositions.pdf\">digitally as a pdf</a>.", "p");
$backend->addText("Copyright © Luke Blaney 2022.  All rights reserved. No parts of these compositions may be reproduced, in any form, without prior permission from the composer.", 'small');
$backend->printit();

<?php
	header("Content-Type: application/json");
	$output = [
		"system" => "lukeblaney.co.uk",
		"ci" => [
			"circle" => "gh/lucas42/lukeblaney_co_uk",
		],
	];
	echo json_encode($output);

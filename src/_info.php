<?php
	header("Content-Type: application/json");
	$output = [
		"system" => "lukeblaney.co.uk",
		"ci" => [
			"circle" => "gh/lucas42/lukeblaney.co.uk",
		],
		"checks" => [
		],
	];
	echo json_encode($output);

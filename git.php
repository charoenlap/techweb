<?php 
	$commands = array(
		'echo $PWD',
		'whoami',
		'git status',
		'git add -A',
		"git commit -m '".time()." Commit by php code'",
		'git push'
	);
	// Run the commands for output
	$output = '';
	foreach($commands AS $command){
		// Run it
		$tmp = exec($command);
		// Output
		$output .= "<span style=\"color: #6BE234;\">\$</span> <span style=\"color: #729FCF;\">{$command}\n</span>";
		$output .= htmlentities(trim($tmp)) . "\n";
	}
	echo $output;
?>
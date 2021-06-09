<?php 
	$type = (isset($_GET['type'])?$_GET['type']:'');
	if($type=='push'){
		$commands = array(
			// 'echo $PWD',
			// 'whoami',
			// 'git status',
			'git add .', 
			"git commit -m '".time()." Commit by php code'",
			'git push https://charoenlap:Charoenlap89@github.com/charoenlap/techweb'
		);
		// Run the commands for output
		$output = '';
		foreach($commands AS $command){
			// Run it
			$tmp = exec($command);
			// Output
			// $output .= "<span style=\"color: #6BE234;\">\$</span> <span style=\"color: #729FCF;\">{$command}\n</span><br>";
			$output .= htmlentities(trim($tmp)) . "<br>";
		}
		echo $output;
	}else if($type=='pull'){
		$commands = array(
			// 'echo $PWD',
			// 'whoami',
			// 'git status',
			// 'git add .',
			// "git commit -m '".time()." Commit by php code'",
			'git pull https://charoenlap:Charoenlap89@github.com/charoenlap/techweb'
		);
		// Run the commands for output
		$output = '';
		foreach($commands AS $command){
			// Run it
			$tmp = exec($command);
			// Output
			// $output .= "<span style=\"color: #6BE234;\">\$</span> <span style=\"color: #729FCF;\">{$command}\n</span><br>";
			$output .= htmlentities(trim($tmp)) . "<br>";
		}
		echo $output;
	}
?>
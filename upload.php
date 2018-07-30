<!DOCTYPE html>
<html>

<head>

	<link rel="stylesheet" type="text/css" href="style.css">
	<link href="https://fonts.googleapis.com/css?family=Josefin+Sans|Open+Sans" rel="stylesheet">
	<title>LodgeBox</title>
</head>

<body>
	<div class="banner">
		<a href="index.html"><h1>LodgeBox</h1></a>
	</div>


	<div class='content'>
		<div class='bubble-one'>
			<?php

			$targetdir = 'finished/'.$_POST['teacher'].'/';
			$targetfile = $targetdir.$_POST['pupil'].'_'.$_FILES['file']['name'];

			if (!(file_exists($targetfile)) AND move_uploaded_file($_FILES['file']['tmp_name'], $targetfile)){
				echo '<h1>Your Work has been submitted!</h1><br>';

			} elseif (file_exists($targetfile)) {
				echo '<h1>Error: </h1><br><h2>File already exists on server!</h2><br><h3>Please rename you file and try again.</h3>';
			} else {

				print_r($_POST);

				switch($_FILES['file']['error']):
					case 1:
					case 2:
						echo '<h1>Error: </h1><br><h2>Your file is too big!</h2>';
						break;
					case 3:
						echo '<h1>Error: </h1><br><h2>Upload was interrupted. </h2><br><h3> please try again!</h3>';
						break;
					case 4:
						echo '<h1>Error: </h1><br><h2>Your file was not uploaded!</h2>';
						break;
					default:
						echo '<h1>Error: </h1><br><h2>Something went wrong!</h2>';
						break;

				endswitch;
			}

			?>
			
		</div>
	</div>

</body>



</html>
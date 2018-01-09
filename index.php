<!DOCTYPE html>
<html lang="en">
	<head>
        <?php require ('includes/connect.php'); ?>
		<title>Remote Coach</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="css/bootstrap.min.css">
		<script src="js/jquery-2.2.3.min.js"></script>
		<script src="js/bootstrap.min.js"></script>
	</head>
	<body>
            <nav class="navbar navbar-inverse">
                <div class="container-fluid">
                    <div class="navbar-header">
                      <a class="navbar-brand" href="#">RemoteCoach</a>
                    </div>
                    <ul class="nav navbar-nav">
                      <li class="active"><a href="#">Home</a></li>
                      <li><a href="#">Workout</a></li>
                      <li><a href="#">Program</a></li> 
                      <li><a href="#">login</a></li> 
                    </ul>
                </div>
<           </nav>
		<h1>Program Name</h1>
		<div class="container">
			<div class="dropdown">
				<button class="btn btn-primary button-dropdown" type="button" data-toggle="dropdown">Test
				<span class="caret">
				</span>
				</button>
                            <ul class="dropdown dropdown-menu">
                                <li><a href="#">Meet Prep</a></li>
                                <li><a href="#">End Strength</a></li>
                            </ul>
			</div>
			<div class="row">
				<table class="table table-striped">
					<thead>
						<tr>
							<th>Lifts</th>
							<th>Reps</th>
							<th>Sets</th>
							<th>Notes</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td>Back Squat</td>
							<td>5</td>
							<td>5</td>
							<td>5</td>
						</tr>
					</tbody>
				</table>
			</div>
		</div>
	</body>
	
</html>
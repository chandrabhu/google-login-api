<?php 
session_start();

?>
<!DOCTYPE html>
<html>
<head>
	<title>Title</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="#">Section-Title</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav">
      <li class="nav-item active">
        <a class="nav-link" href="hello.php">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="treeView/trail.php">View Section Title</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="logout.php">Logout</a>
      </li>
      
    </ul>
  </div>
</nav>
<!-- instructions-->

	<div class="container" style="margin-top: 100px;">
		<div class= "row justify-content-center">
            <div  class ="col-lg-12">

			<div class="col-lg-6">
				<hr><h4>Welcome to Section-Title</h4>   
			<h6 style="color:black;">**Instructions</h6>
			<ul>
			<li>User can Add new Title to Section-Title.</li>
			<li>User can Update the Section-Title</li>
			<li>User can Delete Section-Title</li>
            <li>User can login by Facebook and Google.</li>
            <li>User can UPload and Download JSon Files of Section-Title.</li>
            </ul>
            <h5><b>CLick Here for Demo-></b><a href="treeView/trail.php"> View Section Title</a></h5>
			
            <hr>
            </div> 
	    </div>
	</div>
</body>
</html>



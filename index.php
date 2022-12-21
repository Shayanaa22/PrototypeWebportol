<!DOCTYPE html>
<html>
<head>
  <title>NITT Campus Placements</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href = "bootstrap.min.css" rel="stylesheet">
  <link href = "https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
  <script src="bootstrap.bundle.min.js"></script>
  <script src="jquery.min.js"></script>
</head>
<body>
	<div class="dropdown" style="float:right">
    <button type="button" class="btn btn-primary dropdown-toggle" data-bs-toggle="dropdown">
      <i class = "fa fa-user" aria-hidden = "true"></i>
    </button>
    <ul class="dropdown-menu">
      <li><a class="dropdown-item" href="" data-bs-toggle="modal" data-bs-target="#student">Student Login</a></li>
      <li><a class="dropdown-item" href="" data-bs-toggle="modal" data-bs-target="#student">Recruiter Login</a></li>
      <li><a class="dropdown-item" href="" data-bs-toggle="modal" data-bs-target="#admin">Admin Login</a></li>
    </ul>
  </div>

	<div class = "bg-info">
		<br />
		<h1 class = "text-center">NITT Campus Placements</h1>
		<br />

	</div>
	
	<br />

<!-- Carousel -->
<div id="demo" class="carousel slide" data-bs-ride="carousel">

  <!-- Indicators/dots -->
  <div class="carousel-indicators">
  <br /><br />
    <button type="button" data-bs-target="#demo" data-bs-slide-to="0" class="active"></button>
    <button type="button" data-bs-target="#demo" data-bs-slide-to="1"></button>
  </div>
  
  <!-- The slideshow/carousel -->
  <div class="carousel-inner bg-light">
  <br />
    <div class="carousel-item active">
      
	  <h2 class="text-center">About Us</h2>
	  
    </div>
    <div class="carousel-item">
      
	  <h2 class="text-center">Vision</h2>
	  
    </div>
	
	<br />
  </div>
  
  <!-- Left and right controls/icons -->
  <button class="carousel-control-prev" type="button" data-bs-target="#demo" data-bs-slide="prev">
    <span class="carousel-control-prev-icon bg-dark"></span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#demo" data-bs-slide="next">
    <span class="carousel-control-next-icon bg-dark"></span>
  </button>
</div>

<br /><br />

<div class = "bg-warning">
	<br />
	<h3 class = "text-center">Contact Us at +910000000000</h3>
	<br />
</div>

<!-- Student Login Modal -->
<div class="modal fade" id="student">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h3 class="modal-title">Student Login</h3>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
  <div class="mb-3 mt-3">
    <label for="email" class="form-label">Roll Number</label>
    <input type="number" class="form-control" id="s_rno" placeholder="Enter roll number" name="s_rno">
  </div>
  <div class="mb-3">
    <label for="pwd" class="form-label">Password</label>
    <input type="password" class="form-control" id="s_pwd" placeholder="Enter password" name="s_pwd">
  </div>
  <button type="button" id="s_login" class="btn btn-primary">Login</button>
      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
      </div>

    </div>
  </div>
</div>

<!-- Admin Login Modal -->
<div class="modal fade" id="admin">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h3 class="modal-title">Admin Login</h3>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
  <div class="mb-3">
    <label for="pwd" class="form-label">Admin Password</label>
    <input type="password" class="form-control" id="a_pwd" placeholder="Enter password" name="a_pwd">
  </div>
  <button type="button" id="a_login" class="btn btn-primary">Login</button>
      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
      </div>

    </div>
  </div>
</div>

<script src="script.js"></script>
</body>
</html>

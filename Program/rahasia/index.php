<html>
<head>
	<meta charset="utf-8">
    <title>Login</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap core CSS -->
    <link href="../css/bootstrap.css" rel="stylesheet">
    <!-- custom css -->
    <link href="../css/custom.css" rel="stylesheet">
</head>
<body>
	<div class="container">
		<div class="row">
            <div class="navbar navbar-inverse navbar-fixed-top ">
                <div class="container">
                    <ul class="nav navbar-nav">
                        <li>
                            <a href="../index.php" class="text-center">HOME</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
	     <div class="row">
	      
	        <h1 class="text-center">LOGIN</h1>
	        <form class="form-horizontal" action="../login.php" method="post">
	        	<input type="hidden" name="myjabatan" value="admin">
	        	
	            <div class="form-group">
	                <label for="myusername" class="col-sm-4 control-label">Username</label>
	                <div class="col-sm-4">
	                    <input type="text" name="myusername" title="cuma 0-8"class="form-control" placeholder="username petugas"/>
	                </div>
	            </div>

	            <div class="form-group">
	                <label for="mypassword" class="col-sm-4 control-label">Password</label>
	                <div class="col-sm-4">
	                    <input type="password" required name="mypassword" id="mypassword" class="form-control" placeholder="password petugas"/>
	                </div>
	            </div>
	            

	            <div class="form-group">
	                <div class="col-sm-offset-4 col-sm-4">
	                    <button type="submit" class="btn btn-primary">Sign In</button>
	                </div>
	            </div>
	        </form>	         
	    </div>
	</div>
<!-- javascript -->
    <script src="../js/jquery-1.11.3.min.js"></script>
	<script src="../js/bootstrap.js"></script>
</body>
</html>
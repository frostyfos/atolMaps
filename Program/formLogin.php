<html>
<head>
	<meta charset="utf-8">
    <title>Login</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.css" rel="stylesheet">
    <!-- custom css -->
    <link href="css/custom.css" rel="stylesheet">
</head>
<body>
	<div class="container">
		<div class="row">
            <div class="navbar navbar-inverse navbar-fixed-top ">
                <div class="container">
                    <ul class="nav navbar-nav">
                        <li>
                            <a href="index.php" class="text-center">HOME</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
	     <div class="row">
	      
	        <h1 class="text-center">LOGIN</h1>
	        <form class="form-horizontal" action="login.php" method="post">

	            <div class="form-group">
	                <label for="myusername" class="col-sm-4 control-label">Username</label>
	                <div class="col-sm-4">
	                    <input type="text" name="myusername" class="form-control" placeholder="username petugas"/>
	                </div>
	            </div>

	            <div class="form-group">
	                <label for="mypassword" class="col-sm-4 control-label">Password</label>
	                <div class="col-sm-4">
	                    <input type="password" name="mypassword" id="mypassword" class="form-control" placeholder="password petugas"/>
	                </div>
	            </div>

	            <div class="form-group">
	                <label for="myjabatan" class="col-sm-4 control-label">Jabatan</label>
	                <div class="col-sm-4">
	                    <select class="form-control" name="myjabatan" id="myjabatan">
	                        <option value="admin">Admin</option>
	                        <option value="pengusaha">Pemilik Usaha</option>
	                    </select>
	                </div>
	            </div>

	            <div class="form-group">
	                <div class="col-sm-offset-4 col-sm-4">
	                    <button type="submit" class="btn btn-primary">Sign In</button>
	                    <a href="/atolMaps/program/passRequest/formRequest.php" class="btn btn-link">Lupa Password</a>
	                </div>
	            </div>
	        </form>	         
	    </div>
	</div>
<!-- javascript -->
    <script src="js/jquery-1.11.3.min.js"></script>
	<script src="js/bootstrap.js"></script>
</body>
</html>
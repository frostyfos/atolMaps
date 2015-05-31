<html>
<head>
	<meta charset="utf-8">
    <title>Login</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap core CSS -->
    <link href="/atolMaps/program/css/bootstrap.css" rel="stylesheet">
    <!-- custom css -->
    <link href="/atolMaps/program/css/custom.css" rel="stylesheet">
</head>
<body>
	<div class="container">
	     <div class="row">
	      <!--   <img src="/broto/img/logo.png" class="col-xs-offset-2 col-sm-offset-5 col-md-offset-4 col-lg-offset-5" id="login-logo"> -->
	        <h1 class="text-center">LOGIN</h1>
	        <form class="form-horizontal" action="/atolMaps/program/login.php" method="post">

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
	                </div>
	            </div>
	        </form>
	    </div>
	</div>
<!-- javascript -->
    <script src="/atolMaps/program/js/jquery-1.11.3.min.js"></script>
	<script src="/atolMaps/program/js/bootstrap.js"></script>
</body>
</html>
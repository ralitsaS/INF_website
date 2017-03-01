<?php
if (isset($_GET['message']) {
    ?>
    <script>
    alert(<?php echo json_encode($_GET['message']); ?>);
    </script>
    <?php
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
<script src="http://code.jquery.com/jquery-latest.js"></script>
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>



<script type="text/javascript" src="/naduhaise/js/bootstrap.min.js"></script>


<link href="/naduhaise/css/bootstrap.min.css" rel="stylesheet">
<link href="/naduhaise/css/theme.min.css" rel="stylesheet">

<link href="http://cdnjs.cloudflare.com/ajax/libs/jquery.bootstrapvalidator/0.5.3/css/bootstrapValidator.min.css" rel="stylesheet"/>
<script src="http://cdnjs.cloudflare.com/ajax/libs/jquery.bootstrapvalidator/0.5.3/js/bootstrapValidator.min.js" type="text/javascript"></script>


<script>
$(document).ready(function () {
    $('#LF')
        .bootstrapValidator({
        excluded: ':disabled',
        feedbackIcons: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {
            username: {
                validators: {
                    notEmpty: {
                        message: 'The username is required'
                    }
                }
            },
            password: {
                validators: {
                    notEmpty: {
                        message: 'The password is required'
                    }
                }
            }
        }
    })
       
	/*   .on('success.form.bv', function (e) {
        // Prevent form submission
        e.preventDefault();

        $('#loginModal').modal('hide');
    });
	*/

    $('#loginModal')
       .on('shown.bs.modal', function () {
           $('#LF').find('[name="username"]').focus();
        })
        .on('hidden.bs.modal', function () {
            $('#LF').bootstrapValidator('resetForm', true);
        });
});
</script>

</head>

<body>

<!-- Navigation -->
    <nav class="navbar navbar-default navbar-fixed-top topnav" role="navigation">
        <div class="container topnav">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    <li>
                        <a href="index.html">Home</a>
                    </li>
                    <li>
                        <a href="#services">Blah</a>
                    </li>
                    <li>
                        <a href="#contact">Contact</a>
                    </li>
					<li>
                        <a href="signin.php">Create account</a>
                    </li>
					<li>
					<a href="#" data-toggle="modal" data-target="#login-modal">Login</a>
				</li>
</ul>
				
				
            </div>
            <!-- /.navbar-collapse -->
        </div>
		
        <!-- /.container -->
    </nav>
	
	
	
</br></br>

	
	<button class="btn btn-default" data-toggle="modal" data-target="#loginModal">Login</button>
<div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                 <h4 class="modal-title">Login</h4>

            </div>
            <div class="modal-body">
                <form id="LF" method="post" class="form-horizontal" action="login_NEW.php">
				
                    <div class="form-group">
                        <label class="col-md-3 control-label">Username</label>
                        <div class="col-md-5">
                            <input type="text" class="form-control" name="username" />
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label">Password</label>
                        <div class="col-md-5">
                            <input type="password" class="form-control" name="password" />
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-5 col-md-offset-3">
                            <input type="submit" class="btn btn-default" value="Login"/>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<form id="LF1" method="post" class="form-horizontal" action="testlog.php">
				
                    <div class="form-group">
                        <label class="col-md-3 control-label">Username</label>
                        <div class="col-md-5">
                            <input type="text" class="form-control" name="username" />
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label">Password</label>
                        <div class="col-md-5">
                            <input type="password" class="form-control" name="password" />
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-5 col-md-offset-3">
                            <input type="submit" class="btn btn-default" value="Login"/>
                        </div>
                    </div>
                </form>

</body>
</html>
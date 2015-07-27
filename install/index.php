<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no" />
        <meta name="description" content="TSBlog, The Open Source Tunisian Blog CMS">
        <meta name="keywords" content="TSBlog, Blog, CMS, Tunisia-Sat">
        <meta name="author" content="Nader (@beeekk) and Marwein (@Marwein)">
        <title>TSBlog - Installation</title>
        
        <!-- BOOTSTRAP -->
        <link rel="stylesheet" href="../template/default/css/bootstrap.min.css" />
        <!-- FONT AWSOME -->
        <link rel="stylesheet" href="../template/default/css/font-awesome.min.css" />
        <!-- SPECIAL STYLES -->
        <link rel="stylesheet" href="../template/default/css/main.css" />
        
		<!-- PAGE STYLES -->
		<link rel="stylesheet" href="./css/main.css" />
        <!-- MODERNIZER SCRIPT TO ADD OLDER BROWSERS -->
        <script src="../template/default/js/modernizr-2.8.3-respond-1.4.2.min.js"></script>
    </head>
    <body>
        <nav class="navbar navbar-default navbar-fixed-top" data-topbar role="navigation">
            <div class="container-fluid">
                <div class="navbar-header">
                    <a href="./" class="navbar-brand">TSBlog Installation</a>
                    <button class="navbar-toggle collapsed" type="button" data-toggle="collapse" data-target="#navbar-collapsible">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                </div>
            </div>
        </nav>
        
        <section class="container" id="installation">
            <div class="row">
                <div class="col-xs-12 col-md-8 col-md-offset-2">
                    <section id="installation">
						<form id="installationForm" class="form-horizontal">
							<fieldset>
								<legend>TSBlog Installation Wizard</legend>
								<ul class="nav nav-pills">
									<li class="active"><a href="#basic-tab" data-toggle="tab">Site</a></li>
									<li><a href="#database-tab" data-toggle="tab">Database</a></li>
									<li><a href="#admin-tab" data-toggle="tab">Admin</a></li>
								</ul>
								<div>&nbsp;</div>
								<div class="tab-content">
									<!-- Site tab -->
									<div class="tab-pane active" id="basic-tab">
										<div class="form-group">
											<div class="col-xs-12">
												<input type="text" class="form-control" name="name" placeholder="Site name" />
											</div>
										</div>

										<div class="form-group">
											<div class="col-xs-12">
												<input type="text" class="form-control" name="slogon" placeholder="Slogon" />
											</div>
										</div>

										<div class="form-group">
											<div class="col-xs-12">
												<textarea class="form-control" name="description" rows="6" placeholder="Description"></textarea>
											</div>
										</div>
									</div>

									<!-- Database tab -->
									<div class="tab-pane" id="database-tab">
										<div class="form-group">
											<div class="col-xs-12">
												<input type="text" class="form-control" name="host" placeholder="Hostname" />
											</div>
										</div>

										<div class="form-group">
											<div class="col-xs-12">
												<input type="text" class="form-control" name="dbname" placeholder="Database name" />
											</div>
										</div>

										<div class="form-group">
											<div class="col-xs-12">
												<input type="text" class="form-control" name="user" placeholder="Username" />
											</div>
										</div>

										<div class="form-group">
											<div class="col-xs-12">
												<input type="password" class="form-control" name="pass" placeholder="Password" />
											</div>
										</div>

										<div class="form-group">
											<div class="col-xs-12">
												<input type="text" class="form-control" name="prefix" placeholder="Tables prefix" />
											</div>
										</div>
									</div>

									<!-- Admin tab -->
									<div class="tab-pane" id="admin-tab">
										<div class="form-group">
											<div class="col-xs-12">
												<input type="text" class="form-control" name="firstname" placeholder="First Name" />
											</div>
										</div>

										<div class="form-group">
											<div class="col-xs-12">
												<input type="text" class="form-control" name="lastname" placeholder="Last Name" />
											</div>
										</div>

										<div class="form-group">
											<div class="col-xs-12">
												<input type="email" class="form-control" name="email" placeholder="Mail adress" />
											</div>
										</div>

										<div class="form-group">
											<div class="col-xs-12">
												<input type="password" class="form-control" name="adminpass" placeholder="Password" />
											</div>
										</div>

										<div class="form-group">
											<div class="col-xs-12">
												<input type="password" class="form-control" name="confadminpass" placeholder="confirmaion" />
											</div>
										</div>
									</div>

									<!-- Previous/Next buttons -->
									<ul class="pager wizard">
										<li class="previous"><a href="javascript: void(0);">Previous</a></li>
										<li class="next"><a href="javascript: void(0);">Next</a></li>
									</ul>
								</div>
							</fieldset>
						</form>
					</section>
					<div class="modal fade" id="completeModal" tabindex="-1" role="dialog">
						<div class="modal-dialog modal-sm">
							<div class="modal-content">
								<div class="modal-header">
									<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
									<h4 class="modal-title">Complete</h4>
								</div>

								<div class="modal-body">
									<p class="text-center">The installation is completed</p>
								</div>

								<div class="modal-footer">
									<button type="button" class="btn btn-success" data-dismiss="modal">Visit the blog</button>
								</div>
							</div>
						</div>
					</div>
                </div>
            </div>
        </section>
        
		<footer class="container">
			<div class="row">
				<p class="col-xs-12 col-md-8 col-md-offset-2">Copyright &copy; TSBlog</p>
			</div>
		</footer>
        <script src="../template/default/js/jquery-1.11.2.min.js"></script>
        <script src="./js/jquery.bootstrap.wizard.min.js"></script>
		<script src="../template/default/js/bootstrap.min.js"></script>
        <script src="../template/default/js/formValidation.js"></script>
        <script src="../template/default/js/validation.js"></script>
		<script src="./js/main.js"></script>
    </body>
</html>
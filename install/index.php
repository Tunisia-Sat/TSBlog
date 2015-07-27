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
        
        <!-- MODERNIZER SCRIPT TO ADD OLDER BROWSERS -->
        <script src="../template/default/js/modernizr-2.8.3-respond-1.4.2.min.js"></script>
    </head>
    <body>
        <nav class="navbar navbar-default navbar-fixed-top" data-topbar role="navigation">
            <div class="container-fluid">
                <div class="navbar-header">
                    <a href="#" class="navbar-brand">TSBlog</a>
                    <button class="navbar-toggle collapsed" type="button" data-toggle="collapse" data-target="#navbar-collapsible">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                </div>
                <div class="navbar-collapse collapse" id="navbar-collapsible" aria-expanded="false">
                    <ul class="nav navbar-nav">
                        <li class="active">
                            <a href="#"><i class="fa fa-download  fa-2x"></i> Install</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        
        <section class="container">
            <div class="row">
                <div class="col-xs-12 col-md-8 col-md-offset-2">
                    <p>Fill the form below with your database credentials, and the admin credentials.</p>
                    <form method="get" action="/scripts/createDB.php" target="result">
                        <fieldset>
                            <legend>Database</legend>
                            <div class="row">
                                <div class="large-12 columns">
                                    <label>Host
                                        <input type="text" name="host" placeholder="" value="localhost" />
                                    </label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="large-12 columns">
                                    <label>DB name
                                        <input type="text" name="dbname" placeholder="" />
                                    </label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="large-12 columns">
                                    <label>Username
                                        <input type="text" name="user" placeholder="" />
                                    </label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="large-12 columns">
                                    <label>Password
                                        <input type="password" name="pass" placeholder="" />
                                    </label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="large-12 columns">
                                    <label>Prefix
                                        <input type="text" name="prefix" placeholder="" />
                                    </label>
                                </div>
                            </div>
                        </fieldset>
                        <fieldset>
                            <legend>Admin account</legend>
                            <div class="row">
                                <div class="large-12 columns">
                                    <label>First name
                                        <input type="text" name="firstname" placeholder="" />
                                    </label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="large-12 columns">
                                    <label>Last name
                                        <input type="text" name="lastname" placeholder="" />
                                    </label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="large-12 columns">
                                    <label>Email
                                        <input type="text" name="adminmail" placeholder="" />
                                    </label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="large-12 columns">
                                    <label>Password
                                        <input type="password" name="adminpass" placeholder="" />
                                    </label>
                                </div>
                            </div>
                        </fieldset>
                        <div style="text-align: center">
                            <button>Install 42php</button>
                        </div>
                    </form>
                    <iframe name="result" style="height: 500px; border: none; width: 100%;"></iframe>
                </div>
            </div>
        </section>
        <script src="/lib/foundation/js/vendor/jquery.js"></script>
        <script src="/lib/foundation/js/foundation.min.js"></script>
        <script type="text/javascript">
            $(document).foundation();
        </script>
    </body>
</html>
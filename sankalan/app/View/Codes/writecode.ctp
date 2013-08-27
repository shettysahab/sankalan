<!DOCTYPE html>
<html lang="en">  
  <head>
    <meta charset="utf-8">
    <title>
        e-Compiler
    </title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Le styles -->
    <link href="bootstrap.css" rel="stylesheet">
    <link href="bootstrap-responsive.css" rel="stylesheet">
    <!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js">
      </script>
    <![endif]-->
    <!-- Le fav and touch icons -->
    <link rel="shortcut icon" href="assets/ico/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="assets/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="assets/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="assets/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="assets/ico/apple-touch-icon-57-precomposed.png">
  </head>
  <body background="bg1.png">
    <div>
        <h1 style="color:white">
            <em>
            <strong>
              e-Compiler
            </strong>
            </em>
        </h1>
    </div>
    <div class="navbar navbar-inverse">
        <div class="navbar-inner">
            <div class="container">
                <a class="brand" href="home.html">
                    <h4>
                        <strong>
                            <em>
                                Login    
                            </em>
                        </strong>
                    </h4>    
                </a>
                <a class="brand" href="login.html">
                    <h4>
                        <strong>
                            <em>
                                Register
                            </em>
                        </strong>
                    </h4>
                </a>
                <a class="brand" href="about.html">
                    <h4>
                        <strong>
                            <em>
                                About Us
                            </em>
                        </strong>
                    </h4>    
                </a>
            </div>
        </div>
    </div>
    <!--
    <div class="control-group">
        <label class="control-label">
            <h4 style="color:white">
                <strong>
                    <em>
                        Select Language:            
                    </em>
                </strong>
            </h4>
        </label>
        <div class="controls pull-left">
            <select>
                <option value="c">
                    C   
                </option>
                <option value="c++">
                    C++
                </option>
                <option value="python">
                    Python
                </option>
            </select>
        </div>
    </div><br /><br />
    -->
    <?php
    echo $this->Form->create('Code',array('action'=>'compilecode'));
    echo $this->Form->input('id',array('type'=>'hidden'));
    echo "<h4 style=\"color:white\">";
    echo $this->Form->input('filename');
    echo $this->Form->input('code',array('type'=>'textarea'));
    echo "</h4>";
    echo $this->Form->end('Save and Compile');
    echo $this->output;
    ?>
    <div class="control-group">
    </div>

    <style>
      textarea {width:600px;height:400px;}
    </style>
    <h4 style="color:white;float:right">
            Created By: "<u>Team Sankalan</u>"
    </h4>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js">
    </script>AC
    <script src="bootstrap.js">
    </script>
    <script>

    </script>
  </body>
</html>

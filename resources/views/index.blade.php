<!DOCTYPE html>
<html lang="en">
<head>
  <title>Jabu Task Schedular</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <style>
    .navbar {
      margin-bottom: 0;
      border-radius: 0;
      background-color: #aed6f1;
    }
    .btn-primary{
        color: black;
        background-color: #aed6f1;
    }
    
    footer {
      background-color: #0f0909;
      padding: 25px;
      position: fixed;
      bottom: 0;
      width: 100%;
      height: 60px; 
    }
   
  .container {
    padding-top: 20px;
  }

  </style>
</head>
<body>

<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
      <a  href="#"><img class="navbar-brand" src="{{ asset('images/jabu.png') }}" alt="Logo"></a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
        <li class=""><a href="#">Home</a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="#"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
      </ul>
    </div>
  </div>
</nav>

<div  class="container text-center">
    <div class="row">
        <div class="col-sm-12">
            <button type="button" class="btn btn-primary btn-lg"> Add Task</button>
        </div>
    </div>
    
</div>
  
<div class="container text-center">    
  <h3>Tasks report</h3><br>
  <div class="row">
    <div class="col-sm-4">
        <div class="well">
         <p>Some text..</p>
        </div>
    </div>
    <div class="col-sm-4"> 
        <div class="well">
        <p>Some text..</p>
        </div>
    </div>
    <div class="col-sm-4">
      <div class="well">
       <p>Some text..</p>
      </div>
    </div>
  </div>
</div><br>

<footer class="container-fluid text-center">
  <p>Footer Text</p>
</footer>

</body>
</html>

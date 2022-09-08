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
         background-color: #17232b;
         color: #fff;
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
               <ul class="nav navbar-nav navbar-right">
                  <li><a href="#"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
               </ul>
            </div>
         </div>
      </nav>
      <div  class="container text-center">
         <div class="row">
            <div class="col-sm-12">
               <button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#modalPoll"> Add Task</button>
            </div>
         </div>
      </div>
      <div class="container text-center">
         <h3>Tasks report</h3>
         <br>
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
      </div>

      <div class="modal fade right" id="modalPoll" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
      aria-hidden="true" data-backdrop="false">
      <div class="modal-dialog modal-full-height modal-right modal-notify modal-info" role="document">
        <div class="modal-content">
          <!--Header-->
          <div class="modal-header">
            <p class="heading lead">Feedback request
            </p>
  
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true" class="white-text">×</span>
            </button>
          </div>
  
          <!--Body-->
          <div class="modal-body">
            <div class="text-center">
              <i class="fa fa-file-text-o fa-4x mb-3 animated rotateIn"></i>
              <p>
                <strong>Your opinion matters</strong>
              </p>
              <p>Have some ideas how to improve our product?
                <strong>Give us your feedback.</strong>
              </p>
            </div>
  
            <hr>
  
            <!-- Radio -->
            <p class="text-center">
              <strong>Your rating</strong>
            </p>
            <div class="form-check mb-4">
              <input class="form-check-input" name="group1" type="radio" id="radio-179" value="option1" checked>
              <label class="form-check-label" for="radio-179">Very good</label>
            </div>
  
            <div class="form-check mb-4">
              <input class="form-check-input" name="group1" type="radio" id="radio-279" value="option2">
              <label class="form-check-label" for="radio-279">Good</label>
            </div>
  
            <div class="form-check mb-4">
              <input class="form-check-input" name="group1" type="radio" id="radio-379" value="option3">
              <label class="form-check-label" for="radio-379">Mediocre</label>
            </div>
            <div class="form-check mb-4">
              <input class="form-check-input" name="group1" type="radio" id="radio-479" value="option4">
              <label class="form-check-label" for="radio-479">Bad</label>
            </div>
            <div class="form-check mb-4">
              <input class="form-check-input" name="group1" type="radio" id="radio-579" value="option5">
              <label class="form-check-label" for="radio-579">Very bad</label>
            </div>
            <!-- Radio -->
  
            <p class="text-center">
              <strong>What could we improve?</strong>
            </p>
            <!--Basic textarea-->
            <div class="md-form">
              <textarea type="text" id="form79textarea" class="md-textarea form-control" rows="3"></textarea>
              <label for="form79textarea">Your message</label>
            </div>
  
          </div>
  
          <!--Footer-->
          <div class="modal-footer justify-content-center">
            <a type="button" class="btn btn-primary waves-effect waves-light">Send
              <i class="fa fa-paper-plane ml-1"></i>
            </a>
            <a type="button" class="btn btn-outline-primary waves-effect" data-dismiss="modal">Cancel</a>
          </div>
        </div>
      </div>
    </div>
      <footer class="container-fluid text-center">
         <p>&copy 2022</p>
      </footer>
   </body>
</html>
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
         .modal-header{
            background-color: #17232b;
            text-align: center;
            color: #fff;
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
   @yield('content')

   <div class="modal fade right" id="modalPoll" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
   aria-hidden="true" data-backdrop="false">
   <div class="modal-dialog modal-full-height modal-right modal-notify modal-info" role="document">
     <div class="modal-content">
       <div class="modal-header">
         <p class="heading lead">Create task
         </p>
         {{-- <button type="button" class="close" data-dismiss="modal" aria-label="Close">
           <span aria-hidden="true" class="white-text">×</span>
         </button> --}}
       </div>

       <div class="modal-body">
         <div class="text-center">
           <i class="fa fa-file-text-o fa-4x mb-3 animated rotateIn"></i>
         <div class="md-form">
           <textarea type="text" id="form79textarea" class="md-textarea form-control" rows="3"></textarea>
           <label for="form79textarea">Your message</label>
         </div>

       </div>

       <!--Footer-->
       <div class="modal-footer justify-content-center">
         <a type="button" class="btn btn-primary waves-effect waves-light">Create
           <i class="fa fa-paper-plane ml-1"></i>
         </a>
       </div>
     </div>
   </div>
 </div>
   <footer class="container-fluid text-center">
    <p>&copy 2022</p>
 </footer>
</body>
</html>
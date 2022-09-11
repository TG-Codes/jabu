@extends('layout.header')
@section('content')
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
      <div class="container">
         <h3>Your work</h3>
         <br>
         <div>
               <h4>All tasks</h4>
               <ul class="nav nav-tabs">
                  <li role="presentation" class="active"><a href="#today" role="tab" data-toggle="tab" aria-controls="home" aria-expanded="true">Due today</a></li>
                  <li role="presentation"><a href="#tommorrow" role="tab" data-toggle="tab" aria-controls="home" aria-expanded="true">Due tomorrow</a></li>
                  <li role="presentation"><a href="#nextweek" role="tab" data-toggle="tab" aria-controls="home" aria-expanded="true">Due next week</a></li>
                  <li role="presentation"><a href="#complete" role="tab" data-toggle="tab" aria-controls="home" aria-expanded="true">Completed</a></li>
                </ul>
               <div class="tab-content tasks">
                  <!--Today tasks -->
                  <div class="tab-pane fade in active" role=tabpanel id="today" aria-labelledby="today-tab">
                     <div class="task-card">
                        <i class="fa-solid fa-check clickable text-success"></i>
                        <span class="ml-5 lead">Build an app to store data today</span>
                        <span class="right"><i class="fa-regular fa-eye fa-2x ml-7 clickable"></i></span>
                        <span class="right">started 09/09/2022</span>
                     </div>
                  </div>
                  <!--End today tasks -->
                  <!--Tomorrow tasks -->
                  <div class="tab-pane fade in" role=tabpanel id="tommorrow" aria-labelledby="tommorrow-tab">
                     <div class="task-card">
                        <i class="fa-solid fa-check clickable"></i>
                        <span class="ml-5 lead">Build an app to store data tomorrow</span>
                        <span class="right"><i class="fa-regular fa-eye fa-2x ml-7 clickable"></i></span>
                        <span class="right">started 09/09/2022</span>
                     </div>
                  </div>
                  <!--End Tomorrow tasks -->
                  <!--Next week tasks -->
                  <div class="tab-pane fade in" role=tabpanel id="nextweek" aria-labelledby="nextweek-tab">
                     <div class="task-card">
                        <i class="fa-solid fa-check clickable"></i>
                        <span class="ml-5 lead">Build an app to store data next week</span>
                        <span class="right"><i class="fa-regular fa-eye fa-2x ml-7 clickable"></i></span>
                        <span class="right">started 09/09/2022</span>
                     </div>
                  </div>
                  <!--End next week task -->
                  <!--Completed tasks -->
                  <div class="tab-pane fade in" role=tabpanel id="complete" aria-labelledby="complete-tab">
                     <div class="task-card">
                        <i class="fa-solid fa-check clickable text-success"></i>
                        <span class="ml-5 lead">Build an app to store data</span>
                        <span class="right"><i class="fa-regular fa-eye fa-2x ml-7 clickable"></i></span>
                        <span class="right">started 09/09/2022</span>
                     </div>
                  </div>
                  <!--End Completed task -->
               </div>
         </div>
      </div>
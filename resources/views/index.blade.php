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
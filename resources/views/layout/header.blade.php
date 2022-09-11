<!DOCTYPE html>
<html lang="en">
   <head>
      <title>Jabu Task Schedular</title>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
      <style>

        body{
          height: 100vh;
        }
         .navbar {
         margin-bottom: 0;
         border-radius: 0;
         background-color: #aed6f1;
         }
         .modal-header{
            background-color: #93b7cf;
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

         #ccust{
            display: none;
            cursor: pointer;
            text-decoration: underline;
         }
         
         .task-card{
            min-height: 20px;
            padding: 10px;
            margin-bottom: 20px;
            background-color: #f5f5f5;
            border: 1px solid #e3e3e3;
            border-radius: 4px;
            -webkit-box-shadow: inset 0 1px 1px rgba(0,0,0,.05);
            box-shadow: inset 0 1px 1px rgba(0,0,0,.05);
         }
         .ml-5{
            margin-left: 1rem;
         }

         .ml-7{
            margin-left: 1.5rem;
         }
         .right{
            float: right;
         }

         .clickable{
            cursor: pointer;
         }
         .tasks{
           max-height: 45vh;
           overflow: scroll;
         }
      </style>
   </head>
   @yield('content')

   <div class="modal fade right" id="modalPoll" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
   aria-hidden="true" data-backdrop="false">
   <div class="modal-dialog modal-full-height modal-right modal-notify modal-info" role="document">
     <div class="modal-content">
          <form action="{{ route('submittask') }}" method="post">
            @csrf
       <div class="modal-header">
         <p class="heading lead">Create task
         </p>
         <button type="button" class="close" data-dismiss="modal" aria-label="Close">
           <span aria-hidden="true" class="white-text">×</span>
         </button>
       </div>

       <div class="modal-body">
         <!-- <div class="text-center">
           <i class="fa fa-file-text-o fa-4x mb-3 animated rotateIn"></i>
         <div class="md-form">
           <textarea type="text" id="form79textarea" class="md-textarea form-control" rows="3"></textarea>
         </div> -->
                <label class="form-label">Task title</label>
                <input type="text" name="task" class="form-control" placeholder="Enter task title">
                <label class="form-label">Description</label>
                <textarea class="form-control" name="description" placeholder="Enter task description"></textarea>
                <div class="row">
                    <div class="col-sm-6">
                        <label class="form-label">Start date</label>
                        <input type="date" name="startdate" class="form-control">
                    </div>
                    <div class="col-sm-6">
                        <label class="form-label">Due date</label>
                        <input type="date" name="duedate" class="form-control">
                    </div>
                </div>
                <label class="form-label">Set recurring</label>
                <select class="form-control" id="recurring" name="recurring">
                    <option value="no">No</option>
                    <option value="yes">Yes</option>
                </select>
                <div id="period" style="display: none">
                    <div id="times" style="display: none">
                    <p id="ccust"><i class="fa-solid fa-xmark"></i> back to days selection</p>
                    <label class="form-label">Select period</label>
                    <div class="row">
                        <div class="col-sm-6">
                            <select class="form-control" id="my" name="period">
                                <option value="monthly">Monthly</option>
                                <option value="yearly">Yearly</option>
                            </select>
                        </div>
                        <div class="col-sm-6">
                            <div class="row">
                              <div id="dsel">
                                  <select name="day" id="day" class="form-control">
                                      <option value="">--select day--</option>
                                  </select>
                                </div>
                                <div class="col-sm-6" id="ysel" style="display: none;">
                                  <select name="month" id="month" class="form-control">
                                    <option value="">--select month--</option>
                                  </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    </div>
                    <br>
                    <div id="days">
                        <label class="form-label">Select days</label><br>
                        <input class="daycb" type="checkbox" value="sundays" name="days[]"><span> Sundays</span>
                        <input class="daycb" type="checkbox"  value="mondays" name="days[]"><span> Mondays</span>
                        <input class="daycb" type="checkbox" value="tuesdays"  name="days[]"><span> Tuesdays</span>
                        <input class="daycb" type="checkbox"  value="wednesdays" name="days[]"><span> Wednesdays</span>
                        <input class="daycb" type="checkbox"  value="thursdays" name="days[]"><span> Thursdays</span>
                        <input class="daycb" type="checkbox"  value="fridays" name="days[]"><span> Fridays</span>
                        <input class="daycb" type="checkbox"  value="saturdays" name="days[]"><span> Saturdays</span><br/>
                    </div>
                    <input type="radio" name="customize" class="cust"><span class="cust"> More options</span>
                </div>
       </div>

       <!--Footer-->
       <div class="modal-footer justify-content-center">
         <button type="submit" class="btn btn-primary waves-effect waves-light">Create
           <i class="fa fa-paper-plane ml-1"></i>
         </button>
       </div>
          </form>
     </div>
   </div>
 </div>
   <footer class="container-fluid text-center">
    <p>&copy 2022</p>
 </footer>
</body>
<script>
    $('#recurring').on('change',function(){
        var recurring = $(this).val();
        var display = (recurring == "yes") ? "block" : "none";
        $('#period').css('display',display)
    })
    $('input:radio[name="customize"]').on('change',function(){
        if ($(this).is(':checked')) {
            $('.cust').css('display','none')
            $('#ccust').css('display','block')
            $('#times').css('display','block')
            $('#days').css('display','none')
            $(".daycb").prop("checked", false);
        }
    });
    $('#ccust').on('click',function(){
            $(this).css('display','none')
            $('.cust').css('display','inline')
            $('#times').css('display','none')
            $('#days').css('display','block')
            $('input:radio[name="customize"]').prop("checked", false);
    })

    $('#my').on('change',function(){
        if($(this).val() == "yearly"){
            $('#dsel').addClass('col-sm-6')
            $('#ysel').css('display','block');
        }else{
          $('#dsel').removeClass('col-sm-6')
            $('#ysel').css('display','none');
        }
    })
    for(var i = 1; i <= 12 ; i++){
        zero = (i > 9) ? '' : '0';
        document.getElementById('month').innerHTML += `<option value="${zero+i}">${zero + i}</option>`;
    }
    for(var i = 1; i <= 31 ; i++){
        zero = (i > 9) ? '' : '0';
        document.getElementById('day').innerHTML += `<option value="${zero+i}">${zero + i}</option>`;
    }
</script>
</html>
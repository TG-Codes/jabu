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

function initTasks(){
  $.ajax({
    url: '{{ route("duetoday") }}',
    method: 'GET',
    async: true,
    success: function(response){
        if(response.error == false){
          var tasks = '';
            for(i = 0; i < response.message.length; i++){
          let date = moment(response.message[i].duedate).format('D/MM/YYYY');
              tasks += `<div class="task-card">
                    <i class="fa-solid fa-ellipsis clickable markcomplete" data-id="${response.message[i].id}" onclick="markcomplete(this)"></i>
                    <span class="ml-5 lead">${response.message[i].task}</span>
                    <span class="right"><i class="fa-regular fa-eye fa-2x ml-7 clickable"></i></span>
                    <span class="right">due ${date}</span>
                 </div>`
            }
          $('#today').html(tasks);
        }
    }
  })

  $.ajax({
    url: '{{ route("duetomorrow") }}',
    method: 'GET',
    async: true,
    success: function(response){
        if(response.error == false){
          var tasks = '';
            for(i = 0; i < response.message.length; i++){
              let date = moment(response.message[i].duedate).format('D/MM/YYYY');
              tasks += `<div class="task-card">
                    <i class="fa-solid fa-ellipsis clickable markcomplete" data-id="${response.message[i].id}" onclick="markcomplete(this)"></i>
                    <span class="ml-5 lead">${response.message[i].task}</span>
                    <span class="right"><i class="fa-regular fa-eye fa-2x ml-7 clickable"></i></span>
                    <span class="right">due ${date}</span>
                 </div>`
            }
          $('#tommorrow').html(tasks);
        }
    }
  })

  $.ajax({
    url: '{{ route("duenextweek") }}',
    method: 'GET',
    async: true,
    success: function(response){
        if(response.error == false){
          var tasks = '';
            for(i = 0; i < response.message.length; i++){
              let date = moment(response.message[i].duedate).format('D/MM/YYYY');
              tasks += `<div class="task-card">
                    <i class="fa-solid fa-ellipsis clickable" data-id="${response.message[i].id}" onclick="markcomplete(this)"></i>
                    <span class="ml-5 lead">${response.message[i].task}</span>
                    <span class="right"><i class="fa-regular fa-eye fa-2x ml-7 clickable"></i></span>
                    <span class="right">due ${date}</span>
                 </div>`
            }
          $('#nextweek').html(tasks);
        }
    }
  })

  $.ajax({
    url: '{{ route("completed") }}',
    method: 'GET',
    async: true,
    success: function(response){
        if(response.error == false){
          var tasks = '';
            for(i = 0; i < response.message.length; i++){
              let date = moment(response.message[i].startdate).format('D/MM/YYYY');
              tasks += `<div class="task-card">
                    <i class="fa-solid fa-check clickable text-success" onclick="markUncomplete(this)"></i>
                    <span class="ml-5 lead">${response.message[i].task}</span>
                    <span class="right"><i class="fa-regular fa-eye fa-2x ml-7 clickable"></i></span>
                    <span class="right">started on ${date}</span>
                 </div>`
            }
          $('#completed').html(tasks);
        }
    }
  })

  $.ajax({
    url: '{{ route("overdue") }}',
    method: 'GET',
    async: true,
    success: function(response){
        if(response.error == false){
          var tasks = '';
            for(i = 0; i < response.message.length; i++){
              let date = moment(response.message[i].duedate).format('D/MM/YYYY');
              tasks += `<div class="task-card">
                    <i class="fa-solid fa-exclamation text-danger clickable text-success markcomplete" onclick="markcomplete(this)"></i>
                    <span class="ml-5 lead">${response.message[i].task}</span>
                    <span class="right"><i class="fa-regular fa-eye fa-2x ml-7 clickable"></i></span>
                    <span class="right">due ${date}</span>
                 </div>`
            }
          $('#overdue').html(tasks);
        }
    }
  })
}
initTasks();

function markcomplete(e){
  var id = e.dataset.id;
  $.ajax({
    url: `/markcomplete/${id}`,
    method: 'GET',
    async: true,
    success: function(response){
        if(response.error == false){
          alert(response.message)
            initTasks();
        }else{
          alert(response.message)
        }
    }
  })
}

function markUncomplete(e){
  var id = e.dataset.id;
  $.ajax({
    url: `/markuncomplete/${id}`,
    method: 'GET',
    async: true,
    success: function(response){
        if(response.error == false){
          alert(response.message)
           initTasks();
        }else{
          alert(response.message)
        }
    }
  })
}
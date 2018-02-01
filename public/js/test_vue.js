var App = new Vue({
  el : '#root',
  data :{
    circlesObject : false ,
    usersObject : false ,
    circleName : '',
    circleThumbnail : '',
    requestObject : [],
    requested_circles : [] ,
    requested_users : [] ,
    activeRequests : false ,
    requested_circles_confirm : [] ,
  },
  mounted(){
    this.getCircles();
    this.getUsers();
    this.getRequests();
  $(document).ready(function() {
    $('select').material_select();

    $('#month_picker').on('change', function(e) {
      App.month_picker = $(this).val();
      //App.runMonthsChart();
   });

   $('#circle_picker').on('change', function(e) {
      App.requested_circles = $(this).val();
      //App.runMonthsChart();
   });

   $('#circle_picker_confirm').on('change', function(e) {
      App.requested_circles_confirm = $(this).val();
      //App.runMonthsChart();
   });

   $('#user_picker').on('change', function(e) {
      App.requested_users = $(this).val();
      //App.runMonthsChart();
   });

  });

  },
  methods:{
    getCircles(){
      $.ajax({
        url : 'https://'+location.hostname+'/get/circles',
        type : 'POST' ,
        data : {_token : $('meta[name="csrf-token"]').attr('content')},
        success:function(data){
          App.circlesObject = data;
        }
      });
    },
    getUsers(){
      $.ajax({
        url : 'https://'+location.hostname+'/allusers',
        type : 'POST' ,
        data : {_token : $('meta[name="csrf-token"]').attr('content')},
        success:function(data){
          App.usersObject = data;
        }
      });
    },
    getRequests(){
      $.ajax({
        url : 'https://'+location.hostname+'/get/request',
        type : 'POST' ,
        data : {_token : $('meta[name="csrf-token"]').attr('content')},
        success:function(data){
          if(data == 'empty')
          App.activeRequests = false ;
          else App.activeRequests = data;
          // for(item in App.activeRequests){
          //   App.activeRequests[item] = console.log(App.activeRequests[item]);
          // }
        }
      });
    },
    addCircle(){
      $.ajax({
        url : 'https://'+location.hostname+'/create/circles',
        type : 'POST' ,
        data : {_token : $('meta[name="csrf-token"]').attr('content') , name : this.circleName , thumbnail : this.circleThumbnail},
        success:function(data){
          if(data == 'already_exists')
          Materialize.toast(App.circleName+' already exists.', 3000, 'rounded');
          if(data == 'done'){
            Materialize.toast(App.circleName+' is ready to use now!', 3000, 'rounded');
            App.getCircles();
          }

        }
      });
    },
    sendRequest(){
      $.ajax({
        url : 'https://'+location.hostname+'/send/request',
        type : 'POST' ,
        data : {_token : $('meta[name="csrf-token"]').attr('content') , circles : JSON.stringify(App.requested_circles) , users :  JSON.stringify(App.requested_users)},
        success:function(data){
          if(data == 'already_exists')
          Materialize.toast(App.circleName+' already exists.', 3000, 'rounded');
          if(data == 'done'){
            Materialize.toast(App.circleName+' is ready to use now!', 3000, 'rounded');
            App.getCircles();
          }

        }
      });
    },
    confirmRequest(id){
      if (this.requested_circles_confirm.length == 0){
          Materialize.toast('You didnt choose any circles!', 3000, 'rounded');
          return;
      }
      $.ajax({
        url : 'https://'+location.hostname+'/accept/request',
        type : 'POST' ,
        data : {_token : $('meta[name="csrf-token"]').attr('content') , circles_confirm : JSON.stringify(App.requested_circles_confirm) , req_id : App.activeRequests[id].id },
        success:function(data){
          if(data == 'invalid')
          Materialize.toast('Something Wrong happend', 3000, 'rounded');
          if(data == 'done'){
            Materialize.toast('You are now connected', 3000, 'rounded');
            App.getCircles();
          }

        }
      });
    },
    requestObjectPush(id){
        if(index)
       this.requestObject.push(id);
    },
  }
})



//$('meta[name="csrf-token"]').attr('content');

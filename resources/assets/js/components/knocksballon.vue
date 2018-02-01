<template>
	<transition enter-active-class = "animated bounceInRight" :leave-active-class = "leaveActiveClass" :duration="{ enter: 800, leave: 800 }">
	<div class = "knocks_ballon knocks_standard_border_radius knocks_light_color_kit knocks_fair_bounds animated shake" 
	v-if="!closed" 
	:id = "gid" 

	@mouseover = "hoverAct()" 
	@mouseleave="mouseLeaveAct()">
    <div class = " knocks_house_keeper" >
      <a @click = "closed = true" class="right knocks_text_anchor"><span class = "knocks-close"></span></a>
    </div>

    <!--System Ballons-->
		<div v-if = "constrains.index.category == 'System'">
			<div v-html = "constrains.content"></div>
		</div>

    <!--Friend Requests-->
    <div v-if = "constrains.index.category == 'friend_request'" >
      <knocksuser :user=  "constrains.index.sender_id" v-model = "domainUser" :show_username = "false"
      image_container_class = "knocks_inline" main_container = "row knocks_house_keeper" name_container_class = " knocks_inline" :extras="{hover_id : gid}">         
     </knocksuser>
     <static_message slot ="append_to_display_name" v-if="domainUser != null" msg = "** has sent you a friendship request" 
     replaceable :replacements = "[ {target : '**' , body : domainUser.name}]"></static_message>
     <center>
       <knocksuseractions v-if="domainUser != null" :user = "constrains.index.sender_id" :start_as ="domainUser" :extras="{hover_id : gid}"></knocksuseractions>
     </center>
    </div>
      
		
	</div>
	</transition>
</template>

<script>
export default {

  name: 'knocksballon',
  props : {
  	gid : {
  		type : String , 
  		required : true
  	},
  	constrains : {
  		type : Object , 
  		default : null
  	}
   },

  data () {

    return {
    	balloonInterval : null ,
    	intervalCounter : 0 ,
    	hovered : false , 
    	closed : false ,
      leaveActiveClass : 'slideOutRight' , 
      outterHover : false ,
      domainUser : null ,



    }
  },
  mounted(){
  	this.countDown();
  	this.soundNotification();
    this.swipeToLeave();
    const vm = this;
    App.$on('knocksStopBallonTimer' , (gid)=>{
      if(vm.gid == gid){
        vm.outterHover = true ;
      }
    });
     App.$on('knocksTurnOnBallonTimer' , (gid)=>{
      if(vm.gid == gid){
        vm.outterHover = false;
        if(!vm.hovered) vm.countDown();
      }
    });
  },
  methods : {

  	hoverAct(){
      this.hovered = true;
  		this.intervalCounter = 0;
      // this.swipeToLeave();
  		clearInterval(this.balloonInterval);
  	},
  	mouseLeaveAct(){
      this.hovered = false ;
      if(!this.outterHover);
  		this.countDown();
  	},
  	countDown(){
	  	this.balloonInterval = setInterval( ()=>{
	  	if(this.hovered || this.outterHover){
	  	   clearInterval(this.balloonInterval);
	  	 }else{
	  	 	if(this.intervalCounter == 10){
	  	 	   clearInterval(this.balloonInterval);
	  	 	   this.closed = true;
	  	 	   return;
	  	 	}
	  		this.intervalCounter++;
	  	 }
  	}, 1000);
  	}, 
  	soundNotification(){
  	  var vidId = document.getElementById('knocks_notification');
      vidId.play();
      setTimeout(function () {
          vidId.pause();
      },3000);
  	
  },
  swipeToLeave(){
    // const vm = this;
    //  // setTimeout( ()=>{
    //      $('#'+vm.gid).swipe( {
    //     //Generic swipe handler for all directions
    //     swipe:function(event, direction, distance, duration, fingerCount, fingerData) {
    //       if(direction == 'left') vm.leaveActiveClass = 'animated bounceOutLeft';
    //       if(direction == 'right')vm.leaveActiveClass = 'animated bounceOutRight';
    //       setTimeout(
    //         ()=>{
    //           vm.closed = true;
    //         }
    //         ,300);
    //       vm.closed = true;
    //     },
    //     //Default is 75px, set to 0 for demo so any distance triggers swipe
    //      threshold: 0
    //   });

     // } , 500);
  }
}
}
</script>

<style lang="css" scoped>

</style>
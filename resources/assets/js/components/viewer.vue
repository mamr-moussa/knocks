<template>
<div>


    <div class="row">
    <div class="col s12">
    	<ul class="collection with-header viewer_ul"   >
    	   <li class="collection-header">
		       	<span class="knocks_text_dark">
		       		<h4>  
			       	<div :class="icon" v-if = "thumbnail != null">
			         <span v-for ="icn in results.thumbnail.class" v-if = "results.length > 0" >{{icn}}</span>
			         </div>
			            {{name}}
			        </h4>
			    </span>
          <ul class="tabs">
              <li class="tab col s3 knocks_text_anchor">
                <a :href="'#'+gid+'_circle_members'" class = "active">
                  <span :class = "members_icon"></span>
                  <static_message msg="Members" classes = "knocks_text_anchor knocks_text_bold"></static_message>
                </a>
            </li>
              <li class="tab col s3"><a class="active" href="#test2">Test 2</a></li>
              <li class="tab col s3 disabled"><a href="#test3">Disabled Tab</a></li>
              <li class="tab col s3"><a href="#test4">Test 4</a></li>
            </ul>
			</li>

			<li class="collection-item">
				  
			       <div :id="gid+'_circle_members'" class="col s12 white">
			    	<ul>
			          <li v-for = "member in members"  v-if = "results.members !=null"  class="collection-item viwer_list  knocks_text_dark">
			          	<knocksuser :user = "member.user_id"  show_image ></knocksuser>
			          </li>
			        </ul>
			    </div>
			    <div id="test2" class="col s12 knocks_text_anchor">Test 2</div>
			    <div id="test3" class="col s12 knocks_text_anchor">Test 3</div>
			    <div id="test4" class="col s12 knocks_text_anchor">Test 4</div>
			</li>
    	</ul>
    </div>

  </div>
</div>
</template>
<script>
    export default {
props :{
     circle_data:{
       value:Object,
       default: null
     },
     gid : {
     	type : String , 
     	required : true 
     },
     members_icon : {
     	type : String , 
     	default : 'knocks-group-outline knocks_text_anchor knocks_text_md knocks_text_bold'
     }
},
      data() {return{
          results: [] ,
          name : '',
          thumbnail:null,
          members : null
        }},
  mounted() {
    const vm = this;
    axios({
      method:'post',
      url: window.location.protocol + '//'+window.location.hostname+':'+window.location.port+'/view/circle',
      data : vm.circle_data
    })
    .then(function(response) {
  vm.results= response.data;
  vm.name = response.data.circle_name;
  vm.thumbnail = JSON.parse(response.data.thumbnail);
  vm.members = vm.results.members;
console.log(vm.results);
console.log(vm.members.data);
});
} ,
  computed : {
    icon(){
      if( this.thumbnail == null ) return '';
      return 'knocks-'+this.thumbnail[0].class;
    },
  },
  methods : {
    circle_mem(){
      var i;
      for(i = 0 ; i < this.members.length ; i++)
      {
      }
    }
  }
}
</script>
<style>
.viwer_list{
  //border-radius: 50px !important;
}
.viewer_ul{
  //border : none !important;
}
</style>
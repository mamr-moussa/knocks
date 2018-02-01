<template>
	<div class = "row" v-if = "userCircles != null">
		<div class = "col l5 knocks_color_light_opacity_kit knocks_regular_border z-depth-1 knocks_regular_border knocks_standard_border_radius knocks_tinny_padding">
			<div class = "row">
				<div class = "col s12" v-for = "(circle , index) in userCircles">
					<div class = "col s6">
					  <div class="switch">
					    <label> 
					      <input type="checkbox" v-model = "selectedCircle[index]">
					      <span class="lever"></span>
					    </label>
					  </div>
					</div>
					<div class = "col s6">
						<knockscirclechip  class = "right" :circle="circle" ></knockscirclechip>
					</div>
				</div>
			</div>
		</div>
		<div class = "col l5 push-l2 knocks_color_light_opacity_kit knocks_regular_border z-depth-1 knocks_regular_border knocks_standard_border_radius knocks_tinny_padding"></div>
	</div>
</template>

<script>
export default {

  name: 'knockscircleseditor',

  data () {
    return {
    	userCircles : null ,
    	selectedCircle : []
    }
  }, 
  mounted(){
  	this.getuserCircles();
  },
  methods : {
  	  	getuserCircles(){
  		const vm = this;
  		axios({
          method : 'post' ,
          url : LaravelOrgin + 'get_circles' , 
          data : { circle : vm.circle }
        }).then( (response)=>{
          vm.userCircles = response.data;
        }).catch((err)=>{ console.log(err); });
  	},
  }
}
</script>

<style lang="css" scoped>
</style>
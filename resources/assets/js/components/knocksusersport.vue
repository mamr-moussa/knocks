<template>
	<div class = "row">
	<div class="col s12 l9">
	 	<knockselinput
        el_follower
        :mat_follower=  "false"
        placeholder = "sport ?"
        gid = "q"
        :max_len = "15"
        v-model = "name"
        :scope = "[ 'sport_adder']"

        ></knockselinput>
    </div>
    <div class = "col s12 l3">
          <knockselbutton
    placeholder = "Done!"
    :error_at = []
    :scope = "['sport_adder']"
    validation_error = "You need to complete some fields"
    reset_on_success
    submit_at = "sport"
    computed_response
    @knocks_submit_accepted = "passToParent($event)"
    success_msg = "Succecfully added a new Sport."
    gid = "stage_one_net"
    button_classes = "right"
    :submit_data = " { name : name} "
    >
    </knockselbutton>
    </div>
</div>
     </div>

</template>
     
<script>
export default {

  name: 'knocksusersport',
  methods:{
      passToParent(e){
      console.log(e);
      let ob = e.submit_data ;
      ob.id = e.response;
      this.$emit('knocks_sport_uploaded' , ob );
    }
  },
  mounted(){
  	
  },
  data() {
      return {
        name : ''
      };

    },
    computed : {
    	

    	}

    }
  
</script>

<style lang="css" scoped>
</style>
<template>
	<div class = "row">
	<div class="col s12 l9">
	 	<knockselinput
        el_follower
        :mat_follower=  "false"
        placeholder = "Hobby ?"
        gid = "q"
        :max_len = "15"
        v-model = "name"
        :scope = "[ 'hobby_adder']"

        ></knockselinput>
    </div>
   <div class = "col l3 s12">
      <knockselbutton
    placeholder = "Add"
    :error_at = []
    :scope = "['hobby_adder']"
    validation_error = "You need to complete some fields"
    reset_on_success
    submit_at = "hobby"
    computed_response
    @knocks_submit_accepted = "passToParent($event)"
    success_msg = "Succecfully added a new Hobby."
    gid = "stage_one_net"
    button_classes = "right"
    :submit_data = " { name : name } "
    >
    </knockselbutton>
   </div>
</div>
     </div>

</template>
     
<script>
export default {

  name: 'knocksuserhobby',
  methods:{
  passToParent(e){
    
      let ob = e.submit_data ;
      ob.id = e.response;
      this.$emit('knocks_hobby_uploaded' , ob );
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
<template>
    <div class = "input-field">
        <i class="material-icons prefix " :class = "icon"></i>
        <input :class = "{ knocks_input_error : !isValid }" type = "text" :value = "value" @input="emitMe()" :id = "gid"/>
        <label for="icon_prefix">
            <static_message msg = "email" ></static_message>
        </label>
        <ul>
            <li v-for="err in errorStack" >
                <span class = "knocks-alert knocks_text_danger"></span><span class = "knocks_text_danger">{{err}}</span>
            </li>
        </ul>
    </div>
</template>

<script>
export default {

  data () {
    return {


    };
  } , 

  props : {
    icon : {
        type : String ,
        default : ''
    }, 
    value : {
        type : String , 
        default : ''
    },
    gid : {
        type : String ,
        required : true ,
    },
    is_required : {
        type : Boolean , 
        default : true ,
    }
  },

  computed : {
    isValid(){
        return this.value.length == 0 ? false : true ;
    },errorStack(){
        var stack = [];
        if(this.value.length == 0) stack.push('empty');
        if(this.value.length < 4) stack.push('Minumum');
        if(this.value.length > 7) stack.push('Max');
        if(isNaN(this.value)) stack.push('Not a number');
        return stack;
    }
  },

  methods : {
    emitMe(){
        this.$emit('input' , event.target.value);
    }
  }
};
</script>

<style lang="css" scoped>
</style>
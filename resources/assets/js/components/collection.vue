<template lang="html">
  <ul class="collection">
    <li v-for = "(name , index ) in names" class="collection-item" :class="classes">
      <a  @click="emitMe(name)" class = "knocks_text_dark" >{{name}}</a>
    </li>
  </ul>
</template>

<script>
export default {
  props : {
    classes : {
      type : String ,
      default : '' ,
      required : false ,
    } ,
    names : {
      type : Array ,
      required : true
    }
  } ,
  data (){
    return{

    }

  },
  methods : {
    sayHello(index){

      this.$emit('input' , this.names[index] )
    },
    link_getter(index){
      return this.link_class[index];
    },
    emitMe(name){
      this.$emit('input' , name);
    }
  }
}
</script>

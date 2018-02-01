<template lang="html">
  <li>
    <div class = "col s12">
      <button class = "knocks_text_dark knocks_text_dark_hover knocks_bordered knocks_long_bounds">
        <span :class = "icon" ></span>
        <span class = "">{{content}}</span>

      </button>
      <button class = "btn">{{expand_label}}</button>
      <div class = "s12">
        <knocksinput :gid = "input_id" :is_required = "true" :place_holder = "input_placeholder"></knocksinput>
      </div>
    </div>
  </li>

</template>

<script>
export default {
  props : {
    content : {
      type : String ,
      default : '' ,
    } ,

    icon : {
      type : String ,
      default : ''
    },

    expand_label : {
      type : String ,
      default : ''
    },

    input_id  : {
      type : String ,
      required : true
    },

    input_placeholder  : {
      type : Number ,
      required : true
    },
  },

  data(){
    return{
      isExpanded : false ,
    }
  },

}
</script>

<style lang="css">
</style>

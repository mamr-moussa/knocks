<template>
	<div class="progress pink lighten-2">
      <div class="determinate knocks_color_kit_active" :class = "classes" :style = "{ width : width }"></div>
  </div>
</template>

<script>
export default {

  name: 'knocksprogressbarindecator',
  props : {
  	width : {
  		type : String ,
  		default : '0'
  	},
    classes : {
      type : String ,
      default : ''
    }
  },
  data () {
    return {

    };
  }
};
</script>

<style lang="css" scoped>
</style>
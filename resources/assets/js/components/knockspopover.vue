<template>
	<span @mouseover = "hoverModeOn()" @mouseleave = "hoverModeOff()" style = "position : relative">
	   <slot name = "container"></slot>
	   <slot name = "content" v-if = "hovered" style = "position : absolute" ></slot>
	</span>
</template>

<script>
export default {

  name: 'knockspopover',

  data () {
    return {
    	hovered : false 
    }
  },
  methods : {
  	hoverModeOn(){
  	this.hovered = true ;
  },
  hoverModeOff(){
  	this.hovered = false ;
  }
  }
}
</script>

<style lang="css" scoped>
</style>
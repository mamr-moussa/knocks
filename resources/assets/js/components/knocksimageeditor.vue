<template>
<div class="row knocks_xs_side_padding">
  <a class = "knocks_file_upload  modal-trigger" @click="crop()" :id="gid+'_container'" :href="'#'+gid+'_image_editor_modal'"  >
    <img :src = "currentSource" width = "100%" v-if = "currentSource != null" />
  </a>
  <div :id="gid+'_image_editor_modal'" class="modal" style = "height : 70% !important">
    <div class="modal-content">
      <el-input placeholder="Quote Your Image.." v-model="quote" class = "knocks_fair_bounds" @input = "assign()">
        <template slot="prepend"><span class = "knocks-pencil9"></span></template>
      </el-input>
      <div class = " col s12 " style= "max-height : 200px !important; z-index : 30000000000" :id = "`knocks_upload_port_`+gid" >
      </div>
    </div>
    <div class="modal-footer" style="">
      <center>
        <knockspopover>
      <template slot = "container">
      <button class = "knocks_color_kit knocks_btn_color_kit knocks_color_kit  btn-floating" @click = "cropDone()">
      <span class = "knocks-checkmark6"></span>
      </button>
      </template>
      <span slot = "content"  class = "knocks_tooltip animated flipInX" >
        <span class = "knocks-checkmark6"></span>
        <static_message msg = "Done"></static_message> 
      </span>
      </knockspopover>
      <knockspopover>
      <template slot = "container">
      <button class = " knocks_color_kit knocks_btn_color_kit btn-floating" :class = "gid+'_rotate'" data-deg = "-90"  >
      <span class = "knocks-rotate-ccw"></span>
      </button>
      </template>
      <span slot = "content"  class = "knocks_tooltip animated flipInX" >
        <span class = "knocks-rotate-ccw"></span>
        <static_message msg = "Rotate Left"></static_message>
      </span>
      </knockspopover>
      <knockspopover>
      <template slot = "container">
      <button class = " knocks_color_kit knocks_btn_color_kit btn-floating" :class = "gid+'_rotate'" data-deg = "90">
      <span class = "knocks-rotate-cw"></span> 
      </button>
      </template>
      <span slot = "content"  class = "knocks_tooltip animated flipInX" >
        <span class = "knocks-rotate-cw"></span>
        <static_message msg = "Rotate Right"></static_message>
      </span>
      </knockspopover>
      <knockspopover>
      <template slot = "container" >
      </button>
      <button class = " knocks_color_kit knocks_btn_color_kit btn-floating" @click="cancelEditing()"  >
      <span class = "knocks-x-circle"></span>
      </button>
      </template>
      <span slot = "content"  class = "knocks_tooltip animated flipInX" >
        <span class = "knocks-x-circle"></span>
        <static_message msg = "Cancel"></static_message>
      </span>
      </knockspopover>
      </center>
    </div>
  </div>
</div>
</template>

<script>
export default {

  name: 'knocksimageeditor',
  props : {
  	source : {
  		type : String , 
  		default : ''
  	},
  	gid : {
  		type : String , 
  		default : ''
  	}
  },

  data () {
    return {
      currentSource : null , 
      basic : null ,
      quote : '',
    }
  }
  , mounted(){
    $('#'+this.gid+'_image_editor_modal').modal();
    this.assign();
  	setTimeout( ()=>{ this.assignToModel(this.source);} , 200);
    
  },
  methods: {
  	represent(){
    
  } ,
  assignToModel(source){
    this.currentSource = source;
    this.$emit('input' , {blob : this.currentSource , quote : this.quote});

  },
  crop(){
    const vm = this;
    $('#knocks_upload_port_'+vm.gid).empty();
    let targetElement = document.getElementById('knocks_upload_port_'+vm.gid );
    vm.basic = new Croppie( targetElement , {
                   viewport: {
                    width: 100, 
                    height: 100 
                  },
                    boundary: { 
                      width: 200, 
                      height: 200 
                    },
                    showZoomer: false,
                    enableResize: true,
                    enableOrientation: true
                });
                vm.basic.bind({
                  url : vm.source , 
                });
               $('.'+vm.gid+'_rotate').on('click', function(ev) {
                  vm.basic.rotate(parseInt($(this).data('deg')));
                });
  } , 
  cropDone(){
    const vm = this ;
        this.basic.result('canvas' ).then(function(blob) {
          vm.currentSource = blob;
           $('#'+vm.gid+'_image_editor_modal').modal('close');
           vm.assign();
        });
  }, assign(){
    this.$emit('input' , {blob : this.currentSource , quote : this.quote});
  },
  cancelEditing(){
    $('#'+this.gid+'_image_editor_modal').modal('close');
  }
}
}
</script>

<style lang="css" scoped>

.modal-content{
  height: 70% !important;
}
</style>
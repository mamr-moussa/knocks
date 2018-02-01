<template>

<div class = "row">
  <div class="input-field col s12">
       <i class="material-icons prefix knocks_text_dark" :class = "iconClasses" v-if = "!isLoading"></i>
       <i v-else  class="material-icons prefix ">
         <knocksloader :gid = 'gid+`_loader`' size = "small" v-if = "isLoading"></knocksloader>
       </i>
      <select :value = "value" :id = "gid"  v-if="!is_multiple && !has_photos" :class = "inputClasses" >


          <option v-bind:value="sel.value" v-if="!is_sectioned && options != null"  v-for="sel in options">{{sel.label}}</option>



          <optgroup :label="option.section" v-for="option in options" v-if = "is_sectioned && options != null" >
            <option v-bind:value="sel.value" v-for = "sel in option.selections">{{sel.label}}</option>
          </optgroup>





      </select>

      <select :value = "value" :id = "gid"  v-if = "is_multiple && !has_photos" multiple :class = "inputClasses" >


        <option  v-for = "(option,index) in options" v-if = "!is_sectioned && options != null" v-bind:value = "option.value">
        {{option.label}}
        </option>



        <optgroup :label="option.section" v-for="option in options" v-if = "is_sectioned && options != null" >
          <option v-for = "sel in option.selections" v-bind:value = "sel.value" >{{sel.label}}</option>
        </optgroup>

      </select>

      <select :value = "value" :id = "gid"  v-if="!is_multiple && has_photos" :class = "inputClasses" >


          <option v-bind:value="sel.value" :data-icon="sel.image" v-if="!is_sectioned && options != null"  v-for="sel in options">{{sel.label}}</option>



          <optgroup :label="option.section" v-for="option in options" v-if = "is_sectioned && options != null" >
            <option :data-icon="sel.image" v-bind:value="sel.value" v-for = "sel in option.selections">{{sel.label}}</option>
          </optgroup>





      </select>

      <select :value = "value" :id = "gid"  v-if = "is_multiple && has_photos" multiple :class = "inputClasses" >
    

        <option :data-icon = "option.image"  v-for = "(option,index) in options" v-if = "!is_sectioned && options != null" v-bind:value = "option.value">
        {{option.label}}
        </option>



        <optgroup :label="option.section" v-for="option in options" v-if = "is_sectioned && options != null" >
          <option :data-icon = "sel.image" v-for = "sel in option.selections" v-bind:value = "sel.value" >{{sel.label}}</option>
        </optgroup>

      </select>





      <label><static_message :msg = "placeholder"></static_message></label>
    </div>
    <div class = "userInput2" :class = "lang_alignment">
      <ul v-if = " isFired  && !isValid" >
        <li v-for= "errors in errorsStack" class = "animated slideInDown knocks_text_error "  :class ="icon_error">
          <span :class = 'errorsBus[errors].icon'></span>
          <span v-if ="errorsBus[errors].prefix !== null">{{errorsBus[errors].prefix}}</span>
          <!-- <static_message :msgid = "errorsBus[errors].message_id" parent_class="knocks_inline"></static_message> -->
          <span>{{errorsBus[errors].message_id}}</span>
          <span v-if ="errorsBus[errors].postfix !== null">{{errorsBus[errors].postfix}}</span>
        </li>
      </ul>
      <slot></slot>
    </div>
</div>

</template>

<script>

export default {

props :{
  option : {
    type : Array  ,
    required : false,
  } ,
  terms :{
    type : Array ,
    required : false
  },
  placeholder : {
    type : String ,
    default : ''
  },
  gid : {
    type : String ,
    required : true
  } ,
  is_multiple : {
    type : Boolean ,
    default : false
  },
  is_default : {
    type : Boolean ,
    default : true
  },
  is_sectioned: {
    type : Boolean ,
    default : false
  },
  fill_from : {
    type : String ,
    default : null,
  },
  icon : {
    type : String ,
    default : ''
  },
  icon_text : {
    type : String ,
    default : 'knocks_text_dark'
  },
  success_class : {
    type : String ,
    default : 'knocks_text_success'
  },
  error_class : {
    type : String ,
    default : 'knocks_text_error'
  },
  icon_success : {
    type : String ,
    default : 'knocks_text_success'
  },
 icon_error  : {
    type : String ,
    default : 'knocks_text_error'
  },
  is_required : {
    type : Boolean ,
    default : true ,
  },
  is_numeric : {
    type : Boolean ,
    default : null
  },
  max_limit : {
    type : Boolean ,
    default : false
  } ,
  min_limit : {
    type : Boolean ,
    default : false
  } ,
  max : {
    type : Number ,
    default : undefined ,
  },
  min : {
    type : Number ,
    default : undefined ,
  },
  max_len_limit : {
    type : Boolean ,
    default : false
  } ,
  min_len_limit : {
    type : Boolean ,
    default : false
  } ,
  max_len : {
    type : Number ,
    default : undefined ,
  },
  min_len : {
    type : Number ,
    default : undefined ,
  },
  match : {
    type : Boolean ,
    default : false
  },
  regex : {
    type : String ,
    default : undefined ,
  } ,
  regex_example :{
    type : String ,
    default : null ,
  },
  check_live : {
    type : Boolean ,
    default : false ,
  } ,
  check_at : {
    type : String ,
    default : null
  } ,
  check_invalid_at :{
    type : String ,
    defualt : null
  },
  check_valid_at :{
    type : String ,
    defualt : null
  },
  options_icon : {
    type : String ,
    default : '' ,
  },
  options_classes : {
    type : String , 
    default : ''
  },
  options_icons_classes : {
    type : String ,
    default : ''
  },
  has_photos : {
    type : Boolean ,
    default : false
  },
  scope : {
    type : Array , 
    default : null
  },
  knocksclass : {
    type : String , 
    default : 'knocks_input_ps'
  }
},

  data(){
    return{
      lang_alignment : document.querySelector('meta[name="lang_alignment"]').getAttribute('content') ,
      lang_font : document.querySelector('meta[name="lang_font"]').getAttribute('content') ,
      user_language : document.querySelector('meta[name="user_lang"]').getAttribute('content') ,
      multipleValue : [],
      options : null ,
      isLoading : false,
      isFired : false ,
      errorsBus : [],
      errorsStack : [],
      value  : null , 
      selectedValue : null ,
      isOther : false ,
      isExcuted : false
    }
  },
  methods:{

  getIndex(index){
    this.$emit('input',this.option[index]);
  } ,

  selectorMounter(){
    $('#'+this.gid).material_select();

    const vm = this;

 
    $(function() {
      //Update the content at the end
      $('#'+vm.gid).material_select();
      $('#'+vm.gid).on('change', function() {
        vm.selectedValue = $('#'+vm.gid).val();
        vm.$emit('inputChanged');
        vm.$emit('validatedSelect' , $('#'+vm.gid).val());

      });

      //Caret Icon Replacement
      $('.select-wrapper>.caret').text('');
      $('.select-wrapper>.caret').append('<span class = "knocks-chevron-down2 '+vm.icon_text+' knocks_text_md"></span>');
      //General Icons
      var dataSelectId = $('#'+vm.gid).attr('data-select-id');
      var optionSelector = document.getElementById('select-options-'+dataSelectId);
      $('#select-options-'+dataSelectId+'>li>span').append('<span class = "'+vm.options_icon+' '+vm.options_classes+' right"></span>');
      //Selector Focus Trigger
      
      //Single Icons on the sectioned options
      if(vm.is_sectioned){
        var optionsScope = optionSelector.getElementsByClassName('optgroup-option');
        var i, j, k, l;
        for(i = 0; i < optionsScope.length; i++){
          for(j = 0; j < vm.options.length; j++){
            for(k = 0; k < vm.options[j].selections.length; k++){
              if($(optionsScope[i]).text() == vm.options[j].selections[k].label){
                if(vm.options[j].selections[k].icon != null || vm.options[j].selections[k].icon != undefined){
                  for(l = 0; l < vm.options[j].selections[k].icon.length; l++){
                      $(optionsScope[i].querySelector('span')).append(
                        ' <span class= "right knocks_side_margins '+vm.options_classes+' '
                        +vm.options[j].selections[k].icon[l]+' '+vm.options_icons_classes+'"></span> '
                        );
                  }
                }
              }
            }
          }
      }
    }else{
      //Non Sectioned 
      var optionsScope = optionSelector.getElementsByTagName('li');
        var i, j, k, l;
        for(i = 0; i < optionsScope.length; i++){
         console.log('found');
          for(j = 0; j < vm.options.length; j++){
              if($(optionsScope[i].querySelector('span')).text().trim() == vm.options[j].label){
                if(vm.options[j].icon != null || vm.options[j].icon != undefined){
                  for(l = 0; l < vm.options[j].icon.length; l++){
                      $(optionsScope[i].querySelector('span')).append(
                        ' <span class= "right knocks_side_margins '+vm.options_classes+' '
                        +vm.options[j].icon[l]+' '+vm.options_icons_classes+'"></span> '
                        );
                  }
                }
              }
            }
          }
      }

  });
    


  },
  optionsFiller(){
    const vm = this;
    if(vm.fill_from == null || vm.fill_from === null || vm.fill_from.length == 0){
       vm.options = vm.option;
       setTimeout(function(){ vm.$emit('options_ready'); },500);          
    }else{
      const vm = this;

      
      axios
      ({
          method:'post',
          url:window.location.protocol + '//' + window.location.hostname + ':'+window.location.port+'/'+vm.fill_from,
          timeout : 10000,
          data : vm.submit_data ,
          onDownloadProgress: function (progressEvent) {
            vm.isLoading = true;
          },
      })
      .then(function(response) {
        vm.isLoading = false;
        vm.options = response.data;
        vm.$emit('options_ready'); 

      });

    }
  },
  bindErrorBus(errorsMessageBus){

    this.errorsBus = [
      { message_id : errorsMessageBus[0]  , icon : 'knocks-alert-circle' , prefix : null , postfix : null},
      { message_id : errorsMessageBus[1]   , icon : 'knocks-alert-circle' , prefix : null , postfix : this.min},
      { message_id : errorsMessageBus[2]   , icon : 'knocks-alert-circle' , prefix : null , postfix : this.min},
      { message_id : errorsMessageBus[3]   , icon : 'knocks-alert-circle' , prefix : null , postfix : this.max_len},
      { message_id : errorsMessageBus[4]   , icon : 'knocks-alert-circle' , prefix : null , postfix : this.min_len},
      { message_id : errorsMessageBus[5]   , icon : 'knocks-alert-circle' , prefix : null , postfix : null},
      { message_id : errorsMessageBus[6]   , icon : 'knocks-alert-circle' , prefix : null , postfix : null},
      { message_id : errorsMessageBus[7]   , icon : 'knocks-alert-circle' , prefix : null , postfix : null},
      { message_id : errorsMessageBus[0]   , icon : 'knocks-alert-circle' , prefix : null , postfix : null},
    ];
  },
  validate(val){
    if(this.isNotEmpty(val)){
      this.errorsStack.pop();
      this.isOther = true;
    }else {this.errorsStack.push(8);
    this.isOther = false ;}
    this.isExcuted = true;
  },
  isNotEmpty(val){
    return val == null || val.length == 0 ? false : true ;
  },
  pushOrPop(method,errorNum){
            if(method == true && this.errorsStack.length == 0){
              return true;
            } else if (method == true && this.errorsStack != 0){
              this.errorsStack.pop();
              return true;
            }else if (method == false && this.errorsStack.length == 0){
              this.errorsStack.push(errorNum);
              return false;
            }else if(method == false && this.errorsStack.length != 0)
              return false;
          },

  


} ,
mounted(){
  const vm = this;

  vm.optionsFiller();
  App.$on('knocks_submit' , (scope)=>{
    if(scope != null){
      let i;
      if(vm.scope == null) return;
      for(i = 0; i < scope.length; i++){
        if(vm.scope.indexOf(scope[i]) != -1){
         vm.isFired = true;
         App.$emit('knocks_input_status' , vm.isValid);
         return;
        }
      }
      return;
   }else if(scope == null && vm.scope == null){
    vm.isFired = true;
    App.$emit('knocks_input_status' , vm.isValid);
   }
  });
  vm.$on('validatedSelect' , function(val){
    vm.validate(val);
  });
  App.$on('knocks_input_reset' , function(scope){
    if(scope == null || vm.scope == scope){
      $('#'+vm.gid).val('');
      var parentNode = $('#'+vm.gid).parent();
      var label = $(parentNode).find('label');
      $(label).removeClass('active');
      vm.$emit('input','');
      vm.isFired = false ;
    }
  });
  App.$on('errorsMessageBusLoaded' , function(errorsMessageBus){
    vm.bindErrorBus(errorsMessageBus);
  });
  vm.$on('options_ready' , function(){
    vm.selectorMounter();


  });
  this.$on('inputChanged' , function(){

    //non-sectioned values retrivals
    if(!vm.is_sectioned){

      //Non multiple retriaval 
      if(!vm.is_multiple){
        var i ;
        for(i = 0; i < vm.options.length; i++){
          console.log(vm.selectedValue);
          if(vm.selectedValue == vm.options[i].value){
            vm.$emit('input' , {value : vm.options[i].value , label : vm.options[i].label});
            vm.$emit('inputFired');
            return ;
          }
        }
      }else{

        //Multiple non sectioned retrival
        var i ,j , obj ;
        obj = [];
        for(i = 0; i < vm.options.length; i++){
          for(j = 0; j < vm.selectedValue.length; j++){
            if(vm.selectedValue[j] == vm.options[i].value){
              obj.push(vm.options[i]);
            }
          }
        }
        vm.$emit('input' , obj);
        vm.$emit('inputFired');


    
      }
    }else{
      //The non Sectioned retrivals
      //Non Multiple
      if(!vm.is_multiple){
        var i , j ;
        for(i = 0; i < vm.options.length; i++){
          for(j = 0; j < vm.options[i].selections.length; j++){
            if(vm.selectedValue == vm.options[i].selections[j].value){
              vm.$emit( 'input' , { section : vm.options[i].section , 
                                   value : vm.options[i].selections[j].value , 
                                   label : vm.options[i].selections[j].label});
              vm.$emit('inputFired');
              return;
            }
          }
        }
      }else{
        //Multiple and Sectioned Retrival
        var i, j, k, obj;
        obj = [];
        for(i = 0; i < vm.options.length; i++){
          for(j = 0; j < vm.options[i].selections.length; j++){
            for(k = 0; k < vm.selectedValue.length; k++){
              if(vm.selectedValue[k] == vm.options[i].selections[j].value){
              obj.push({ section : vm.options[i].section , 
                                   value : vm.options[i].selections[j].value , 
                                   label : vm.options[i].selections[j].label});
              }
            }
          }
        }
        vm.$emit('input', obj);
        vm.$emit('inputFired');
      }
    }

  });

  vm.$on('inputFired' , function(){
    vm.isFired = true;

    
  });

  $(document).ready(function(){
    $('#'+vm.gid).material_select();

  });
   ;
},
computed: {
  isValid(){
        

    if(!this.isFired) return false ;
    if ( this.is_required && (this.selectedValue == null || this.selectedValue.length == 0)) {
      this.errorsStack = [0];
      $($('body').find($('.select-wrapper input.select-dropdown'))).addClass(this.error_class).removeClass(this.icon_success);
      return false;
    }else {
      this.errorsStack = [];
      $('.select-wrapper input.select-dropdown').addClass(this.icon_success).removeClass(this.icon_error);
      return true;
    }
  },
  iconClasses(){
    var classes = [ this.icon ];
    if(this.isValid) classes.push(this.icon_success);
    if(!this.isValid && this.isFired) classes.push(this.icon_error);
    return classes;
  } ,
  inputClasses(){
    var classes = [this.knocksclass ];
    classes.push(this.scope);
    if(this.lang_alignment == 'right') classes.push('knocks_text_right');
    if(this.focus) classes.push('knocks_input_focus');
    if(this.isValid) classes.push(this.success_class);
    if(!this.isValid && this.isFired) classes.push(this.error_class);
    //classes.push(this.knocksclass);

    return classes;
  } ,
  
  

}
}

</script>

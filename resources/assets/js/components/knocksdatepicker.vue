<template>
<div class = "row">
  <div class="input-field knocks_input_holder_ps">
          <i class="material-icons prefix " :class = "iconClasses" ></i>
          <input id="icon_prefix"
          ref=""
          @focus="addFocus()"
          @blur="removeFocus()"
          ref = ""
          :id = "id"
          :value = "value"
          @input="$emit(`input`, $event.target.value)"
          class = "knocks_input_ps datepicker"
          :class="inputClasses"
          :type="type"
            >
          <label for="icon_prefix" ><static_message :msg="placeholder" :classes="labelClasses"></static_message></label>
        </div>
        <div class = "s12" :class = "lang_alignment">
          <ul v-if = " isFired  && !isValid" >
            <li v-for= "errors in errorsStack" class = "animated slideInDown knocks_text_error " :class = "icon_error">
              <span :class = 'errorsBus[errors].icon'></span>
              <span v-if ="errorsBus[errors].prefix !== null">{{errorsBus[errors].prefix}}</span>
              <!-- <static_message :msgid = "errorsBus[errors].message_id" parent_class="knocks_inline"></static_message> -->
              <span>{{errorsBus[errors].message_id}}</span>
              <span v-if ="errorsBus[errors].postfix !== null">{{errorsBus[errors].postfix}}</span>
            </li>
          </ul>
        </div>
</div>
</template>
<script>
    export default {
        props : {
          currentValue:{
            type : String ,
            default : ''
          },
          icon : {
            type : String ,
            default : ''
          } ,
          id : {
            type : String ,
            default : ''
          } ,
          placeholder : {
            type : String ,
            default : ''
          } ,
          knocksclass : {
            type : String ,
            default : ''
          } ,
          type : {
            type : String ,
            default : 'text'
          },
          value : String,
          max : {
             type : Object ,
             default:null
          },
          min : {
             type : Object ,
             default:null
          },
          closeOnSelect : {
            type : Boolean ,
            default : false
          } ,
          id : {
            type : String ,
            required : true
          },
          success_class : {
            type : String ,
            default : 'knocks_input_success '
          } ,
          error_class : {
            type : String ,
            default : 'knocks_input_error animated shake'
          } ,
          is_required : {
            type : Boolean ,
            default : true,
          },
          scope : {
            type : Array ,
            default : null
          },
          icon_error:{
            type : String , 
            default : 'knocks_text_error'
          },
          label_class : {
            type : String , 
            default : 'knocks_text_dark'
          }
        },
        data : function(){
          return {
            lang_alignment : document.querySelector('meta[name="lang_alignment"]').getAttribute('content') ,
            user_language : document.querySelector('meta[name="user_lang"]').getAttribute('content') ,
            knocks_focus : 'knocks_input_ps' ,
            spanClass : 'knocks_text_dark',
            inners : '' ,
            today : '' ,
            ok : '',
            clear : '' ,
            todayLoaded : false ,
            okLoaded : false,
            clearLoaded : false ,
            place_holder_msg : '' ,
            isFired : false ,
            errorsStack : [],
            errorMessages : [] ,
            errorsBus : [],
            
           
          }
        },
        computed: {
           maxDate (){ return this.calcDate(this.max) }, 
            minDate() { return this.calcDate(this.min)}  ,
          inputClasses(){
            var classes = [ this.knocksclass ];
            if(this.lang_alignment == 'right') classes.push('knocks_text_right');
            if(this.isValid) classes.push(this.success_class);
            if(!this.isValid && this.isFired) classes.push(this.error_class);

            return classes;
          } ,
          iconClasses(){
            var classes = [ this.icon ];
            if(!this.isFired) classes.push('knocks_text_dark');
            if(this.focus) classes.push('knocks_text_dark_active');
            if(this.isValid) classes.push('knocks_text_success');
            if(!this.isValid && this.isFired) classes.push(this.icon_error);
            return classes;
          } ,
          labelClasses(){
            var classes = '';
            if(!this.isFired) classes+=(' knocks_text_dark ');
            if(this.focus) classes+=(' knocks_text_dark_active ');
            if(this.isValid)classes +=(' knocks_text_success' );
            if(!this.isValid && this.isFired) classes+=(this.icon_error);
            if(this.lang_alignment == 'right')classes +=(' knocks_almost_right ');
            else classes += this.label_class;
            return classes;
          },
          isValid(){
            if(!this.isFired) return false;

            if(this.is_required == true)
            if(!this.pushOrPop(this.notEmpty(),8)) return false;

            if(!this.pushOrPop(this.validDate(),1)) return false;
            return true;
          },

        },

        beforeCreated(){
          // this.getToday();
          // this.getClear();
          // this.getOk();
        },


        mounted() {
          this.getMessage0();
          this.getMessage1();


            const vm = this;

            this.getToday();
            this.getClear();
            this.getOk();
            this.getPlaceHolder();

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



        },
        methods : {
         updateCode(code) {
           this.$emit('input',code);
          },
          removeFocus(){
            this.knocks_focus = 'knocks_input_ps';
            this.spanClass = 'knocks_text_dark';
          },
          addFocus(){
            this.knocks_focus = 'knocks_input_focus';
            this.spanClass = 'knocks_text_dark_active';
            this.boundData();
          },

          getToday(){
            const vm = this ;
            axios.post(window.location.protocol + '//' + window.location.hostname + ':'+window.location.port+'/gettrans',
            {language : this.user_language, id : 13 })
            .then(function(response){
                vm.today = response.data;
                vm.todayLoaded = true;
            });
          } ,

          getOk(){
            const vm = this ;
            axios.post(window.location.protocol + '//' + window.location.hostname + ':'+window.location.port+'/gettrans',
            {language : this.user_language, id : 14 })
            .then(function(response){
                vm.ok = response.data;
                vm.okLoaded = true;
            });
          },

          getClear( ){
            const vm = this ;
            axios.post(window.location.protocol + '//' + window.location.hostname + ':'+window.location.port+'/gtrans',
            {language : this.user_language, word : 'Clear' })
            .then(function(response){
                vm.clear = response.data;
                vm.clearLoaded = true;
            });
          },

          getPlaceHolder( ){
            const vm = this ;
            axios.post(window.location.protocol + '//' + window.location.hostname + ':'+window.location.port+'/gtrans',
            {language : this.user_language, word : this.placeholder })
            .then(function(response){
                vm.place_holder_msg = response.data;
            });
          },

          boundData(){
            this.$emit('knocks_datepicker_bounded');
            const vm = this;
            $('.datepicker').pickadate({
              selectMonths: true, // Creates a dropdown to control month
              selectYears: 15, // Creates a dropdown of 15 years to control year,
              today : vm.today,
              clear : vm.clear ,
              close : vm.ok ,
              formatSubmit: 'YYYY-MM-DD',
              // max: new Date(moment().subtract(15,'years').format('YYYY'),moment().subtract(15,'years').format('MM'),moment().subtract(15,'years').format('DD')),
              // min: new Date(moment().subtract(100,'years').format('YYYY'),moment().subtract(100,'years').format('MM'),moment().subtract(100,'years').format('DD')),
              value : moment().subtract(15, 'years').format('YYYY-MM-DD'),
              max : vm.calcDate(vm.max) ,
              min : vm.calcDate(vm.min) ,
              closeOnSelect : vm.closeOnSelect ,
              onSet: function(context) {
                //vm.value = $('#'+vm.id).val();
                vm.$emit('knocks_datepicker_gone');
                vm.$emit('input' , moment($('#'+vm.id).val()).format('YYYY-MM-DD') );
                if(moment( $('#'+vm.id).val()).format('YYYY-MM-DD') != 'Invalide date'){
                  $('.picker__weekday-display').empty().append(moment($('#'+vm.id).val()).lang(vm.user_language).format('dddd'));
                  $('.picker__month-display').empty().append(moment($('#'+vm.id).val()).lang(vm.user_language).format('MMM'));
                  $('.picker__year-display > div').empty().append(moment($('#'+vm.id).val()).lang(vm.user_language).format('YYYY'));
                  $('.picker__day-display').empty().append(moment($('#'+vm.id).val()).lang(vm.user_language).format('D'));
                }
                

               },


              closeOnSelect: false // Close upon selecting a date,
            });

    


            $('.picker__weekday-display').empty().append( moment(vm.calcDate(vm.max) ).lang(vm.user_language).format('dddd'));
            $('.picker__month-display').empty().append(moment(vm.calcDate(vm.max)).lang(vm.user_language).format('MMM'));
            $('.picker__year-display > div').empty().append( moment(vm.calcDate(vm.max)).lang(vm.user_language).format('YYYY'));
            $('.picker__day-display').empty().append(moment(vm.calcDate(vm.max)).lang(vm.user_language).format('D'));





            var pickerIndex = '<div id = "knocks_picker_index_date" class = "col s12 valign-wrapper knocks_text_md knocks_datepicker_index show-on-large">'+
            '<p class = "'+vm.icon+' "></p>'+
            ' <p class = "knocks_bit_left"> '+vm.place_holder_msg+'</p>'+
            '</div>';
            $('#knocks_picker_index_date').remove();
            $('.picker__date-display').append(pickerIndex);

            setTimeout(()=>{
              $($('body').find('.picker--opened .picker__holder')).css({'background' : 'transparent !important' , 'background-color' : 'transparent !important'});
              $($('body').find('.picker--opened .picker__holder')).css({'background' : 'transparent !important' , 'background-color' : 'transparent !important'});
            },300);

          } ,
          calcDate(dateObject){
            //Handle the empty case as the current Moment
            if(dateObject == null) return moment().format();
            /*Return a specific date
              Usage: eg : max={date : new Date (2005 , 3 ,20)}
              this will return the date of 2005 20 March.
            */
            if((dateObject.date != undefined || dateObject.date != null ) &&
            (dateObject.calc == undefined) || dateObject.calc == null || dateObject.calc == false
            && dateObject.year == undefined && dateObject.day == undefined && dateObject.month == undefined
             )
            return dateObject.date;


            /* In the next processes we will need all of day , month , year to be there so we need to make sure
               they are exist
            */
            if(dateObject.day == undefined || dateObject.day == null
              || dateObject.month == undefined || dateObject.month == null
              || dateObject.year == undefined || dateObject.year == null
            ){
              console.error('[Knocks Development Team]: You need to set all of day, month, year first.');
              return moment.format();
            }

            /*Return a calculated value from a specific date
              Usage : eg : min={day : 0 , month : 2 , year : -15 , date : new Date(2010,3,1) , calc : true}
              this will return the date of 2010 1 March + 0 days + 2 months - 15 years
            */
            if((dateObject.date != undefined || dateObject.date != null ) &&
            (dateObject.calc != undefined) && dateObject.calc != null && dateObject.calc == true )
                return new Date(
                moment(dateObject.date).add(dateObject.year,'years')
                .add(dateObject.month,'months')
                .add(dateObject.day,'days').
                format('YYYY'),

                moment(dateObject.date).add(dateObject.year,'years')
                .add(dateObject.month,'months')
                .add(dateObject.day,'days').
                format('MM'),

                moment(dateObject.date).add(dateObject.year,'years')
                .add(dateObject.month,'months')
                .add(dateObject.day,'days').
                format('DD')
              );
            /*Otherwise it will calculate days, months, years from the current date
              Usage eg : max={day : 0 , month : 2 , year : -15}
              this will return the current date + 0 days + 2 months - 15 years
            */
            return new Date(
            moment().add(dateObject.year,'years')
            .add(dateObject.month,'months')
            .add(dateObject.day,'days').
            format('YYYY'),

            moment().add(dateObject.year,'years')
            .add(dateObject.month,'months')
            .add(dateObject.day,'days').
            format('MM'),

            moment().add(dateObject.year,'years')
            .add(dateObject.month,'months')
            .add(dateObject.day,'days').
            format('DD')
          ); 


        },
        getMessage0(){
          const vm = this ;
          axios.post(window.location.protocol + '//' + window.location.hostname + ':'+window.location.port+'/gettrans',
          {language : 'en', id : 17 })
          .then(function(response){
              vm.errorMessages[0] = response.data;
              vm.errorsBus[8] = { message_id : response.data , icon : 'knocks-alert-circle' , prefix : null , postfix : null};
              vm.errorsBus[0] = { message_id : response.data , icon : 'knocks-alert-circle' , prefix : null , postfix : null};
          });
        },
        getMessage1(){
          const vm = this ;
          axios.post(window.location.protocol + '//' + window.location.hostname + ':'+window.location.port+'/gettrans',
          {language : 'en', id : 25 })
          .then(function(response){
              vm.errorMessages[1] = response.data;
              vm.errorsBus[1] = { message_id : response.data , icon : 'knocks-alert-circle' , prefix : null , postfix : null};
          });
        },
        validDate(){
          return moment(this.value).format('YYYY-MM-DD') == this.value && this.value != 'Invalid date' ? true : false;
        },
        notEmpty(){
          return this.value.length == 0 || this.value == null || this.value == undefined ? false : true;
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



        }
    }
</script>

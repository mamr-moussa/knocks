<template>
  <div :id="gid+'_parent'" :class = "parent_class" :style = "parent_style">
       <button :id="gid+'_toggler'" :class = "btn_class+` knocks_collapse_toggler`" @click="togglePicker()" >
         <span>{{btn_label}}</span>
         <span :class = "[btn_icon , chevron_classes]" ></span>
         <span class = "animated jello knocks-chevron-down3 " :class = "chevron_classes" v-if="!isFired"></span>
         <span class = "animated jello knocks-chevron-up3 knocks_text_dark" :class = "chevron_classes"  v-else></span>
       </button>
      <div class = " knocks_collapse knocks_hidden"  :id="gid+'_dropdown'">
        <div v-if = "pickedIcon.length > 0 && show_selections" class = "knocks_fixed_top">
          <div class="chip valign-wrapper animated slideInUp"  v-for="(picon,index) in pickedIcon">
             <span  :class = " 'knocks_text_ms knocks_text_dark_active knocks-' + picon.class" ></span>
             <span  @click = "closeIcon(picon.class,index)"class="knocks-close "></span>
           </div>
         </div>
        <!-- <input placeholder="Search .." id="px-icon_search" type="text" class="knocks_input_ps"  @input="updateValue()"  > -->
         <el-input placeholder="Please input" v-model="searchValue"  class="input-with-select">
          <el-select v-model="categorySelect" slot="prepend" placeholder="Select" style = "width : 100px !important">
            <el-option  label="All" value="" ></el-option>
            <el-option v-for = "cat in categories" :key = "cat" :label="cat" :value="cat" ></el-option>
          </el-select>
          <!-- <el-button slot="append" icon="el-icon-search"></el-button> -->
        </el-input>




        <div v-for = "catig in categories">
          <div v-if="( searchValue.length  == 0 || isMatched(catig , searchValue))" >
            <span v-if = "categorySelect == catig || categorySelect == ''"
             class = "knocks_text_dark_active">{{catig}}
            </span>
            <hr  v-if = "categorySelect == catig || categorySelect == ''" />
          </div>
          <a v-if="(isMatched(icn.label,searchValue) || searchValue.length  == 0 || isMatched(icn.category , searchValue)) && icn.category == catig && (categorySelect == '' || categorySelect == catig)"  
               v-for="icn in iconsObject"
              :class = " ` tooltipped  icon_picker_icon knocks_icon-px animated knocks_text_md rubberBand knocks-`+icn.class "
              data-position="bottom" data-delay="10" :data-tooltip="icn.label"
              @click="emitValue(icn)">
            </a>
        </div>

      </div>
     </div>
</template>
<script>
export default {
  props:{
      btn_class : {
        type : String ,
        default : ''
      } ,
      show_selections : {
        type : Boolean ,
        default : true
      },
      btn_class : {
        type : String ,
        default : ''
      },
      btn_label :{
        type : String ,
        default : ''
      },
      btn_icon : {
        type : String ,
        default : ''
      },
      gid :{
        type : String ,
        required : true
      },
      collapse_align : {
        type : String ,
        default :'right'
      },
      parent_class : {
        type : String ,
        default : ''
      },
      parent_style : {
        type : String ,
        default : ''
      },
      show_selection_header : {
        type : Boolean ,
        default : true ,
      }, 
      chevron_classes :{
        type : String , 
        default : 'knocks_text_dark'
      }

  },
  mounted(){
    const vm = this;
    $('.knocks_collapse_toggler').click(function(){
      $('.knocks_collapse').slideToggle();
      // $('.knocks_collapse').removeClass('animated slideOutUp');
      // $('.knocks_collapse').addClass('animated slideInDown');
      $('.knocks_full_wrapper').show();
    });
    $('.knocks_full_wrapper').click(function(){
      $('.knocks_collapse').slideUp();
      // $('.knocks_collapse').removeClass('animated slideInDown');
      // $('.knocks_collapse').addClass('animated slideOutUp');
      $('.knocks_full_wrapper').hide();
      vm.isFired = false;

    });
    $('.icon_picker_icon').hover(function(){
      $(this).removeClass('rubberBand');
      $(this).addClass('swing');
    });
    $('.icon_picker_icon').mouseleave(function(){
      $(this).removeClass('swing');
      $(this).addClass('rubberBand');
    });
    //Bounding Collapser
    //Button height
    var toggler = document.getElementById(vm.gid+'_toggler');
    var collapse = document.getElementById(vm.gid+'_dropdown');
    var windowWidth = $(window).innerWidth();
    var togglerHeight = toggler.offsetHeight;
    var togglerWidht = toggler.offsetWidth;
    var collapseWidth = collapse.offsetWidth;
    var togglerPosition = toggler.getBoundingClientRect();
    // $(collapse).css({'margin-left' :  - 280 + $(toggler).innerWidth() +'px' , 'margin-top' : $(toggler).innerHeight() +'px' });
    $(collapse).css({'margin-left' :  - 280 + $(toggler).innerWidth()});
    // if(vm.collapse_align == 'right' )
    // $(collapse).css({'right' :  windowWidth - togglerPosition.right +'px'});
    // if(vm.collapse_align == 'left')
    // $(collapse).css({'left' : togglerPosition.left });



  },
  computed:{

  },
  data(){
    return{
      value : '',
      isFired : false ,
      categories : [ 'Emoji' , 'Hands' , 'Brands' ,
       'Numbers' , 'Sports', 'Transport','Devices','Food',
       'Signs','Science','weather','tools'],
      pickedIcon : [] ,
      categorySelect : '' ,
      searchValue : '', 

      iconsObject : [
        //tools
       { class : "health2" , label : 'health' , category : 'tools'},
        { class : "suitcase2" , label : 'suitcase' , category : 'tools'},
        { class : "suitcase3" , label : 'suitcase' , category : 'tools'},
        { class : "suitcase4" , label : 'suitcase' , category : 'tools'},
        { class : "picture2" , label : 'picture' , category : 'tools'},
        { class : "pictures" , label : 'picture' , category : 'tools'},
        { class : "pictures2" , label : 'picture' , category : 'tools'},
        { class : "watch6" , label : 'watch' , category : 'tools'},
        { class : "thermometer" , label : 'thermometer' , category : 'tools'},
        { class : "watch7" , label : 'watch' , category : 'tools'},
        { class : "alarmclock" , label : 'alarmclock' , category : 'tools'},
        { class : "time3" , label : 'time' , category : 'tools'},
        { class : "time4" , label : 'time' , category : 'tools'},
        { class : "wallet" , label : 'wallet' , category : 'tools'},
        { class : "position" , label : 'position' , category : 'tools'},
        { class : "basket2" , label : 'basket' , category : 'tools'},
        { class : "tie" , label : 'tie' , category : 'tools'},
        { class : "graduate" , label : 'graduate' , category : 'tools'},
        { class : "3dglasses" , label : '3dglasses' , category : 'tools'},
        { class : "moneybag" , label : 'moneybag' , category : 'tools'},
        { class : "tools" , label : 'tools' , category : 'tools'},
        { class : "brush5" , label : 'brush' , category : 'tools'},
        { class : "paint" , label : 'paint' , category : 'tools'},
        { class : "equalizer" , label : 'equalizer' , category : 'tools'},
        { class : "calculator" , label : 'calculator' , category : 'tools'},
        { class : "stats2" , label : 'statstics' , category : 'tools'},
        { class : "stats3" , label : 'statstics' , category : 'tools'},
        { class : "auction" , label : 'acution' , category : 'tools'},
        { class : "hourglass2" , label : 'hourglass' , category : 'tools'},
        { class : "abacus" , label : 'abacus' , category : 'tools'},
        { class : "scissors5" , label : 'scissors' , category : 'tools'},
        { class : "dollar2" , label : 'dollar' , category : 'tools'},
        { class : "dollar3" , label : 'dollar' , category : 'tools'},
        { class : "coins" , label : 'coins' , category : 'tools'},
        { class : "safe" , label : 'safe' , category : 'tools'},
        { class : "piano" , label : 'piano' , category : 'tools'},
        { class : "barcode3" , label : 'barcode' , category : 'tools'},
        { class : "barcode4" , label : 'barcode' , category : 'tools'},
        { class : "badge" , label : 'badge' , category : 'tools'},
        { class : "bagde2" , label : 'badge' , category : 'tools'},
        { class : "ticket4" , label : 'ticket' , category : 'tools'},
        { class : "ticket5" , label : 'ticket' , category : 'tools'},
        { class : "ticket6" , label : 'ticket' , category : 'tools'},
        { class : "cone2" , label : 'cone' , category : 'tools'},
        { class : "shipping" , label : 'shipping' , category : 'tools'},
        { class : "anchor6" , label : 'anchor' , category : 'tools'},
        { class : "magnet3" , label : 'magnet' , category : 'tools'},
        { class : "bulb" , label : 'bulb' , category : 'tools'},
        { class : "stack" , label : 'stack' , category : 'tools'},
        { class : "shower" , label : 'shower' , category : 'tools'},
        //emojis
        { class : "flashed-face" , label : 'flashed' , category : 'Emoji'},
        { class : "flashed-face2" , label : 'flashed' , category : 'Emoji'},
        { class : "flashed-face3" , label : 'flashed' , category : 'Emoji'},
        { class : "flashed-face4" , label : 'flashed' , category : 'Emoji'},
        { class : "flashed-face-glasses" , label : 'flashed' , category : 'Emoji'},
        { class : "flashed-face-glasses2" , label : 'flashed' , category : 'Emoji'},
        { class : "face-missing-moth" , label : 'missing' , category : 'Emoji'},
        { class : "face-missing-moth2" , label : 'missing' , category : 'Emoji'},
        { class : "neutral-face" , label : 'neutral' , category : 'Emoji'},
        { class : "neutral-face2" , label : 'neutral' , category : 'Emoji'},
        { class : "sad-face" , label : 'sad' , category : 'Emoji'},
        { class : "sad-face2" , label : 'sad' , category : 'Emoji'},
        { class : "face-open-mouth" , label : 'open mouth' , category : 'Emoji'},
        { class : "face-open-mouth2" , label : 'open mouth' , category : 'Emoji'},
        { class : "face-open-mouth3" , label : 'open mouth' , category : 'Emoji'},
        { class : "face-open-mouth4" , label : 'open mouth' , category : 'Emoji'},
        { class : "winking-face" , label : 'winking' , category : 'Emoji'},
        { class : "winking-face2" , label : 'winking' , category : 'Emoji'},
        { class : "laughing-face" , label : 'laughing' , category : 'Emoji'},
        { class : "laughing-face2" , label : 'laughing' , category : 'Emoji'},
        { class : "laughing-face3" , label : 'laughing' , category : 'Emoji'},
        { class : "laughing-face4" , label : 'laughing' , category : 'Emoji'},
        { class : "smirking-face" , label : 'smirking' , category : 'Emoji'},
        { class : "smirking-face2" , label : 'smirking' , category : 'Emoji'},
        { class : "stubborn-face" , label : 'stubborn' , category : 'Emoji'},
        { class : "stubborn-face2" , label : 'stubborn' , category : 'Emoji'},
        { class : "neutral-face3" , label : 'neutral' , category : 'Emoji'},
        { class : "neutral-face4" , label : 'neutral' , category : 'Emoji'},
        { class : "sad-face3" , label : 'sad' , category : 'Emoji'},
        { class : "sad-face4" , label : 'sad' , category : 'Emoji'},
        { class : "smiling-face3" , label : 'smiling' , category : 'Emoji'},
        { class : "smiling-face4" , label : 'smiling' , category : 'Emoji'},
        { class : "smiling-face-eyebrows" , label : 'smiling' , category : 'Emoji'},
        { class : "smiling-face-eyebrows2" , label : 'smiling' , category : 'Emoji'},
        { class : "grinning-face-eyebrows" , label : 'grinning' , category : 'Emoji'},
        { class : "grinning-face-eyebrows2" , label : 'grinning' , category : 'Emoji'},
        { class : "sad-face-eyebrows" , label : 'sad' , category : 'Emoji'},
        { class : "sad-face-eyebrows2" , label : 'sad' , category : 'Emoji'},
        { class : "angry-face" , label : 'angry' , category : 'Emoji'},
        { class : "angry-face2" , label : 'angry' , category : 'Emoji'},
        { class : "worried-face" , label : 'worried' , category : 'Emoji'},
        { class : "worried-face2" , label : 'worried' , category : 'Emoji'},
        { class : "winking-face3" , label : 'winking' , category : 'Emoji'},
        { class : "winking-face4" , label : 'winking' , category : 'Emoji'},
        { class : "angry-face-eyebrows" , label : 'angry' , category : 'Emoji'},
        { class : "angry-face-eyebrows2" , label : 'angry' , category : 'Emoji'},
        { class : "grinning-face" , label : 'grinning' , category : 'Emoji'},
        { class : "grinning-face2" , label : 'grinning' , category : 'Emoji'},
        { class : "sad-face5" , label : 'sad' , category : 'Emoji'},
        { class : "sad-face6" , label : 'sad' , category : 'Emoji'},
        { class : "grinning-face-eyebrows3" , label : 'grinning' , category : 'Emoji'},
        { class : "grinning-face-eyebrows4" , label : 'grinning' , category : 'Emoji'},
        { class : "fake-grinning-face-eyebrows" , label : 'fake' , category : 'Emoji'},
        { class : "fake-grinning-face-eyebrows2" , label : 'fake' , category : 'Emoji'},
        { class : "worried-face-eyebrows" , label : 'worried' , category : 'Emoji'},
        { class : "face-stuck-out-tongue" , label : 'stuck tongue' , category : 'Emoji'},
        { class : "face-stuck-out-tongue3" , label : 'stuck tongue' , category : 'Emoji'},
        { class : "face-stuck-out-tongue2" , label : 'stuck tongue' , category : 'Emoji'},
        { class : "face-stuck-out-tongue4" , label : 'stuck tongue' , category : 'Emoji'},
        { class : "kissing-face" , label : 'kissing' , category : 'Emoji'},
        { class : "kissing-face2" , label : 'kissing' , category : 'Emoji'},
        { class : "grinning-face-teeth" , label : 'grinning' , category : 'Emoji'},
        { class : "grinning-face-teeth2" , label : 'grinning' , category : 'Emoji'},
        { class : "angry-face-teeth" , label : 'angry' , category : 'Emoji'},
        { class : "worried-face-teeth2" , label : 'worried' , category : 'Emoji'},
        { class : "angry-face-teeth2" , label : 'angry' , category : 'Emoji'},
        { class : "grinning-face-teeth3" , label : 'grinning' , category : 'Emoji'},
        { class : "grinning-face-teeth4" , label : 'grinning' , category : 'Emoji'},
        { class : "face-open-mouth-eyebrows2" , label : 'open mouth' , category : 'Emoji'},
        { class : "face-open-mouth-eyebrows3" , label : 'open mouth' , category : 'Emoji'},
        { class : "face-open-mouth-eyebrows4" , label : 'open mouth' , category : 'Emoji'},
        { class : "angry-face-open-mouth-eyebrows" , label : 'angry' , category : 'Emoji'},
        { class : "angry-face-open-mouth-eyebrows" , label : 'angry' , category : 'Emoji'},
        { class : "unamused-face-tightly-closed-eyes" , label : 'unamused' , category : 'Emoji'},
        { class : "unamused-face-tightly-closed-eyes2" , label : 'unamused' , category : 'Emoji'},
        { class : "sad-face--tightly-closed-eyes" , label : 'sad' , category : 'Emoji'},
        { class : "sad-face--tightly-closed-eyes2" , label : 'sad' , category : 'Emoji'},
        { class : "kissing-face3" , label : 'kissing' , category : 'Emoji'},
        { class : "kissing-face4" , label : 'kissing' , category : 'Emoji'},
        { class : "face-closed-meyes" , label : 'closed eyes' , category : 'Emoji'},
        { class : "face-closed-meyes2" , label : 'closed eyes' , category : 'Emoji'},
        { class : "amused-face" , label : 'amused' , category : 'Emoji'},
        { class : "amused-face2" , label : 'amused' , category : 'Emoji'},
        { class : "amused-face-closed-eyes" , label : 'amused' , category : 'Emoji'},
        { class : "amused-face-closed-eyes2" , label : 'amused' , category : 'Emoji'},
        { class : "amused-face-closed-eyes3" , label : 'amused' , category : 'Emoji'},
        { class : "amused-face-closed-eyes4" , label : 'amused' , category : 'Emoji'},
        { class : "face-closed-eyes-open-mouth" , label : 'closed eyes' , category : 'Emoji'},
        { class : "face-closed-eyes-open-mouth2" , label : 'closed eyes' , category : 'Emoji'},
        { class : "face-closed-eyes-open-mouth3" , label : 'closed eyes' , category : 'Emoji'},
        { class : "face-closed-eyes-open-mouth4" , label : 'closed eyes' , category : 'Emoji'},
        { class : "face-closed-eyes-open-mouth5" , label : 'closed eyes' , category : 'Emoji'},
        { class : "face-closed-eyes-open-mouth6" , label : 'closed eyes' , category : 'Emoji'},
        { class : "laughing-face5" , label : 'laughing' , category : 'Emoji'},
        { class : "laughing-face6" , label : 'laughing' , category : 'Emoji'},
        { class : "smiling-face5" , label : 'smiling' , category : 'Emoji'},
        { class : "smiling-face6" , label : 'smiling' , category : 'Emoji'},
        { class : "grinning-face3" , label : 'grinning' , category : 'Emoji'},
        { class : "grinning-face4" , label : 'grinning' , category : 'Emoji'},
        { class : "sad-face7" , label : 'sad' , category : 'Emoji'},
        { class : "sad-face8" , label : 'sad' , category : 'Emoji'},
        { class : "sad-face9" , label : 'sad' , category : 'Emoji'},
        { class : "sad-face10" , label : 'sad' , category : 'Emoji'},
        { class : "sad-face11" , label : 'sad' , category : 'Emoji'},
        { class : "sad-face12" , label : 'sad' , category : 'Emoji'},
        { class : "sad-face-closed-eyes" , label : 'sad' , category : 'Emoji'},
        { class : "sad-face-closed-eyes2" , label : 'sad' , category : 'Emoji'},
        { class : "smiling-face7" , label : 'smiling' , category : 'Emoji'},
        { class : "smiling-face8" , label : 'smiling' , category : 'Emoji'},
        { class : "astonished-face" , label : 'astonished' , category : 'Emoji'},
        { class : "astonished-face2" , label : 'astonished' , category : 'Emoji'},
        { class : "astonished-face3" , label : 'astonished' , category : 'Emoji'},
        { class : "astonished-face4" , label : 'astonished' , category : 'Emoji'},
        { class : "face-moustache" , label : 'moustache' , category : 'Emoji'},
        { class : "face-moustache2" , label : 'moustache' , category : 'Emoji'},
        { class : "face-moustache3" , label : 'moustache' , category : 'Emoji'},
        { class : "face-moustache4" , label : 'moustache' , category : 'Emoji'},
        { class : "face-glasses" , label : 'glasses' , category : 'Emoji'},
        { class : "face-glasses2" , label : 'glasses' , category : 'Emoji'},
        { class : "face-sunglasses" , label : 'sun glasses' , category : 'Emoji'},
        { class : "face-sunglasses2" , label : 'sunglasses' , category : 'Emoji'},
        { class : "smirking-face-sunglasses" , label : 'smirking' , category : 'Emoji'},
        { class : "smirking-face-sunglasses2" , label : 'smirking' , category : 'Emoji'},
        { class : "marvin" , label : 'marvin' , category : 'Emoji'},
        { class : "pacman2" , label : 'pacman' , category : 'Emoji'},
        { class : "transformers" , label : 'transformers' , category : 'Emoji'},
        { class : "skeletor" , label : 'skeletor' , category : 'Emoji'},
        { class : "spaceinvaders" , label : 'space invaders' , category : 'Emoji'},
        { class : "pig" , label : 'pig' , category : 'Emoji'},
        { class : "music5" , label : 'music' , category : 'Emoji'},
        { class : "heart5" , label : 'heart' , category : 'Emoji'},
        { class : "lockedheart" , label : 'heart' , category : 'Emoji'},
        { class : "heart9" , label : 'heart' , category : 'Emoji'},
        { class : "heart10" , label : 'heart' , category : 'Emoji'},
        { class : "heart11" , label : 'heart' , category : 'Emoji'},
        { class : "star12" , label : 'star' , category : 'Emoji'},
        { class : "trash5" , label : 'trash' , category : 'Emoji'},
        { class : "key11" , label : 'key' , category : 'Emoji'},
        { class : "search12" , label : 'search' , category : 'Emoji'},
        { class : "like" , label : 'like' , category : 'Emoji'},
        //Hands
        { class : "thumbsup2" , label : 'thumb up' , category : 'Hands'},
        { class : "thumbsdown2" , label : 'thumb down' , category : 'Hands'},
        { class : "pointer2" , label : 'pointer' , category : 'Hands'},
        { class : "pointer3" , label : 'pointer' , category : 'Hands'},
        { class : "pointer4" , label : 'pointer' , category : 'Hands'},
        { class : "pointer5" , label : 'pointer' , category : 'Hands'},
        { class : "thumb-up" , label : 'thumb up' , category : 'Hands'},
        { class : "thumb-up2" , label : 'thumb up' , category : 'Hands'},
        { class : "thumb-down" , label : 'thumb down' , category : 'Hands'},
        { class : "thumb-down2" , label : 'thumb down' , category : 'Hands'},
        { class : "thumb-down3" , label : 'thumb down' , category : 'Hands'},
        { class : "thumb-down4" , label : 'thumb down' , category : 'Hands'},
        { class : "two-fingers-swipe-left" , label : 'swipe left' , category : 'Hands'},
        { class : "two-fingers-swipe-left2" , label : 'swipe left' , category : 'Hands'},
        { class : "two-fingers-swipe-right" , label : 'swipe right' , category : 'Hands'},
        { class : "two-fingers-swipe-right2" , label : 'swipe right' , category : 'Hands'},
        { class : "two-fingers-swipe-up" , label : 'swipe up' , category : 'Hands'},
        { class : "two-fingers-swipe-up2" , label : 'swipe up' , category : 'Hands'},
        { class : "two-fingers-swipe-down" , label : 'swipe down' , category : 'Hands'},
        { class : "two-fingers-swipe-down2" , label : 'swipe down' , category : 'Hands'},
        { class : "two-fingers" , label : 'finger' , category : 'Hands'},
        { class : "two-finger2" , label : 'finger' , category : 'Hands'},
        { class : "three-fingers-double-tap" , label : 'tap' , category : 'Hands'},
        { class : "three-fingers-double-tap2" , label : 'tap' , category : 'Hands'},
        { class : "two-fingers-resize-out" , label : 'resize out' , category : 'Hands'},
        { class : "two-fingers-resize-out2" , label : 'resize out' , category : 'Hands'},
        { class : "two-fingers-resize-in" , label : 'resize in' , category : 'Hands'},
        { class : "two-fingers-resize-in2" , label : 'resize in' , category : 'Hands'},
        { class : "two-fingers-rotate" , label : 'rotate' , category : 'Hands'},
        { class : "two-fingers-rotate2" , label : 'rotate' , category : 'Hands'},
        { class : "one-finger-swipe-left" , label : 'swipe left' , category : 'Hands'},
        { class : "one-finger-swipe-left2" , label : 'swipe left' , category : 'Hands'},
        { class : "one-finger-swipe-right" , label : 'swipe right' , category : 'Hands'},
        { class : "one-finger-swipe-right2" , label : 'swipe right' , category : 'Hands'},
        { class : "middle-finger" , label : 'middle finger' , category : 'Hands'},
        { class : "middle-finger2" , label : 'middle finger' , category : 'Hands'},
        { class : "rock-n-roll" , label : 'rock n roll ' , category : 'Hands'},
        { class : "rock-n-roll2" , label : 'rock n roll' , category : 'Hands'},
        //Signs

        { class : "arrow-up8" , label : 'up' , category : 'Signs'},
        { class : "arrow-down8" , label : 'down' , category : 'Signs'},
        { class : "arrow-right8" , label : 'right' , category : 'Signs'},
        { class : "arrow-left8" , label : 'left' , category : 'Signs'},
        { class : "arrow-top-right" , label : 'right' , category : 'Signs'},
        { class : "arrow-top-left" , label : 'left' , category : 'Signs'},
        { class : "arrow-bottom-right" , label : 'right' , category : 'Signs'},
        { class : "arrow-bottom-left" , label : 'left' , category : 'Signs'},
        { class : "refresh8" , label : 'refresh' , category : 'Signs'},
        { class : "contract" , label : 'contract' , category : 'Signs'},
        { class : "enlarge4" , label : 'enlarge' , category : 'Signs'},
        { class : "checkmark6" , label : 'checkmark' , category : 'Signs'},
        { class : "checkmark7" , label : 'checkmark' , category : 'Signs'},
        { class : "checkmark8" , label : 'checkmark' , category : 'Signs'},
        { class : "cancel5" , label : 'cancel' , category : 'Signs'},
        { class : "cancel6" , label : 'cancel' , category : 'Signs'},
        { class : "cancel7" , label : 'cancel' , category : 'Signs'},
        { class : "plus7" , label : 'plus' , category : 'Signs'},
        { class : "plus8" , label : 'plus' , category : 'Signs'},
        { class : "minus7" , label : 'minus' , category : 'Signs'},
        { class : "minus8" , label : 'minus' , category : 'Signs'},
        { class : "notice" , label : 'notice' , category : 'Signs'},
        { class : "notice2" , label : 'notice' , category : 'Signs'},
        { class : "warning9" , label : 'warning' , category : 'Signs'},
        { class : "davidstar" , label : 'davidstar' , category : 'Signs'},
        { class : "cross3" , label : 'cross' , category : 'Signs'},
        { class : "moonandstar" , label : 'moonandstar' , category : 'Signs'},
        { class : "yingyang" , label : 'yingyang' , category : 'Signs'},



       //weather
       { class : "lightning6" , label : 'lightning' , category : 'weather'},
       { class : "lightning7" , label : 'lightning' , category : 'weather'},
       { class : "lightning8" , label : 'lightning' , category : 'weather'},
       { class : "lightning4" , label : 'lightning' , category : 'weather'},
       { class : "lightning5" , label : 'lightning' , category : 'weather'},
       { class : "wind-turbine" , label : 'turbine' , category : 'weather'},
       { class : "wind-turbine2" , label : 'turbine' , category : 'weather'},
       { class : "snowflake2" , label : 'snow flake' , category : 'weather'},
       { class : "snowflake3" , label : 'snow flake' , category : 'weather'},
       { class : "snow" , label : 'snow' , category : 'weather'},
       { class : "rain3" , label : 'rain' , category : 'weather'},
       { class : "cloudy3" , label : 'cloudy' , category : 'weather'},
       { class : "cloudy4" , label : 'cloudy' , category : 'weather'},
       { class : "cloudy5" , label : 'cloudy' , category : 'weather'},
       { class : "cloudy6" , label : 'cloudy' , category : 'weather'},
       { class : "moon9" , label : 'moon' , category : 'weather'},
       { class : "sun9" , label : 'sun' , category : 'weather'},
       { class : "cloud7" , label : 'cloud' , category : 'weather'},
       { class : "cloud8" , label : 'cloud' , category : 'weather'},
       { class : "rainy3" , label : 'rainy' , category : 'weather'},
       { class : "rainy4" , label : 'rainy' , category : 'weather'},
       { class : "windy4" , label : 'windy' , category : 'weather'},
       { class : "windy5" , label : 'windy' , category : 'weather'},
       { class : "snowy4" , label : 'snowy' , category : 'weather'},
       { class : "snowy5" , label : 'snowy' , category : 'weather'},
       { class : "weather5" , label : 'weather' , category : 'weather'},
       { class : "Celsius" , label : 'celsius' , category : 'weather'},
       { class : "Fahrenheit" , label : 'fahrenheit' , category : 'weather'},

       //Sports
       {class: "football5" , label : 'american football' , category : 'Sports'},
       {class: "eightball" , label : '8ball' , category : 'Sports'},
       {class: "bowling" , label : 'bowling' , category : 'Sports'},
       {class: "bowling-ball" , label : 'bowling' , category : 'Sports'},
       {class: "bowlingpin" , label : 'bowling' , category : 'Sports'},
       {class: "basketball3" , label : 'basketball' , category : 'Sports'},
       {class: "soccer" , label : 'soccer' , category : 'Sports'},
       {class: "tennis-ball" , label : 'tennis' , category : 'Sports'},
       {class: "billiard-ball2" , label : 'billiard' , category : 'Sports'},
       {class: "soccer-ball" , label : 'soccer' , category : 'Sports'},
       {class: "baseball-set2" , label : 'baseball' , category : 'Sports'},
       {class: "trophy-one2" , label : 'trophy' , category : 'Sports'},
       {class: "trophy8" , label : 'trophy' , category : 'Sports'},
       {class: "trophy9" , label : 'trophy' , category : 'Sports'},


       //Devices
       {class: "phone14" , label : 'phone' , category : 'Devices'},
       {class: "phone15" , label : 'phone' , category : 'Devices'},
       {class: "phone16" , label : 'phone' , category : 'Devices'},
       {class: "mobile6" , label : 'mobile' , category : 'Devices'},
       {class: "ipod3" , label : 'ipod3' , category : 'Devices'},
       {class: "monitor4" , label : 'monitor' , category : 'Devices'},
       {class: "laptop7" , label : 'laptop' , category : 'Devices'},
       {class: "modem" , label : 'modem' , category : 'Devices'},
       {class: "speaker3" , label : 'speaker' , category : 'Devices'},
       {class: "hdd" , label : 'hdd' , category : 'Devices'},
       {class: "server2" , label : 'server' , category : 'Devices'},
       {class: "keyboard7" , label : 'keyboard' , category : 'Devices'},
       {class: "mouse5" , label : 'mouse' , category : 'Devices'},
       {class: "cd2" , label : 'cd' , category : 'Devices'},
       {class: "floppy2" , label : 'floppy' , category : 'Devices'},
       {class: "hardware" , label : 'hardware' , category : 'Devices'},
       {class: "usb5" , label : 'usb' , category : 'Devices'},
       {class: "cord2" , label : 'cord' , category : 'Devices'},
       {class: "socket2" , label : 'socket' , category : 'Devices'},
       {class: "socket3" , label : 'socket' , category : 'Devices'},
       {class: "printer11" , label : 'printer' , category : 'Devices'},
       {class: "camera17" , label : 'camera' , category : 'Devices'},
       {class: "film9" , label : 'film' , category : 'Devices'},
       {class: "uniF8F4" , label : 'uniF84' , category : 'Devices'},
       {class: "camera18" , label : 'camera' , category : 'Devices'},
       {class: "movie2" , label : 'movie' , category : 'Devices'},
       {class: "tv7" , label : 'tv' , category : 'Devices'},
       {class: "camera19" , label : 'camera' , category : 'Devices'},
       {class: "camera20" , label : 'camera' , category : 'Devices'},
       {class: "microphone9" , label : 'microphone' , category : 'Devices'},
       {class: "radio6" , label : 'radio' , category : 'Devices'},
       {class: "cassette2" , label : 'cassette' , category : 'Devices'},
       {class: "headphone" , label : 'headphone' , category : 'Devices'},
       {class: "broadcast" , label : 'broadcast' , category : 'Devices'},
       {class: "broadcast3" , label : 'broadcast' , category : 'Devices'},
       {class: "calculator7" , label : 'calculator' , category : 'Devices'},
       {class: "gamepad3" , label : 'gamepad' , category : 'Devices'},
       {class: "gamepad4" , label : 'gamepad' , category : 'Devices'},


       //Brands
       { class : "brand6" , label : 'amazon' , category : 'Brands'},
       { class : "brand8" , label : 'android' , category : 'Brands'},
       { class : "brand9" , label : 'apple' , category : 'Brands'},
       { class : "brand14" , label : 'jack wolfskin' , category : 'Brands'},
       { class : "brand71" , label : 'facebook' , category : 'Brands'},
       { class : "brand60" , label : 'drpbox' , category : 'Brands'},
       { class : "brand87" , label : 'microsoft office' , category : 'Brands'},
       { class : "brand88" , label : 'gmail' , category : 'Brands'},
       { class : "brand96" , label : 'google+' , category : 'Brands'},
       { class : "brand100" , label : '' , category : 'Brands'},
       { class : "brand91" , label : 'google' , category : 'Brands'},
       { class : "brand101" , label : 'gulp' , category : 'Brands'},
       { class : "brand115" , label : 'instagram' , category : 'Brands'},
       { class : "brand277" , label : 'vimo' , category : 'Brands'},
       { class : "brand276" , label : 'viber' , category : 'Brands'},
       { class : "brand128" , label : 'mongo' , category : 'Brands'},
       { class : "brand130" , label : 'kik' , category : 'Brands'},
       { class : "brand62" , label : 'ebay' , category : 'Brands'},
       { class : "brand59" , label : '' , category : 'Brands'},
       { class : "brand107" , label : '' , category : 'Brands'},
       { class : "brand135" , label : 'laravel' , category : 'Brands'},
       { class : "brand144" , label : '' , category : 'Brands'},
       { class : "brand152" , label : 'massenger' , category : 'Brands'},
       { class : "brand171" , label : '' , category : 'Brands'},
       { class : "brand222" , label : 'skype' , category : 'Brands'},
       { class : "brand227" , label : 'snapchat' , category : 'Brands'},
       { class : "brand229" , label : 'soundcloud' , category : 'Brands'},
       { class : "brand250" , label : 'tedx' , category : 'Brands'},
       { class : "brand265" , label : 'tumblr' , category : 'Brands'},
       { class : "brand280" , label : 'visa' , category : 'Brands'},
       { class : "brand286" , label : 'microsoft' , category : 'Brands'},
       { class : "brand290" , label : 'xbox' , category : 'Brands'},
       { class : "brand297" , label : 'youtube' , category : 'Brands'},
       { class : "knocks" , label : 'Knocks' , category : 'Brands'},


       //Science
       { class : "lab5" , label : 'lab' , category : 'Science'},
       { class : "thermometer5" , label : 'thermometer' , category : 'Science'},
       { class : "thermometer6" , label : 'thermometer' , category : 'Science'},
       { class : "thermometer-low" , label : 'thermometer' , category : 'Science'},
       { class : "thermometer-low2" , label : 'thermometer' , category : 'Science'},
       { class : "thermometer-quarter2" , label : 'thermometer' , category : 'Science'},
       { class : "thermometer-half2" , label : 'thermometer' , category : 'Science'},
       { class : "thermometer-half3" , label : 'thermometer' , category : 'Science'},
       { class : "lab3" , label : 'lab' , category : 'Science'},
       { class : "radioactive" , label : 'radioactive' , category : 'Science'},
       { class : "male" , label : 'male' , category : 'Science'},
       { class : "female" , label : 'female' , category : 'Science'},
       { class : "atom3" , label : 'atom' , category : 'Science'},
       { class : "globe5" , label : 'globe' , category : 'Science'},
       { class : "globe6" , label : 'globe' , category : 'Science'},
       { class : "campus16" , label : 'campus' , category : 'Science'},


       //Numbers
       { class : "number" , label : '1' , category : 'Numbers'},
       { class : "number2" , label : '2' , category : 'Numbers'},
       { class : "number3" , label : '3' , category : 'Numbers'},
       { class : "number4" , label : '4' , category : 'Numbers'},
       { class : "number5" , label : '5' , category : 'Numbers'},
       { class : "number6" , label : '6' , category : 'Numbers'},
       { class : "number7" , label : '7' , category : 'Numbers'},
       { class : "number8" , label : '8' , category : 'Numbers'},
       { class : "number9" , label : '9' , category : 'Numbers'},
       { class : "number10" , label : '0' , category : 'Numbers'},
       { class : "number11" , label : '1' , category : 'Numbers'},
       { class : "number12" , label : '2' , category : 'Numbers'},
       { class : "number13" , label : '3' , category : 'Numbers'},
       { class : "number14" , label : '4' , category : 'Numbers'},
       { class : "number15" , label : '5' , category : 'Numbers'},
       { class : "number16" , label : '6' , category : 'Numbers'},
       { class : "number17" , label : '7' , category : 'Numbers'},
       { class : "number18" , label : '8' , category : 'Numbers'},
       { class : "number19" , label : '9' , category : 'Numbers'},
       { class : "number20" , label : '0' , category : 'Numbers'},




       //Food
       { class : "drink3" , label : 'drink' , category : 'Food'},
       { class : "drink4" , label : 'drink' , category : 'Food'},
       { class : "drink5" , label : 'drink' , category : 'Food'},
       { class : "drink6" , label : 'drink' , category : 'Food'},
       { class : "coffee5" , label : 'coffee' , category : 'Food'},
       { class : "mug3" , label : 'mug' , category : 'Food'},
       { class : "icecream" , label : 'icecream' , category : 'Food'},
       { class : "cake3" , label : 'cake' , category : 'Food'},
       { class : "cup" , label : 'cup' , category : 'Food'},
       { class : "food" , label : 'food' , category : 'Food'},


       //Transport
       { class : "car2" , label : 'car' , category : 'Transport'},
       { class : "bike" , label : 'bike' , category : 'Transport'},
       { class : "truck3" , label : 'truck' , category : 'Transport'},
       { class : "bus2" , label : 'bus' , category : 'Transport'},
       { class : "bike2" , label : 'bike' , category : 'Transport'},
       { class : "plane3" , label : 'plane' , category : 'Transport'},
       { class : "rocket3" , label : 'rocket' , category : 'Transport'},
       { class : "stop10" , label : 'stop' , category : 'Transport'},
       { class : "navigation3" , label : 'navigation' , category : 'Transport'}


      ]
    }
  },



  methods:{
    closeIcon(val,ind)
    {
      this.pickedIcon.splice(ind,1);
        this.$emit('input' , this.pickedIcon);
    },
    // updateValue(){
    //   this.value = document.getElementById('px-icon_search').value;
    // },
    emitValue(val){

      this.pickedIcon.push(val);
        this.$emit('input' , this.pickedIcon);
        this.notifi({ icon : val.class , name : val.label});
        //Materialize.toast(' You have added  <span class = "knocks-'+val.class+'"></span>  '+val.label, 3000, 'rounded');


    },
    isMatched(userInput, matchWith) {
             var result = [];
             for (var i = 0; i <= userInput.length; i++) {
               result.push([]);
               for (var j = 0; j <= matchWith.length; j++) {
                 var currValue = 0;
                 if (i == 0 || j == 0) {
                   currValue = 0;
                 } else if (userInput.charAt(i - 1) == matchWith.charAt(j - 1)) {
                   currValue = result[i - 1][j - 1] + 1;
                 } else {
                   currValue = Math.max(result[i][j - 1], result[i - 1][j]);
                 }
                 result[i].push(currValue);
               }
             }

             var i = userInput.length;
             var j = matchWith.length;

             var s3 = '';
             while (result[i][j] > 0) {
               if (userInput.charAt(i - 1) == matchWith.charAt(j - 1) && (result[i - 1][j - 1] + 1 == result[i][j])) {
                 s3 = userInput.charAt(i - 1) + s3;
                 i = i - 1;
                 j = j - 1;
               } else if (result[i - 1][j] > result[i][j - 1])
                 i = i - 1;
               else
                 j = j - 1;
             }
             return currValue >= 2*(userInput.length)/3 ? true : false;
           },
           togglePicker(){
             if(this.isFired){
               this.isFired = false;
               $('.knocks_full_wrapper').hide();
             }else {
               this.isFired = true;
               $('.knocks_full_wrapper').show();
             }
           },
           notifi(object) {
            
         const h = this.$createElement;
        this.$message({
          showClose: true,
          message: h('p', null, [
            h('span', { class : 'knocks_text_ms knocks_text_dark'}, 'You Have Added '+object.name +' '),
            h('i', {  class : ' knocks-'+object.icon+' knocks_icon knocks_text_md knocks_text_dark' })
          ])
        });
      
      }
    
    


  }



}
</script>
<style lang="scss" scoped>

</style>

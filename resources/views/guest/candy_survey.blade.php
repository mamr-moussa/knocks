@extends('layouts.survey')
@section('externals')

<audio id="salma" controls autoplay class = "knocks_hidden">
  <source src="{{asset('snaps/survey/bensound-buddy.mp3')}}" type="audio/mpeg">
</audio>
<script>
  var vid = document.getElementById("salma");
    vid.volume = 0.05;
</script>
<style >
  body{
    background-image: url("{{asset('snaps/cupcake.png')}}");
      background-repeat: round;
    }
    footer{
          z-index: 100000000 !important;
    }
    

.lola {
  text-transform: uppercase;  
}

.balloon { 
  width: 738px;
  margin: 0 auto;
  padding-top: 30px;
  position: relative;
}
.balloon > div:before {
  position:absolute;
  bottom:-11px;
  left: 52px;  
  content:"▲";
  font-size:1em;
}
.balloon > div {
   width:104px;
  height:140px; 
  background: #691a40;
  border-radius:0;
  border-radius:80% 80% 80% 80%;
  margin: 0 auto;
  position: absolute;
  padding:10px;
  
  -webkit-transform-origin: bottom center; 
}
.balloon > div:nth-child(1){
  background: #691a40;
  left: 0; 
  color :  #691a40;
  -webkit-animation:balloon1 6s ease-in-out infinite;
  -moz-animation:balloon1 6s ease-in-out infinite;
  -o-animation:balloon1 6s ease-in-out infinite;
  animation:balloon1 6s ease-in-out infinite;
 

}
.balloon > div:nth-child(2){
  background: #00b0ff;
  left: 120px; 
 color :  #00b0ff;
   -webkit-animation:balloon2 6s ease-in-out infinite;
  -moz-animation:balloon2 6s ease-in-out infinite;
  -o-animation:balloon2 6s ease-in-out infinite;
  animation:balloon2 6s ease-in-out infinite;


}
.balloon > div:nth-child(3){
  background: #e53935;
  left: 240px; 
color :  #e53935;
   -webkit-animation:balloon4 6s ease-in-out infinite;
  -moz-animation:balloon4 6s ease-in-out infinite;
  -o-animation:balloon4 6s ease-in-out infinite;
  animation:balloon4 6s ease-in-out infinite;
 

}
.balloon > div:nth-child(4){
  background: #66bb6a;
  left: 360px; 
color :  #66bb6a;
   -webkit-animation:balloon1 5s ease-in-out infinite;
  -moz-animation:balloon1 5s ease-in-out infinite;
  -o-animation:balloon1 5s ease-in-out infinite;
  animation:balloon1 5s ease-in-out infinite;
 

}
.balloon > div:nth-child(5){
  background: #ff8a65;
  left: 480px; 
color :  #ff8a65;
   -webkit-animation:balloon3 5s ease-in-out infinite;
  -moz-animation:balloon3 5s ease-in-out infinite;
  -o-animation:balloon3 5s ease-in-out infinite;
  animation:balloon3 5s ease-in-out infinite;


}
.balloon > div:nth-child(6){
  background: #9575cd;
  left: 600px; 
color :  #9575cd;
  -webkit-animation:balloon2 3s ease-in-out infinite;
  -moz-animation:balloon2 3s ease-in-out infinite;
  -o-animation:balloon2 3s ease-in-out infinite;
  animation:balloon2 3s ease-in-out infinite;


}
.balloon > div:before {
  
  position:absolute;
  bottom:-11px;
  left: 52px;  
  font-size:1em;
}

.lola {
  font-size: 4.8em;
  color: #fff5d1;
  position: relative;
  top: 30px;
  left: 50%;
  margin-left: -27px; 
} 
.lolaa{
font-size: 4.8em;
  color: #fff5d1;
  position: relative;
  top: 30px;
  left: 50%;
  margin-left: -27px;
}
.el-rate{
  height: auto !important;
  line-height: unset ;
}
.el-rate__item {
    font-size: unset;
    vertical-align: middle;
}
.el-rate__text {
    font-size: 18px !important;
}
/*BALLOON 1 4*/
@-webkit-keyframes balloon1 {
  0%,100%{ -webkit-transform:translateY(0) rotate(-6deg);}
  50%{ -webkit-transform:translateY(-20px) rotate(8deg); }
}
@-moz-keyframes balloon1 {
  0%,100%{ -moz-transform:translateY(0) rotate(-6deg);}
  50%{ -moz-transform:translateY(-20px) rotate(8deg); }
}
@-o-keyframes balloon1 {
  0%,100%{ -o-transform:translateY(0) rotate(-6deg);}
  50%{ -o-transform:translateY(-20px) rotate(8deg); }
}
@keyframes balloon1 {
  0%,100%{ transform:translateY(0) rotate(-6deg);}
  50%{ transform:translateY(-20px) rotate(8deg); }
}

/* BAllOON 2 5*/
@-webkit-keyframes balloon2 {
  0%,100%{ -webkit-transform:translateY(0) rotate(6eg);}
  50%{ -webkit-transform:translateY(-30px) rotate(-8deg); }
}
@-moz-keyframes balloon2 {
  0%,100%{ -moz-transform:translateY(0) rotate(6deg);}
  50%{ -moz-transform:translateY(-30px) rotate(-8deg); }
}
@-o-keyframes balloon2 {
  0%,100%{ -o-transform:translateY(0) rotate(6deg);}
  50%{ -o-transform:translateY(-30px) rotate(-8deg); }
}
@keyframes balloon2 {
  0%,100%{ transform:translateY(0) rotate(6deg);}
  50%{ transform:translateY(-30px) rotate(-8deg); }
}


/* BAllOON 0*/
@-webkit-keyframes balloon3 {
  0%,100%{ -webkit-transform:translate(0, -10px) rotate(6eg);}
  50%{ -webkit-transform:translate(-20px, 30px) rotate(-8deg); }
}
@-moz-keyframes balloon3 {
 0%,100%{ -moz-transform:translate(0, -10px) rotate(6eg);}
  50%{ -moz-transform:translate(-20px, 30px) rotate(-8deg); }
}
@-o-keyframes balloon3 {
 0%,100%{ -o-transform:translate(0, -10px) rotate(6eg);}
  50%{ -o-transform:translate(-20px, 30px) rotate(-8deg); }
}
@keyframes balloon3 {
 0%,100%{ transform:translate(0, -10px) rotate(6eg);}
  50%{ transform:translate(-20px, 30px) rotate(-8deg); }
}

/* BAllOON 3*/
@-webkit-keyframes balloon4 {
  0%,100%{ -webkit-transform:translate(10px, -10px) rotate(-8eg);}
  50%{ -webkit-transform:translate(-15px, 20px) rotate(10deg); }
} 
@-moz-keyframes balloon4 {
  0%,100%{ -moz-transform:translate(10px, -10px) rotate(-8eg);}
  50%{ -moz-transform:translate(-15px, 10px) rotate(10deg); }
}
@-o-keyframes balloon4 {
  0%,100%{ -o-transform:translate(10px, -10px) rotate(-8eg);}
  50%{ -o-transform:translate(-15px, 10px) rotate(10deg); }
}
@keyframes balloon4 {
  0%,100%{ transform:translate(10px, -10px) rotate(-8eg);}
  50%{ transform:translate(-15px, 10px) rotate(10deg); }
}

.flash {
   animation-name: flash;
    animation-duration: 0.5s;
    animation-timing-function: linear;
    animation-iteration-count: infinite;
    animation-direction: alternate;
    animation-play-state: running;
}

@keyframes flash {
    from {color: #039be5;}
    to {color: #4caf50;}
}
</style>
<meta name="session-type" content="dev">
<title>Knocks Candy Survey</title>
@endsection
@section('content')



<div class = "knocks_fair_bounds" style="margin-top: 70px">

  <transition enter-active-class = "animated bounceInUp" leave-active-class = "animated bounceOutClass">
    <div v-if = "stageNumber != 5">
      
  <div class="row animated bounceInUp">
       <div class="balloon hide-on-med-and-down">
    <div><span class="lolaa"><strong>K</strong></span></div>
    <div><span class="lola">n</span></div>
    <div><span class="lola">o</span></div>
    <div><span class="lola">c</span></div>
    <div><span class="lola">k</span></div>
    <div><span class="lola">s</span></div>
  </div>

  <h1 class="knocks_text_dark left" style="padding-top:150px;"><strong>Knocks</strong> <span class = "knocks-chevron-thin-right knocks_text_sm"></span> Candy Survey</h1>
</div>

  <transition enter-active-class = "animated zoomIn" leave-active-class = "animated zoomOut">
    <div class = "row">
        <hr class="uk-divider-icon">
        <div class="row">
            <h3 class = "knocks_text_dark nocks_text_dark">
           1. Do you have a Social Networking account ?
           <knocksplayer
          class="col right" 
           gid="q3player" 
           not_webm
            source = "{{asset('snaps/survey/Knocks-Q3.mp3')}}"
           :duration = "14000"
           :show_volume="false" 
           :show_options="false" 
           :show_runtime="false" 
           :show_timer="false" 
           :hide_sniper="true" 
           main_container="col"
           ></knocksplayer>
        </h3>
        </div>
        <div class = "col">
            <p>
              <input name="qy" v-model="q1" value = "yes" type="radio" id="q1a1" />
              <label class="knocks_text_dark_active" for="q1a1">Yes</label>
            </p>
            <p>
              <input name="qy" v-model="q1"  value = "no" type="radio" id="q1a2" />
              <label class="knocks_text_dark_active" for="q1a2">No</label>
            </p>
        </div>
    </div>
</transition>
<transition enter-active-class = "animated zoomIn" leave-active-class = "animated zoomOut">
    <div class = "row col" v-if = "q1 == 'yes'">
        <div class="row">
            <span class = "knocks_text_dark knocks_text_ms">
            Please select all the social networks for which you have created a personal profile.
        </span>
        </div>
        <div class = "row">
            <p>
              <input name="q6" v-model = "q6" value = "0" type="checkbox" id="q6a1" />
              <label class="knocks_text_dark_active" for="q6a1">
                <span class = "knocks-brand71"></span>  Facebook
              </label>
            </p>
            <p>
              <input name="q6" v-model = "q6" value = "1" type="checkbox" id="q6a2" />
              <label class="knocks_text_dark_active" for="q6a2">
                <span class = "knocks-brand268"></span>  Twitter
              </label>
            </p>
              <p>
              <input name="q6" v-model = "q6" value = "2" type="checkbox" id="q6a3" />
              <label class="knocks_text_dark_active" for="q6a3">
                <span class = "knocks-brand297"></span>  YouTube
              </label>
            </p>
             <p>
              <input name="q6" v-model = "q6" value = "3" type="checkbox" id="q6a4" />
              <label class="knocks_text_dark_active" for="q6a4">
                <span class = "knocks-brand115"></span>  Instagram
              </label>
            </p>
             <p>
              <input name="q6" v-model = "q6" value = "4" type="checkbox" id="q6a5" />
              <label class="knocks_text_dark_active" for="q6a5">
                <span class = "knocks-brand284"></span>  WhatsApp
              </label>
            </p>
              <p>
              <input name="q6" v-model = "q6" value = "5" type="checkbox" id="q6a6" />
              <label class="knocks_text_dark_active" for="q6a6">
                <span class = "knocks-brand227 " style="border-radius: 3px; background-color: rgba(0,0,0,0.3)"></span>  Snapchat
              </label>
            </p>
              <p>
              <input name="q6" v-model = "q6" value = "6" type="checkbox" id="q6a7" />
              <label class="knocks_text_dark_active" for="q6a7">
                <span class = "knocks-brand130"></span> Kik
              </label>
            </p>
            <div class = "col l8 s12">
                  <el-input placeholder="Add another social network" v-model="q6i" class="input-with-select">
                    <el-button slot="append" @click = "addSocialNetwork()">Add</el-button>
                  </el-input>
                  <transition enter-active-class = "animated bounceInUp" leave-active-class = "bounceOutDown">
                    <ul class="uk-list uk-list-divider" v-if = "q6o.length > 0">
                     <transition enter-active-class = "animated bounceInUp" leave-active-class = "bounceOutRight" 
                     v-for = "(nw,index) in q6o" >
                    <li class = "animated bounceInUp" >@{{nw}}  
                        <i class = "knocks-cancel6 right red-text" @click = "q6o.splice(index,1)"></i> </li>
                  </ul>
                  </transition>
            </div>
            <transition enter-active-class = "animated zoomIn" leave-active-class = "animated zoomOut">
    <div class = "col s12" v-if = "q1 == 'yes'" style="padding-top : 10px;">
        <div class="col s12">
          <hr class="uk-divider-icon">
            <span class = "knocks_text_dark knocks_text_ms">
            <strong>*How much time do you spend daily on the social networks ?</strong>
            <knocksplayer
          class="col right" 
           gid="q4player" 
           not_webm
            source = "{{asset('snaps/survey/Knocks-Q4.mp3')}}"
            :duration = "17000"
          
           :show_volume="false" 
           :show_options="false" 
           :show_runtime="false" 
           :show_timer="false" 
           :hide_sniper="true" 
           main_container="col"
           ></knocksplayer>
        </span>
        </div>
        <div class = "col s12">
            <span v-if = "q7[1] != 0 && q7[1] != 14" class = "knocks_text_dark_active">@{{q7[0]}} - @{{q7[1]}} Hours</span>
            <span v-if ="q7[1] == 0" class = "knocks_text_dark_active">Less than an hour</span>
            <span v-if ="q7[1] == 14" class = "knocks_text_dark_active">More than 12 hours</span>
            <span class = "knocks_text_dark_active">per day</span>
              <el-slider
              style="padding-top : 10px"
              v-model="q7"
              range
              show-stops
              :step = "2"
              :max="14">
            </el-slider>
        </div>
    </div>
</transition>
        </div>

    </div>

</transition>



  <div class="row">
          <div class="col s12">
            <hr class="uk-divider-icon">
          <h3 class="knocks_text_dark">2. Alright sweetie here is a situation, a little boy called Harry , Harry was posting on his account and somebody belittled him in a away ,in your opinion which face will Harry have ?
          <knocksplayer
          class="col right" 
           gid="q1player" 
           not_webm
            source = "{{asset('snaps/survey/Knocks-Q1New.mp3')}}"
            :duration = "17000"
          
           :show_volume="false" 
           :show_options="false" 
           :show_runtime="false" 
           :show_timer="false" 
           :hide_sniper="true" 
           main_container="col"
           ></knocksplayer></h3>

           </div> 
           <div class="col s12"> 
            <el-rate 
             v-model="harry"
            :show-text = "true"
            :max="2"
            :low-threshold="1"
        :icon-classes="['knocks_icon red-text knocks_text_lg knocks-sad-face2',' knocks_icon orange-text knocks_text_lg knocks-smiling-face2']"
        :texts = "['Sad','Happy']"
        void-icon-class="knocks-neutral-face2 knocks_text_lg"
        :colors="['#99A9BF', '#F7BA2A', '#FF9900']"
            >
           </el-rate>
             <span style = "padding-left:5px"> Sad / Happy </span>
            </div>

  </div>

       <transition enter-active-class = "animated zoomIn" leave-active-class = "animated zoomOut">
    <div class = "col s12"  style="padding-top : 10px;">
        <div class="col s12">
          <span class = "knocks_text_dark knocks_text_ms">
            <hr class="uk-divider-icon">
          <strong>*Fantastic ! So do u think that social media is important ? Really ! But can I know the reason why ?</strong> 
          <knocksplayer
          class="col right" 
           gid="q2nplayer" 
           not_webm
            source = "{{asset('snaps/survey/Knocks-Q2New.mp3')}}"
            :duration = "17000"
          
           :show_volume="false" 
           :show_options="false" 
           :show_runtime="false" 
           :show_timer="false" 
           :hide_sniper="true" 
           main_container="col"
           ></knocksplayer>
        </span>
<div class="input-field col s12">
        <textarea v-model="fantastic" id="textarea1" class="materialize-textarea knocks_input_ps knocks_input_textarea_ps"></textarea>
          <label for="textarea1">Answer</label>
      </div>
        </div>
    </div>
</transition>

  <div class="row">
          <div class="col s12">
            <hr class="uk-divider-icon">
          <h3 class="knocks_text_dark">3. Ok little kid, Do you get bored when posting using the keyboard ? Would it be nicer to use voice notes also to post ?
          <knocksplayer
          class="col right" 
           gid="q7player" 
           not_webm
            source = "{{asset('snaps/survey/Knocks-Q7.mp3')}}"
           :duration = "19000"
           :show_volume="false" 
           :show_options="false" 
           :show_runtime="false" 
           :show_timer="false" 
           :hide_sniper="true" 
           main_container="col"
           ></knocksplayer></h3>

           </div> 
           <div class="col s12"> 
            <div class = "row col">
            <p>
              <input name="qm" v-model="qv" value = "first" type="radio" id="q1ac1" />
              <label class="knocks_text_dark_active" for="q1ac1">It will be awesome</label>
            </p>
            <p>
              <input name="qm" v-model="qv"  value = "second" type="radio" id="q1ac2" />
              <label class="knocks_text_dark_active" for="q1ac2">It is ok</label>
            </p>
            <p>
              <input name="qm" v-model="qv" value = "third" type="radio" id="q1ac3" />
              <label class="knocks_text_dark_active" for="q1ac3">I do not see any difference</label>
            </p>
            <p>
              <input name="qm" v-model="qv"  value = "fourth" type="radio" id="q1ac4" />
              <label class="knocks_text_dark_active" for="q1ac4">It is not good</label>
            </p>
        </div>
            </div>
  </div>

<div class="row">
          <div class="col s12">
            <hr class="uk-divider-icon">
          <h3 class="knocks_text_dark">2. Aha , I have been thinking about my friend’s situation , can you help me please ?, my friend Jenifer she has her account supervised by her parents to ensure that she is ok, do you think Jenifer is happy with that ?
          <knocksplayer
          class="col right" 
           gid="q8player" 
           not_webm
            source = "{{asset('snaps/survey/Knocks-Q8.mp3')}}"
            :duration = "16000"
          
           :show_volume="false" 
           :show_options="false" 
           :show_runtime="false" 
           :show_timer="false" 
           :hide_sniper="true" 
           main_container="col"
           ></knocksplayer></h3>

           </div> 
           <div class="col s12"> 
            <img class="col s5 right animated infinite pulse" src = "{{asset('snaps/parent.png')}}" style = "width : 20%;">
              <div class = "row col s8" style="padding-top : 40px;">
            <p>
              <input name="qw" v-model="qp" value = "yes" type="radio" id="q1ap1" />
              <label class="knocks_text_dark_active" for="q1ap1">Yes</label>
            </p>
            <p>
              <input name="qw" v-model="qp"  value = "no" type="radio" id="q1ap2" />
              <label class="knocks_text_dark_active" for="q1ap2">No</label>
            </p>
        </div>
            </div>

  </div>
      <div class="row">
             <h3 class="knocks_text_dark " style = "text-align : center;">
              I had so much fun talking to you I’m so happy because you answered the survey you are a nice kid, If you finished the survey you can click the button below and we are looking forward to see you using Knocks application we can guarantee your fun there .
<knocksplayer
          class="right" 
           gid="q3nplayer" 
           not_webm
            source = "{{asset('snaps/survey/Knocks-Q3New.mp3')}}"
            :duration = "17000"
          
           :show_volume="false" 
           :show_options="false" 
           :show_runtime="false" 
           :show_timer="false" 
           :hide_sniper="true" 
           main_container="col"
           ></knocksplayer>
             </h3>
             
       <knocksbutton
          placeholder = "Finish"
          submit_at = "survey/submit"
          success_at = "done"
          label_classes = "knocks_text_sm"
          gid = "knocks_registeration_button"
          :error_at = []
          button_classes = "waves-effect waves-light btn knocks_btn_light knocks_color_kit knocks_text_md col s4 l4 push-s4 push-l4  center"
          label_classes = ""
          @knocks_submit_accepted = "submitSurvey()"
          success_msg= "Done"
          :validation_error = "getTranslation('There\'s some feilds we need you to complete it.')"
          :disabled = "!surveyQ6isValid"
          :connection_error = "getTranslation('There\'s a problem in your connection, please try again.')"
          :submit_data = "{
          object : {
              q1 : q1 , 
            
              q6 : q6 , 
              q7 : q7 , 
              fantastic : fantastic , 
              qv : qv , 
              harry : harry ,
              qp : qp ,
          }
          }"></knocksbutton>

   
      </div>

    </div>
  </transition>


  <div  :class = "[{ 'animated zoomIn' : stageNumber == 5} ,{ 'knocks_hidden':stageNumber != 5 }]">
    <h3 class = "knocks_text_pink">Thanks for your time,  
     @if(auth()->user()->nickname != null)
    {{auth()->user()->nickname}}
    @endif
    @if(auth()->user()->nickname == null)
    {{auth()->user()->first_name}}
    @endif! <br/>
    
     We hope to see you in <strong class="knocks_text_dark_active">Knocks.</strong> soon
     </h3>


     <div class = "row">
      <knocksbutton
          placeholder = "Back to survey"
          @knocks_button_clicked = "stageSwitch(1)"
          :validate = "false"
          :submit_flag = "false"
          success_at = "done"
          label_classes = "knocks_text_sm"
          gid = "stage_one_next"
          button_classes = "waves-effect waves-light btn knocks_btn_light knocks_color_kit knocks_text_md col s5 l3 left "
          :validation_error = "getTranslation('There\'s some feilds we need you to complete it.')">
        </knocksbutton>

          <knocksbutton
          placeholder = "Logout"
          @knocks_button_clicked = "logout()"
          :validate = "false"
          :submit_flag = "false"
          success_at = "done"
          label_classes = "knocks_text_sm"
          gid = "stage_one_next"
          button_classes = "waves-effect waves-light btn knocks_btn_light knocks_color_kit knocks_text_md col s5 l3 right "
          :validation_error = "getTranslation('There\'s some feilds we need you to complete it.')">
        </knocksbutton>
        
     </div>



  </div>
</div>

@endsection
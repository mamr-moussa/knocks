@extends('layouts.user')
@section('content')
<title>
   {{$user->first_name}}
      @if($user->middle_name != null)
      {{' '.$user->middle_name}}
      @endif
      {{' '.$user->last_name}}
      @if($user->nickname != null)
      {{' ('.$user->nickname.')'}}
      @endif
</title>
  <transition    name="custom-classes-transition" enter-active-class="animated tada" leave-active-class="animated bounceOutRight">
   <h3 v-if = "!loggedIn" class = "center knocks_text_dark">See you again, Bye!</h3>
  </transition>
  <transition    name="custom-classes-transition" enter-active-class="animated zoomIn" leave-active-class="animated zoomOut">
    <div class = " " style = "padding : 0.2rem" v-if = "loggedIn">


  <div class = "row knocks_house_keeper" style = "padding : 3px;">
    <div class = "row knocks_house_keeper">
      <img src = "{{asset('media/cover/'.$user->id)}}" class = "knocks_full_cover_photo"/>
    </div>
    <div class = "knocks_profile_avatar_frame knocks_house_keeper">
      <a class = "">
        <img class = "knocks_profile_avatar z-depth-1" src = "{{asset('media/avatar/'.$user->id)}}"/>
      </a>
    </div>
    <div class = " knocks_profile_name">
      <h4 class = "  knocks_text_dark">
      {{$user->first_name}}
      @if($user->middle_name != null)
      {{' '.$user->middle_name}}
      @endif
      {{' '.$user->last_name}}
      @if($user->nickname != null)
      {{' ('.$user->nickname.')'}}
      @endif
    </h4>
    </div>
  </div>

  <div class = "row knocks_house_keeper white knocks_standard_border_radius" style="border : 1px solid #cfd8dc">
     <knocksuserabout :user = "{{$user->id}}"></knocksuserabout>
     <hr class="uk-divider-icon knocks_house_keeper">
    <knocksknockinjector 
    :current_user = "{{auth()->user()->id}}"
    as_atimeline
    newer_retrive = "user/profile/posts/newer"
    older_retrive = "user/profile/posts/older"
    basic_retrive = "user/profile/posts"
     :requsted = "{{$user->id}}">
      
    </knocksknockinjector>
  </div>

  </div>
  </div>
    
  </div>
  </transition>
  @endsection
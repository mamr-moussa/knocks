<nav class = " top-nav nav-extended knocks_house_keeper" id = "knocks_main_navbar" style="position: fixed; top:0; z-index : 10000000 !important;">
    <div class="nav-wrapper knocks_nav_content">
      <div class = "container">
        <a  data-activates="knocks_sidebar" class="button-collapse knocks_icon_motion"><i class="knocks-navigation3 knocks_text_light  "></i></a>
        <a class=" right" @click = "showRightSideBar = !showRightSideBar"><i class="knocks-more-horizontal knocks_text_light show-on-small" ></i></a>

        <a href="{{asset('')}}" class="brand-logo ">
          <span class = "knocks_text_light">
            <span class = "knocks-knocks"></span>
            <span>Knocks</span>
          </span>
        </a>
{{-- 
          <ul id="nav-mobile" class="right hide-on-med-and-down  ">
            <li><a class = "knocks_text_light waves-pink dropdown-button waves-effect" >
              <span class = "knocks-balloon"></span>
              <static_message :msgid="26"></static_message>
            </a></li>
            <li><a class = "knocks_text_light waves-pink  dropdown-button  waves-effect" data-activates="knocks_notification_ul">
              <span class = "knocks-mailbox "></span>
              <static_message :msgid="27"></static_message>
            </a></li>
          </ul> --}}
      </div>
       <div class="nav-content ">
      {{-- <ul class="tabs tabs-transparent container knocks_color_kit">
        <li class="tab"><a href="#test1" class = ""><span class = "">Test</span></a></li>
        <li class="tab"><a href="#test1" class = ""><span class = "">Test</span></a></li>
        <li class="tab"><a href="#test1" class = ""><span class = "">Test</span></a></li>
        <li class="tab"><a href="#test1" class = ""><span class = "">Test</span></a></li>
      </ul>
 --}}    </div>



    </div>
    </nav>

      @include('layouts.sidebar')

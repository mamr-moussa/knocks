<nav style = " position: fixed !important; top : 0;  z-index: 100000000;"
	id = "knocks_nav_vue" class="knocks_color_kit_active">
	<el-popover
	ref="popover2"
	class = ""
	placement="bottom">
	<ul class = "uk-list uk-list-divider hide-on-large-only animated slideInLeft ">
		@if(auth()->check())
		<li><a class = "knocks_text_ms knocks_text_anchor knocks_text_dark">
			@if(auth()->user()->nickname != null)
			{{ucfirst(auth()->user()->nickname)}}
			@endif
			@if(auth()->user()->nickname == null)
			{{ucfirst(auth()->user()->first_name)}}
			@endif
		</a></li>
		@endif
		@if(Request::url() === asset('faq/survey/analysis'))
		@if(auth()->check())
		<li><a class = "knocks_text_ms knocks_text_anchor knocks_text_dark col s12" href="{{asset('faq/survey')}}">Take The Survey</a></li>
		@endif
		@endif
		@if(Request::url() !== asset('faq/survey/analysis'))
		<li><a class = "knocks_text_ms knocks_text_anchor knocks_text_dark" href="{{asset('faq/survey/analysis')}}">Statistics</a></li>
		@endif
		@if(auth()->check())
		<li><a class = "knocks_text_ms knocks_text_anchor knocks_text_dark" @click = "logout()">Logout</a></li>
		@endif
		@if(!auth()->check())
		<li><a class = "knocks_text_ms knocks_text_anchor knocks_text_dark" href = "{{asset('user/login')}}">Login</a></li>
		@endif
		@if(!auth()->check())
		<li><a class = "knocks_text_ms knocks_text_anchor knocks_text_dark" href = "{{asset('user/register')}}">Register</a></li>
		@endif
	</ul>
	</el-popover>
	<div class="nav-wrapper">
		<div class="container">
			<a  class="brand-logo knocks_text_light" >
				<span class = "knocks-knocks"></span>
			Knocks</a>
			<a   class=" hide-on-large-only "><i class="knocks-th-menu-outline" v-popover:popover2></i></a>
			<ul class="right hide-on-med-and-down">
				<ul  class="right hide-on-med-and-down ">
					@if(auth()->check())
					<li><a class = "">
						@if(auth()->user()->nickname != null)
						{{ucfirst(auth()->user()->nickname)}}
						@endif
						@if(auth()->user()->nickname == null)
						{{ucfirst(auth()->user()->first_name)}}
						@endif
					</a></li>
					@endif
					@if(Request::url() === asset('faq/survey/analysis'))
					@if(auth()->check())
					<li><a href="{{asset('faq/survey')}}">Take The Survey</a></li>
					@endif
					@endif
					@if(Request::url() !== asset('faq/survey/analysis'))
					<li><a href="{{asset('faq/survey/analysis')}}">Statistics</a></li>
					@endif
					@if(auth()->check())
					<li><a @click = "logout()">Logout</a></li>
					@endif
					@if(!auth()->check())
					<li><a href = "{{asset('user/login')}}">Login</a></li>
					@endif
					@if(!auth()->check())
					<li><a href = "{{asset('user/register')}}">Register</a></li>
					@endif
				</ul>
				
			</div>
		</div>
	</nav>
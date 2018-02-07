@extends('layouts.survey')
@section('externals')
<meta name="session-type" content="dev">
<title>Knocks Survey</title>
<style>
	.el-step__title.is-process{
		color :#91124f !important;
	}
</style>
@endsection
@section('content')
<div class = "knocks_fair_bounds knocks_standard_border_radius"
	style="margin-top: 70px !important;
	border : 1px solid #e3f2fd;
	background-color: rgb(251, 251, 251)">
	<knocksretriver
	:xdata = "{}"
	v-model=  "userAnswers"
	@success="correctAnswers()"
	url = "user/answers"></knocksretriver>
	<br/>
	<transition enter-active-class = "animated bounceInDown" leave-active-class = "animated bounceOutUp">
		<div v-if = "stageNumber != 5">
			<h3 class = "knocks_text_dark_active animated bounceInDown"   style = "word-wrap: break-word;">
			@if(auth()->user()->nickname != null)
			<span v-if = "!answersCorrected">Hello,</span><span v-else >Welcome back,</span> {{ucfirst(auth()->user()->nickname)}}
			@endif
			@if(auth()->user()->nickname == null)
			<span v-if = "!answersCorrected">Hello,</span><span v-else >Welcome back,</span> {{ucfirst(auth()->user()->first_name)}}
			@endif!
			<small class = "knocks_text_dark_active animated bounceInUp">We're glad to see you in <strong>Knocks</strong>, we need to know your opinions and thoughts about
			Social Networking.</small>
			</h3>
			<div class = "row animated bounceInRight">
				
				<el-steps :active="stageNumber">
				<el-step
				:icon="stageIconDark(1,'knocks-globe3')"></el-step>
				<el-step :icon="stageIconDark(2,'knocks-child')"></el-step>
				<el-step  :icon="stageIconDark(3,'knocks-locked4')"></el-step>
				<el-step  :icon="stageIconDark(4,'knocks-flash2')"></el-step>
				</el-steps>
				
			</div>
			<hr class="uk-divider-icon">
		</div>
	</transition>
	<div  :class = "[{ 'animated zoomIn' : stageNumber == 1} ,{ 'knocks_hidden':stageNumber != 1 }]">
		<h3 class = "knocks_text_pink">Step 1
		<span class = "knocks-chevron-thin-right knocks_text_sm"></span>
		Social Networking in general
		</h3>
		<transition enter-active-class = "animated zoomIn" leave-active-class = "animated zoomOut">
			<div class = "row">
				<div class="row">
					<span class = "knocks_text_dark knocks_text_ms">
						Do you have a Social Networking account ?
					</span>
				</div>
				<div class = "row">
					<p>
						<input name="q1" v-model = "q1" value = "yes" type="radio" id="q1a1" />
						<label class="knocks_text_dark_active" for="q1a1">Yes</label>
					</p>
					<p>
						<input name="q1" v-model = "q1" value = "no" type="radio" id="q1a2" />
						<label class="knocks_text_dark_active" for="q1a2">No</label>
					</p>
				</div>
			</div>
		</transition>
		<transition enter-active-class = "animated zoomIn" leave-active-class = "animated zoomOut">
			<div class = "row" v-if = "q1 == 'no'">
				<div class="row">
					<span class = "knocks_text_dark knocks_text_ms">
						Why don't you have a Social Networking account ?
					</span>
				</div>
				<div class = "row">
					<p>
						<input name="q2" v-model = "q2" value = "0" type="checkbox" id="q2a1" />
						<label class="knocks_text_dark_active" for="q2a1">
							I do not know what social media is.
						</label>
					</p>
					<p>
						<input name="q2" v-model = "q2" value = "1" type="checkbox" id="q2a2" />
						<label class="knocks_text_dark_active" for="q2a2">
							I am not interested in joining social networking.
						</label>
					</p>
					<p>
						<input name="q2" v-model = "q2" value = "2" type="checkbox" id="q2a3" />
						<label class="knocks_text_dark_active" for="q2a3">
							I joined once, but i didn't enjoy it.
						</label>
					</p>
					<p>
						<input name="q2" v-model = "q2" value = "3" type="checkbox" id="q2a4" />
						<label class="knocks_text_dark_active" for="q2a4">
							It is against my culture.
						</label>
					</p>
					<p>
						<input name="q2" v-model = "q2" value = "4" type="checkbox" id="q2a5" />
						<label class="knocks_text_dark_active" for="q2a5">
							No privacy.
						</label>
					</p>
					<div class="input-field col s12">
						<textarea v-model = "q2o" id="q2o" class="knocks_input_textarea_ps materialize-textarea"></textarea>
						<label for="q2o" class = "knocks_text_dark_active"><span class = "knocks-pencil-square knocks_icon"></span> Other Reasons</label>
					</div>
				</div>
			</div>
		</transition>
		<transition enter-active-class = "animated zoomIn" leave-active-class = "animated zoomOut">
			<div class = "row">
				<div class="row">
					<span class = "knocks_text_dark knocks_text_ms">
						Do you think Social Networking is important ?
					</span>
				</div>
				<div class = "row">
					<p>
						<input name="q3" v-model = "q3" value = "1" type="radio" id="q3a1" />
						<label class="knocks_text_dark_active" for="q3a1">Strongly agree</label>
					</p>
					<p>
						<input name="q3" v-model = "q3" value = "2" type="radio" id="q3a2" />
						<label class="knocks_text_dark_active" for="q3a2">Agree</label>
					</p>
					<p>
						<input name="q3" v-model = "q3" value = "3" type="radio" id="q3a3" />
						<label class="knocks_text_dark_active" for="q3a3">Fair</label>
					</p>
					<p>
						<input name="q3" v-model = "q3" value = "4" type="radio" id="q3a4" />
						<label class="knocks_text_dark_active" for="q3a4">Disagree</label>
					</p>
					<p>
						<input name="q3" v-model = "q3" value = "5" type="radio" id="q3a5" />
						<label class="knocks_text_dark_active" for="q3a5">Strongly disagree</label>
					</p>
				</div>
			</div>
		</transition>
		<transition enter-active-class = "animated zoomIn" leave-active-class = "animated zoomOut">
			<div class = "row" v-if = "q1 == 'yes'">
				<div class="row">
					<span class = "knocks_text_dark knocks_text_ms">
						How many Social Networking groups are you a member of?
					</span>
				</div>
				<div class = "row">
					<span v-if = "q4 != 0 && q4 != 50" class = "knocks_text_dark_active">@{{q4}} Groups</span>
					<span v-if ="q4 == 0" class = "knocks_text_dark_active">None</span>
					<span v-if ="q4 == 50" class = "knocks_text_dark_active">More than 40 Groups</span>
					<p class="range-field">
						<input type="range" v-model = "q4" id="q4r" min="0" max="50" />
					</p>
				</div>
			</div>
		</transition>
		<transition enter-active-class = "animated zoomIn" leave-active-class = "animated zoomOut">
			<div class = "row" v-if = "q1 == 'yes'">
				<div class="row">
					<span class = "knocks_text_dark knocks_text_ms">
						Are you an active user on Social Networks ?
						<br/><small class = "knocks_text_pink">*Sharing content, chatting, reacting..etc*</small>
					</span>
				</div>
				<div class = "row">
					<p>
						<input name="q5" v-model = "q5" value = "1" type="radio" id="q5a1" />
						<label class="knocks_text_dark_active" for="q5a1">Very active</label>
					</p>
					<p>
						<input name="q5" v-model = "q5" value = "2" type="radio" id="q5a2" />
						<label class="knocks_text_dark_active" for="q5a2">Active</label>
					</p>
					<p>
						<input name="q5" v-model = "q5" value = "3" type="radio" id="q5a3" />
						<label class="knocks_text_dark_active" for="q5a3">Not active</label>
					</p>
					<p>
						<input name="q5" v-model = "q5" value = "4" type="radio" id="q5a4" />
						<label class="knocks_text_dark_active" for="q5a4">Not active at all</label>
					</p>
				</div>
			</div>
		</transition>
		<transition enter-active-class = "animated zoomIn" leave-active-class = "animated zoomOut">
			<div class = "row" v-if = "q1 == 'yes'">
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
					</div>
				</div>
			</transition>
			<transition enter-active-class = "animated zoomIn" leave-active-class = "animated zoomOut">
				<div class = "row" v-if = "q1 == 'yes'">
					<div class="row">
						<span class = "knocks_text_dark knocks_text_ms">
							How long have you been using the social networks ?
						</span>
					</div>
					<div class = "row">
						<span v-if = "q8 != 0 && q8 != 14" class = "knocks_text_dark_active">@{{q8}} months</span>
						<span v-if ="q8 == 0" class = "knocks_text_dark_active">Less than a month</span>
						<span v-if ="q8 == 14" class = "knocks_text_dark_active">More than a year</span>
						<p class="range-field">
							<input type="range" v-model = "q8" id="q4r" min="0" max="14" />
						</p>
					</div>
				</div>
			</transition>
			<transition enter-active-class = "animated zoomIn" leave-active-class = "animated zoomOut">
				<div class = "row" v-if = "q1 == 'yes'">
					<div class="row">
						<span class = "knocks_text_dark knocks_text_ms">
							How much time do you spend daily on the social networks ?
						</span>
					</div>
					<div class = "row">
						<span v-if = "q7 != 0 && q7 != 14" class = "knocks_text_dark_active"> @{{q7}} Hours</span>
						<span v-if ="q7 == 0" class = "knocks_text_dark_active">Less than an hour</span>
						<span v-if ="q7 == 14" class = "knocks_text_dark_active">More than 12 hours</span>
						<span class = "knocks_text_dark_active">per day</span>
						<p class="range-field">
							<input type="range" v-model = "q7" id="q4r" min="0" max="14" />
						</p>
					</div>
				</div>
			</transition>
			<transition enter-active-class = "animated zoomIn" leave-active-class = "animated zoomOut">
				<div class = "row" v-if = "q1 == 'yes'">
					<div class="row">
						<span class = "knocks_text_dark knocks_text_ms">
							How do you access your social network account?
						</span>
					</div>
					<div class = "row">
						<p>
							<input name="q9" v-model = "q9" value = "0" type="checkbox" id="q9a1" />
							<label class="knocks_text_dark_active" for="q9a1">
								<span class = "knocks-monitor3"></span>  Desktop/PC
							</label>
						</p>
						<p>
							<input name="q9" v-model = "q9" value = "1" type="checkbox" id="q9a2" />
							<label class="knocks_text_dark_active" for="q9a2">
								<span class = "knocks-laptop2"></span>  Laptop
							</label>
						</p>
						<p>
							<input name="q9" v-model = "q9" value = "2" type="checkbox" id="q9a3" />
							<label class="knocks_text_dark_active" for="q9a3">
								<span class = "knocks-tablet6"></span>  Tablet
							</label>
						</p>
						<p>
							<input name="q9" v-model = "q9" value = "3" type="checkbox" id="q9a4" />
							<label class="knocks_text_dark_active" for="q9a4">
								<span class = "knocks-phone9"></span>  Smartphone
							</label>
						</p>
					</div>
				</div>
			</transition>
			<div class = "row">
				<knocksbutton
				placeholder = "Next"
				@knocks_stack_passed = "stageSwitch(2)"
				:submit_flag = "false"
				gid = "stage_one_next"
				button_classes = "waves-effect waves-light btn knocks_btn_light knocks_color_kit knocks_text_md col s5 l3 right "
				:scope = "['stage_one']"
				label_classes="knocks_text_sm"
				:disabled = "!surveyStepOneValid"
				:validation_error = "getTranslation('There\'s some feilds we need you to complete it.')">
				</knocksbutton>
			</div>
		</div>
		<div :class = "[{ 'animated zoomIn' : stageNumber == 2} ,{ 'knocks_hidden':stageNumber != 2 }]">
			<h3 class = "knocks_text_pink">Step 2
			<span class = "knocks-chevron-thin-right knocks_text_sm"></span>
			Social Networks for children
			</h3>
			<transition enter-active-class = "animated zoomIn" leave-active-class = "animated zoomOut">
				<div class = "row">
					<div class="row">
						<span class = "knocks_text_dark knocks_text_ms">
							In case you are a parent, would you feel uncomfortable having your 12 years old or with a younger age using social media applications?
						</span>
					</div>
					<div class = "row">
						<p>
							<input name="q10" v-model = "q10" value = "yes" type="radio" id="q10a1" />
							<label class="knocks_text_dark_active" for="q10a1">Yes</label>
						</p>
						<p>
							<input name="q10" v-model = "q10" value = "no" type="radio" id="q10a2" />
							<label class="knocks_text_dark_active" for="q10a2">No</label>
						</p>
					</div>
				</div>
			</transition>
			<transition enter-active-class = "animated zoomIn" leave-active-class = "animated zoomOut">
				<div class = "row">
					<div class="row">
						<span class = "knocks_text_dark knocks_text_ms">
							Do you think Having your kid a victim of online bullying
							<small class = "knocks_text_pink">*offensive comments, emails..etc*</small> will hurt his feelings and affect his personality?
						</span>
					</div>
					<div class = "row">
						<p>
							<input name="q11" v-model = "q11" value = "1" type="radio" id="q11a1" />
							<label class="knocks_text_dark_active" for="q11a1">Strongly agree</label>
						</p>
						<p>
							<input name="q11" v-model = "q11" value = "2" type="radio" id="q11a2" />
							<label class="knocks_text_dark_active" for="q11a2">Agree</label>
						</p>
						<p>
							<input name="q11" v-model = "q11" value = "3" type="radio" id="q11a3" />
							<label class="knocks_text_dark_active" for="q11a3">Fair</label>
						</p>
						<p>
							<input name="q11" v-model = "q11" value = "4" type="radio" id="q11a4" />
							<label class="knocks_text_dark_active" for="q11a4">Disagree</label>
						</p>
						<p>
							<input name="q11" v-model = "q11" value = "5" type="radio" id="q11a5" />
							<label class="knocks_text_dark_active" for="q11a5">Strongly disagree</label>
						</p>
					</div>
				</div>
			</transition>
			<transition enter-active-class = "animated zoomIn" leave-active-class = "animated zoomOut">
				<div class = "row">
					<div class="row">
						<span class = "knocks_text_dark knocks_text_ms">
							Do you think having a parental monitor for kids with age 12 years or younger would be ensuring the kid wellbeing?
							<br/>
							<small class = "knocks_text_pink">*Parental monitor: having the parents aware of their kid activities with monitored content being rendered for kids *</small>
						</span>
					</div>
					<div class = "row">
						<p>
							<input name="q12" v-model = "q12" value = "1" type="radio" id="q12a1" />
							<label class="knocks_text_dark_active" for="q12a1">Strongly agree</label>
						</p>
						<p>
							<input name="q12" v-model = "q12" value = "2" type="radio" id="q12a2" />
							<label class="knocks_text_dark_active" for="q12a2">Agree</label>
						</p>
						<p>
							<input name="q12" v-model = "q12" value = "3" type="radio" id="q12a3" />
							<label class="knocks_text_dark_active" for="q12a3">Fair</label>
						</p>
						<p>
							<input name="q12" v-model = "q12" value = "4" type="radio" id="q12a4" />
							<label class="knocks_text_dark_active" for="q12a4">Disagree</label>
						</p>
						<p>
							<input name="q12" v-model = "q12" value = "5" type="radio" id="q12a5" />
							<label class="knocks_text_dark_active" for="q12a5">Strongly disagree</label>
						</p>
					</div>
					<div class = "row">
						<knocksbutton
						placeholder = "previous"
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
						placeholder = "Next"
						@knocks_stack_passed = "stageSwitch(3)"
						:submit_flag = "false"
						gid = "stage_one_next"
						button_classes = "waves-effect waves-light btn knocks_btn_light knocks_color_kit knocks_text_md col s5 l3 right "
						:scope = "['stage_one']"
						label_classes="knocks_text_sm"
						
						:validation_error = "getTranslation('There\'s some feilds we need you to complete it.')">
						</knocksbutton>
					</div>
				</div>
			</transition>
		</div>
	</transition>
	<div  :class = "[{ 'animated zoomIn' : stageNumber == 3} ,{ 'knocks_hidden':stageNumber != 3 }]">
		<h3 class = "knocks_text_pink">Step 3
		<span class = "knocks-chevron-thin-right knocks_text_sm"></span>
		Privacy and Policy
		</h3>
		<transition enter-active-class = "animated zoomIn" leave-active-class = "animated zoomOut">
			<div class = "row">
				<div class="row">
					<span class = "knocks_text_dark knocks_text_ms">
						Do you think privacy policies are effective in social networking sites?
					</span>
				</div>
				<div class = "row">
					<p>
						<input name="q13" v-model = "q13" value = "1" type="radio" id="q13a1" />
						<label class="knocks_text_dark_active" for="q13a1">Strongly agree</label>
					</p>
					<p>
						<input name="q13" v-model = "q13" value = "2" type="radio" id="q13a2" />
						<label class="knocks_text_dark_active" for="q13a2">Agree</label>
					</p>
					<p>
						<input name="q13" v-model = "q13" value = "3" type="radio" id="q13a3" />
						<label class="knocks_text_dark_active" for="q13a3">Fair</label>
					</p>
					<p>
						<input name="q13" v-model = "q13" value = "4" type="radio" id="q13a4" />
						<label class="knocks_text_dark_active" for="q13a4">Disagree</label>
					</p>
					<p>
						<input name="q13" v-model = "q13" value = "5" type="radio" id="q13a5" />
						<label class="knocks_text_dark_active" for="q13a5">Strongly disagree</label>
					</p>
				</div>
			</div>
		</transition>
		<transition enter-active-class = "animated zoomIn" leave-active-class = "animated zoomOut">
			<div class = "row">
				<div class="row">
					<span class = "knocks_text_dark knocks_text_ms">
						Have you ever been a victim of online bullying? <small class = "knocks_text_pink">*offensive comments or emails*</small>
					</span>
				</div>
				<div class = "row">
					<p>
						<input name="q14" v-model = "q14" value = "yes" type="radio" id="q14a1" />
						<label class="knocks_text_dark_active" for="q14a1">Yes</label>
					</p>
					<p>
						<input name="q14" v-model = "q14" value = "no" type="radio" id="q14a2" />
						<label class="knocks_text_dark_active" for="q14a2">No</label>
					</p>
				</div>
			</div>
		</transition>
		<transition enter-active-class = "animated zoomIn" leave-active-class = "animated zoomOut">
			<div class = "row">
				<div class="row">
					<span class = "knocks_text_dark knocks_text_ms">
						Have you ever been disabled to share content because of other people?
						<small class = "knocks_text_pink">*private pictures, senstive content..etc*</small>
					</span>
				</div>
				<div class = "row">
					<p>
						<input name="q15" v-model = "q15" value = "yes" type="radio" id="q15a1" />
						<label class="knocks_text_dark_active" for="q15a1">Yes</label>
					</p>
					<p>
						<input name="q15" v-model = "q15" value = "no" type="radio" id="q15a2" />
						<label class="knocks_text_dark_active" for="q15a2">No</label>
					</p>
				</div>
			</div>
		</transition>
		<div class="row">
			<knocksbutton
			placeholder = "previous"
			@knocks_button_clicked = "stageSwitch(2)"
			:validate = "false"
			:submit_flag = "false"
			success_at = "done"
			label_classes = "knocks_text_sm"
			gid = "stage_one_next"
			button_classes = "waves-effect waves-light btn knocks_btn_light knocks_color_kit knocks_text_md col s5 l3 left "
			:validation_error = "getTranslation('There\'s some feilds we need you to complete it.')">
			</knocksbutton>
			<knocksbutton
			placeholder = "Next"
			@knocks_stack_passed = "stageSwitch(4)"
			:submit_flag = "false"
			gid = "stage_one_next"
			button_classes = "waves-effect waves-light btn knocks_btn_light knocks_color_kit knocks_text_md col s5 l3 right "
			:scope = "['stage_one']"
			label_classes="knocks_text_sm"
			
			:validation_error = "getTranslation('There\'s some feilds we need you to complete it.')">
			</knocksbutton>
		</div>
	</div>
	<div  :class = "[{ 'animated zoomIn' : stageNumber == 4} ,{ 'knocks_hidden':stageNumber != 4 }]">
		<h3 class = "knocks_text_pink">Step 4
		<span class = "knocks-chevron-thin-right knocks_text_sm"></span>
		Usability
		</h3>
		<transition enter-active-class = "animated zoomIn" leave-active-class = "animated zoomOut">
			<div class = "row">
				<div class="row">
					<span class = "knocks_text_dark knocks_text_ms">
						Do you think as a social media user it would be better to expand the options of interactivity?
						<small class = "knocks_text_pink">
						*Posting can be with a text,poet and articles templates, media and also a voice note*
						</small>
					</span>
				</div>
				<div class = "row">
					<p>
						<input name="q16" v-model = "q16" value = "1" type="radio" id="q16a1" />
						<label class="knocks_text_dark_active" for="q16a1">Strongly agree</label>
					</p>
					<p>
						<input name="q16" v-model = "q16" value = "2" type="radio" id="q16a2" />
						<label class="knocks_text_dark_active" for="q16a2">Agree</label>
					</p>
					<p>
						<input name="q16" v-model = "q16" value = "3" type="radio" id="q16a3" />
						<label class="knocks_text_dark_active" for="q16a3">Fair</label>
					</p>
					<p>
						<input name="q16" v-model = "q16" value = "4" type="radio" id="q16a4" />
						<label class="knocks_text_dark_active" for="q16a4">Disagree</label>
					</p>
					<p>
						<input name="q16" v-model = "q16" value = "5" type="radio" id="q16a5" />
						<label class="knocks_text_dark_active" for="q16a5">Strongly disagree</label>
					</p>
				</div>
			</div>
		</transition>
		<transition enter-active-class = "animated zoomIn" leave-active-class = "animated zoomOut">
			<div class = "row">
				<div class="row">
					<span class = "knocks_text_dark knocks_text_ms">
						Are you usually able to interact in your social media account
						<small class = "knocks_text_pink">
						*for example: while driving*
						</small>
					</span>
				</div>
				<div class = "row">
					<p>
						<input name="q17" v-model = "q17" value = "1" type="radio" id="q17a1" />
						<label class="knocks_text_dark_active" for="q17a1">Strongly agree</label>
					</p>
					<p>
						<input name="q17" v-model = "q17" value = "2" type="radio" id="q17a2" />
						<label class="knocks_text_dark_active" for="q17a2">Agree</label>
					</p>
					<p>
						<input name="q17" v-model = "q17" value = "3" type="radio" id="q17a3" />
						<label class="knocks_text_dark_active" for="q17a3">Fair</label>
					</p>
					<p>
						<input name="q17" v-model = "q17" value = "4" type="radio" id="q17a4" />
						<label class="knocks_text_dark_active" for="q17a4">Disagree</label>
					</p>
					<p>
						<input name="q17" v-model = "q17" value = "5" type="radio" id="q17a5" />
						<label class="knocks_text_dark_active" for="q17a5">Strongly disagree</label>
					</p>
				</div>
			</div>
		</transition>
		<transition enter-active-class = "animated zoomIn" leave-active-class = "animated zoomOut">
			<div class = "row">
				<div class="row">
					<span class = "knocks_text_dark knocks_text_ms">
						Do you think Social Networks assist people to share their arts and hobbies widely in case they are not famous?
					</span>
				</div>
				<div class = "row">
					<p>
						<input name="q18" v-model = "q18" value = "1" type="radio" id="q18a1" />
						<label class="knocks_text_dark_active" for="q18a1">Strongly agree</label>
					</p>
					<p>
						<input name="q18" v-model = "q18" value = "2" type="radio" id="q18a2" />
						<label class="knocks_text_dark_active" for="q18a2">Agree</label>
					</p>
					<p>
						<input name="q18" v-model = "q18" value = "3" type="radio" id="q18a3" />
						<label class="knocks_text_dark_active" for="q18a3">Fair</label>
					</p>
					<p>
						<input name="q18" v-model = "q18" value = "4" type="radio" id="q18a4" />
						<label class="knocks_text_dark_active" for="q18a4">Disagree</label>
					</p>
					<p>
						<input name="q18" v-model = "q18" value = "5" type="radio" id="q18a5" />
						<label class="knocks_text_dark_active" for="q18a5">Strongly disagree</label>
					</p>
				</div>
			</div>
		</transition>
		<div class = "row">
			<span class = "knocks_text_dark knocks_text_ms">
				If you have any ideas or comments to make the Social Networks better, please let us know.
			</span>
			<div class="input-field col s12">
				<textarea v-model = "q19o" id="q19o" class="knocks_input_textarea_ps materialize-textarea" ></textarea>
				<label for="q19o" class = "knocks_text_dark_active"><span class = "knocks-pencil-square knocks_icon"></span> Any ideas?</label>
			</div>
		</div>
		<knocksbutton
		placeholder = "previous"
		@knocks_button_clicked = "stageSwitch(3)"
		:validate = "false"
		:submit_flag = "false"
		success_at = "done"
		label_classes = "knocks_text_sm"
		gid = "stage_one_next"
		button_classes = "waves-effect waves-light btn knocks_btn_light knocks_color_kit knocks_text_md col s5 l3 left "
		:validation_error = "getTranslation('There\'s some feilds we need you to complete it.')">
		</knocksbutton>
		<knocksbutton
		placeholder = "Finish"
		submit_at = "survey/submit"
		success_at = "done"
		label_classes = "knocks_text_sm"
		gid = "knocks_registeration_button"
		:error_at = []
		button_classes = "waves-effect waves-light btn knocks_btn_light knocks_color_kit knocks_text_md col s5 l3  right"
		label_classes = ""
		@knocks_submit_accepted = "submitSurvey()"
		success_msg= "Done"
		:validation_error = "getTranslation('There\'s some feilds we need you to complete it.')"
		:disabled = "!surveyStepOneValid"
		:connection_error = "getTranslation('There\'s a problem in your connection, please try again.')"
		:submit_data = "{
		object : {
		q1 : q1 ,
		q2 : q2  ,
		q2o : q2o ,
		q3 : q3,
		q4 : q4 ,
		q5 : q5 ,
		q6 : q6 ,
		q6o : q6o ,
		q6i : q6i ,
		q7 : q7 ,
		q8 : q8 ,
		q9 : q9 ,
		q10 : q10 ,
		q11 : q11 ,
		q12 : q12 ,
		q13 : q13 ,
		q14 : q14 ,
		q15 : q15 ,
		q16 : q16,
		q17 : q17 ,
		q18 : q18 ,
		q19o : q19o
		}
		}"></knocksbutton>
		
	</div>
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
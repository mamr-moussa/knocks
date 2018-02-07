@extends('layouts.survey')
@section('externals')
<meta name="session-type" content="dev">
<title>Knocks Survey</title>
<style>
	.el-step__title.is-process{
		color :#91124f !important;
	}
	.el-loading-mask{
		border-radius: 10px !important;
	}
</style>
@endsection
@section('content')
<div class = "knocks_fair_bounds knocks_standard_border_radius"
	style="margin-top: 70px !important;
	border : 1px solid #e3f2fd;
	background-color: rgb(251, 251, 251)">
	<br/>
	<knocksretriver
	:xdata = "{last_update : lastAnswerUpdate}"
	v-model=  "retrivedAnswers"
	recursed
	@success="hashAnswers()"
	url = "answers/patch"></knocksretriver>

	<div class = "row">
		    @if(auth()->check())
			<h3 class = "knocks_text_dark_active animated bounceInDown"   style = "word-wrap: break-word;">
			@if(auth()->user()->nickname != null)
			<span v-if = "!answersCorrected">Hello,</span><span v-else >Welcome back,</span> {{ucfirst(auth()->user()->nickname)}}
			@endif
			@if(auth()->user()->nickname == null)
			<span v-if = "!answersCorrected">Hello,</span><span v-else >Welcome back,</span> {{ucfirst(auth()->user()->first_name)}}
			@endif!
			<br/><small class = "knocks_text_dark_active animated bounceInUp">According to <strong>Knocks</strong> Survey, Here's what do people think about 
			Social Networking.</small>
			<hr class="uk-divider-icon">
			@endif

			@if(!auth()->check())
			<h3 class = "knocks_text_dark_active animated bounceInDown"   style = "word-wrap: break-word;">
			Hello There!
			<br/><small class = "knocks_text_dark_active animated bounceInUp">According to <strong>Knocks</strong> Survey, Here's what do people think about 
			Social Networking, if you want to Take the survey please <a href="{{asset('user/login')}}">Login</a> if you have an account,	 or <a href="{{asset('user/register')}}">Register</a> then <a href="{{asset('faq/survey')}}">Take The Survey</a>.</small>
			<hr class="uk-divider-icon">
			@endif
	</div>
	<div class = "row" v-if = "answersObject != null">
		<div class = "col l6 s12" v-if = "answersObject != null && answersObject.q1 != undefined && answersObject.q1.yes != undefined">
			<p class = "knocks_text_ms knocks_text_dark">People who have Social Networking accounts</p>
			<center><el-progress class = "knocks_standard_border_radius" v-loading = "retrivedAnswers.loading"  type="circle" :percentage="parseInt(answersObject.q1.yes/answersObject.q1.total * 100)"></el-progress></center>
			<hr class="uk-divider-icon">
		</div>
		<div class = "col l6 s12" v-if = "answersObject != null && answersObject.q14 != undefined && answersObject.q14.yes != undefined">
			<p class = "knocks_text_ms knocks_text_dark">People who were victims of online bullying</p>
			<center><el-progress v-loading = "retrivedAnswers.loading" type="circle" :percentage="parseInt(answersObject.q14.yes/answersObject.q14.total * 100)"></el-progress></center>
			<hr class="uk-divider-icon">
		</div>
		<div class = "col l6 s12" v-if = "answersObject != null && answersObject.q10 != undefined && answersObject.q10.yes != undefined">
			<p class = "knocks_text_ms knocks_text_dark">People who think Social Networks is not safe for kids</p>
			<center><el-progress v-loading = "retrivedAnswers.loading"  type="circle" :percentage="parseInt(answersObject.q10.yes/answersObject.q10.total * 100)"></el-progress></center>
			<hr class="uk-divider-icon">
		</div>
		<div class = "col l6 s12" v-if = "answersObject != null && answersObject.q15 != undefined && answersObject.q15.yes != undefined">
			<p class = "knocks_text_ms knocks_text_dark">People who were disabled to share content because of other people</p>
			<center><el-progress v-loading = "retrivedAnswers.loading"  type="circle" :percentage="parseInt(answersObject.q15.yes/answersObject.q15.total * 100)"></el-progress></center>
			<hr class="uk-divider-icon">
		</div>
	</div>
	<!--Q3-->
	<div class = "row">
		<div class = "col s12" v-if = "answersObject != null && answersObject.q3 != undefined">
			<p class = "knocks_text_ms knocks_text_dark">Is Social Networking important? </p>
			<div class = "row knocks_house_keeper">
				<div class = "col s12 l4"><p class = "knocks_text_dark_active">Strongly Agree</p></div>
				<div class = "col s12 l8">
					<el-progress v-loading = "retrivedAnswers.loading"  :percentage="parseInt( answersObject.q3[1] / answersObject.q3.total * 100)"></el-progress>
				</div>
			</div>
			<div class = "row knocks_house_keeper">
				<div class = "col s12 l4"><p class = "knocks_text_dark_active">Agree</p></div>
				<div class = "col s12 l8">
					<el-progress v-loading = "retrivedAnswers.loading"  :percentage="parseInt( answersObject.q3[2] / answersObject.q3.total * 100)"></el-progress>
				</div>
			</div>
			<div class = "row knocks_house_keeper">
				<div class = "col s12 l4"><p class = "knocks_text_dark_active">Fair</p></div>
				<div class = "col s12 l8">
					<el-progress v-loading = "retrivedAnswers.loading"  :percentage="parseInt( answersObject.q3[3] / answersObject.q3.total * 100)"></el-progress>
				</div>
			</div>
			<div class = "row knocks_house_keeper">
				<div class = "col s12 l4"><p class = "knocks_text_dark_active"> Disgree</p></div>
				<div class = "col s12 l8">
					<el-progress v-loading = "retrivedAnswers.loading"  :percentage="parseInt( answersObject.q3[4] / answersObject.q3.total * 100)"></el-progress>
				</div>
			</div>
			<div class = "row knocks_house_keeper">
				<div class = "col s12 l4"><p class = "knocks_text_dark_active">Strongly Disgree</p></div>
				<div class = "col s12 l8">
					<el-progress v-loading = "retrivedAnswers.loading"  :percentage="parseInt( answersObject.q3[5] / answersObject.q3.total * 100)"></el-progress>
				</div>
			</div>
			<hr class="uk-divider-icon">
		</div>
		<!--Q5-->
		<div class = "row">
			<div class = "col s12" v-if = "answersObject != null && answersObject.q5 != undefined">
				<p class = "knocks_text_ms knocks_text_dark">Active users on Social Networks </p>
				<div class = "row knocks_house_keeper">
					<div class = "col s12 l4"><p class = "knocks_text_dark_active">Very active</p></div>
					<div class = "col s12 l8">
						<el-progress v-loading = "retrivedAnswers.loading"  :percentage="parseInt( answersObject.q5[1] / answersObject.q5.total * 100)"></el-progress>
					</div>
				</div>
				<div class = "row knocks_house_keeper">
					<div class = "col s12 l4"><p class = "knocks_text_dark_active">Active</p></div>
					<div class = "col s12 l8">
						<el-progress v-loading = "retrivedAnswers.loading"  :percentage="parseInt( answersObject.q5[2] / answersObject.q5.total * 100)"></el-progress>
					</div>
				</div>
				<div class = "row knocks_house_keeper">
					<div class = "col s12 l4"><p class = "knocks_text_dark_active">Not active</p></div>
					<div class = "col s12 l8">
						<el-progress v-loading = "retrivedAnswers.loading"  :percentage="parseInt( answersObject.q5[3] / answersObject.q5.total * 100)"></el-progress>
					</div>
				</div>
				<div class = "row knocks_house_keeper">
					<div class = "col s12 l4"><p class = "knocks_text_dark_active"> Not active at all</p></div>
					<div class = "col s12 l8">
						<el-progress v-loading = "retrivedAnswers.loading"  :percentage="parseInt( answersObject.q5[4] / answersObject.q5.total * 100)"></el-progress>
					</div>
				</div>
				<hr class="uk-divider-icon">
			</div>
			<!--Q6-->
			<div class = "row">
				<div class = "col s12" v-if = "answersObject != null && answersObject.q6 != undefined">
					<p class = "knocks_text_ms knocks_text_dark">Social Networks that people joined </p>
					<div class = "row knocks_house_keeper">
						<div class = "col s12 l4"><p class = "knocks_text_dark_active"><span class = "knocks-brand71"></span>  Facebook</p></div>
						<div class = "col s12 l8">
							<el-progress v-loading = "retrivedAnswers.loading"  :percentage="parseInt( answersObject.q6[0] / answersPatch.length * 100)"></el-progress>
						</div>
					</div>
					<div class = "row knocks_house_keeper">
						<div class = "col s12 l4"><p class = "knocks_text_dark_active"><span class = "knocks-brand268"></span>  Twitter</p></div>
						<div class = "col s12 l8">
							<el-progress v-loading = "retrivedAnswers.loading"  :percentage="parseInt( answersObject.q6[1] / answersPatch.length * 100)"></el-progress>
						</div>
					</div>
					<div class = "row knocks_house_keeper">
						<div class = "col s12 l4"><p class = "knocks_text_dark_active"><span class = "knocks-brand297"></span>  YouTube</p></div>
						<div class = "col s12 l8">
							<el-progress v-loading = "retrivedAnswers.loading"  :percentage="parseInt( answersObject.q6[2] / answersPatch.length * 100)"></el-progress>
						</div>
					</div>
					<div class = "row knocks_house_keeper">
						<div class = "col s12 l4"><p class = "knocks_text_dark_active"><span class = "knocks-brand115"></span>  Instagram</p></div>
						<div class = "col s12 l8">
							<el-progress v-loading = "retrivedAnswers.loading"  :percentage="parseInt( answersObject.q6[3] / answersPatch.length * 100)"></el-progress>
						</div>
					</div>
					<div class = "row knocks_house_keeper">
						<div class = "col s12 l4"><p class = "knocks_text_dark_active"> <span class = "knocks-brand284"></span>  WhatsApp</p></div>
						<div class = "col s12 l8">
							<el-progress v-loading = "retrivedAnswers.loading"  :percentage="parseInt( answersObject.q6[4] / answersPatch.length * 100)"></el-progress>
						</div>
					</div>
					<div class = "row knocks_house_keeper">
						<div class = "col s12 l4"><p class = "knocks_text_dark_active"><span class = "knocks-brand227 " style="border-radius: 3px; background-color: rgba(0,0,0,0.3)"></span>  Snapchat</p></div>
						<div class = "col s12 l8">
							<el-progress v-loading = "retrivedAnswers.loading"  :percentage="parseInt( answersObject.q6[5] / answersPatch.length * 100)"></el-progress>
						</div>
					</div>
					<div class = "row knocks_house_keeper">
						<div class = "col s12 l4"><p class = "knocks_text_dark_active"> <span class = "knocks-brand130"></span>  Kik</p></div>
						<div class = "col s12 l8">
							<el-progress v-loading = "retrivedAnswers.loading"  :percentage="parseInt( answersObject.q6[6] / answersPatch.length * 100)"></el-progress>
						</div>
					</div>
					<hr class="uk-divider-icon">
				</div>
				<!--Q9-->
				<div class = "row">
					<div class = "col s12" v-if = "answersObject != null && answersObject.q6 != undefined">
						<p class = "knocks_text_ms knocks_text_dark">How do people join the Social Networks</p>
						<div class = "row knocks_house_keeper">
							<div class = "col s12 l4"><p class = "knocks_text_dark_active"><span class = "knocks-monitor3"></span>  Desktop/PC</p></div>
							<div class = "col s12 l8">
								<el-progress v-loading = "retrivedAnswers.loading"  :percentage="parseInt( answersObject.q9[0] / answersPatch.length * 100)"></el-progress>
							</div>
						</div>
						<div class = "row knocks_house_keeper">
							<div class = "col s12 l4"><p class = "knocks_text_dark_active"><span class = "knocks-laptop2"></span>  Laptop</p></div>
							<div class = "col s12 l8">
								<el-progress v-loading = "retrivedAnswers.loading"  :percentage="parseInt( answersObject.q9[1] / answersPatch.length * 100)"></el-progress>
							</div>
						</div>
						<div class = "row knocks_house_keeper">
							<div class = "col s12 l4"><p class = "knocks_text_dark_active"><span class = "knocks-tablet6"></span>  Tablet</p></div>
							<div class = "col s12 l8">
								<el-progress v-loading = "retrivedAnswers.loading"  :percentage="parseInt( answersObject.q9[2] / answersPatch.length * 100)"></el-progress>
							</div>
						</div>
						<div class = "row knocks_house_keeper">
							<div class = "col s12 l4"><p class = "knocks_text_dark_active"><span class = "knocks-phone9"></span>  Smartphone</p></div>
							<div class = "col s12 l8">
								<el-progress v-loading = "retrivedAnswers.loading"  :percentage="parseInt( answersObject.q9[3] / answersPatch.length * 100)"></el-progress>
							</div>
						</div>
						<hr class="uk-divider-icon">
					</div>
					<!--Q11-->
					<div class = "row">
						<div class = "col s12" v-if = "answersObject != null && answersObject.q3 != undefined">
							<p class = "knocks_text_ms knocks_text_dark">Having your kid a victim of online bullying will hurt his feelings and affect his personality?</p>
							<div class = "row knocks_house_keeper">
								<div class = "col s12 l4"><p class = "knocks_text_dark_active">Strongly Agree</p></div>
								<div class = "col s12 l8">
									<el-progress v-loading = "retrivedAnswers.loading"  :percentage="parseInt( answersObject.q11[1] / answersObject.q11.total * 100)"></el-progress>
								</div>
							</div>
							<div class = "row knocks_house_keeper">
								<div class = "col s12 l4"><p class = "knocks_text_dark_active">Agree</p></div>
								<div class = "col s12 l8">
									<el-progress v-loading = "retrivedAnswers.loading"  :percentage="parseInt( answersObject.q11[2] / answersObject.q11.total * 100)"></el-progress>
								</div>
							</div>
							<div class = "row knocks_house_keeper">
								<div class = "col s12 l4"><p class = "knocks_text_dark_active">Fair</p></div>
								<div class = "col s12 l8">
									<el-progress v-loading = "retrivedAnswers.loading"  :percentage="parseInt( answersObject.q11[3] / answersObject.q11.total * 100)"></el-progress>
								</div>
							</div>
							<div class = "row knocks_house_keeper">
								<div class = "col s12 l4"><p class = "knocks_text_dark_active"> Disgree</p></div>
								<div class = "col s12 l8">
									<el-progress v-loading = "retrivedAnswers.loading"  :percentage="parseInt( answersObject.q11[4] / answersObject.q11.total * 100)"></el-progress>
								</div>
							</div>
							<div class = "row knocks_house_keeper">
								<div class = "col s12 l4"><p class = "knocks_text_dark_active">Strongly Disgree</p></div>
								<div class = "col s12 l8">
									<el-progress v-loading = "retrivedAnswers.loading"  :percentage="parseInt( answersObject.q11[5] / answersObject.q11.total * 100)"></el-progress>
								</div>
							</div>
							<hr class="uk-divider-icon">
						</div>
					</div>
					<!--Q12-->
					<div class = "row">
						<div class = "col s12" v-if = "answersObject != null && answersObject.q3 != undefined">
							<p class = "knocks_text_ms knocks_text_dark">Having a parental monitor for kids with age 12 years or younger would be ensuring the kid wellbeing?</p>
							<div class = "row knocks_house_keeper">
								<div class = "col s12 l4"><p class = "knocks_text_dark_active">Strongly Agree</p></div>
								<div class = "col s12 l8">
									<el-progress v-loading = "retrivedAnswers.loading"  :percentage="parseInt( answersObject.q12[1] / answersObject.q12.total * 100)"></el-progress>
								</div>
							</div>
							<div class = "row knocks_house_keeper">
								<div class = "col s12 l4"><p class = "knocks_text_dark_active">Agree</p></div>
								<div class = "col s12 l8">
									<el-progress v-loading = "retrivedAnswers.loading"  :percentage="parseInt( answersObject.q12[2] / answersObject.q12.total * 100)"></el-progress>
								</div>
							</div>
							<div class = "row knocks_house_keeper">
								<div class = "col s12 l4"><p class = "knocks_text_dark_active">Fair</p></div>
								<div class = "col s12 l8">
									<el-progress v-loading = "retrivedAnswers.loading"  :percentage="parseInt( answersObject.q12[3] / answersObject.q12.total * 100)"></el-progress>
								</div>
							</div>
							<div class = "row knocks_house_keeper">
								<div class = "col s12 l4"><p class = "knocks_text_dark_active"> Disgree</p></div>
								<div class = "col s12 l8">
									<el-progress v-loading = "retrivedAnswers.loading"  :percentage="parseInt( answersObject.q12[4] / answersObject.q12.total * 100)"></el-progress>
								</div>
							</div>
							<div class = "row knocks_house_keeper">
								<div class = "col s12 l4"><p class = "knocks_text_dark_active">Strongly Disgree</p></div>
								<div class = "col s12 l8">
									<el-progress v-loading = "retrivedAnswers.loading"  :percentage="parseInt( answersObject.q12[5] / answersObject.q12.total * 100)"></el-progress>
								</div>
							</div>
							<hr class="uk-divider-icon">
						</div>
					</div>
					<!--Q13-->
					<div class = "row">
						<div class = "col s12" v-if = "answersObject != null && answersObject.q3 != undefined">
							<p class = "knocks_text_ms knocks_text_dark">Privacy policies are effective in Social Networking sites?</p>
							<div class = "row knocks_house_keeper">
								<div class = "col s12 l4"><p class = "knocks_text_dark_active">Strongly Agree</p></div>
								<div class = "col s12 l8">
									<el-progress v-loading = "retrivedAnswers.loading"  :percentage="parseInt( answersObject.q13[1] / answersObject.q13.total * 100)"></el-progress>
								</div>
							</div>
							<div class = "row knocks_house_keeper">
								<div class = "col s12 l4"><p class = "knocks_text_dark_active">Agree</p></div>
								<div class = "col s12 l8">
									<el-progress v-loading = "retrivedAnswers.loading"  :percentage="parseInt( answersObject.q13[2] / answersObject.q13.total * 100)"></el-progress>
								</div>
							</div>
							<div class = "row knocks_house_keeper">
								<div class = "col s12 l4"><p class = "knocks_text_dark_active">Fair</p></div>
								<div class = "col s12 l8">
									<el-progress v-loading = "retrivedAnswers.loading"  :percentage="parseInt( answersObject.q13[3] / answersObject.q13.total * 100)"></el-progress>
								</div>
							</div>
							<div class = "row knocks_house_keeper">
								<div class = "col s12 l4"><p class = "knocks_text_dark_active"> Disgree</p></div>
								<div class = "col s12 l8">
									<el-progress v-loading = "retrivedAnswers.loading"  :percentage="parseInt( answersObject.q13[4] / answersObject.q13.total * 100)"></el-progress>
								</div>
							</div>
							<div class = "row knocks_house_keeper">
								<div class = "col s12 l4"><p class = "knocks_text_dark_active">Strongly Disgree</p></div>
								<div class = "col s12 l8">
									<el-progress v-loading = "retrivedAnswers.loading"  :percentage="parseInt( answersObject.q13[5] / answersObject.q13.total * 100)"></el-progress>
								</div>
							</div>
							<hr class="uk-divider-icon">
						</div>
					</div>
					<!--Q16-->
					<div class = "row">
						<div class = "col s12" v-if = "answersObject != null && answersObject.q3 != undefined">
							<p class = "knocks_text_ms knocks_text_dark">Would it be better to expand the options of interactivity?	<br/><small class = "knocks_text_pink">
								*Posting can be with a text,poet and articles templates, media and also a voice note*
							</small></p>
							<div class = "row knocks_house_keeper">
								<div class = "col s12 l4"><p class = "knocks_text_dark_active">Strongly Agree</p></div>
								<div class = "col s12 l8">
									<el-progress v-loading = "retrivedAnswers.loading"  :percentage="parseInt( answersObject.q16[1] / answersObject.q16.total * 100)"></el-progress>
								</div>
							</div>
							<div class = "row knocks_house_keeper">
								<div class = "col s12 l4"><p class = "knocks_text_dark_active">Agree</p></div>
								<div class = "col s12 l8">
									<el-progress v-loading = "retrivedAnswers.loading"  :percentage="parseInt( answersObject.q16[2] / answersObject.q16.total * 100)"></el-progress>
								</div>
							</div>
							<div class = "row knocks_house_keeper">
								<div class = "col s12 l4"><p class = "knocks_text_dark_active">Fair</p></div>
								<div class = "col s12 l8">
									<el-progress v-loading = "retrivedAnswers.loading"  :percentage="parseInt( answersObject.q16[3] / answersObject.q16.total * 100)"></el-progress>
								</div>
							</div>
							<div class = "row knocks_house_keeper">
								<div class = "col s12 l4"><p class = "knocks_text_dark_active"> Disgree</p></div>
								<div class = "col s12 l8">
									<el-progress v-loading = "retrivedAnswers.loading"  :percentage="parseInt( answersObject.q16[4] / answersObject.q16.total * 100)"></el-progress>
								</div>
							</div>
							<div class = "row knocks_house_keeper">
								<div class = "col s12 l4"><p class = "knocks_text_dark_active">Strongly Disgree</p></div>
								<div class = "col s12 l8">
									<el-progress v-loading = "retrivedAnswers.loading"  :percentage="parseInt( answersObject.q16[5] / answersObject.q16.total * 100)"></el-progress>
								</div>
							</div>
							<hr class="uk-divider-icon">
						</div>
					</div>
					<!--Q17-->
					<div class = "row">
						<div class = "col s12" v-if = "answersObject != null && answersObject.q3 != undefined">
							<p class = "knocks_text_ms knocks_text_dark">Are you usually able to interact in your social media account
								<br/><small class = "knocks_text_pink">
								*for example: while driving*
							</small></p>
							<div class = "row knocks_house_keeper">
								<div class = "col s12 l4"><p class = "knocks_text_dark_active">Strongly Agree</p></div>
								<div class = "col s12 l8">
									<el-progress v-loading = "retrivedAnswers.loading"  :percentage="parseInt( answersObject.q17[1] / answersObject.q17.total * 100)"></el-progress>
								</div>
							</div>
							<div class = "row knocks_house_keeper">
								<div class = "col s12 l4"><p class = "knocks_text_dark_active">Agree</p></div>
								<div class = "col s12 l8">
									<el-progress v-loading = "retrivedAnswers.loading"  :percentage="parseInt( answersObject.q17[2] / answersObject.q17.total * 100)"></el-progress>
								</div>
							</div>
							<div class = "row knocks_house_keeper">
								<div class = "col s12 l4"><p class = "knocks_text_dark_active">Fair</p></div>
								<div class = "col s12 l8">
									<el-progress v-loading = "retrivedAnswers.loading"  :percentage="parseInt( answersObject.q17[3] / answersObject.q17.total * 100)"></el-progress>
								</div>
							</div>
							<div class = "row knocks_house_keeper">
								<div class = "col s12 l4"><p class = "knocks_text_dark_active"> Disgree</p></div>
								<div class = "col s12 l8">
									<el-progress v-loading = "retrivedAnswers.loading"  :percentage="parseInt( answersObject.q17[4] / answersObject.q17.total * 100)"></el-progress>
								</div>
							</div>
							<div class = "row knocks_house_keeper">
								<div class = "col s12 l4"><p class = "knocks_text_dark_active">Strongly Disgree</p></div>
								<div class = "col s12 l8">
									<el-progress v-loading = "retrivedAnswers.loading"  :percentage="parseInt( answersObject.q17[5] / answersObject.q17.total * 100)"></el-progress>
								</div>
							</div>
							<hr class="uk-divider-icon">
						</div>
					</div>
				</div>
			</div>
			@endsection
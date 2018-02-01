<template lang="html">
<el-tabs @tab-click="handleClick" v-model="activeName" tab-position="left" class = "knocks_house_keeper">
<el-tab-pane name = "general">
<span class ="knocks_text_anchor" slot="label">
  <i class="knocks-user"></i>
  <static_message msg = "General" class = "hide-on-small-only"></static_message>
</span>
<knocksuser main_container = "row knocks_house_keeper" v-model = "userObject" :user="user" as_report></knocksuser>
</el-tab-pane>
<el-tab-pane name = "career" v-loading = "careerIsLoading">
<span class ="knocks_text_anchor" slot="label">
  <i class="knocks-suitcase3"></i>
  <static_message msg = "Career" class = "hide-on-small-only"></static_message>
</span>
<transition enter-active-class = "animated zoomIn" leave-active-class = "animated bounceOutUp">
<center v-if = "career != null &&  career.length == 0">
<span class = "knocks-alert-circle knocks_text_ms"></span>
<static_message msg = "Nothing to show here" classes = "knocks_fair_bounds knocks_text_ms"></static_message>
</center>
</transition>
 <!--  -->

<el-collapse>
<el-collapse-item  class = "animated bounceInUp" v-for="(com,index) in career" :key = "index"   :name="'career_'+index">
<span slot="title" class="knocks_text_md  ">{{com.works_at}}</span>

     <ul class = "knocks_text_ms blue-grey-text text-darken-1">
  <li> <span class="knocks-home12"></span>   <static_message msg = "Works At"></static_message>  :  {{career[index].works_at}}</li>
  <li>  <span class="knocks-time4"></span>  <static_message msg= "Works Since"></static_message>  :  {{detailsDate(career[index].works_since)}}</li>
  <li> <span class="knocks-time4"></span>   <static_message msg= "Works To"></static_message>  :  {{detailsDate(career[index].works_to)}}</li>
  <li> <span class="knocks-tie"></span>   <static_message msg= "Works As"></static_message> :  {{career[index].works_as}}</li>
  <li > <span class="knocks-suitcase3"></span>  <static_message msg= "Major"></static_message>  :  {{career[index].works_what}}</li>
</ul>

 

</el-collapse-item>
<el-collapse-item  v-if = "userObject != null && userObject.thatsMe">
  <span slot="title" class="knocks_text_md  ">
    <static_message msg= "Add a new job"></static_message>
  </span>
  <knocksusercareers @knocks_career_uploaded = "career.push($event)"></knocksusercareers>
   
 </el-collapse-item>
</el-collapse>
</el-tab-pane>
<el-tab-pane name = "education" v-loading = "educationIsLoading">
<span class ="knocks_text_anchor" slot="label">
  <i class="knocks-home7"></i>
  <static_message msg = "Education" class = "hide-on-small-only"></static_message>
</span>
<transition enter-active-class = "animated zoomIn" leave-active-class = "animated bounceOutUp">
<center v-if = "education != null &&  education.length == 0">
<span class = "knocks-alert-circle knocks_text_ms"></span>
<static_message msg = "Nothing to show here" classes = "knocks_fair_bounds knocks_text_ms"></static_message>
</center>
</transition>
<el-collapse>
<el-collapse-item v-for="(com,index) in education" :key = "index" :name="'education_'+index" class = "animated bounceInUp">
<span slot="title" class="knocks_text_md  ">{{com.study_at}}</span>
<ul  class = "knocks_text_ms blue-grey-text text-darken-1">
  <li> <span class="knocks-home12"></span>   <static_message msg = "Study At"></static_message>  :  {{education[index].study_at}}</li>
  <li>  <span class="knocks-time4"></span>  <static_message msg= "Study Since"></static_message>  :  {{detailsDate(education[index].study_since)}}</li>
  <li> <span class="knocks-time4"></span>   <static_message msg= "Study To"></static_message>  :  {{detailsDate(education[index].study_to)}}</li>
  <li> <span class="knocks-certificate3"></span>   <static_message msg= "Grade"></static_message> :  {{education[index].grade}}</li>
  <li > <span class="knocks-document-certificate2"></span>  <static_message msg= "Certificate"></static_message>  :  {{education[index].study_what}}</li>
</ul>
</el-collapse-item>
<el-collapse-item  v-if = "userObject != null && userObject.thatsMe">
  <span slot="title" class="knocks_text_md  ">
    <static_message msg= "Add a new study"></static_message>
  </span>
  <knocksusereducation @knocks_education_uploaded = "education.push($event)"></knocksusereducation>
   
 </el-collapse-item>
</el-collapse>
</el-tab-pane>
<el-tab-pane name = "high_education" v-loading = "higheducationIsLoading">
<span class ="knocks_text_anchor" slot="label">
  <i class="knocks-graduate"></i>
  <static_message msg = "High Education" class = "hide-on-small-only"></static_message>
</span>
<transition enter-active-class = "animated zoomIn" leave-active-class = "animated bounceOutUp">
<center v-if = "education != null &&  education.length == 0">
<span class = "knocks-alert-circle knocks_text_ms"></span>
<static_message msg = "Nothing to show here" classes = "knocks_fair_bounds knocks_text_ms"></static_message>
</center>
</transition>
<el-collapse>
<el-collapse-item v-for="(com,index) in high_education" :key = "index" :name="'high_education_'+index" class = "animated bounceInUp">
<span slot="title" class="knocks_text_md  ">{{com.study_at}}</span>
<ul class = "knocks_text_ms blue-grey-text text-darken-1">
  <li> <span class="knocks-home12"></span>   <static_message msg = "Study At"></static_message>  :  {{high_education[index].study_at}}</li>
  <li>  <span class="knocks-time4"></span>  <static_message msg= "Study Since"></static_message>  :  {{detailsDate(high_education[index].study_since)}}</li>
  <li> <span class="knocks-time4"></span>   <static_message msg= "Study To"></static_message>  :  {{detailsDate(high_education[index].study_to)}}</li>
  <li> <span class="knocks-certificate3"></span>   <static_message msg= "Grade"></static_message> :  {{high_education[index].grade}}</li>
  <li > <span class="knocks-document-certificate2"></span>  <static_message msg= "Certificate"></static_message>  :  {{high_education[index].study_what}}</li>
</ul>
</el-collapse-item>
<el-collapse-item  v-if = "userObject != null && userObject.thatsMe">
  <span slot="title" class="knocks_text_md  ">
    <static_message msg= "Add a new study"></static_message>
  </span>
  <knocksuserhigheducation @knocks_high_education_uploaded = "high_education.push($event)"></knocksuserhigheducation>
   
 </el-collapse-item>
</el-collapse>
</el-tab-pane>
<el-tab-pane name = "hobby" v-loading = "hobbyIsLoading">
<span class ="knocks_text_anchor" slot="label">
  <i class="knocks-puzzle-piece"></i>
  <static_message msg = "Hobby" class = "hide-on-small-only"></static_message>
</span>
<transition enter-active-class = "animated zoomIn" leave-active-class = "animated bounceOutUp">
<center v-if = "hobby != null &&  hobby.length == 0">
<span class = "knocks-alert-circle knocks_text_ms"></span>
<static_message msg = "Nothing to show here" classes = "knocks_fair_bounds knocks_text_ms"></static_message>
</center>
</transition>
<el-collapse>
<el-collapse-item v-for="(com,index) in hobby" :key = "index" :name="'hobby_'+index" class = "animated bounceInUp">
<span slot="title" class="knocks_text_md  ">{{com.name}}</span>
<ul class = "knocks_text_ms blue-grey-text text-darken-1" >
  <li> <span class="knocks-puzzle-piece"></span>   <static_message msg = "Name"></static_message>  :  {{hobby[index].name}}</li>
  <li v-if =" gethobbyURL(index)" >  <span class="knocks-globe8"></span>  <static_message msg= "URL"></static_message>  :  {{hobby[index].url}}</li>
</ul>
</el-collapse-item>
<el-collapse-item  v-if = "userObject != null && userObject.thatsMe">
  <span slot="title" class="knocks_text_md  ">
    <static_message msg= "Add a new hobby"></static_message>
  </span>
  <knocksuserhobby @knocks_hobby_uploaded = "hobby.push($event)"></knocksuserhobby>
   
 </el-collapse-item>
</el-collapse>
</el-tab-pane>
<el-tab-pane name = "sport" v-loading = "sportIsLoading">
<span class ="knocks_text_anchor" slot="label">
  <i class="knocks-checkered-flag2"></i>
  <static_message msg = "Sports" class = "hide-on-small-only"></static_message>
</span>
<center v-if = "sport != null &&  sport.length == 0">
<span class = "knocks-alert-circle knocks_text_ms"></span>
<static_message msg = "Nothing to show here" classes = "knocks_fair_bounds knocks_text_ms"></static_message>
</center>
<el-collapse>
<el-collapse-item v-for="(com,index) in sport" :key = "index" :name="'sport_'+index" class = "animated bounceInUp">
<span slot="title" class="knocks_text_md  ">{{com.name}}</span>
<ul class = "knocks_text_ms blue-grey-text text-darken-1">
  <li> <span class="knocks-checkered-flag2"></span>   <static_message msg = "Name"></static_message>  :  {{sport[index].name}}</li>
  <li v-if =" getsportURL(index)" >  <span class="knocks-globe8"></span>  <static_message msg= "URL"></static_message>  :  {{sport[index].url}}</li>
</ul>
</el-collapse-item>
<el-collapse-item  v-if = "userObject != null && userObject.thatsMe">
  <span slot="title" class="knocks_text_md  ">
    <static_message msg= "Add a new sport"></static_message>
  </span>
  <knocksusersport @knocks_sport_uploaded = "sport.push($event)"></knocksusersport>
   
 </el-collapse-item>
</el-collapse>
</el-tab-pane>
<!-- <el-tab-pane label="Config" name="second">Config</el-tab-pane>
<el-tab-pane label="Role" name="third">Role</el-tab-pane>
<el-tab-pane label="Task" name="fourth">Task</el-tab-pane> -->
</el-tabs>
</template>

<script>
export default {
  props : {
    user : {
      type : Number , 
      required : true
    }
  },
 data(){
  return{
    career : null,
    careerLoaded : false ,
    careerIsLoading: false ,
    activeName : 'general',
    education : null,
    educationLoaded : false,
    educationIsLoading:false,
    high_education : null,
    higheducationLoaded : false,
    higheducationIsLoading : false,
    hobby : null,
    hobbyLoaded : false,
    hobbyIsLoading : false,
    sport: null,
    sportLoaded: false,
    sportIsLoading: false,
    userObject : null ,
  }
  },
  mounted(){

  },
  methods:{
   formatToOffset(date){
    let offset = new Date().getTimezoneOffset();
      return moment(date).subtract(offset ,'m');
    },
   fromNowDate(date){
      date = this.formatToOffset(date);
      return date == null ? '' : moment(date).fromNow();
    },
    detailsDate(date){
      date = this.formatToOffset(date);
      return date == null ? '' : moment(date).format('MMMM Do YYYY');
    },
    retriveCareer(){
      const vm = this
      axios({
        url:'career/get',
        method:'post' ,
        data : {user : vm.user} ,
        onDownloadProgress : ()=>{ vm.careerIsLoading = true ; }
      }).then((response)=>{

          vm.career = response.data;
          vm.careerLoaded = true ;
          vm.careerIsLoading = false ;
      });
    },
    retriveEducation(){
      const vm = this
      axios({
        method:'post',
        url:'education/get',
        data : {user : vm.user} ,
        onDownloadProgress : ()=>{vm.educationIsLoading = true; }
      }).then((response)=>{
        vm.education = response.data;
        vm.educationLoaded = true;
        vm.educationIsLoading = false ;
      });
    },

    retriveHighEducation(){
      const vm = this
      axios({
        method:'post',
        url:'high_education/get',
        data : {user : vm.user} ,
        onDownloadProgress : ()=>{vm.higheducationIsLoading = true;}
      }).then((response)=>{
        vm.high_education = response.data;
        vm.higheducationLoaded = true;
        vm.higheducationIsLoading = false ;
      });
    },
    retriveHobby(){
      const vm = this
      axios({
        method:'post',
        url:'hobby/get',
        data : {user : vm.user} ,
        onDownloadProgress: ()=>{vm.hobbyIsLoading = true;}
      }).then((response)=>{
        vm.hobby = response.data ;
        vm.hobbyLoaded = true;
        vm.hobbyIsLoading = false ;

      });
    },
    retriveSport(){
      const vm = this
      axios({
        method:'post',
        url:'sport/get',
        data : {user : vm.user} ,
        onDownloadProgress: ()=>{vm.sportIsLoading = true;}
      }).then((response)=>{
        vm.sport = response.data ;
        vm.sportLoaded = true;
        vm.sportIsLoading = false ;

      });
    },
    handleClick(tab, event) {

      const vm = this;
      if(this.activeName == 'career' && !this.careerLoaded)
      this.retriveCareer();
      if(this.activeName == 'education' && !this.educationLoaded)
      this.retriveEducation();
      if(this.activeName == 'high_education' && !this.higheducationLoaded)
      this.retriveHighEducation();
      if(this.activeName == 'hobby' && !this.hobbyLoaded)
      this.retriveHobby();
      if(this.activeName == 'sport' && !this.sportLoaded)
      this.retriveSport();

    },
    gethobbyURL(index){
      const vm = this
    if( vm.hobby[index].url == null)
    return false;
    else return true;
  },
  getsportURL(index){
    const vm = this
  if( vm.sport[index].url == null)
  return false;
  else return true;
  }
  }
}
</script>

<style lang="css" scoped>
.el-tabs__item.is-active {

}
.el-tabs__active-bar{

background-color: #91124f !important;

}
.el-collapse-item__header {
    height: 100%;
    line-height: 300%;
    padding-left: 1%;

    color: #91124f !important;
    cursor: pointer;
    border-bottom: 1px solid #dfe6ec;
    font-size: 13px;
    border-top-left-radius: 5px !important;
    border-top-right-radius: 5px !important;
}
.el-tabs__item.is-active>span.knocks_text_anchor{
  color: #f06292 !important;
}
.el-collapse-item__content {
    padding: 10px 15px;
    font-size: 13px;
    color:#91124f ;
    line-height: 1.769230769230769;
}


</style>

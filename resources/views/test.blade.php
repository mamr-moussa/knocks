<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="csrf-token" content="{{csrf_token()}}" />
    <link rel="stylesheet" href="{{asset('css/app.css')}}" />
    <title>New Document</title>

    <nav class="" uk-navbar>
     <div class="">

           <ul class="uk-navbar-nav">
             <li><a>NLP | Word Processor</a></li>
           </ul>
    </div>
    </nav>


  </head>
  <body>
    <div id = "app">
       <div class = "container">
           <br/><br/>
           <el-button type="primary">Element Ui Button</el-button>
           <br/><br/>
           <a class="waves-effect waves-light btn">Materialize Button</a>
           <el-input placeholder="Please input" v-model="input" ></el-input>

           <el-select v-model="value" placeholder="Select">
            <el-option v-for="item in options" :key="item.value" selectedLabel="" :label="item.label" :value="item.value">
          </el-option>
        </el-select>


    </div>
  </div>
  </body>
  <script src = "{{asset('js/app.js')}}"></script>
</html>

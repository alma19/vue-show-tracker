<template>
  <div>
    <div class="navigation">
      <nav class="navbar navbar-default">
         <div class="container-fluid">

           <!-- Brand and toggle get grouped for better mobile display -->
           <div class="navbar-header">
             <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
               <span class="sr-only">Toggle navigation</span>
               <span class="icon-bar"></span>
               <span class="icon-bar"></span>
               <span class="icon-bar"></span>
             </button>
             <i class="fa fa-television" aria-hidden="true"></i>
             <a class="navbar-brand" href="" id="home">TV Show Tracker</a>
           </div>

           <!-- Collect the nav links, forms, and other content for toggling -->
           <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
             <ul class="nav navbar-nav navbar-right">
               <li><a href="">All Shows</a></li>
               <li><a @click="createForm()" @newShow="createForm">New Show</a></li>
             </ul>
           </div><!-- /.navbar-collapse -->
         </div><!-- /.container-fluid -->
       </nav>
    </div>

    <div class="container">

    <div class="intro">
      <p>
        Intro Here
      </p>
    </div>


      <div v-if="showForm">
        <ShowForm @created="fetch"></ShowForm>
      </div>

     <div class="ShowList" v-show="showList">
      <Show v-for="(show, index) in shows" :key="index" :show="show" @updated="update" @deleted="remove(index)"></Show>
    </div>

    <p v-show="shows.length === 0">You do not have any contacts yet. Why don't you add one?</p>

    <transition name="fade">
      <MainLoader v-if="loading"></MainLoader>
    </transition>

    </div>

    <ShowFooter></ShowFooter>
  </div>
</template>


<script>
import axios from 'axios';
import Show from './Show';
import ShowForm from './ShowForm';
import MainLoader from './MainLoader';
import Navigation from './Navigation';
import ShowFooter from './ShowFooter';


export default {
  components: {
    Show,
    ShowForm,
    MainLoader,
    Navigation,
    ShowFooter
  },

  // make GET request for data
  data () {
    return {
      shows: [],
      showForm: false,
      showList: true,
      loading: false,
    }
  },

  mounted () {
    this.fetch();
  },

  methods: {
    createForm() {
      this.showForm = true;
      // this.showList = false;
      this.creating = true;
      console.log('createForm');
      console.log(this.creating);
    },

    fetch (){
      console.log('App->fetch');
      this.loading = true;
      axios.get('/shows')
        .then((response) => {
          console.log('App ->fetch success');
          console.log(response.data);
          this.shows = response.data;
          this.loading = false;
        })
        .catch((response) => {
          console.log('App -> fetch error');
          //show error
          this.loading = false;
        })
    }, // end fetch

    update (data) {
      console.log(data);
      var i = this.shows.indexOf(data.show);
      for (var d in data) {
        var show = this.shows[i];
        if (d === 'show') continue;
        show[d] = data[d];
      }
    }, // end update

     remove (i) {
       console.log(`App -> remove ID: ${i}`);
       this.shows.splice(i, 1);
     }

  } // end methods
} // end export defaults
</script>
<style lang="scss">

nav {
  font-family: 'Raleway', sans-serif;
}

body {
  background-color: #bca68b;
}

.navigation {
  i {
    font-size: 2em;
    position: relative;
    top: 11px;
    float: left;
  }

  a {
    pointer: cursor;
  }

  #home {
    margin-left: 0%;
  }

  .navbar-default {
    background-color: #7e6e81;
    border-color: #7e6e81;
  }

  .navbar-default .navbar-nav > li > a {
    color: black;
  }

  .navbar-default .navbar-brand {
    color: black;
  }

  .navbar-default .navbar-toggle:hover .navbar-default .navbar-toggle:focus {
    background-color: #7e6e81;
  }
}

.intro {
  text-align: center; 
}


</style>

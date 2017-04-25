<template>
  <div>
    <Navigation @openForm="createForm"></Navigation>


    <div class="container">

    <div class="intro">
      <p>
        Intro  test here blah blah blahHere
      </p>
      <div class="intro-filter">
        <ul>
          <li><a href="#" @click.prevent="filter('')">All Shows</a></li>
          <li><a href="#" @click.prevent="filter('To Watch')">To Watch</a></li>
          <li><a href="#" @click.prevent="filter('Watching')">Watching</a></li>
          <li><a href="#" @click.prevnet="filter('Watched')">Watched</a></li>
        </ul>
      </div>
    </div>

    <!--create new show -->
    <div v-show="showForm">
        <ShowForm @created="fetch" @cancelled="cancelling"></ShowForm>
    </div>

      <!-- @updated & @deleted is from Show.vue, what was emitted for the remove() and save() methods -->
     <div class="ShowList">
      <Show v-for="(show, index) in shows" :key="index" :show="show" @updated="update" @deleted="remove(index)" ></Show>
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
import StarRating from 'vue-star-rating';


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
      loading: false,
    }
  },

  mounted () {
    this.fetch();
    console.log(shows);
  },

  methods: {
    createForm() {
      this.showForm = true;
      console.log('createForm');
    },

    fetch (){
      console.log('App->fetch');
      this.loading = true;
      this.showForm = false;
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
     },

     cancelling () {
       console.log('cancelCreate');
       this.name = '';
       this.channel = '';
       this.genre = '';
       this.status = '';
       this.notes = '';
       this.rating = '';
       this.picture = '';
       this.favorite = false;
       this.showForm = false;
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
  // i {
  //   font-size: 2em;
  //   position: relative;
  //   top: 11px;
  //   float: left;
  // }

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

<template>
  <div>
    <!-- binding to navigation component so you can create a new show  -->
    <Navigation @openForm="createForm"></Navigation>


    <div class="container">

    <div class="intro">
      <div class="intro-text">
      <p>
        Show Tracker was created as a way to help you keep track of TV shows you want to watch, are currently watching, or have already watched. Click on 'New Show' to get started!
      </p>
      </div>

      <!--v show toggles on / off when you make a new show -->
      <div class="intro-filter" v-show="filtering">
        <ul>
          <li><a href="#" @click.prevent="showAll"><h4>All Shows</h4></a> </li>
          <li><a href="#" @click.prevent="showToWatch"><h4>To Watch</h4></a> </li>
          <li><a href="#" @click.prevent="showWatching"><h4>Watching</h4></a></li>
          <li><a href="#" @click.prevent="showWatched"><h4>Watched</h4></a> </li>
          <li><a href="#" @click.prevent="showFavorites"><h4>Favorites</h4></a></li>
        </ul>
      </div>
    </div>

    <!--create new show -->
    <div v-show="showForm">
        <ShowForm @created="fetch" @cancelled="cancelling"></ShowForm>
    </div>

        <!--allows you to filter shows by watch status / will disappear if you make a new show-->

      <div v-show="filtering" v-if="toWatch == true && watching==true && watched==true" >
        <div class="ShowList">
         <Show v-for="(show,index) in shows" :key="show.id" :show="show" @updated="update" @deleted="remove(index)" ></Show>
       </div>
      </div>

        <div v-show="filtering" v-else-if="favoriteShow == true">
          <div class="ShowList">
           <Show v-for="(show, index) in filterBy (shows, '1', 'favorite')" :key="show.id" :show="show" @updated="update" @deleted="remove(index)" ></Show>
         </div>
        </div>

    <div v-show="filtering" v-else-if="toWatch == true">
      <div class="ShowList">
       <Show v-for="(show,index) in filterBy(shows, 'To Watch', 'status')" :key="show.id" :show="show" @updated="update" @deleted="remove(index)" ></Show>
     </div>
    </div>

    <div v-show="filtering" v-else-if="watching == true">
      <div class="ShowList">
       <Show v-for="(show, index) in filterBy(shows, 'Watching', 'status')" :key="show.id" :show="show" @updated="update" @deleted="remove(index)" ></Show>
     </div>
    </div>

    <div  v-show="filtering" v-else-if="watched == true">
      <div class="ShowList">
       <Show v-for="(show, index) in filterBy(shows, 'Watched', 'status')" :key="show.id" :show="show" @updated="update" @deleted="remove(index)" ></Show>
     </div>
    </div>

    <div v-show="filtering" v-else>
      <div class="ShowList">
       <Show v-for="(show, index) in shows" :key="show.id" :show="show" @updated="update" @deleted="remove(index)" ></Show>
     </div>
    </div>
      <!-- @updated & @deleted is from Show.vue, what was emitted for the remove() and save() methods -->



    <!--if no shows have been created, display this message. -->
    <p v-show="shows.length === 0">You do not have any shows yet. Why don't you add one?</p>


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
      toWatch: false,
      watching: false,
      watched: false,
      favoriteShow: false,
      filtering: true
    }
  },

  // fetches data from database when the page loads
  mounted () {
    this.fetch();
  },

  methods: {
    // opens up ShowForm / takes away filtering options when making a new show
    createForm() {
      this.showForm = true;
      console.log('createForm');
      this.filtering = false;
    },

    // retrieving shows from database / displaying them on page
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
          this.filtering = true;
        })
        .catch((response) => {
          console.log('App -> fetch error');
          //show error
          this.loading = false;
        })
    }, // end fetch

    //updating a show
    update (data) {
      console.log(data);
      var i = this.shows.indexOf(data.show);
      for (var d in data) {
        var show = this.shows[i];
        if (d === 'show') continue;
        show[d] = data[d];
      }
    }, // end update

    //deleting a show
     remove (i) {
      console.log(`App -> remove ID: ${i}`);
      this.shows.splice(i, 1);
     },

     //cancelling a show from ShowForm
     cancelling () {
       console.log('cancelCreate');
       this.name = '';
       this.channel = '';
       this.genre = '';
       this.status = '';
       this.notes = '';
       this.rating = '';
       this.picture = '';
       this.season = '';
       this.episode = '';
       this.favorite = false;
       this.showForm = false;
       this.filtering = true;
     },

     //filtering shows by status
     showToWatch (){
       this.toWatch = true;
       this.watching = false;
       this.watch = false;
       this.favoriteShow = false;
       console.log("showToWatch " + this.toWatch);
     },

     showWatching(){
       this.toWatch = false;
       this.watching = true;
       this.watched = false;
       this.favoriteShow = false;
       console.log("showWatching " + this.watching);
     },

     showWatched (){
       this.toWatch = false;
       this.watching = false;
       this.watched = true;
       this.favoriteShow = false;
       console.log("showWatched " + this.watched);
     },

     showAll() {
       console.log("showAll");
       this.toWatch = true;
       this.watching = true;
       this.watched = true;
       this.favoriteShow=false;
       console.log(this.toWatch + this.watching + this.watched + this.favoriteShow);
     },

     showFavorites(){
      this.toWatch = false;
      this.watching = false;
      this.watched = false;
      this.favoriteShow = true;
       console.log("showFavorites " + this.favoriteShow);
     }
  }

} // end export defaults
</script>
<style lang="scss">
body {
  background-color: #bca68b;
}

  a {
    pointer: cursor;
  }


.intro {
  text-align: center;
  .intro-title {
    color: white;
  }
  .intro-text {
    margin: 15px 0 20px 0;
  }
  .intro-filter {
    ul {
      display: flex;
      justify-content: space-around;
      font-family: 'Hind', sans-serif;
      li {
        list-style-type: none;
        a {
          color: #3f4664;
          font-weight: 700;
          text-decoration: none;
          :hover {
            color: white;
          }
        }
      }
    }

  }
}

@media only screen and (max-width: 500px) {
    .intro {
      .intro-filter {
        ul {
          display: flex;
          flex-direction: column;
        }
      }
    }
}




</style>

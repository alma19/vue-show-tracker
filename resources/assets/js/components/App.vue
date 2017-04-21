<template>
  <div>
    <Navigation></Navigation>
    <div class="container">
      <ShowForm @created="fetch"></ShowForm>

    <div class="ShowList" v-show="shows.length >0">
      <Show v-for="(show, index) in shows" :key="index" :show="show" @updated="update" @deleted="remove(index)"></Show>
    </div>

    <p v-show="shows.length === 0">You do not have any contacts yet. Why don't you add one?</p>

    <transition name="fade">
      <MainLoader v-if="loading"></MainLoader>
    </transition>

    </div>

    <Footer></Footer>
  </div>
</template>


<script>
import axios from 'axios';
import Show from './Show';
import ShowForm from './ShowForm';
import MainLoader from './MainLoader';
import Navigation from './Navigation';
import Footer from './Footer';


export default {
  components: {
    Show,
    ShowForm,
    MainLoader,
    Navigation,
    Footer
  },

  // make GET request for data
  data () {
    return {
      shows: [],
      loading: false
    }
  },

  mounted () {
    this.fetch();
  },

  methods: {


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
body {
  background-color: #bca68b;
}

</style>

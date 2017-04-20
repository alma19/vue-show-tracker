<template>
  <div class="container">
    <h4>App.vue</h4>
    <ShowForm @created="fetch"></ShowForm>

    <transition name="fade">
      <MainLoader v-if="loading"></MainLoader>
    </transition>

  </div>
</template>


<script>
import axios from 'axios';
import ShowForm from './ShowForm';
import MainLoader from './MainLoader';

export default {
  components: {
    ShowForm,
    MainLoader
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
    } // end fetch
  } // end methods
} // end export defaults
</script>
<style>
</style>

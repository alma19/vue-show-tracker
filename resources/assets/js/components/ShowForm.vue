<template>
  <div class="ShowForm">

  <h1>New Show</h1>

  <div class="form-group col-lg-4 col-md-4">
    <label><h4>Name</h4></label>
    <input class="form-control" type="text" v-model="name" />
  </div>

  <div class="form-group col-lg-4 col-md-4">
    <label><h4>Channel</h4></label>
    <input class="form-control" type="text" v-model="channel" />
  </div>

  <div class="form-group col-lg-4 col-md-4">
    <label><h4>Genre</h4></label>
    <input class="form-control" type="text" v-model="genre"  />
  </div>


  <div class="form-group col-lg-4 col-md-4">
    <label><h4>Show Cover URL</h4></label>
    <input class="form-control" type="text" v-model="picture"/>
  </div>


  <div class="form-group col-lg-4 col-md-4">
    <label><h4>Status</h4></label>
    <select  class="form-control" v-model="status">
      <option value="" selected>Select Status</option>
      <option value="To Watch">To Watch</option>
      <option value="Watching">Watching</option>
      <option value="Watched">Watched</option>
    </select>
  </div>


    <!-- <div class="form-group col-lg-4 col-md-4">
      <label><h4>Rating</h4></label>
      <select class="form-control" v-model="rating">
        <option value="" selected></option>
        <option value="1">1</option>
        <option value="2">2</option>
        <option value="3">3</option>
        <option value="4">4</option>
        <option value="5">5</option>
      </select>
    </div> -->

    <div class="form-group col-lg-4 col-md-4">
      <label><h4>Rating</h4></label>
        <star-rating
          v-model="rating" v-bind:star-size="30"
          @rating-selected="setRating">
        </star-rating>
    </div>


<div class="form-group col-lg-4 col-md-4">
  <label><h4>Favorite</h4></label>
  <input class="form-control" type="checkbox" v-model="favorite" />
</div>



  <div class="buttons col-lg-12 col-md-12 col-sm-12">
    <button class="btn btn-default cancel" @click.prevent="cancelCreate">Cancel</button>
    <button class="btn btn-sm add" @click="create" :disabled="loading">Add Show</button>
    <Loader v-show="loading"></Loader>
  </div>


  </div>
</template>


<script>

import axios from 'axios';
import Loader from './Loader';
import StarRating from 'vue-star-rating';

export default {
  components: {
    Loader,
    StarRating
  },

  props: [
    'createForm'
  ],
  data() {
    return {
      name: '',
      channel: '',
      genre: '',
      status: '',
      rating: 0,
      picture: '',
      favorite: false,
      loading: false,
      filtering: false
    }
  },
  methods: {

    setRating: function(rating) {
      this.rating = rating;
      console.log(rating);
    },
    create (){
      console.log('ShowForm -> create');
      if(this.loading) {
        alert('request is already being made');
        return false;
      }
      this.loading = true;
      this.sendRequest();
    },
    sendRequest () {
      axios.post('/shows', {
        name: this.name,
        channel: this.channel,
        genre: this.genre,
        status: this.status,
        rating: this.rating,
        picture: this.picture,
        favorite: this.favorite
      })
      .then((response) => {
        console.log('ShowForm -> sendRequest success');
        console.log(response.data);
        this.loading = false;
        this.reset();
        this.$emit('created');
      })
      .catch((error) => {
        console.log('ShowForm -> sendRequest error');
        // show an error message
      });
    },

    reset (){
      this.name = '';
      this.channel = '';
      this.genre = '';
      this.status = '';
      this.rating = 0;
      this.picture = '';
      this.favorite = false;
    },
    //cancel creating a new show
    cancelCreate (){
      this.name = '';
      this.channel = '';
      this.genre = '';
      this.status = '';
      this.rating = 0;
      this.picture = '';
      this.$emit('cancelled')
    }
  }
};

</script>

<style scoped>

.buttons {
  display: flex;
  justify-content: space-between;
}




</style>

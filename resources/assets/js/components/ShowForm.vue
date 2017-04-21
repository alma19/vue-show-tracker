<template>
  <div class="ShowForm">

  <label>Name</label>
  <input type="text" v-model="name" />

  <label>Channel</label>
  <input type="text" v-model="channel" />

  <label>Genre</label>
  <input type="text" v-model="genre"  />

  <label>Rating</label>
  <select v-model="rating">
    <option value="" selected></option>
    <option value="1">1</option>
    <option value="2">2</option>
    <option value="3">3</option>
    <option value="4">4</option>
    <option value="5">5</option>
  </select>

  <label>Status</label>
  <select v-model="status">
    <option value="" selected>Select Status</option>
    <option value="To Watch">To Watch</option>
    <option value="Watching">Watching</option>
    <option value="Watched">Watched</option>
  </select>

  <label>Notes</label>
  <textarea class="form-control" name="notes" id="notes" placeholder="Notes" v-model="notes"></textarea>

  <label>Favorite</label>
  <input type="checkbox" v-model="favorite" />

  <label>Artwork</label>
  <input type="text" v-model="picture"/>

  <button class="btn btn-primary" @click="create" :disabled="loading">Add Show</button>
  </div>
</template>


<script>

import axios from 'axios';
import Loader from './Loader';

export default {
  components: {
    Loader
  },

  data() {
    return {
      name: '',
      channel: '',
      genre: '',
      status: '',
      notes: '',
      rating: '',
      picture: '',
      favorite: false,
      loading: false
    }
  },

  methods: {
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
        notes: this.notes,
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
      this.notes = '';
      this.rating = '';
      this.picture = ''; 
      this.favorite = false;
    }
  }
};

</script>

<style>

</style>

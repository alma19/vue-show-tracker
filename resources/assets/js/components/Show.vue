<template>
  <div class="Show panel panel-default">
    <div class="panel-heading">

      <a class="tool" href="#" @click.prevent="remove">
        <i class="glyphicon glyphicon-remove pull-right"></i>
      </a>

      <a class="tool" href="#" @click.prevent="editing = true" v-show="!editing">
        <i class="glyphicon glyphicon-pencil pull-right"></i>
      </a>
    </div> <!--panel heading -->

    <div class="panel-body">
      <div class="live" v-show="!editing">
        <p>{{ show.name }}</p>
        <img :src="show.picture" />
      </div>
      <div class="editing" v-show="editing">
        <p>
          <label>Name</label>
          <input type="text" v-model="name" />

          <label>Channel</label>
          <input type="text" v-model="channel" />

          <label>Genre</label>
          <input type="text" v-model="genre" />

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

          <label>Artwork</label>
          <input type="text" v-model="picture"/>
        </p>

        <p>
          <button class="btn btn-success" @click="save">Save</button>
          <button class="btn btn-default" @click="cancel">Cancel</button>
        </p>
      </div>
    </div> <!--panel body-->

  </div>
</template>

<script>
import axios from 'axios';
export default {
  props: [
    'show'
  ],

  data (){
    return {
      name: this.show.name,
      channel: this.show.channel,
      genre: this.show.genre,
      status: this.show.status,
      notes: this.show.notes,
      rating: this.show.rating,
      picture: this.show.picture,
      favorite: this.show.favorite,
      editing: false,
      loading: false
    }
  },

  methods: {
    remove () {
      console.log('Contact->remove');
      this.loading = true;
      axios.delete(`/shows/${this.show.id}`)
        .then((response) => {
          console.log('Show -> remove success');
          this.$emit('deleted')
          this.loading = false;
        })
        .catch((error) =>{
          console.log('Show -> remove error');
          // stop deleting and dont remove from the dom
          // tell the user deletion failed
        });
    },

    save () {
      console.log('Show -> save');
      axios.put(`/shows/${this.show.id}`, {
        name: this.name,
        channel: this.channel,
        genre: this.genre,
        status: this.status,
        notes: this.notes,
        rating: this.rating,
        picture: this.picture,
        favorite: this.favorite
      })
      .then((response) =>{
        console.log('Show -> success');
        this.$emit('updated', {
          show: this.show,
          name: this.name,
          channel: this.channel,
          genre: this.genre,
          status: this.status,
          notes: this.notes,
          rating: this.rating,
          picture: this.picture,
          favorite: this.favorite
        });
        this.editing = false;
      })
      .catch((error) => {
        console.log('Show -> save error');
        //show the user that it couldn't be updated
      });
    }, // end save

    cancel () {
      console.log('Show -> cancel');
      this.name= this.show.name;
      this.channel = this.show.channel;
      this.genre = this.show.genre;
      this.status = this.show.status;
      this.notes = this.show.notes;
      this.rating = this.show.rating;
      this.picture = this.show.picture;
      this.favorite = this.show.favorite;
      this.editing = false;
    }
  }




}
</script>

<style scoped>
.Show {
}
</style>

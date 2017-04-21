<template>
  <div class="Show">


      <div class="live" v-show="!editing">

          <div class="container col-lg-4 col-md-4">
            <img :src="show.picture" class="pic"/>
            <div class="show-text">
              <h5>{{ show.name }}</h5>
              <div class="show-icons">

               <a class="tool" href="#" @click.prevent="editing = true" v-show="!editing">
                 <i class="fa fa-pencil" aria-hidden="true"></i>
               </a>

               <a class="tool" href="#" @click.prevent="remove">
                <i class="fa fa-trash" aria-hidden="true"></i>
              </a>
              </div>
            </div>

        </div>


      </div>


      <div class="editing" v-show="editing">

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
            <label><h4>Status</h4></label>
            <select  class="form-control" v-model="status">
              <option value="" selected>Select Status</option>
              <option value="To Watch">To Watch</option>
              <option value="Watching">Watching</option>
              <option value="Watched">Watched</option>
            </select>
          </div>

            <div class="form-group col-lg-4 col-md-4">
              <label><h4>Show Cover URL</h4></label>
              <input class="form-control" type="text" v-model="picture"/>
            </div>

            <div class="form-group col-lg-4 col-md-4">
              <label><h4>Rating</h4></label>
              <select class="form-control" v-model="rating">
                <option value="" selected></option>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
              </select>
            </div>

          <div class="form-group col-lg-12">
            <label><h4>Notes</h4></label>
            <textarea class="form-control" name="notes" id="notes" placeholder="Notes" v-model="notes"></textarea>
          </div>


          <label>Favorite</label>
          <input class="form-control" type="checkbox" v-model="favorite" />


        <p>
          <button class="btn btn-default" @click="save">Save</button>
          <button class="btn btn-default" @click="cancel">Cancel</button>
        </p>



      </div>


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

<style>

img {
  width: 300px;
  height: 450px;
  margin-top: 7%;
}

.show-text {
  color: #fff;
  background-color: #7e6e81;
  width: 300px;
  text-align: center;
  margin-top: 3%;
  padding: 10px;
}

.show-icons {
  font-size: 1.5em;
}

i {
  color: black;
}


</style>

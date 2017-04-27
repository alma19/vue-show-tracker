<template>
  <div class="Show col-lg-4 col-md-4">


      <div class="live" v-show="!editing">

        <div>
          <div class="container">
            <img :src="show.picture" class="pic"/>
            <div class="show-text">
              <h4 class="show-name">{{ show.name }}</h4>
              {{show.status}}
              <div class="stars">
                <star-rating :read-only="true" :rating="rating" v-bind:show-rating="false" v-bind:star-size="30">{{ show.rating }}
                </star-rating>
              </div>
              <div class="show-icons">

               <a class="tool edit" href="#" @click.prevent="editing = true" v-show="!editing" >
                 <i class="fa fa-pencil" aria-hidden="true"></i>
               </a>

               <a class="tool delete" href="#" @click.prevent="remove">
                <i class="fa fa-trash" aria-hidden="true"></i>
              </a>
              </div>
            </div> <!--show text-->
        </div>


      </div> <!--live / !editing-->


      </div> <!-- show -->


      <div class="editing" v-show="editing">

        <h3>Edit Show</h3>
        <div class="form-group col-lg-12 col-md-12">
            <label><h4>Name</h4></label>
            <input class="form-control" type="text" v-model="name" />
          </div>

          <div class="form-group col-lg-12 col-md-12">
            <label><h4>Channel</h4></label>
            <input class="form-control" type="text" v-model="channel" />
          </div>

          <div class="form-group col-lg-12 col-md-12">
            <label><h4>Genre</h4></label>
            <input class="form-control" type="text" v-model="genre"  />
          </div>

          <div class="form-group col-lg-12 col-md-12">
            <label><h4>Show Cover URL</h4></label>
            <input class="form-control" type="text" v-model="picture"/>
          </div>

          <div class="form-group col-lg-12 col-md-12">
            <label><h4>Status</h4></label>
            <select  class="form-control" v-model="status">
              <option value="" selected>Select Status</option>
              <option value="To Watch">To Watch</option>
              <option value="Watching">Watching</option>
              <option value="Watched">Watched</option>
            </select>
          </div>

            <div class="form-group col-lg-12 col-md-12">
              <label><h4>Rating</h4></label>
                <star-rating v-model="rating" v-bind:star-size="30"></star-rating>
            </div>

          <div class="form-group col-lg-12 col-md-12">
            <label><h4>Favorite</h4></label>
            <input class="form-control" type="checkbox" v-model="favorite" />
          </div>



        <div class="buttons col-lg-12 col-md-12 col-sm-12">
          <button class="btn btn-default" @click="cancel">Cancel</button>
          <button class="btn btn-default save" @click="save">Save</button>
        </div>



      </div>


  </div>
</template>

<script>
import axios from 'axios';
import StarRating from 'vue-star-rating';

export default {
  components: {
    StarRating
  },

  props: [
    'show'
  ],

  data (){
    return {
      name: this.show.name,
      channel: this.show.channel,
      genre: this.show.genre,
      status: this.show.status,
      rating: this.show.rating,
      picture: this.show.picture,
      favorite: this.show.favorite,
      editing: false,
      loading: false,
      Show2: false
    }
  },

  methods: {
    // removing info from database (axios.delete)& then from page (this.$emit)
    remove () {
      console.log('Show->remove');
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

    // saves updated info to database
    // saves updated info to what's displayed on the page
    save () {
      console.log('Show -> save');
      axios.put(`/shows/${this.show.id}`, {
        name: this.name,
        channel: this.channel,
        genre: this.genre,
        status: this.status,
        rating: this.rating,
        picture: this.picture,
        favorite: this.favorite
      })
      // this.$emit -> updates what's displayed on page -> App.vue
      .then((response) =>{
        console.log('Show -> success');
        this.$emit('updated', {
          show: this.show,
          name: this.name,
          channel: this.channel,
          genre: this.genre,
          status: this.status,
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

    // keeps the info in the form as the current state, no updates
    //  this.show.x is the current state
    cancel () {
      console.log('Show -> cancel');
      this.name= this.show.name;
      this.channel = this.show.channel;
      this.genre = this.show.genre;
      this.status = this.show.status;
      this.rating = this.show.rating;
      this.picture = this.show.picture;
      this.favorite = this.show.favorite;
      this.editing = false;
    },

    editingShow (){
      console.log("editingShow");
    }
  }




}
</script>

<style lang="scss">
.Show2 {
  height: 750px;
}


.Show {
  width: 300px;
  height: 650px;
  margin-bottom: 5px;

  img {
   width: 300px;
     height: 450px;
     margin-top: 2%;
   }

  .show-text {
    color: #fff;
    background-color: #7e6e81;
    width: 300px;
    height: 150px;
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

  .show-name {
    color: white;
  }

  .stars {
    display: flex;
    justify-content: center;
  }

  .edit {
    float: left;
  }

  .delete {
    float: right;
  }

  .save {
    background-color: #3f4664;
    border-color: #3f4664;
    color: #fff;
  }

  .save:hover, .save:active {
    background-color: #7e7e85;
    border-color: #7e7e85;
    color: white;
  }

  .buttons {
    display: flex;
    justify-content: space-between;
  }
}




</style>

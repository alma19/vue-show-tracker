<template>
  <div class="Navigation">
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
           <a class="navbar-brand" href="" id="home">Show Tracker</a>
         </div>

         <!-- Collect the nav links, forms, and other content for toggling -->
         <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
           <ul class="nav navbar-nav navbar-right">
             <li><a href="">All Shows</a></li>
             <li><a @click="createForm()" :createForm="createForm">New Show</a></li>
           </ul>
         </div><!-- /.navbar-collapse -->
       </div><!-- /.container-fluid -->
     </nav>


  </div>
</template>



<script>

import axios from 'axios';
import ShowForm from './ShowForm';

export default {
  components: {
    shows: [],
    ShowForm
  },

  props: [
    'show',
  ],

  data (){
    return {
      showForm: false
    }
  },

  methods: {
    createForm() {
      console.log('Navigation createForm');
      this.$emit('openForm');
    }
  }
}
</script>

<style scoped>

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

  .navbar-default .navbar-toggle:hover, .navbar-default. navbar-toggle:focus {
    background-color: #7e6e81;
  }
</style>

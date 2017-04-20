<template>
  <div class="container">
      <Styleguide></Styleguide>
  </div>
</template>


<script>
import axios from 'axios';
import Styleguide from './Styleguide';

export default {
  components: {
    Styleguide
  },

  data () {
    return {
      cat: 'meow'
    }
  },

  mounted () {
  },

  methods: {
  }
}
</script>
<style>
</style>

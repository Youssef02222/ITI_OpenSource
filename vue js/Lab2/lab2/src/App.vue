<template>
  <div>
    <NavbarComponent />
    <router-view></router-view>
  </div>
</template>

<script>
import NavbarComponent from './components/Navbar.vue'

export default {
  name: 'App',
  components: {
    NavbarComponent
  },
  data() {
    return {
    }
  },
  methods: {
  }
}
</script>

<style>
* {
  background-color: black;
  color: white;
}

#app {
  font-family: Avenir, Helvetica, Arial, sans-serif;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
  text-align: center;
  /* margin-top: 60px; */
}

/* @import "~bootstrap/dist/css/bootstrap.css"; */
</style>

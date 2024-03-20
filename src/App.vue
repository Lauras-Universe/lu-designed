<script setup>
import Footer from './components/Footer.vue';

window.addEventListener('scroll', function() {
  var nav = document.getElementById('sticky-nav');
  if (window.scrollY > 100) { // 100px ist der Schwellenwert
    nav.style.backgroundColor = "rgba(0,0,0,.8)"; // Dunkler Hintergrund, wenn gescrollt wird
  } else {
    nav.style.backgroundColor = "transparent"; // Transparenter Hintergrund, wenn oben
  }
});

</script>

<template>
  <div id="app">
    <nav id="sticky-nav">
      <router-link to="/">Home</router-link>
      <router-link to="/about">About</router-link>
    </nav>
    <router-view id="app-content"></router-view>
    <Footer />
  </div>
  
</template>

<style scoped>
.logo {
  height: 6em;
  padding: 1.5em;
  will-change: filter;
  transition: filter 300ms;
}
.logo:hover {
  filter: drop-shadow(0 0 2em #646cffaa);
}
.logo.vue:hover {
  filter: drop-shadow(0 0 2em #42b883aa);
}

</style>

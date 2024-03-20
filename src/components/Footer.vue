<template>
  <footer>
    <p>&copy; by Lauras Universe</p>
    <p>
      <router-link to="/impressum">Impressum</router-link>
      <router-link to="/contact">Kontakt</router-link>
    </p>
  </footer>
</template>

<script setup>

</script>

<style scoped>
  footer {
    display: flex;
    flex-direction: column;
  }
  a {
    display: inline-block;
    margin: 7.5px;
    text-transform: uppercase;
    color: white;
  }
</style>
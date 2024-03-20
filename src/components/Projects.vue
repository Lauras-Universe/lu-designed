<script setup>
import { ref, onMounted } from 'vue';

const projekte = ref([]);

const ladeProjekte = () => {
  fetch('/projects.json')
    .then(response => response.json())
    .then(data => {
      projekte.value = data.map(projekt => ({
        ...projekt,
        beschreibung: projekt.beschreibung.replace(/\n/g, '<br>')
      }));
    })
    .catch(error => console.error('Fehler beim Laden der Projekte:', error));
};

onMounted(ladeProjekte);
</script>

<template>
  <div class="projekte-container">
    <h1>Projekte</h1>
    <div v-for="projekt in projekte" :key="projekt.id" class="projekt">
      <h3>{{ projekt.titel }}</h3>
      <img :src="projekt.bild" :alt="projekt.titel" />
      <p v-html="projekt.beschreibung"></p>
      <a :href="projekt.link" target="_blank">Zur Seite</a>
    </div>
  </div>
</template>



<style scoped>
.projekte-container {
  display: flex;
  flex-wrap: wrap;
  justify-content: space-around;
  width: 100%;
  margin: 20px 0;
  flex-direction: column;
  justify-content: center;
  align-content: center;
}
.projekt {
  width: 50%;
}
.projekt img {
  width: 100%;
  height: auto;
}

.projekt a {
  display: inline-block;
  padding: 15px 0;
}

@media screen and (max-width:768px){
  .projekt {
    width: 100%;
  }
}
</style>

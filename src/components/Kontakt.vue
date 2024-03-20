<template>
  <div>
    <form @submit.prevent="submitForm">
      <div>
        <label for="name">Name:</label>
        <input id="name" v-model="form.name" type="text" required>
      </div>
      <div>
        <label for="email">E-Mail:</label>
        <input id="email" v-model="form.email" type="email" required>
      </div>
      <div>
        <label for="message">Nachricht:</label>
        <textarea id="message" v-model="form.message" required></textarea>
      </div>
      <button type="submit">Senden</button>
    </form>
  </div>
</template>

<script>
export default {
  data() {
    return {
      form: {
        name: '',
        email: '',
        message: ''
      }
    };
  },
  methods: {
    async submitForm() {
      try {
        const response = await fetch('../../mail/mailbackend.php', {
          method: 'POST',
          headers: {
            'Content-Type': 'application/json',
          },
          body: JSON.stringify(this.form),
        });

        if (!response.ok) throw new Error('Netzwerkantwort war nicht ok.');

        this.form = { name: '', email: '', message: '' }; // Formular zurücksetzen
        alert('E-Mail erfolgreich gesendet!');
      } catch (error) {
        console.error('Fehler beim Senden der E-Mail:', error);
        alert('Fehler beim Senden der E-Mail. Bitte versuchen Sie es später erneut.');
      }
    }
  }
};
</script>

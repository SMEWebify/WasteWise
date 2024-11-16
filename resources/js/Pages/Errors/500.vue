<template>
<div class="error-page">
    <h1 class="text-4xl">500 - Erreur Serveur</h1>
    <p class="text-lg">Une erreur est survenue sur le serveur. Veuillez réessayer plus tard.</p>
    <inertia-link href="/" class="btn btn-primary mt-4">Retour à l'accueil</inertia-link>
</div>
</template>

<script setup>
import { Link } from '@inertiajs/vue3'
</script>

<style scoped>
.error-page {
text-align: center;
margin-top: 50px;
}
</style>
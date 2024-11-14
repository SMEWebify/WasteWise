<template>
    <div class="home-container">
        <div class="container text-center">
            <div class="row">
                <div class="col-md-12">
                    <!-- Header -->
                    <h1 class="text-5xl font-bold mb-4 text-white">Bienvenue sur WasteWise</h1>
                    <p class="text-xl mb-6 text-white">Gérez vos déchets et participez à un avenir plus propre et durable.</p>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12 ">
                    <!-- Logo -->
                    <img src="/images/logo.PNG" alt="WasteWise Logo" class="logo-img  form-container">
                </div>
            </div>
            
            <div class="row">
                <div class="col-md-12 mt-20">
                    <!-- Header -->
                    <p class="lead text-white mb-5">
                        La solution intelligente pour la gestion des déchets industriels.
                    </p>
            
                    <!-- Links -->
                    <div class="mb-4">
                        <!-- Inertia Links for login and register -->
                        <Link :href="route('login')" class="btn btn-outline-light btn-lg mx-2">
                        Se Connecter
                        </Link>

                        <Link :href="route('register')" class="btn btn-outline-light btn-lg mx-2">
                        S'inscrire
                        </Link>
                    </div>

                    <!-- Section des témoignages -->
                    <div class="container mx-auto text-center mt-20">
                        <h2 class="text-3xl font-bold mb-8 text-white">Ce que disent nos utilisateurs</h2>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div v-for="(testimonial, index) in testimonials" :key="index" class="testimonial p-6 bg-green-600 shadow rounded">
                                <blockquote class="italic text-lg mb-4">"{{ testimonial.quote }}"</blockquote>
                                <p class="font-bold">- {{ testimonial.author }}</p>
                            </div>
                        </div>
                    </div>
                    
                    <!-- GitHub Repo Link -->
                    <div class="repo-link">
                        <a href="https://github.com/your-repo" target="_blank" class="github-link">
                            Voir GitHub
                        </a>
                    </div>

                    <!-- Footer -->
                    <div class="footer mt-5">
                        <p class="text-white">© 2024 WasteWise - Tous droits réservés</p>
                    </div>
                </div>
            </div>


            
        </div>
    </div>
</template>
    
<script>
import { Link } from '@inertiajs/vue3';

export default {
    name: 'Home',
    props: {
    services: Array,
    testimonials: Array,
  },
    components: {
        Link,
    },
    computed: {
        canRegister() {
        return !!this.$page.props.auth?.canRegister;
        }
    }
    };
</script>
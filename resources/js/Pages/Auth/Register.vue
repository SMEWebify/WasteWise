<script setup>
import GuestLayout from '@/Layouts/GuestLayout.vue';
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';
import { Head, Link, useForm } from '@inertiajs/vue3';

const form = useForm({
    name: '',
    email: '',
    password: '',
    password_confirmation: '',
});

const submit = () => {
    form.post(route('register'), {
        onFinish: () => form.reset('password', 'password_confirmation'),
    });
};
</script>

<template>
    <Head title="Register" />

    <!-- Container du formulaire -->
    <div class="home-container">

        <!-- Formulaire d'inscription -->
        <div class="row">
            
            <div class="col-md-12">
                <!-- Header -->
                <h1 class="text-white text-3xl mb-6">Créer un Compte</h1>
            </div>
            
            <div class="col-md-12">
                <form @submit.prevent="submit" class="p-6 rounded-lg shadow-lg form-container ">
                    <!-- Nom -->
                    <div class="mb-4">
                        <InputLabel for="name" value="Nom"/>
                        <TextInput
                            id="name"
                            type="text"
                            class="mt-1 block w-full p-2 border rounded-md"
                            v-model="form.name"
                            required
                            autofocus
                            autocomplete="name"
                        />
                        <InputError class="mt-2 text-red-600" :message="form.errors.name" />
                    </div>

                    <!-- Email -->
                    <div class="mb-4">
                        <InputLabel for="email" value="Email" />
                        <TextInput
                            id="email"
                            type="email"
                            class="mt-1 block w-full p-2 border rounded-md"
                            v-model="form.email"
                            required
                            autocomplete="username"
                        />
                        <InputError class="mt-2 text-red-600" :message="form.errors.email" />
                    </div>

                    <!-- Mot de passe -->
                    <div class="mb-4">
                        <InputLabel for="password" value="Mot de Passe" />
                        <TextInput
                            id="password"
                            type="password"
                            class="mt-1 block w-full p-2 border rounded-md"
                            v-model="form.password"
                            required
                            autocomplete="new-password"
                        />
                        <InputError class="mt-2 text-red-600" :message="form.errors.password" />
                    </div>

                    <!-- Confirmation du mot de passe -->
                    <div class="mb-4">
                        <InputLabel for="password_confirmation" value="Confirmez le Mot de Passe" />
                        <TextInput
                            id="password_confirmation"
                            type="password"
                            class="mt-1 block w-full p-2 border rounded-md"
                            v-model="form.password_confirmation"
                            required
                            autocomplete="new-password"
                        />
                        <InputError class="mt-2 text-red-600" :message="form.errors.password_confirmation" />
                    </div>

                    <!-- Boutons -->
                    <div class="mt-6 flex items-center justify-between">
                        <Link
                            :href="route('login')"
                            class="text-sm text-white  underline hover:text-gray-900"
                        >
                            Déjà inscrit ?
                        </Link>
                        <PrimaryButton
                            :class="{ 'opacity-25': form.processing }"
                            :disabled="form.processing"
                            class="ms-4 btn btn-outline-light"
                        >
                            S'inscrire
                        </PrimaryButton>
                    </div>
                </form>
            </div>
        </div>
    </div>
</template>

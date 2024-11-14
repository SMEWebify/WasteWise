<script setup>
import GuestLayout from '@/Layouts/GuestLayout.vue';
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';
import { Head, useForm } from '@inertiajs/vue3';

defineProps({
    status: {
        type: String,
    },
});

const form = useForm({
    email: '',
});

const submit = () => {
    form.post(route('password.email'));
};
</script>

<template>
        <Head title="Forgot Password" />

    <!-- Container du formulaire -->
    <div class="home-container">

        <!-- Formulaire d'inscription -->
        <div class="row">
            
            <div class="col-md-12">
                <!-- Header -->
                <div class="mb-4 text-sm text-white">
                    Mot de passe oublié ? Aucun problème. Communiquez-nous simplement votre adresse e-mail et <br/>
                    nous vous enverrons par e-mail un lien de réinitialisation de mot de passe qui vous permettra de <br/>
                    choisir un nouveau mot de passe.
                </div>

                <div
                    v-if="status"
                    class="mb-4 text-sm font-medium text-green-600"
                >
                    {{ status }}
                </div>
            </div>
            
            <div class="col-md-12">
                <form @submit.prevent="submit" class="p-6 rounded-lg shadow-lg form-container ">
                    <div>
                        <InputLabel for="email" value="Email" />

                        <TextInput
                            id="email"
                            type="email"
                            class="mt-1 block w-full"
                            v-model="form.email"
                            required
                            autofocus
                            autocomplete="username"
                        />

                        <InputError class="mt-2" :message="form.errors.email" />
                    </div>

                    <div class="mt-4 flex items-center justify-end">
                        <PrimaryButton
                            :class="{ 'opacity-25': form.processing }"
                            :disabled="form.processing"
                        >
                            Lien de réinitialisation du mot de passe par e-mail
                        </PrimaryButton>
                    </div>
                </form>
            </div>
        </div>
    </div>
</template>

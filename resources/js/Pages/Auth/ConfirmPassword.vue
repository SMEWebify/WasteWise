<script setup>
import GuestLayout from '@/Layouts/GuestLayout.vue';
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';
import { Head, useForm } from '@inertiajs/vue3';

const form = useForm({
    password: '',
});

const submit = () => {
    form.post(route('password.confirm'), {
        onFinish: () => form.reset(),
    });
};
</script>

<template>
    <Head title="Confirm Password" />

    <!-- Container du formulaire -->
    <div class="home-container">

        <!-- Formulaire d'inscription -->
        <div class="row">
            <div class="col-md-12">
                <div class="mb-4 text-sm text-gray-600">
                    Il s'agit d'une zone sécurisée de l'application. <br/>
                    Veuillez confirmer votre mot de passe avant de continuer.
                </div>
                    
                <div class="col-md-12">
                    <form @submit.prevent="submit" class="p-6 rounded-lg shadow-lg form-container ">
                        <div>
                            <InputLabel for="password" value="Password" />
                            <TextInput
                                id="password"
                                type="password"
                                class="mt-1 block w-full"
                                v-model="form.password"
                                required
                                autocomplete="current-password"
                                autofocus
                            />
                            <InputError class="mt-2" :message="form.errors.password" />
                        </div>

                        <div class="mt-4 flex justify-end">
                            <PrimaryButton
                                class="ms-4"
                                :class="{ 'opacity-25': form.processing }"
                                :disabled="form.processing"
                            >
                            Confirmer
                            </PrimaryButton>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</template>
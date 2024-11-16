<script setup>
    import { Head } from '@inertiajs/vue3';
    import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
    defineProps({ suggestions: Array });
</script>

<template>
    <Head title="Suggestions d'Amélioration" />
    <AuthenticatedLayout>
        <template #header>
            <h2 class="text-xl font-semibold leading-tight text-gray-800">
                Suggestions d'Amélioration
            </h2>
        </template>

        <div class="py-12 flow-container">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white shadow-sm sm:rounded-lg p-6">
                    <h1 class="text-2xl font-bold mb-4">Suggestions d'Amélioration</h1>
                    <ul class="list-disc list-inside">
                        <li v-for="suggestion in suggestions" :key="suggestion.suggestion">
                            <strong>{{ suggestion.suggestion }}</strong>
                            <span class="block text-sm text-gray-500">Impact : {{ suggestion.impact }}</span>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>

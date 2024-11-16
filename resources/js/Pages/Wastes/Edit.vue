<script setup>
import { useForm, usePage } from '@inertiajs/vue3';
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head } from '@inertiajs/vue3';

const { waste } = usePage().props;

const form = useForm({
  type: waste.type,
  category: waste.category,
  origin: waste.origin,
  volume: waste.volume,
  unit: waste.unit,
});

const submit = () => {
  form.put(route('wastes.update', waste.id));
};
</script>

<template>
  <Head title="Gestion des Déchets" />

  <AuthenticatedLayout>
      <template #header>
          <h2 class="text-xl font-semibold leading-tight text-gray-800">
            Gestion des Déchets > Modifier le déchet > N° {{ waste.id }}
          </h2>
      </template>

      <div class="py-12 flow-container">
          <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
              <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                <h1 class="text-2xl font-bold mb-4">Modifier le déchet</h1>

                <form @submit.prevent="submit">
                  <div class="mb-4">
                    <label for="type" class="block text-sm font-medium text-gray-700">Type</label>
                    <input v-model="form.type" id="type" type="text" class="mt-1 block w-full" required />
                    <span v-if="form.errors.type" class="text-red-600">{{ form.errors.type }}</span>
                  </div>

                  <div class="mb-4">
                    <label for="category" class="block text-sm font-medium text-gray-700">Category</label>
                    <input v-model="form.category" id="category" type="text" class="mt-1 block w-full" required />
                    <span v-if="form.errors.category" class="text-red-600">{{ form.errors.category }}</span>
                  </div>

                  <div class="mb-4">
                    <label for="origin" class="block text-sm font-medium text-gray-700">Origine</label>
                    <input v-model="form.origin" id="origin" type="text" class="mt-1 block w-full" required />
                    <span v-if="form.errors.origin" class="text-red-600">{{ form.errors.origin }}</span>
                  </div>

                  <div class="mb-4">
                    <label for="volume" class="block text-sm font-medium text-gray-700">Volume</label>
                    <input v-model="form.volume" id="volume" type="number" class="mt-1 block w-full" required />
                    <span v-if="form.errors.volume" class="text-red-600">{{ form.errors.volume }}</span>
                  </div>

                  <div class="mb-4">
                    <label for="unit" class="block text-sm font-medium text-gray-700">Unité</label>
                    <input v-model="form.unit" id="unit" type="text" class="mt-1 block w-full" step="0.1" required />
                    <span v-if="form.errors.unit" class="text-red-600">{{ form.errors.unit }}</span>
                  </div>

                  <div class="flex items-center justify-between">
                    <Link href="{{ route('wastes.index') }}" class="btn btn-secondary">Annuler</Link>
                    <button type="submit" class="btn btn-primary" :disabled="form.processing">Enregistrer les modifications</button>
                  </div>
                </form>
              </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>

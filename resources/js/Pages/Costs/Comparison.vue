<script setup>
    import { usePage } from '@inertiajs/vue3';
    import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
    import { Head } from '@inertiajs/vue3';

    const { comparison } = usePage().props;
</script>

<template>
  <Head title="Optimisation des Coûts" />
  <AuthenticatedLayout>
    <template #header>
      <h2 class="text-xl font-semibold leading-tight text-gray-800">
        Optimisation des Coûts > Comparaison des fournisseurs
      </h2>
    </template>

    <div class="py-12 flow-container">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
          <h1 class="text-2xl font-bold mb-4">Comparaison des fournisseurs</h1>
          
          <!-- Itération sur chaque type de déchet -->
          <div v-for="(waste, wasteType) in comparison" :key="wasteType" class="mb-8">
            <h2 class="text-xl font-semibold mb-4">{{ wasteType }}</h2>

            <!-- Tableau pour chaque type de déchet -->
            <table class="table-auto w-full text-left">
              <thead>
                <tr>
                  <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Fournisseur</th>
                  <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Coût total</th>
                  <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Coût par unité</th>
                  <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Devise</th>
                </tr>
              </thead>
              <tbody>
                <!-- Itération sur les fournisseurs pour chaque type de déchet -->
                <tr v-for="provider in waste.providers" :key="provider.provider_name">
                  <td class="px-6 py-4 whitespace-nowrap">{{ provider.provider_name }}</td>
                  <td class="px-6 py-4 whitespace-nowrap">{{ provider.total_cost }}</td>
                  <td class="px-6 py-4 whitespace-nowrap">{{ provider.cost_per_unit }}</td>
                  <td class="px-6 py-4 whitespace-nowrap">{{ provider.currency }}</td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </AuthenticatedLayout>
</template>


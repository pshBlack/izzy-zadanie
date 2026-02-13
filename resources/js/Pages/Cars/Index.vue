<script setup>
  defineProps({
    "cars": Array,
  })
</script>

<template>
  <div class="container mt-5">
    <h1 class="mb-4">Zoznam áut</h1>
    
    <table class="table table-striped table-hover">
      <thead class="table-dark">
        <tr>
          <th>ID</th>
          <th>Name</th>
          <th>Registration Number</th>
          <th>Registered</th>
          <th>Amount of Parts</th>
        </tr>
      </thead>
      <tbody>
        <tr v-for="car in cars" :key="car.id">
          <td>{{ car.id }}</td>
          <td>{{ car.name }}</td>
          <td>{{ car.registration_number || '—' }}</td>
          <td>
            <span :class="['badge', car.is_registered ? 'bg-success' : 'bg-secondary']">
              {{ car.is_registered ? 'Áno' : 'Nie' }}
            </span>
          </td>
          <td></td>
        </tr>
      </tbody>
    </table>
  </div>
</template>

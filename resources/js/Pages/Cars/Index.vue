<script setup>
defineProps({
    "cars": Object,
})
import moment from 'moment';
import { Link, router } from '@inertiajs/vue3'
import Layout from '../../Layouts/Main.vue'
defineOptions({ layout: Layout })

const deleteCar = (id) => {
    if (confirm('Do you really want delete that record?')) {
        router.delete(route('cars.destroy', id));
    }
}
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
                    <th>Parts</th>
                    <th>Creation Date</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="car in cars.data" :key="car.id">
                    <td>{{ car.id }}</td>
                    <td>{{ car.name }}</td>
                    <td>{{ car.registration_number || '—' }}</td>
                    <td>
                        <span :class="['badge', car.is_registered ? 'bg-success' : 'bg-secondary']">
                            {{ car.is_registered ? 'Áno' : 'Nie' }}
                        </span>
                    </td>
                    <td>{{ car.parts_count }}</td>
                    <td>{{ moment(car.created_at).format('DD/MM/YYYY') }}</td>
                    <td>
                        <div class="d-flex gap-3 mt-1">
                            <Link :href="route('cars.show', car.id)"><i class=" bi bi-eye text-dark"></i></Link>
                            <Link class="" :href="route('cars.edit', car.id)"><i class="bi bi-pencil text-dark"></i>
                            </Link>
                            <i @click="deleteCar(car.id)" class="bi bi-trash text-dark fix"></i>
                        </div>
                    </td>
                </tr>
            </tbody>
        </table>
        <nav aria-label="Page Pagination" class="mt-5 gray-900">
            <!-- {{cars.links}} -->
            <ul class="pagination pagination-md justify-content-center ">
                <li v-for="car in cars.links" :key="car.page" class="page-item"
                    :class="{ 'active': car.active, 'disabled': !car.url }">

                    <Link class="page-link" :href="car.url || '#'" v-html="car.label" />
                </li>
            </ul>
        </nav>

    </div>
</template>
<style lang="css" scoped>
.fix {
    cursor: pointer;
}
</style>
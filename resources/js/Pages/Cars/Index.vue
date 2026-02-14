<script setup>
defineProps({
    "cars": Object,
})
import moment from 'moment';
import { Link } from '@inertiajs/vue3'
import Layout from '../../Layouts/Main.vue'
defineOptions({ layout: Layout })
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
                    <td class="mt-3">
                        <a href="#"><i class="bi bi-trash gray"></i></a>
                        <a class="ms-3" href="#"><i class="bi bi-pencil gray"></i></a>
                    </td>
                </tr>
            </tbody>
        </table>
        <nav aria-label="Page Pagination" class="mt-5 gray-900">
            <!-- {{cars.links}} -->
            <ul class="pagination pagination-md justify-content-center ">
                <li v-for="car in cars.links" :key="car.page" class="page-item"
                    :class="{ 'active': car.active, 'disabled': !car.url }">

                    <Link class="page-link gray-list" :href="car.url || '#'" v-html="car.label" />
                </li>
            </ul>
        </nav>

    </div>
</template>
<style lang="css" scoped>
.gray {
    color: #1d1d1d !important;
}
</style>
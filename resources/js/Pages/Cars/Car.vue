<script setup>
import Layout from '../../Layouts/Main.vue'
import moment from 'moment';
import { Link } from '@inertiajs/vue3';
defineProps({
    "car": Object,
    "parts": Object,
})
defineOptions({ layout: Layout })
</script>

<template>

    <div class="container mt-3">
        <div class="card">
            <div class="card-header text-bg-dark">
                <div class="d-flex justify-content-between mt-2">
                    <h4>Information</h4>
                    <h5>
                        <span class="badge" :class="car.is_registered ? 'text-bg-success' : 'text-bg-danger'">
                            {{ car.is_registered ? 'Registered' : 'Not Registered' }}
                        </span>
                    </h5>
                </div>
            </div>

            <div class="card-body text-dark d-flex justify-content-around">
                <div class="">
                    <span class="card-title text-secondary">Name</span>
                    <h3>{{ car.name }}</h3>
                </div>
                <div>
                    <span class="card-title text-secondary">Registration number</span>
                    <h3>{{ car.registration_number ? car.registration_number : "-" }}</h3>
                </div>
                <div>
                    <span class="card-title text-secondary">Creation Date</span>
                    <h3>{{ moment(car.creation_date).format('DD/MM/YYYY') }}</h3>
                </div>
                <div>
                    <span class="card-title text-secondary">Identification Number</span>
                    <h3>{{ car.id }}</h3>
                </div>
            </div>
        </div>
        <h2 class="mt-5 mb-3">List of parts</h2>

        <table class="table table-striped table-hover">
            <thead class="table-dark">
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Searial Number</th>
                    <th>Creation Date</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="part in parts.data" :key="part.id">
                    <td>{{ part.id }}</td>
                    <td>{{ part.name }}</td>
                    <td>{{ part.serialnumber }}</td>
                    <td>{{ moment(part.created_at).format('DD/MM/YYYY') }}</td>
                    <td>
                        <div class="d-flex gap-3 mt-1">
                            <Link :href="route('cars.edit', car.id)"><i class="bi bi-pencil text-dark" />
                            </Link>
                            <i @click="deleteCar(part.id)" class="bi bi-trash text-danger fix"></i>
                        </div>
                    </td>
                </tr>
            </tbody>
        </table>

        <nav v-if="parts.links.length > 3" aria-label="Page Pagination" class="mt-5 ">
            <ul class="pagination pagination-md justify-content-center">
                <li v-for="part in parts.links" :key="parts.page" class="page-item "
                    :class="{ 'active': part.active, 'disabled': !part.url }">
                    <Link class="page-link" :href="part.url || '#'" v-html="part.label" />
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
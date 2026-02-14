<script setup>
import Layout from '../../Layouts/Main.vue'
import moment from 'moment';
import { Link, router } from '@inertiajs/vue3';
defineProps({
    "parts": Object,
})
defineOptions({ layout: Layout })

const deletePart = (part_id) => {
    if (confirm("Do you want to delete this part?")) {
        router.delete(route('parts.destroy', part_id));
    }
}

</script>

<template>
    <div class="container mt-3">
        <h1 class="mb-4">List of parts</h1>
        <table class="table table-striped table-hover">
            <thead class="table-dark">
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Searial Number</th>
                    <th>Car Name</th>
                    <th>Creation Date</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="part in parts.data" :key="part.id">
                    <td>{{ part.id }}</td>
                    <td>{{ part.name }}</td>
                    <td>{{ part.serialnumber }}</td>
                    <td>
                        <Link :href="route('cars.show', part.car_id)">{{ part.car.name }}</Link>
                    </td>
                    <td>{{ moment(part.created_at).format('DD/MM/YYYY') }}</td>
                    <td>
                        <div class="d-flex gap-3 mt-1">

                            <Link :href="route('cars.edit', part.car_id)"><i class="bi bi-pencil text-dark" />
                            </Link>
                            <i @click="deletePart(part.id)" class="bi bi-trash text-danger fix"></i>
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
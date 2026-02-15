<script setup>
const props = defineProps({
    "cars": Object,
    "filters": Object
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

const sortBy = (field) => {
    let direction = props.filters.direction === 'asc' && props.filters.sort === field ? "desc" : "asc";
    router.get('/', {
        sort: field,
        direction: direction
    }, {
        preserveState: true,
        replace: true,
    });
}

</script>

<template>
    <div class="container mt-3">
        <h1 class="mb-4">List of autos</h1>

        <table class="table table-striped table-hover">
            <thead class="table-dark">
                <tr>
                    <th @click="sortBy('id')">ID</th>
                    <th @click="sortBy('name')">Name</th>
                    <th @click="sortBy('registration_number')">Registration Number</th>
                    <th @click="sortBy('is_registered')">Registered</th>
                    <th @click="sortBy('parts_count')">Parts</th>
                    <th @click="sortBy('created_aat')">Creation Date</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="car in cars.data" :key="car.id">
                    <td>{{ car.id }}</td>
                    <td>{{ car.name }}</td>
                    <td>{{ car.registration_number || '-' }}</td>
                    <td>
                        <span :class="['badge', car.is_registered ? 'bg-success' : 'bg-secondary']">
                            {{ car.is_registered ? 'Yes' : 'No' }}
                        </span>
                    </td>
                    <td>{{ car.parts_count }}</td>
                    <td>{{ moment(car.created_at).format('DD/MM/YYYY') }}</td>
                    <td>
                        <div class="d-flex gap-3 mt-1">
                            <Link :href="route('cars.show', car.id)"><i class=" bi bi-eye text-primary"></i></Link>
                            <Link class="" :href="route('cars.edit', car.id)"><i class="bi bi-pencil text-dark"></i>
                            </Link>
                            <i @click="deleteCar(car.id)" class="bi bi-trash text-danger pointer"></i>
                        </div>
                    </td>
                </tr>
            </tbody>
        </table>
        <nav v-if="cars.links.length > 3" aria-label="Page Pagination" class="mt-5 ">
            <ul class="pagination pagination-md justify-content-center">
                <li v-for="car in cars.links" :key="car.page" class="page-item "
                    :class="{ 'active': car.active, 'disabled': !car.url }">
                    <Link class="page-link " :href="car.url || '#'" v-html="car.label" />
                </li>
            </ul>
        </nav>

    </div>
</template>
<style lang="css" scoped>
.pointer {
    cursor: pointer;
}
</style>
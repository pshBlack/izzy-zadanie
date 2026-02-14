<script setup>
import { ref } from 'vue';
import { Form, useForm } from '@inertiajs/vue3'
import Layout from '../../Layouts/Main.vue'
defineOptions({ layout: Layout })

const form = useForm({
    name: '',
    is_registered: 0,
    registration_number: '',
})
</script>

<template>

    <Form @submit.prevent="form.post('/cars')">
        <div class="mb-3">
            <label for="name" class="form-label">Vehicle's name</label>
            <input type="text" class="form-control" id="name" v-model="form.name" placeholder="Name of vehicle"
                required="true">
        </div>


        <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="is_registered" id="yes" v-model="form.is_registered"
                :value="1">
            <label class="form-check-label" for="isRegistered">
                Auto is registered
            </label>
        </div>
        <div class="form-check">
            <input class="form-check-input" type="radio" name="is_registered" id="no" checked
                v-model="form.is_registered" :value="0">
            <label class=" form-check-label" for="is_registered">
                Auto is not registered
            </label>
        </div>

        <div v-if="form.is_registered" class="mb-3">
            <label for="name" class="form-label">Email address</label>
            <input type="text" class="form-control" id="name" v-model="form.registration_number"
                placeholder="Name of vehicle">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</template>
<style lang="css" scoped></style>
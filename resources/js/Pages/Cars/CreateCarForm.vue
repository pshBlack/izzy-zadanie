<script setup>
import { watch } from 'vue';
import { Form, useForm } from '@inertiajs/vue3'
import Layout from '../../Layouts/Main.vue'
defineOptions({ layout: Layout })

const form = useForm({
    name: '',
    is_registered: 0,
    registration_number: '',
})

watch(() => form.is_registered, (newValue) => {
    if (newValue == 0) {
        form.registration_number = null;
    }
})


</script>

<template>
    <Form @submit.prevent="form.post('/cars')" class="container">
        <div class="mb-3">
            <label for="name" class="form-label">Auto's name</label>
            <input type="text" class="form-control" id="name" v-model="form.name" placeholder="Name of auto">
            <div v-if="form.errors.name" class="form-text text-danger">{{ form.errors.name }}</div>
            <div v-else class="form-text">
                <span>Example: Toyota Supra</span>
            </div>
        </div>

        <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="is_registered" id="yes" v-model="form.is_registered"
                :value="1">
            <label class="form-check-label" for="is_registered">
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
            <label for="name" class="form-label">Registracne cislo</label>
            <input type="text" class="form-control" id="name" v-model="form.registration_number"
                placeholder="Register number">
            <div v-if="form.errors.registration_number" class="form-text text-danger">
                {{ form.errors.registration_number ? "Please write your register number by example" : "" }}
            </div>
            <div v-else class="form-text">
                <span>Example: AA1234BB</span>
            </div>
        </div>
        <button type="submit" class="btn btn-primary mt-3">Submit</button>
    </Form>
</template>
<style lang="css" scoped>
.container {
    padding: 40px;
    border: 1px solid rgba(165, 164, 164, 0.551);
    border-radius: 10px;
    box-shadow: 2px 2px rgb(216, 216, 216);
    margin-top: 10lvh;
    width: 50%;
}
</style>
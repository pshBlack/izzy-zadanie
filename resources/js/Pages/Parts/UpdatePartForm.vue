<script setup>
import { Form, useForm } from '@inertiajs/vue3'
import Layout from '../../Layouts/Main.vue'
defineOptions({ layout: Layout })
const props = defineProps({
    'part': Object,
    'cars': Array
})
const form = useForm({
    name: props.part.name,
    serialnumber: props.part.serialnumber,
    car_id: props.part.car_id
})


</script>

<template>
    <Form @submit.prevent="form.patch(`/parts/${props.part.id}`)" class="container">
        <div class="mb-3">
            <label for="name" class="form-label">Part's name</label>
            <input type="text" class="form-control" id="name" v-model="form.name" placeholder="Name of part">
            <div v-if="form.errors.name" class="form-text text-danger">{{ form.errors.name }}</div>
            <div v-else class="form-text">
                <span>Example: Motor JZ194</span>
            </div>
        </div>
        <div class="mb-3">
            <label for="serialnumber" class="form-label">Serialnumber</label>
            <input type="text" class="form-control" id="serialnumber" v-model="form.serialnumber"
                placeholder="Serialnumber of part">
            <div v-if="form.errors.serialnumber" class="form-text text-danger">{{ form.errors.serialnumber }}</div>
            <div v-else class="form-text">
                <span>Example: A0CD5FGH12</span>
            </div>
        </div>
        <div class="mb-3">
            <label for="car_id" class="form-label">Choose car</label>
            <select class="form-select form-select-md " id="car_id" v-model="form.car_id">
                <option v-for="car in cars" :key="car.id" :value="car.id">{{ car.name }}</option>
            </select>
            <div v-if="form.errors.car_id" class="form-text text-danger">{{ form.errors.car_id }}</div>

        </div>

        <button type="submit" class="btn btn-primary mt-3">Submit</button>
    </form>
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
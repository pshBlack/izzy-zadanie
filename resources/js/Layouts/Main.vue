<script setup>
import { Link, router, Form } from "@inertiajs/vue3";
import { ref, watch } from "vue";
import { useDebounceFn } from "@vueuse/core";

const searchText = ref('');

const debounceSearch = useDebounceFn((value) => {
    router.get('/', { search: value }, {
        preserveState: true,
        replace: true
    })
}, 1000)

watch(searchText, (newSearchText) => {
    debounceSearch(newSearchText || null);
})
</script>

<template>
    <main>
        <nav class="navbar navbar-expand-lg bg-body-tertiary">
            <div class="container-fluid">
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <Link class="nav-link active" aria-current="page" :href="route('cars.index')">Home</Link>
                        </li>
                        <li class="nav-item">
                            <Link class="nav-link" :href="route('parts.index')">Parts</Link>
                        </li>
                        <li class="nav-item">
                            <Link class="nav-link" :href="route('cars.create')">Add Car</Link>
                        </li>
                        <li class="nav-item">
                            <Link class="nav-link" :href="route('parts.create')">Add Part</Link>
                        </li>
                    </ul>
                    <Form class="d-flex" role="search">
                        <input class="form-control me-2" v-model="searchText" type="search" placeholder="Search"
                            aria-label="Search" />

                    </Form>
                </div>
            </div>
        </nav>

        <article>
            <slot />
        </article>
    </main>
</template>

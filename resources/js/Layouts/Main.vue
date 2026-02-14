<script setup>
import { Link } from "@inertiajs/vue3";

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
                    <form class="d-flex" role="search">
                        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" />
                        <button class="btn btn-outline-success" type="submit">
                            Search
                        </button>
                    </form>
                </div>
            </div>
        </nav>

        <article>
            <slot />
        </article>
    </main>
</template>

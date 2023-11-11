<template>
    <div class="wrapper">
        <nav class="main-header navbar navbar-expand navbar-light">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <Link class="nav-link" data-widget="pushmenu" href="#" role="button">
                        <i class="fa fa-bars"></i
                    >
                </Link>
                </li>
            </ul>
        </nav>

        <Menu />

        <div class="content-wrapper">
            <slot />
        </div>

        <Footer />
    </div>
</template>
<script setup>
import Menu from "./Partials/Menu.vue";
import Footer from "./Partials/Footer.vue";
import {Link} from '@inertiajs/inertia-vue3';
</script>

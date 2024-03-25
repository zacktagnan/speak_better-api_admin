<script setup>
import ApplicationLogo from '@/Components/ApplicationLogo.vue';
</script>

<template>
    <div>
        <div class="bg-gray-200 bg-opacity-25 lg:p-8">
            <h3 class="text-lg font-semibold leading-tight text-gray-800">Aloha JaJa!!</h3>

            <!-- {{ $page.props }} -->

            <!-- <button v-if="$page.props.user.permissions.include('create_roles')">Crear Roles</button>
            <button v-if="$page.props.user.permissions.include('create_lesson')">Crear Lecciones</button> -->
            <!--
            <button v-if="$page.props.user.permissions.include('create_roles')">Crear Roles</button>
            <button v-if="$page.props.user.permissions.include('create_lesson')">Crear Lecciones</button> -->

            <!-- CORRECTO -->
            <!-- <div class="flex w-full rounded-lg bg-slate-800 justify-evenly">
                <button v-if="$page.props.user.permissions.includes('create_roles')">Crear Roles</button>
                <button v-if="$page.props.user.permissions.includes('create_lessons')">Crear Lecciones</button>
            </div> -->
            <p class="mt-4">
                ¿Qué tal...?
            </p>
        </div>
    </div>
</template>

<style>
 button {
    background-color: dodgerblue;
    color: white;
    padding: 20px;
    margin: 5px;
    border-radius: 5px;
 }
</style>

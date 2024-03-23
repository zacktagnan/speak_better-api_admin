<script setup>
import ApplicationLogo from '@/Components/ApplicationLogo.vue';
</script>

<template>
    <div>
        <div class="bg-gray-200 bg-opacity-25 lg:p-8">
            <h1 class="block w-full">Aloha JaJa!!</h1>

            <!-- {{ $page.props }} -->

            <!-- <button v-if="$page.props.user.permissions.include('create_roles')">Crear Roles</button>
            <button v-if="$page.props.user.permissions.include('create_lesson')">Crear Lecciones</button> -->
            <!--
            <button v-if="$page.props.user.permissions.include('create_roles')">Crear Roles</button>
            <button v-if="$page.props.user.permissions.include('create_lesson')">Crear Lecciones</button> -->

            <div class="w-full flex bg-slate-800 rounded-lg justify-evenly">
                <button v-if="$page.props.user.permissions.includes('create_roles')">Crear Roles</button>
                <button v-if="$page.props.user.permissions.includes('create_lessons')">Crear Lecciones</button>
            </div>
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

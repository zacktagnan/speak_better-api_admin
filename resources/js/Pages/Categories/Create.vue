<script>
export default {
    name: 'CategoriesCreate',
}
</script>

<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import CategoryForm from '@/Components/Categories/Form.vue';
import { useForm } from '@inertiajs/vue3';

const form = useForm({
    name: '',
})
</script>

<template>
    <AppLayout title="Categorías">
        <template #header>
            <h2 class="text-xl font-semibold leading-tight text-gray-800">
                Categorías
            </h2>
        </template>

        <div class="py-10 bg-gray-100">
            <div class="mx-auto max-w-7xl">
                <div class="px-4 sm:px-6 lg:px-8">
                    <CategoryForm :form="form" :urlCancel="'categories.index'"
                        @submit="form.post(route('categories.store'))" />
                </div>
            </div>
        </div>
    </AppLayout>
</template>

<script>
export default {
    name: 'CategoriesEdit',
}
</script>

<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import CategoryForm from '@/Components/Categories/Form.vue';
import { useForm } from '@inertiajs/vue3';

const props = defineProps({
    category: {
        type: Object,
        required: true,
    }
})

const form = useForm({
    name: props.category.name,
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
                    <CategoryForm :updating="true" :form="form" :urlCancel="'categories.index'"
                        @submit="form.put(route('categories.update', category.id))" />
                </div>
            </div>
        </div>
    </AppLayout>
</template>

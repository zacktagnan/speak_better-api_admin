<script>
export default {
    name: 'LessonsCreate',
}
</script>

<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import LessonForm from '@/Components/Lessons/Form.vue';
import { useForm } from '@inertiajs/vue3';

defineProps({
    categories: {
        type: Object,
        required: true,
    },
    levels: {
        type: Object,
        required: true,
    },
})

const form = useForm({
    name: '',
})
</script>

<template>
    <AppLayout title="Lecciones">
        <template #header>
            <h2 class="text-xl font-semibold leading-tight text-gray-800">
                Lecciones
            </h2>
        </template>

        <div class="py-10 bg-gray-100">
            <div class="mx-auto max-w-7xl">
                <div class="px-4 sm:px-6 lg:px-8">
                    <LessonForm :form="form" :categories="categories" :levels="levels" :urlCancel="'lessons.index'"
                        @submit="form.post(route('lessons.store'))" />
                </div>
            </div>
        </div>
    </AppLayout>
</template>

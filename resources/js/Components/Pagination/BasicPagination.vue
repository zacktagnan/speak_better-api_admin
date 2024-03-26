<script setup>
import { Link } from '@inertiajs/vue3';

defineProps({
    items: {
        type: Object,
        required: true,
    },
})
</script>

<template>
    <div v-if="items.last_page > 1" class="flex flex-col mt-4">
        <div class="-mx-4 -my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
            <div class="inline-block min-w-full py-2 align-middle md:px-6 lg:px-8">
                <div class="overflow-hidden shadow ring-1 ring-black ring-opacity-5 md:rounded-lg">
                    <div class="shadow sm:rounded-md sm:overflow-hidden">

                        <div class="flex justify-between px-4 py-3 text-right bg-gray-50 sm:px-6">
                            <Link v-if="items.current_page > 1" :href="items.prev_page_url"
                                class="inline-flex items-center px-4 py-2 text-sm font-medium text-indigo-700 bg-indigo-100 border border-transparent rounded-md hover:bg-indigo-200 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                            Anterior
                            </Link>
                            <div v-else></div>
                            <Link v-if="items.current_page < items.last_page" :href="items.next_page_url"
                                class="inline-flex items-center px-4 py-2 text-sm font-medium text-indigo-700 bg-indigo-100 border border-transparent rounded-md hover:bg-indigo-200 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                            Siguiente
                            </Link>
                            <div v-else></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

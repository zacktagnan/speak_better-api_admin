<script setup>
import { Link } from '@inertiajs/vue3';
import { ChevronLeftIcon, ChevronRightIcon } from '@heroicons/vue/20/solid'

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

                        <!-- Barra Reducida para Dispositivos Móviles -->
                        <div class="flex justify-between flex-1 px-4 py-3 sm:hidden bg-gray-50 sm:px-6">
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

                        <!-- Barra Extendida cuando no son Dispositivos Móviles -->
                        <div
                            class="hidden px-4 py-3 sm:flex sm:flex-1 sm:items-center sm:justify-between bg-gray-50 sm:px-6">
                            <div>
                                <p class="text-sm text-gray-700">
                                    Mostrando del
                                    <span class="font-bold text-black">{{ items.from }}</span>
                                    al
                                    <span class="font-bold text-black">{{ items.to }}</span>
                                    de un total de
                                    <span class="font-bold text-black">{{ items.total }}</span>
                                    resultados
                                </p>
                            </div>
                            <div>
                                <nav class="inline-flex -space-x-px bg-white rounded-md shadow-sm isolate"
                                    aria-label="Pagination">
                                    <template v-for="(link, index) in items.links">
                                        <template v-if="index === 0">
                                            <a v-if="items.current_page > 1" :href="items.prev_page_url"
                                                class="relative inline-flex items-center px-2 py-2 text-gray-400 rounded-l-md ring-1 ring-inset ring-gray-300 hover:bg-gray-50 focus:z-20 focus:outline-offset-0">
                                                <span class="sr-only">Anterior</span>
                                                <ChevronLeftIcon class="w-5 h-5" aria-hidden="true" />
                                            </a>
                                            <span v-else
                                                class="relative inline-flex items-center px-2 py-2 text-gray-400 cursor-not-allowed rounded-l-md ring-1 ring-inset ring-gray-300 hover:bg-gray-50 focus:z-20 focus:outline-offset-0">
                                                <span class="sr-only">Anterior</span>
                                                <ChevronLeftIcon class="w-5 h-5" aria-hidden="true" />
                                            </span>
                                        </template>

                                        <a v-if="index > 0 && index < items.links.length - 1" :href="link.url"
                                            :class="`${link.label == items.current_page ? 'z-10 bg-indigo-600 text-white focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600' : 'text-gray-900 ring-1 ring-inset ring-gray-300 hover:bg-gray-50 focus:outline-offset-0'} relative inline-flex items-center px-4 py-2 text-sm font-semibold focus:z-20`"
                                            :aria-current="`${link.label == items.current_page ? 'page' : ''}`">{{
                                            link.label }}</a>

                                        <template v-if="index === (items.links.length - 1)">
                                            <a v-if="items.current_page < items.last_page" :href="items.next_page_url"
                                                class="relative inline-flex items-center px-2 py-2 text-gray-400 rounded-r-md ring-1 ring-inset ring-gray-300 hover:bg-gray-50 focus:z-20 focus:outline-offset-0">
                                                <span class="sr-only">Siguiente</span>
                                                <ChevronRightIcon class="w-5 h-5" aria-hidden="true" />
                                            </a>
                                            <span v-else
                                                class="relative inline-flex items-center px-2 py-2 text-gray-400 cursor-not-allowed rounded-r-md ring-1 ring-inset ring-gray-300 hover:bg-gray-50 focus:z-20 focus:outline-offset-0">
                                                <span class="sr-only">Siguiente</span>
                                                <ChevronRightIcon class="w-5 h-5" aria-hidden="true" />
                                            </span>
                                        </template>
                                    </template>
                                </nav>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

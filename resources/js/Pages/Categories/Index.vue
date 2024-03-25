<script>
export default {
    name: 'CategoriesIndex',
}
</script>

<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import { Link } from '@inertiajs/vue3';
import { Inertia } from '@inertiajs/inertia'

defineProps({
    categories: {
        type: Object,
        required: true,
    },
    categoriesTotal: {
        type: Number,
        required: true,
    },
})

const deleteCategory =  (id) => {
    if (confirm('¿Seguro de eliminar este registro?')) {
        Inertia.delete(route('categories.destroy', id))
    }
}
</script>

<template>
    <AppLayout title="Categorías">
        <template #header>
            <h2 class="text-xl font-semibold leading-tight text-gray-800">
                Categorías
            </h2>
        </template>

        <!-- <div class="py-12">
            <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
                <div class="overflow-hidden bg-white shadow-xl sm:rounded-lg">
                    <div class="bg-gray-200 bg-opacity-25 lg:p-8">
                        <div class="flex items-center justify-between">
                            <h3 class="text-lg font-semibold leading-tight text-gray-800">Listado</h3>
                            <Link :href="route('categories.create')" title="Crear Categoría"
                                class="rounded-lg bg-[#6875F5] text-white px-2 py-1">
                            Crear +
                            </Link>
                        </div>

                        <div class="mt-4">
                            TODO|TABLE
                        </div>
                    </div>
                </div>
            </div>
        </div> -->

        <div class="py-10 bg-gray-100">
            <div class="mx-auto max-w-7xl">
                <div class="px-4 sm:px-6 lg:px-8">
                    <div class="sm:flex sm:items-center">
                        <div class="sm:flex-auto">
                            <h3 class="text-lg font-semibold text-gray-900">
                                Listado
                            </h3>
                            <p class="mt-1 text-sm text-gray-500">
                                Categorías registradas. Actualmente, [{{ categoriesTotal }}].
                            </p>
                        </div>

                        <div v-if="$page.props.user.permissions.includes('create_categories')"
                            class="mt-4 sm:mt-0 sm:ml-16 sm:flex-none">
                            <Link :href="route('categories.create')" title="Crear Categoría"
                                class="inline-flex items-center justify-center px-4 py-2 text-sm font-medium text-white bg-indigo-600 border border-transparent rounded-md shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 sm:w-auto">
                            Crear +
                            </Link>
                        </div>
                    </div>

                    <div class="flex flex-col mt-8">
                        <div class="-mx-4 -my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                            <div class="inline-block min-w-full py-2 align-middle md:px-6 lg:px-8">
                                <div class="overflow-hidden shadow ring-1 ring-black ring-opacity-5 md:rounded-lg">
                                    <table v-if="categoriesTotal == 0" class="min-w-full divide-y divide-gray-300">
                                        <tbody class="bg-white divide-y divide-gray-200">
                                            <tr>
                                                <td
                                                    class="py-4 pl-4 pr-3 text-sm font-medium text-center text-gray-900 whitespace-nowrap sm:pl-6">
                                                    :: No hay registros en este momento ::
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <table v-else class="min-w-full divide-y divide-gray-300">
                                        <thead class="bg-gray-50">
                                            <tr>
                                                <th scope="col"
                                                    class="py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-gray-900 sm:pl-6">
                                                    ID
                                                </th>
                                                <th scope="col"
                                                    class="py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-gray-900 sm:pl-6">
                                                    Nombre
                                                </th>
                                                <th
                                                    v-if="$page.props.user.permissions.includes('update_categories') || $page.props.user.permissions.includes('delete_categories')"
                                                    scope="col" class="relative py-3.5 pl-3 pr-4 sm:pr-6" />
                                            </tr>
                                        </thead>
                                        <tbody class="bg-white divide-y divide-gray-200">
                                            <tr v-for="category in categories.data">
                                                <td
                                                    class="py-4 pl-4 pr-3 text-sm font-medium text-gray-900 whitespace-nowrap sm:pl-6">
                                                    {{ category.id }}
                                                </td>
                                                <td
                                                    class="py-4 pl-4 pr-3 text-sm font-medium text-gray-900 whitespace-nowrap sm:pl-6">
                                                    {{ category.name }}
                                                </td>
                                                <td
                                                    v-if="$page.props.user.permissions.includes('update_categories') || $page.props.user.permissions.includes('delete_categories')"
                                                    class="relative py-4 pl-3 pr-4 text-sm font-medium text-right whitespace-nowrap sm:pr-6">
                                                    <!-- <a wire:navigate
                                                        href="{{ route('admin.students.edit', $student->id) }}"
                                                        class="text-indigo-600 hover:text-indigo-900">
                                                        {{ __('Edit') }}
                                                    </a>
                                                    <button
                                                        wire:confirm="{{ __('Are you sure that you want delete it?') }}"
                                                        wire:click="delete({{ $student->id }})"
                                                        class="ml-2 text-indigo-600 hover:text-indigo-900">
                                                        {{ __('Delete') }}
                                                    </button> -->
                                                    <Link
                                                        v-if="$page.props.user.permissions.includes('update_categories')"
                                                        :href="route('categories.edit', category.id)"
                                                        class="text-indigo-900 hover:text-indigo-500">Editar</Link>
                                                    <Link
                                                        v-if="$page.props.user.permissions.includes('delete_categories')"
                                                        @click="deleteCategory(category.id)"
                                                        class="ml-2 text-red-900 hover:text-red-500">Eliminar
                                                    </Link>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <!-- TODO::Implementar PAGINADO -->
                                <!-- <div v-if="categoriesTotal > 0" class="mt-5">
                                    PAGINADO
                                </div> -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </AppLayout>
</template>

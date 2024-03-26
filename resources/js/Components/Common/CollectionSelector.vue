<script setup>
import { ref } from 'vue';
import { XCircleIcon } from '@heroicons/vue/20/solid'

defineProps({
    collection : {
        type: Array,
        required: true,
    },
})

const initialValue = '0'
const currentSelection = ref(initialValue)
const selection = ref([])

const emit = defineEmits(['onCategories'])

const handleAddToSelection = () => {
    if (currentSelection.value === initialValue) {
        return // o exit, si bien el EXIT se marca como algo no definido
    }
    // else {
    //     alert('Seleccionar un elemento antes de pulsar para añadirlo')
    // }

    let alreadyExists = false

    selection.value.forEach(item => {
        if (item.id == currentSelection.value.id) {
            alreadyExists = true
            return
        }
    });

    if (alreadyExists) {
        return
    }

    selection.value.push(currentSelection.value)

    emit('onCategories', selection.value)
}

const handleRemoveSelection = (index) => {
    // selection.value = selection.value.splice(index, 1)
    selection.value = selection.value.filter(item => item.id !== index)

    emit('onCategories', selection.value)
}
</script>

<template>
    <div class="flex">
        <select v-model="currentSelection"
            class="block w-1/2 px-3 py-2 mt-1 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
            @change="handleAddToSelection">
            <option value="0">Seleccionar una</option>
            <option v-for="(item, index) in collection" :key="index" :value="item">
                {{ item?.name }}
            </option>
        </select>
        <button @click="handleAddToSelection"
            class="px-2 py-0 ml-2 transition-colors delay-75 bg-indigo-100 border-2 rounded-full hover:bg-indigo-200"
            title="Añadir selección">
            Añadir selección
        </button>
    </div>

    <div>
        <p class="mt-1 text-xs">Seleccionada(s):</p>
        <!-- {{ selection }} -->
        <!-- {{ currentSelection }} -->
        <hr>
        <p v-if="selection.length === 0" class="mt-1 text-xs italic text-gray-500">
            ~ Ninguna selección por el momento ~
        </p>
        <ul v-else>
            <li v-for="item in selection"
                class="flex justify-between w-1/2 px-2 py-0 mt-1 text-xs transition-colors delay-75 bg-indigo-100 border-2 rounded-lg hover:bg-indigo-200">
                {{ item.name }}
                <button @click="handleRemoveSelection(item.id)" class="flex items-center" title="Eliminar selección">
                    <XCircleIcon
                        class="w-[20px] text-red-900 hover:text-red-500 bg-white rounded-full transition-colors delay-75" />
                </button>
            </li>
        </ul>
    </div>
</template>

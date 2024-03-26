<script>
export default {
    name: 'LessonForm',
}
</script>

<script setup>
import { ref } from 'vue';
import FormSectionPersonal from '@/Components/FormSectionPersonal.vue';
import InputErrorPersonal from '@/Components/InputErrorPersonal.vue';
import InputLabel from '@/Components/InputLabel.vue';
import CancelButton from '@/Components/CancelButton.vue';
import SendButton from '@/Components/SendButton.vue';
import TextInputPersonal from '@/Components/TextInputPersonal.vue';
import SecondaryButton from '@/Components/SecondaryButton.vue';
import CollectionSelector from '@/Components/Common/CollectionSelector.vue';

defineProps({
    form: {
        type: Object,
        required: true,
    },
    updating: {
        type: Boolean,
        required: false,
        default: false,
    },
    urlCancel: {
        type: String,
        required: true,
    },
    categories: {
        type: Object,
        required: true,
    },
    levels: {
        type: Object,
        required: true,
    },
})

const categoriesSelected = ref([])
const onCategoriesFromForm = (categoriesFromForm) => {
    // categories.value = categories.value
    // se puede asignar solo categories sin el VALUE si lo que se manda es ya el objeto con VALUE
    categoriesSelected.value = categoriesFromForm
}

defineEmits(['submit'])
</script>

<template>
    <FormSectionPersonal @submitted="$emit('submit')">
        <template #title>
            {{ !updating ? 'Creación' : 'Edición' }}
        </template>
        <template #description>
            {{ !updating ? 'Utilizar este formulario para crear una nueva lección.' : 'Utilizar este formulario para editar esta lección.' }}
        </template>

        <template #form>
            <div class="col-span-6 sm:col-span-3">
                <InputLabel for="name" value="Nombre" />
                <TextInputPersonal id="name" v-model="form.name" type="text" autocomplete="name" autofocus
                    class="block w-full mt-1" />
                <InputErrorPersonal :message="$page.props.errors.name" class="mt-1" />
            </div>

            <div class="col-span-6 sm:col-span-3">
                <InputLabel for="description" value="Descripción" />
                <TextInputPersonal id="description" v-model="form.description" type="text" autocomplete="description"
                    class="block w-full mt-1" />
                <InputErrorPersonal :message="$page.props.errors.description" class="mt-1" />
            </div>

            <div class="col-span-6 sm:col-span-2">
                <InputLabel for="content_uri" value="URI Contenido" />
                <TextInputPersonal id="content_uri" v-model="form.content_uri" type="text" autocomplete="content_uri"
                    class="block w-full mt-1" />
                <InputErrorPersonal :message="$page.props.errors.content_uri" class="mt-1" />
            </div>

            <div class="col-span-6 sm:col-span-1">
                <InputLabel for="pdf_uri" value="URI PDF" />
                <SecondaryButton class="mt-1.5">Subir PDF</SecondaryButton>
                <InputErrorPersonal :message="$page.props.errors.pdf_uri" class="mt-1" />
            </div>

            <div class="col-span-6 sm:col-span-1">
                <InputLabel for="level_id" value="Niveles" />
                <select name="level_id" id="level_id" class="block w-full px-3 py-2 mt-1 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                    <option v-for="level in levels" :value="level.id">{{ level.name }}</option>
                </select>
                <InputErrorPersonal :message="$page.props.errors.level_id" class="mt-1" />
            </div>

            <!-- <div class="col-span-6 sm:col-span-1">
                <InputLabel for="category_id" value="Categorías" />
                <select name="category_id" id="category_id" class="block w-full px-3 py-2 mt-1 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                    <option v-for="category in categories" :value="category.id">{{ category.name }}</option>
                </select>
                <InputErrorPersonal :message="$page.props.errors.category_id" class="mt-1" />
            </div> -->
            <div class="col-span-6 sm:col-span-2">
                <InputLabel for="content_uri" value="Selección de Categorías" />
                <CollectionSelector
                    :collection="categories" name="categories" id="categories"
                    @onCategories="onCategoriesFromForm"
                />
                <InputErrorPersonal :message="$page.props.errors.content_uri" class="mt-1" />
            </div>
        </template>

        <template #actions>
            <CancelButton :url="urlCancel">
                {{ 'Cancelar' }}
            </CancelButton>
            <SendButton>
                {{ !updating ? 'Guardar' : 'Modificar' }}
            </SendButton>
        </template>
    </FormSectionPersonal>
</template>

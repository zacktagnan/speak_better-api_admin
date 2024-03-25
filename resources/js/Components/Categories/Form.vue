<script>
export default {
    // name: 'CategoriesForm',
    name: 'CategoryFormPersonal',
}
</script>

<script setup>
import FormSectionPersonal from '@/Components/FormSectionPersonal.vue';
import InputErrorPersonal from '@/Components/InputErrorPersonal.vue';
import InputLabel from '@/Components/InputLabel.vue';
import CancelButton from '@/Components/CancelButton.vue';
import SendButton from '@/Components/SendButton.vue';
import TextInputPersonal from '@/Components/TextInputPersonal.vue';

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
})

defineEmits(['submit'])
</script>

<template>
    <FormSectionPersonal @submitted="$emit('submit')">
        <template #title>
            {{ !updating ? 'Creación' : 'Edición' }}
        </template>
        <template #description>
            {{ !updating ? 'Utilizar este formulario para crear una nueva categoría.' : 'Utilizar este formulario para editar esta nueva categoría.' }}
        </template>

        <template #form>
            <div class="col-span-6 sm:col-span-full">
                <InputLabel for="name" value="Nombre" />
                <TextInputPersonal id="name" v-model="form.name" type="text" autocomplete="name"
                    autofocus
                    class="block w-full mt-1" />
                <InputErrorPersonal :message="$page.props.errors.name" class="mt-1" />
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

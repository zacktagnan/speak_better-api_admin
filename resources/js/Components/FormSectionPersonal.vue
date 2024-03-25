<script setup>
import { computed, useSlots } from 'vue';
import SectionTitlePersonal from './SectionTitlePersonal.vue';

defineEmits(['submitted']);

const hasActions = computed(() => !! useSlots().actions);
</script>

<template>
    <SectionTitlePersonal>
        <template #title>
            <slot name="title" />
        </template>
        <template #description>
            <slot name="description" />
        </template>
    </SectionTitlePersonal>

    <div class="flex flex-col mt-8">
        <div class="-mx-4 -my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
            <div class="inline-block min-w-full py-2 align-middle md:px-6 lg:px-8">
                <div class="overflow-hidden shadow ring-1 ring-black ring-opacity-5 md:rounded-lg">
                    <form @submit.prevent="$emit('submitted')">
                        <div class="shadow sm:rounded-md sm:overflow-hidden">
                            <div class="px-4 py-6 space-y-6 bg-white sm:p-6">
                                <div class="grid grid-cols-6 gap-6">
                                    <slot name="form" />
                                </div>
                            </div>

                            <div v-if="hasActions" class="px-4 py-3 text-right bg-gray-50 sm:px-6">
                                <slot name="actions" />
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</template>

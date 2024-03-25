<template>
    <div class="sm:flex sm:items-center">
        <div class="sm:flex-auto">
            <h3 class="text-lg font-semibold text-gray-900">
                <slot name="title" />
            </h3>
            <p class="mt-1 text-sm text-gray-500">
                <slot name="description" />
            </p>
        </div>

        <div class="px-4 sm:px-0">
            <slot name="aside" />
        </div>
    </div>
</template>

<script setup lang="ts">
import AppLogoIcon from '@/components/AppLogoIcon.vue';
import { Link, usePage } from '@inertiajs/vue3';

const page = usePage();
const name = page.props.name;
const quote = page.props.quote;

defineProps<{
    title?: string;
    description?: string;
}>();
</script>

<template>
    <div class="relative grid h-dvh flex-col items-center justify-center px-8 sm:px-0 lg:max-w-none lg:grid-cols-2 lg:px-0">
        <div class="relative h-full  flex-col bg-muted text-white lg:flex dark:border-r">
            <div class="h-full inset-0 bg-black flex justify-center items-center">
                <img src="/images/LOGO.png" width="300" alt="logo" class="logo-float" />
            </div>
        </div>
        <div class="lg:p-8">
            <div class="mx-auto flex w-full flex-col justify-center space-y-6 sm:w-[350px]">
                <div class="flex flex-col space-y-2 text-center">
                    <h1 class="text-3xl font-medium tracking-tight text-black" v-if="title">{{ title }}</h1>
                    <p class="text-sm text-muted-foreground text-black" v-if="description">{{ description }}</p>
                </div>
                <slot />
            </div>
        </div>
    </div>
</template>

<style>

@keyframes float {
    0%, 100% { transform: translateY(0); }
    50% { transform: translateY(-15px); }
}

.logo-float {
    animation: float 3s ease-in-out infinite;
}

</style>

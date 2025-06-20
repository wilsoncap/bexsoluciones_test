<script setup>
import Head from '@/components/bexsolutions/Head.vue'
</script>


<template>
    <Head />

    <div class="m-5">
        <!-- component -->
        <div class="relative flex w-full flex-col rounded-xl bg-white bg-clip-border text-gray-700 shadow-md">
            <div class="relative mx-4 mt-4 h-full overflow-hidden rounded-xl bg-white bg-clip-border text-gray-700">
                

                <!-- component -->
                <slot />

            </div> 
        </div>
        

        <!-- stylesheet -->
        <link
        rel="stylesheet"
        href="https://unpkg.com/@material-tailwind/html@latest/styles/material-tailwind.css"
        />

    </div>

</template>


<style scoped>
</style>
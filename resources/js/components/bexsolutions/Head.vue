<script setup>
import { Link } from '@inertiajs/vue3';
</script>


<template>
    <!-- component -->
<div class="bg-white">
  <div class="border py-3 px-6">
    <div class="flex justify-between">
      <div class="flex items-center">
        <img src="/images/LOGO2.png" height="70px" width="70px" alt="logo">
        <!-- <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-red-500" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
          <path stroke-linecap="round" stroke-linejoin="round" d="M9 3v2m6-2v2M9 19v2m6-2v2M5 9H3m2 6H3m18-6h-2m2 6h-2M7 19h10a2 2 0 002-2V7a2 2 0 00-2-2H7a2 2 0 00-2 2v10a2 2 0 002 2zM9 9h6v6H9V9z" />
        </svg> -->
        <!-- <span class="ml-2 font-semibold text-[#252C32]">Bex Soluciones</span> -->
      </div>

      <div class="ml-2 flex">

        <div class="flex cursor-pointer items-center gap-x-1 rounded-md py-2 px-4 hover:bg-gray-100">
          <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 512 512"><path fill="#ff1717" fill-rule="evenodd" d="m256 34.347l192 110.851v221.703L256 477.752L64 366.901V145.198zm-64.001 206.918L192 391.536l42.667 24.635V265.899zM106.667 192v150.267l42.666 24.635V216.633zm233.324-59.894l-125.578 72.836L256 228.952l125.867-72.669zM256 83.614l-125.867 72.67l41.662 24.052l125.579-72.835z"/></svg>
          <Link :href="`/products`" class="text-black">Productos</Link>
        </div>

        <div class="flex cursor-pointer items-center gap-x-1 rounded-md py-2 px-4 hover:bg-gray-100">
          <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="#f33a0d" fill-rule="evenodd" d="M20 4H4a1 1 0 0 0-1 1v14a1 1 0 0 0 1 1h16a1 1 0 0 0 1-1V5a1 1 0 0 0-1-1M4 2a3 3 0 0 0-3 3v14a3 3 0 0 0 3 3h16a3 3 0 0 0 3-3V5a3 3 0 0 0-3-3zm2 5h2v2H6zm5 0a1 1 0 1 0 0 2h6a1 1 0 1 0 0-2zm-3 4H6v2h2zm2 1a1 1 0 0 1 1-1h6a1 1 0 1 1 0 2h-6a1 1 0 0 1-1-1m-2 3H6v2h2zm2 1a1 1 0 0 1 1-1h6a1 1 0 1 1 0 2h-6a1 1 0 0 1-1-1" clip-rule="evenodd"/></svg>
          <Link :href="`/visits-data`" class="text-black">Visitas</Link>
          <Link />
        </div>

        <div class="flex cursor-pointer items-center gap-x-1 rounded-md py-2 px-4 hover:bg-gray-100">
          <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="#ef1313" d="M18 4.48a8.45 8.45 0 0 0-12 12l5.27 5.28a1 1 0 0 0 1.42 0L18 16.43a8.45 8.45 0 0 0 0-11.95M16.57 15L12 19.59L7.43 15a6.46 6.46 0 1 1 9.14 0M9 7.41a4.32 4.32 0 0 0 0 6.1a4.31 4.31 0 0 0 7.36-3a4.24 4.24 0 0 0-1.26-3.05A4.3 4.3 0 0 0 9 7.41m4.69 4.68a2.33 2.33 0 1 1 .67-1.63a2.33 2.33 0 0 1-.72 1.63Z"/></svg>
          <Link :href="`/mapa`" class="text-black">Geolocalizacion</Link>
        </div>

      </div>
    </div>
  </div>
</div>
</template>


<style scoped>
</style>
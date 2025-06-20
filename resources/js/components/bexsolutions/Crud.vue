<script setup>
import {onMounted } from 'vue'
const props = defineProps({
  visits: Object
});

onMounted(() => {
    console.log('visits en el crud:', props.visits
    );
})
</script>


<template>
    <div class="font-sans">
                    <div class="flex justify-center  ">
                        <div class="w-full">
                            <div class="relative w-full rounded-3xl  px-6 py-4 bg-gray-100 shadow-md mb-3">
                                <form method="#" action="#" class=" w-full">
                                                    
                                    <div class="flex justify-around items-center">
                                        <div class="mt-7">
                                            <label for="" class="text-gray-700">Cliente</label>
                                            <input 
                                                type="text" 
                                                placeholder="Ingrese el cliente" 
                                                class=" p-2 w-full border-none bg-white h-11 rounded-xl shadow-lg hover:bg-blue-100 focus:bg-blue-100 focus:ring-0"
                                                >
                                        </div>
                            
                                        <div class="mt-7">
                                            <label for="" class="text-gray-700">Email</label>
                                            <input 
                                                type="email" 
                                                placeholder="Ingrese el email" 
                                                class=" p-2 w-full border-none bg-white h-11 rounded-xl shadow-lg hover:bg-blue-100 focus:bg-blue-100 focus:ring-0"
                                                >
                                        </div>

                                        <div class="mt-7">
                                            <label for="" class="text-gray-700">Latitud</label>
                                            <input 
                                                type="text" 
                                                placeholder="Ingrese la latitud" 
                                                class=" p-2 w-full border-none bg-white h-11 rounded-xl shadow-lg hover:bg-blue-100 focus:bg-blue-100 focus:ring-0"
                                                >
                                        </div>

                                        <div class="mt-7">
                                            <label for="" class="text-gray-700">Longitud</label>
                                            <input 
                                                type="text" 
                                                placeholder="Ingrese la longitud" 
                                                class=" p-2 w-full border-none bg-white h-11 rounded-xl shadow-lg hover:bg-blue-100 focus:bg-blue-100 focus:ring-0"
                                                >
                                        </div>
                                    </div>

                                    <div class="mt-7 flex justify-center">
                                        <button class="bg-orange-500 w-60 py-3 rounded-xl text-white shadow-xl hover:shadow-inner focus:outline-none transition duration-500 ease-in-out  transform hover:-translate-x hover:scale-105">
                                            Registrar
                                        </button>
                                    </div>
                                </form>
                            </div>

                            <div class="relative w-full rounded-3xl  px-6 py-4 bg-gray-100  shadow-md mb-3">
                                <div class="text-gray-90 rounded-xl w-full">
                                        <div class="p-4 flex">
                                            <h1 class="text-3xl">
                                                Visitas
                                            </h1>
                                        </div>
                                        <div class="px-3 py-1 flex justify-center">
                                            <table class="w-full text-md bg-orange-400 shadow-md rounded-t-lg rounded-t-lg mb-4">
                                                <thead>
                                                    <tr class="">
                                                        <th class="text-center p-3 px-5 text-white">Nombre</th>
                                                        <th class="text-center p-3 px-5 text-white">Email</th>
                                                        <th class="text-center p-3 px-5 text-white">Latitud</th>
                                                        <th class="text-center p-3 px-5 text-white">Longitud</th>
                                                        <th class="text-white">Acciones</th>
                                                    </tr>
                                                </thead>
                                                <tbody class="bg-gray-100 rounded-b-3xl">
                                                    
                                                    <!-- <tr>
                                                        <td class="text-center">wilson</td>
                                                        <td class="text-center">wilson</td>
                                                        <td class="text-center">wilson</td>
                                                        <td class="text-center">wilson</td>
                                                        <td class="text-center">wilson</td>
                                                    </tr> -->
                                                    <tr v-for="visit in visits" class="border-b-gray-950 hover:bg-orange-100 bg-gray-100">
                                                    <td class="p-1 text-center">{{visit.name}}</td>
                                                    <td class="p-1 text-center">{{ visit.email }}</td>
                                                    <td class="p-1 text-center">{{ visit.latitude }}</td>
                                                    <td class="p-1 text-center">{{ visit.longitude }}</td>
                                                    <td class="p-3 text-center flex justify-center gap-1">
                                                        <!-- <Link :href="``" type="button" class="mr-3 text-sm bg-blue-500 hover:bg-blue-700 text-white py-1 px-2 rounded focus:outline-none focus:shadow-outline">Editar</Link> -->
                                                        <!-- <Link :href="route('contact.edit', contac)" type="button" class="mr-3 text-sm bg-blue-500 hover:bg-blue-700 text-white py-1 px-2 rounded focus:outline-none focus:shadow-outline">Editar</Link> -->
                                                        <button type="button" class="text-sm bg-blue-500 hover:bg-blue-700 text-white py-1 px-2 rounded focus:outline-none focus:shadow-outline">Editar</button>
                                                        <button type="button" class="text-sm bg-red-500 hover:bg-red-700 text-white py-1 px-2 rounded focus:outline-none focus:shadow-outline">Eliminar</button>
                                                    </td>
                                                </tr>
                                                                
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                            </div>
                        </div>
                    </div>
                </div>
</template>


<style scoped>
</style>
<script setup>
import {ref, reactive, onMounted } from 'vue'
const props = defineProps({
  visits: Object
});


const editing = ref(false)
const feedback = ref('')
const visits = ref([...props.visits])

const notify = (message, type = 'success') => {
  feedback.value = message
  feedbackType.value = type
  setTimeout(() => feedback.value = '', 3000) // Se borra en 3s
}


const submit = async () => {
  const url = editing.value ? `/api/v1/visits/${form.id}` : '/api/v1/visits'
  const method = editing.value ? 'put' : 'post'

  
  try {
    const res = await axios[method](url, { ...form })

    if (res.data.status) {
      notify(editing.value ? 'Visita actualizada' : 'Visita registrada', 'success')

      if (editing.value) {
        const i = visits.value.findIndex(v => v.id === form.id)
        visits.value[i] = res.data.data
      } else {
        visits.value.push(res.data.data)
      }

      resetForm()
    } else {
      notify(res.data.message, 'error')
    }
  } catch {
    notify('Error al guardar', 'error')
  }
}

const editVisit = (visit) => {
  Object.assign(form, visit)
  editing.value = true
}

const deleteVisit = async (id) => {
  try {
    await axios.delete(`/api/v1/visits/${id}`)
    visits.value = visits.value.filter(v => v.id !== id)
    notify('Visita eliminada', 'success')
  } catch {
    notify('Error al eliminar', 'error')
  }
}

const form = reactive({
  id: null,
  name: '',
  email: '',
  latitude: '',
  longitude: ''
})

const resetForm = () => {
  form.id = null
  form.name = ''
  form.email = ''
  form.latitude = ''
  form.longitude = ''
  editing.value = false
}

</script>


<template>
    <div v-if="feedback" :class="feedbackType === 'success' ? 'text-green-600' : 'text-red-600'" class="mb-2">
         {{ feedback }}
    </div>
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
                                                v-model="form.name"
                                                class=" p-2 w-full border-none bg-white h-11 rounded-xl shadow-lg hover:bg-blue-100 focus:bg-blue-100 focus:ring-0"
                                                >
                                        </div>
                            
                                        <div class="mt-7">
                                            <label for="" class="text-gray-700">Email</label>
                                            <input 
                                                type="email" 
                                                placeholder="Ingrese el email" 
                                                v-model="form.email"
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
                                            {{ editing ? 'Actualizar' : 'Registrar' }}
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
                                            <table class="w-full text-md bg-black shadow-md rounded-t-lg rounded-t-lg mb-4">
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
                                                    <tr v-for="v in visits" :key="v.id" class="border-b-gray-950 hover:bg-orange-100 bg-gray-100">
                                                        <td class="p-1 text-center">{{v.name}}</td>
                                                        <td class="p-1 text-center">{{ v.email }}</td>
                                                        <td class="p-1 text-center">{{ v.latitude }}</td>
                                                        <td class="p-1 text-center">{{ v.longitude }}</td>
                                                        <td class="p-3 text-center flex justify-center gap-1">
                                                            <button 
                                                                type="button" 
                                                                @click="editVisit(v)"
                                                                class="text-sm bg-blue-500 hover:bg-blue-700 text-white py-1 px-2 rounded focus:outline-none focus:shadow-outline">
                                                                Editar
                                                            </button>

                                                            <button 
                                                                type="button"
                                                                @click="deleteVisit(v.id)" 
                                                                class="text-sm bg-red-500 hover:bg-red-700 text-white py-1 px-2 rounded focus:outline-none focus:shadow-outline">
                                                                Eliminar
                                                            </button>
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
<script setup>
import { ref, onMounted } from 'vue'
import axios from 'axios'
import LayoutAppBexSolition from '@/layouts/app/LayoutAppBexSolition.vue'
import { router } from '@inertiajs/vue3'

//----

const modalOpen = ref(false)
const reviewContent = ref('')

const submitReview = async (productId) => {
  modalOpen.value = true
  reviewContent.value = 'Generando reseña con IA... ⏳'

  try {
    const response = await axios.post('/api/v1/product-review', { product_id: productId })
    reviewContent.value = response.data.review || 'La IA no pudo generar una reseña en este momento.'
  } catch (error) {
    reviewContent.value = 'Ocurrió un error al contactar a la IA.'
    console.error(error)
  }
}


//---



const message = ref('Cargando...')

const props = defineProps({
  products: Array
});

onMounted(() => {
  console.log('Products:', props.products);
  
  axios.get('/api/v1/visits-data')
    .then(res => {
      message.value = res.data.message
    })
    .catch(() => {
      message.value = 'No autorizado'
    })
})



</script>

<template>
  <LayoutAppBexSolition >
    
      <div class="container mx-auto">
        <h1 class="text-4xl font-bold text-center">AI Reviews</h1>
        <div class="grid grid-cols-3 gap-4">
          <div v-for="product in props.products" :key="product.id" class="bg-white shadow-md rounded-lg overflow-hidden">
            <img :src="product.featured_image" :alt="product.name" class="w-full" />
             <div class="p-6">
              <h3 class="text-xl font-bold mb-2">
                {{ product.name }}
                <span class="inline-block bg-gray-200 text-xs font-semibold px-2 py-1 rounded-full">
                  {{ product.category.name }}
                </span>
              </h3>
              <p class="text-gray-700 text-base">{{ product.description }}</p>
              <div class="flex items-center justify-between">
                <p class="text-gray-700 text-sm"><span>Price:</span> <strong>${{ product.price }}</strong></p>
                <p class="text-gray-700 text-sm"><span>Rating:</span> <strong>{{ product.rating }}</strong></p>
              </div>
              <button @click="submitReview(product.id)" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mt-2">
                ¿Qué opina la IA? 😎
              </button>
            </div>
          </div>
        </div>

        <!-- Modal -->
        <div v-if="modalOpen" class="fixed inset-0 bg-gray-900 bg-opacity-75 flex items-center justify-center z-50">
          <div class="bg-white p-6 rounded-lg w-11/12 md:w-1/2 max-h-[80vh] overflow-y-auto shadow-lg">
            <h2 class="text-2xl font-bold mb-4">Reseña de la IA 🧠</h2>
            <div class="text-gray-800 whitespace-pre-line">{{ reviewContent }}</div>
            <div class="mt-6 text-right">
              <button @click="modalOpen = false" class="bg-red-500 hover:bg-red-600 text-white px-4 py-2 rounded">Cerrar</button>
            </div>
          </div>
        </div>
      </div>


  </LayoutAppBexSolition>
  
</template>



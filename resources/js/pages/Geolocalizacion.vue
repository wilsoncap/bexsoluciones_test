<script setup>
import { ref, onMounted } from 'vue'
import axios from 'axios'
import LayoutAppBexSolition from '@/layouts/app/LayoutAppBexSolition.vue'
import Mapa from '@/components/bexsolutions/Mapa.vue'


const message = ref('Cargando...')

onMounted(() => {
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
    <Mapa />
  </LayoutAppBexSolition>
  
</template>



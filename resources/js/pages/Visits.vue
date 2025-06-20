<script setup>
import { ref, onMounted } from 'vue'
import axios from 'axios'
import LayoutAppBexSolition from '@/layouts/app/LayoutAppBexSolition.vue'
import Crud from '@/components/bexsolutions/Crud.vue'


const message = ref('Cargando...')

const props = defineProps({
  visits: Array
});

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
    <Crud :visits="props.visits" />
  </LayoutAppBexSolition>
  
</template>



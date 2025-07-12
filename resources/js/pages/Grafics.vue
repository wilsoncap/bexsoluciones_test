<script setup>
import LayoutAppBexSolition from '@/layouts/app/LayoutAppBexSolition.vue'
import { BarChart, LineChart, PieChart, DoughnutChart, RadarChart } from '@/Components/Charts'
import {
  Chart as ChartJS,
  Title, Tooltip, Legend,
  LineElement, CategoryScale, LinearScale, PointElement
} from 'chart.js'
import { onMounted } from 'vue'
import { Line } from 'vue-chartjs'

ChartJS.register(
  Title, Tooltip, Legend,
  LineElement, CategoryScale, LinearScale, PointElement
)

const chartData = {
  labels: ['Ene', 'Feb', 'Mar'],
  datasets: [{
    label: 'Ventas',
    data: [40, 20, 80],
    borderColor: 'rgb(75, 192, 192)',
    fill: false,
  }]
}

const chartOptions = {
  responsive: true,
  maintainAspectRatio: false
}

//----

onMounted(() => {
  console.log('componente montado:');
})



</script>

<template>
  <LayoutAppBexSolition >

    <div class="grid grid-cols-1 sm:grid-cols-5 gap-4 mb-4">
      <div class="h-70">
        <BarChart />
      </div>
      <div class="h-70">
        <LineChart />
      </div>
      <div class="h-70">
        <PieChart />
      </div>
      <div class="h-70">
        <DoughnutChart />
      </div>
      <div class="h-70">
        <RadarChart />
      </div>
  </div>
    

  </LayoutAppBexSolition>
  
</template>



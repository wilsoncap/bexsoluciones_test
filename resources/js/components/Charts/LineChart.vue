<!-- resources/js/Components/LineChart.vue -->
<script setup>
import { Line } from 'vue-chartjs'
import {
  Chart as ChartJS,
  Title, Tooltip, Legend,
  LineElement, CategoryScale, LinearScale, PointElement
} from 'chart.js'

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
</script>

<template>
  <Line :data="chartData" :options="chartOptions" />
</template>

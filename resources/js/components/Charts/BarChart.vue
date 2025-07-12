<script setup>
import { Bar } from 'vue-chartjs'
import {
  Chart as ChartJS, Title, Tooltip, Legend,
  BarElement, CategoryScale, LinearScale
} from 'chart.js'

ChartJS.register(Title, Tooltip, Legend, BarElement, CategoryScale, LinearScale)

const chartData = {
  labels: ['Ene', 'Feb', 'Mar'],
  datasets: [{ label: 'Ventas', data: [40, 60, 80], backgroundColor: '#36A2EB' }]
}
const chartOptions = { responsive: true, maintainAspectRatio: false }
</script>

<template>
  <Bar :data="chartData" :options="chartOptions" />
</template>

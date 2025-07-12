<script setup>
import { Doughnut } from 'vue-chartjs'
import { Chart as ChartJS, ArcElement, Tooltip, Legend } from 'chart.js'

ChartJS.register(ArcElement, Tooltip, Legend)

const chartData = {
  labels: ['X', 'Y', 'Z'],
  datasets: [{
    data: [25, 50, 25],
    backgroundColor: ['#FF6384', '#36A2EB', '#FFCE56']
  }]
}
const chartOptions = { responsive: true, cutout: '70%' }
</script>

<template>
  <Doughnut :data="chartData" :options="chartOptions" />
</template>

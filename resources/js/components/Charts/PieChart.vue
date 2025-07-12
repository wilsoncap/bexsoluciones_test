<script setup>
import { Pie } from 'vue-chartjs'
import { Chart as ChartJS, ArcElement, Tooltip, Legend } from 'chart.js'

ChartJS.register(ArcElement, Tooltip, Legend)

const chartData = {
  labels: ['A', 'B', 'C'],
  datasets: [{
    label: 'Reparto',
    data: [30, 40, 30],
    backgroundColor: ['#FF6384', '#36A2EB', '#FFCE56']
  }]
}
const chartOptions = { responsive: true, maintainAspectRatio: false }
</script>

<template>
  <Pie :data="chartData" :options="chartOptions" />
</template>

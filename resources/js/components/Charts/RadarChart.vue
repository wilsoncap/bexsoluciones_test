<script setup>
import { Radar } from 'vue-chartjs'
import {
  Chart as ChartJS, RadialLinearScale, PointElement, LineElement,
  Filler, Tooltip, Legend
} from 'chart.js'

ChartJS.register(RadialLinearScale, PointElement, LineElement, Filler, Tooltip, Legend)

const chartData = {
  labels: ['Velocidad', 'Fuerza', 'Resistencia', 'Agilidad'],
  datasets: [{
    label: 'Atleta 1',
    data: [65, 59, 90, 81],
    backgroundColor: 'rgba(179,181,198,0.2)',
    borderColor: 'rgba(179,181,198,1)'
  }]
}
const chartOptions = { responsive: true }
</script>

<template>
  <Radar :data="chartData" :options="chartOptions" />
</template>

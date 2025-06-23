<script setup>
    import { onMounted } from 'vue';
    import L from 'leaflet';

    const props = defineProps({
    visits: Object
    });

    onMounted(() => {
        const map = L.map('map').setView([6.25, -75.56], 12); // Centro inicial

        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '&copy; OpenStreetMap contributors'
        }).addTo(map);

        props.visits.forEach(visit => {
            const marker = L.marker([visit.latitude, visit.longitude]).addTo(map);
            marker.bindPopup(`<b>${visit.name}</b><br>${visit.email}`);
        });
    });

    
</script>


<template>
    <div id="map" class="h-[85vh]"></div>
</template>


<style scoped>
</style>
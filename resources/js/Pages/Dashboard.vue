<script setup>
defineProps({ images: Array });
</script>

<template>
    <div class="p-8 bg-gray-100 min-h-screen">
        <h1 class="text-2xl font-bold mb-6">Galerie Automatisée (C:/temp)</h1>
        
        <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
            <div v-for="image in images" :key="image.id" class="bg-white p-2 rounded shadow">
                <img :src="'/external-image/' + image.filename" class="w-full h-40 object-cover rounded">
                <p class="text-xs mt-2 text-gray-500 truncate">{{ image.filename }}</p>
            </div>
        </div>

        <div v-if="images.length === 0" class="text-center p-10 border-2 border-dashed border-gray-300 rounded">
            Aucune image détectée. Ajoutez un fichier dans C:/temp et attendez 1 minute.
        </div>
    </div>
</template>
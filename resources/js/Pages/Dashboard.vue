<template>
    <div class="p-8">
        <h1 class="text-xl font-bold mb-6">Galerie Réseau (Partage Tous-Tous)</h1>

        <div class="grid grid-cols-1 md:grid-cols-3 lg:grid-cols-4 gap-4">
            <div 
                v-for="image in images"
                :key="image.id"
                class="bg-white p-2 rounded shadow border cursor-pointer hover:opacity-90 transition"
                @click="selectedImage = image"
            >
            <img 
                :src="'/external-image/' + image.filename"
                class="w-full h-48 object-cover rounded"
                loading="lazy"
            >
            <p class="text-xs text-gray-500 mt-2 truncate">{{ image.title }}</p>
            </div>
        </div>

        <div 
            v-if="selectedImage"
            class="fixed inset-0 z-50 flex items-center justify-center bg-black/90 p-4"
            @click="selectedImage = null"
        >
            <div class="relative max-w-5xl max-h-full">
                <img
                    :src="'/external-image/' + selectedImage.filename"
                    class="max-w-full max-h-[90vh] rounded shadow-2xl object-contain"
                >
                <button
                    class="absolute top-[-40px] right-0 text-white text-3xl font-bold hover:text-gray-300"
                    @click="selectedImage = null"
                >
                &times;
                </button>
            </div>
        </div>
    </div>
</template>

<script setup>
import { ref } from 'vue';

defineProps({ images: Array});

const selectedImage = ref(null);
</script>
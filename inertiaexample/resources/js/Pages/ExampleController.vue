<template>
    <div class="flex flex-col items-center m-4">
        <h1 class="text-orange-800 text-4xl"> Contador </h1>
        <h2> {{ count }}</h2>
        <PrimaryButton @click="increment"> Incrementar </PrimaryButton>
    </div>
</template>

<script setup>
import { ref } from 'vue';
import PrimaryButton from '@/Components/PrimaryButton.vue'
import InputLabel from '@/Components/InputLabel.vue'
import TextInput from '@/Components/TextInput.vue'


const count = ref(0)
const increment = () => { count.value++ }

const original = ref('Juan')
original.value = "aa"

</script>
    

<style scoped ></style>


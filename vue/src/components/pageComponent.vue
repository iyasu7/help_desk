<template>

  <header class="bg-white shadow-lg rounded-lg">
    <div class=" max-w-7xl py-6 mx-4 px-4 sm:px-6 lg:px-8">
      <h1 class="text-3xl font-bold tracking-tight text-gray-900">{{ title }}</h1>
      <slot name="header"></slot>
    </div>
  </header>
  <main>
    <div class="">
      <!-- Replace with your content -->
      <div class="">
        <slot></slot>
      </div>
      <!-- /End replace -->
    </div>
  </main>
</template>
<script setup>
const props = defineProps({
  title: String
});
</script>
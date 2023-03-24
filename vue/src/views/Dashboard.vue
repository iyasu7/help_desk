<template>
  <pageComponent title="Home" >
    <!-- <div ></div> -->
    <h1>Welcome To Tahses</h1>
    <pre>
      {{ data }}
    </pre>
  </pageComponent>
</template>

<script setup>
import pageComponent from '../components/pageComponent.vue';
import store from '../store';

const data = store.state.user.data;
const rou = {
  name : "Dashboard"
}

</script>


<style scoped>

</style> 
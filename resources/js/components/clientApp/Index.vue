<template>
  <span>
    <nav-bar />
    <!-- route outlet -->
    <!-- component matched by the route will render here -->
    <router-view></router-view>
    <subscribe-new />
    <footer-client />
  </span>
</template>

<script>
import FooterClient from "./FooterClient.vue";

import NavBar from "./NavBar.vue";
import SubscribeNew from "./subscribeNew.vue";
export default {
  components: { NavBar, SubscribeNew, FooterClient },
};
</script>

<style>
</style>

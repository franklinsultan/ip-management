<template>
    <div>
      <nav>
        <router-link to="/login">Login</router-link>
        <router-link to="/register">Register</router-link>
      </nav>
      <router-view></router-view>

      <AddIpAddress />
    </div>
  </template>
  
  <script>
 import AddIpAddress from './AddIpAddress.vue';

  export default {
    name: 'App',
    components: {
        AddIpAddress
    }
  };
  </script>
  
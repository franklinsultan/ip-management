<template>
    <div class="landing-page">
      <header>
        <h2>Welcome to</h2>
        <h1>IP Address Management</h1>
        <button @click="navigateTo('login')">Login</button>
      </header>
    </div>
  </template>
  
  <script>
    export default {
        methods: {
            navigateTo(page) {
                this.$router.push({ name: page });
            },
        },
    };
  </script>
  
  <style scoped>
    .landing-page {
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        height: 100vh;
        background-color: #f4f4f4;
        text-align: center;
    }
  
    button {
        background-color: #045988;
        color: #fff;
        border: none;
        border-radius: 50PX;
        padding: 8px 15px;
        cursor: pointer;
        width: 200px;
        height: 40px;
    }
  </style>
  
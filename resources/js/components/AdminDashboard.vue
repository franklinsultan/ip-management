<template>
  <div class="app">
    <div class="sidebar">
      <h2>Dashboard</h2>
      <button @click="signOut">Sign Out</button>
    </div>
    <div class="main-content">
      <header>
        <h1>Welcome!</h1>
      </header>
      <div>
        <AddIpAddress @ipAdded="updateIpList"/>
        <IpAddressList ref="ipList"/>
      </div>
    </div>
  </div>
</template>

<script>
import { logout } from '../includes/index';
import AddIpAddress from './AddIpAddress.vue';
import IpAddressList from './IpAddressList.vue';

export default {
  name: 'App',
  components: {
      AddIpAddress,
      IpAddressList,
  },
  methods: {
    signOut() {
      localStorage.removeItem('user-token');
      this.$router.push({ name: 'login' });
    },
    updateIpList(newIp) {
      this.$refs.ipList.updateIpAddressList(newIp);
    },
  }
};
</script>

<style>
  .app {
    display: flex;
    height: 100vh;
  }

  .sidebar {
    width: 250px;
    background: #333;
    color: #fff;
    padding: 20px;
    box-shadow: 2px 0 5px rgba(0, 0, 0, 0.1);
  }

  .sidebar h2 {
    margin: 0;
    font-size: 1.5em;
  }

  .main-content {
    flex: 1;
    padding: 20px;
  }

  button {
    padding: 8px 16px;
    border: none;
    background-color: #007bff;
    color: white;
    border-radius: 4px;
    cursor: pointer;
  }

  button:hover {
    background-color: #0056b3;
  }
</style>
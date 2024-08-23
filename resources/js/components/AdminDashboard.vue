<template>
  <div class="app">
    <div class="sidebar">
      <h2>Dashboard</h2>
    </div>
    <div class="main-content">
      <header>
        <h1>Welcome to the Dashboard</h1>
        <div class="user-info">
          <button @click="signOut">Sign Out</button>
        </div>
      </header>
      <div>
        <AddIpAddress />
        <IpAddressList />
        <AuditLog />
      </div>
    </div>
    <router-view></router-view>
  </div>
</template>

<script>
import { logout } from '../includes/index';
import AddIpAddress from './AddIpAddress.vue';
import IpAddressList from './IpAddressList.vue';
import AuditLog from './AuditLog.vue';

export default {
  name: 'App',
  components: {
      AddIpAddress,
      IpAddressList,
      AuditLog
  },
  methods: {
    signOut() {
      localStorage.removeItem('user-token');
      this.$router.push({ name: 'login' });

      //need to fix
      // logout().then(res => {
      //     localStorage.removeItem('user-token');
      //     this.$router.push({ name: 'login' });
      //   }).catch(error => {
      //     console.error('Error signing out:', error);
      //   });
    }
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

.sidebar ul {
  list-style: none;
  padding: 0;
}

.sidebar ul li {
  margin: 10px 0;
}

.sidebar ul li a {
  color: #fff;
  text-decoration: none;
}

.main-content {
  flex: 1;
  padding: 20px;
}

.user-info {
  display: flex;
  align-items: center;
}

.cards {
  display: flex;
  gap: 20px;
  flex-wrap: wrap;
}

.card {
  background: #fff;
  border-radius: 5px;
  box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
  padding: 20px;
  width: calc(33% - 20px);
  box-sizing: border-box;
}

.card h3 {
  margin-top: 0;
}

@media (max-width: 768px) {
  .card {
    width: calc(50% - 20px);
  }
}

@media (max-width: 480px) {
  .card {
    width: 100%;
  }
}
</style>
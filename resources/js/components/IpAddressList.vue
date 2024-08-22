<template>
    <div>
      <h2>List of IP Addresses</h2>
      <ul v-if="ipAddresses.length">
        <li v-for="ip in ipAddresses" :key="ip.id">
          {{ ip.ip_address }} - {{ ip.label }}
          <button @click="EditIp(ip.id)">Edit</button>
        </li>
      </ul>
      <p v-else>No IP addresses found.</p>
    </div>
  </template>
  
  <script>
  import { fetchAddresses } from '../includes/index';
  
  export default {
    data() {
      return {
        ipAddresses: []
      };
    },
    methods: {
      fetchAddresses() {
        fetchAddresses().then(response => {
          this.ipAddresses = response.data;
        }).catch(error => {
          console.error('Error fetching IP addresses:', error);
        });
      },
      EditIp(id) {
        this.$router.push({ name: 'UpdateIpAddress', params: { id: id } });
      }
    },
    mounted() {
      this.fetchAddresses();
    }
  }
  </script>
  
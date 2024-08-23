<template>
    <div>
      <div class="list-title">
        <h2>List of IP Addresses
          <button @click="navigateTo('audtlogs')">View Logs</button>
        </h2>
        <div>
          <form @submit.prevent="add" class="input-row">
            <div>
              <label for="ip_address">Ip Address:</label>
              <input v-model="ipAddress.ip_address" type="text" id="ip_address" required>
            </div>
            <div>
              <label for="label">Label:</label>
              <input v-model="ipAddress.label" type="text" id="label">
            </div>
            <button type="submit">Add IP Address</button>
          </form>    
        </div>
      </div>

    </div>
  </template>
  
  <script>
  import { addIpAddress } from '../includes/index';

  export default {
    data() {
      return {
        ipAddress: {
          ip_address: '',
          label: ''
        }
      };
    },
    methods: {
      add() {
        addIpAddress(this.ipAddress).then(response => {
          this.$emit('ipAdded', response.data.data);
          this.ipAddress.ip_address = '';
          this.ipAddress.label = '';
        }).catch(error => {
            console.error('Error adding IP address:', error);
        });
      },
      navigateTo(page) {
        this.$router.push({ name: page });
      }
    }
  }
  </script>
  <style scoped>
    .input-row {
      display: flex;
      gap: 10px;
      align-items: center;
    }
    
    input {
      flex: 1; /* Make each input take equal width */
      padding: 8px;
      border: 1px solid #ccc;
      border-radius: 4px;
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

    .list-title {
      display: flex;
      justify-content: space-between;
      align-items: center;
      margin-bottom: 20px;
    }
  </style>
  
  
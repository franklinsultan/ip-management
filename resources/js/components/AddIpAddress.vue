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
          <div v-if="error" class="error-message">
            <p v-for="item in error">
              {{ item }}
            </p>
          </div>    
        </div>
      </div>

    </div>
  </template>
  
  <script>
  import { addIpAddress } from '../includes/index';

  export default {
    data() {
      return {
        error: '',
        ipAddress: {
          ip_address: '',
          label: '',
        }
      };
    },
    methods: {
      add() {
        addIpAddress(this.ipAddress).then(response => {
          this.$emit('ipAdded', response.data.data);
          this.ipAddress.ip_address = '';
          this.ipAddress.label = '';
          this.error = '';
        }).catch(error => {
          this.error = error.response.data.errors;
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
      flex: 1;
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
    .error-message {
      color: red;
    }
  </style>
  
  
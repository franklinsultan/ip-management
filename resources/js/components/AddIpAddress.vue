<template>
    <div>
      <h2>Add IP Address</h2>
      <form @submit.prevent="add">
        <div>
          <label for="ip_address">IP Address:</label>
          <input v-model="ipAddress.ip_address" type="text" id="ip_address" required>
        </div>
        <div>
          <label for="label">Label:</label>
          <input v-model="ipAddress.label" type="text" id="label">
        </div>
        <button type="submit">Add IP Address</button>
      </form>
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
          alert('IP address added successfully');
          this.ipAddress.ip_address = '';
          this.ipAddress.label = '';
        }).catch(error => {
            console.error('Error adding IP address:', error);
        });
      }
    }
  }
  </script>
  
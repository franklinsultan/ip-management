<template>
    <div>
      <h2>Update IP Address Label</h2>
      <form @submit.prevent="update">
        <div>
          <label for="ip_address">Ip Address:</label>
          <input v-model="ipAddress.ip_address" type="text" id="ip_address" disabled>
        </div>
        <div>
          <label for="label">Label:</label>
          <input v-model="ipAddress.label" type="text" id="label">
        </div>
        <button type="submit">Update</button>
      </form>
    </div>
  </template>
  
  <script>
  import { getIpAddress, updateIpAddress } from '../includes/index';
  
  export default {
    props: {
      id: {
        type: Number,
        required: true
      }
    },
    data() {
      return {
        ipAddress: {
          ip_address: '',
          label: ''
        }
      };
    },
    methods: {
      getIpAddress() {
        getIpAddress(this.id).then(response => {

          this.ipAddress = response.data.data;
        }).catch(error => {
          console.error('Error fetching IP address:', error);
        });
      },
      update() {
        updateIpAddress(this.id, this.ipAddress.label).then(response => {
          alert('IP address label updated successfully');
        }).catch(error => {
          console.error('Error updating IP address label:', error);
        });
      }
    },
    mounted() {
      this.getIpAddress();
    }
  }
  </script>
  
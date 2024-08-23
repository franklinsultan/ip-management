<template>
  <div>
    <h2>List of IP Addresses</h2>
    <table>
      <thead>
        <tr>
          <th>#</th>
          <th>Ip Address</th>
          <th>Label</th>
          <th>Created At</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody>
        <tr v-for="(item, index) in ipAddresses" :key="index">
          <td>{{ index + 1}}</td>
          <td>{{ item.ip_address }}</td>
          <td>{{ item.label }}</td>
          <td>{{ item.created_at }}</td>
          <button @click="EditIp(item)">Edit</button>
        </tr>
      </tbody>
    </table>

    <EditLabelModal
      :show="showModal"
      :ipAddress="ipAddress"
      @close="closelModal"
    />
  </div>
</template>

<script>
  import { fetchAddresses } from '../includes/index';
  import EditLabelModal from './EditLabelModal.vue';

  export default {
    data() {
      return {
        showModal: false,
        ipAddress: null,
        ipAddresses: []
      };
    },
    components: {
      EditLabelModal
  },
    methods: {
      fetchAddresses() {
        fetchAddresses().then(response => {
          this.ipAddresses = response.data;
        }).catch(error => {
          console.error('Error fetching IP addresses:', error);
        });
      },
      EditIp(ipAddress) {
        this.showModal = true;
        this.ipAddress = ipAddress;
        // this.$router.push({ name: 'EditLabelModal', params: { id: id } });
      },
      closelModal() {
        this.showModal = false;
      }
    },
    mounted() {
      this.fetchAddresses();
    }
  }
</script>

<style scoped>
  .table-container {
    max-width: 800px;
    margin: auto;
    padding: 20px;
  }

  table {
    width: 100%;
    border-collapse: collapse;
    border: 1px solid #ddd;
  }

  th, td {
    padding: 10px;
    text-align: left;
    border: 1px solid #ddd;
  }

  th {
    background-color: #f4f4f4;
  }

  tr:nth-child(even) {
    background-color: #f9f9f9;
  }
</style>
<template>
  <div>
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
          <td><button @click="EditIp(item)">Edit</button></td>

        </tr>
      </tbody>
    </table>

    <EditLabelModal
      :show="showModal"
      :ipAddress="ipAddress"
      @close="closelModal"
      @updateLabel="updateIpAddressLabel" 
    />
  </div>
</template>

<script>
  import { fetchAddresses } from '../includes/index';
  import EditLabelModal from './EditLabelModal.vue';
  import AuditLog from './AuditLog.vue';

  export default {
    data() {
      return {
        showModal: false,
        ipAddress: null,
        ipAddresses: []
      };
    },
    components: {
      EditLabelModal,
      AuditLog,
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
      },
      updateIpAddressList(newIp) {
        this.ipAddresses.push(newIp);
      },
      updateIpAddressLabel(updatedIp) {
        const newArr = this.ipAddresses.map(item => {
              if (item.id === updatedIp.id) {
                return {
                  ...item,
                  label: updatedIp.label
                }
              }
              return item;
        });
        this.ipAddresses = newArr;
        this.$refs.log.getAuditLogs(); //update the audit logs
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
  
  .list-title {
    display: flex;
    align-items: center;
    margin-bottom: 20px;
    gap: 10px;
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
<template>
  <div class="app">
    <div class="sidebar">
      <h2>Dashboard</h2>
    </div>
    <div class="main-content">
      <header class="header">
        <button @click="goBack">Go Back</button>
        <h1>Audit Trail</h1>
      </header>
      <table>
        <thead>
          <tr>
            <th>#</th>
            <th>User</th>
            <th>Details</th>
            <th>Created At</th>
          </tr>
        </thead>
        <tbody>
          <tr v-for="(item, index) in auditLogs" :key="index">
            <td>{{ index + 1}}</td>
            <td>{{ item.user.name}}</td>
            <td>{{ item.details }}</td>
            <td>{{ item.created_at }}</td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>
</template>
  
  <script>
  import { getAuditLogs } from '../includes/index';
  
  export default {
    data() {
      return {
        auditLogs: []
      };
    },
    methods: {
     getAuditLogs() {
        getAuditLogs().then(response => {
          this.auditLogs = response.data;
        }).catch(error => {
          console.error('Error fetching audit logs:', error);
        });
      },
      goBack() {
        this.$router.go(-1);
      },
    },
    mounted() {
      this.getAuditLogs();
    }
  }
  </script>
  
  <style scoped>
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
<template>
    <div>
      <h2>Audit Log for IP Address </h2>
      <table v-if="auditLogs.length">
        <thead>
          <tr>
            <th>Modify by</th>
            <th>details</th>
            <th>Date</th>
          </tr>
        </thead>
        <tbody>
          <tr v-for="log in auditLogs" :key="log.id">
            <td>{{ name }}</td>
            <td>{{ log.details }}</td>
            <td>{{ log.created_at }}</td>
          </tr>
        </tbody>
      </table>
      <p v-else>No changes made.</p>
    </div>
  </template>
  
  <script>
  import { getAuditLogs } from '../includes/index';
  
  export default {
    data() {
      return {
        name: '',
        auditLogs: []
      };
    },
    methods: {
     getAuditLogs() {
        getAuditLogs().then(response => {
          this.auditLogs = response.data.audit_logs;
          this.name = response.data.name;
        }).catch(error => {
          console.error('Error fetching audit logs:', error);
        });
      }
    },
    mounted() {
      this.getAuditLogs();
    }
  }
  </script>
  
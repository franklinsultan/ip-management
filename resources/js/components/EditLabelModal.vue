<template>
  <div v-if="show" class="modal-container">
    <div class="modal">
      <h2>Edit Label for IP Address</h2>
      <form @submit.prevent="update">
          <div class="input-group">
              <label for="ip_address">Ip Address:</label>
              <input
                  :value="ipAddress.ip_address"
                  type="text"
                  id="ip_address"
                  disabled
              />
          </div>
          <div class="input-group">
              <label for="label">Label:</label>
                <input type="text" 
                  id="label" 
                  :value="ipAddress.label"
                  @input="event => label = event.target.value"
                />
          </div>
          <div class="button-group">
            <button type="submit">Update Label</button>
            <button type="button" @click="closeModal">Cancel</button>
        </div>
      </form>
    </div>
  </div>
</template>
<script>
  import { updateIpAddress } from '../includes/index';
  
  export default {
    props: {
      ipAddress: {
        type: Object,
      },
      show: {
        type: Boolean
      },
    },
    data() {
      return {
        label: ''
      };
    },
    methods: {
      update() {
        updateIpAddress(this.ipAddress.id, this.label).then(response => {
          this.$emit('updateLabel', response.data.data);
          this.closeModal();
        }).catch(error => {
          console.error('Error updating IP address label:', error);
        });
      },
      closeModal() {
        this.$emit('close');
      }
    },
  }
</script>

<style scoped>
  .modal-container{
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: rgba(0, 0, 0, 0.5);
    display: flex;
    justify-content: center;
    align-items: center;
  }

  .modal {
    background-color: white;
    padding: 2rem;
    border-radius: 8px;
    max-width: 400px;
    width: 100%;
  }

  .input-group {
    margin-bottom: 1rem;
  }

  label {
    display: block;
    margin-bottom: 0.5rem;
  }

  input {
    width: 100%;
    padding: 0.5rem;
    border: 1px solid #ccc;
    border-radius: 4px;
  }

  .button-group {
    display: flex;
    justify-content: space-between;
  }

  button {
    padding: 0.5rem 1rem;
    border: none;
    border-radius: 4px;
    cursor: pointer;
  }

  button[type="submit"] {
    background-color: #007bff;
    color: white;
  }

  button[type="button"] {
    background-color: #ccc;
    color: #333;
  }

  button[type="submit"]:hover {
    background-color: #0056b3;
  }

  button[type="button"]:hover {
    background-color: #999;
  }
</style>
  
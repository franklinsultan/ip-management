<template>
    <div class="container">
        <div class="card">
            <h2>{{ isLogin ? 'Login' : 'Register' }}</h2>
            <form v-if="isLogin" @submit.prevent="login">
                <div class="input-group">
                    <label for="email">Email</label>
                    <input v-model="user.email" type="email" placeholder="Email" required />
                </div>
                <div class="input-group">
                    <label for="password">Password</label>
                    <input v-model="user.password" type="password" placeholder="Password" required />
                </div>
                <button type="submit" class="login-button">Login</button>
            </form>

            <form v-else @submit.prevent="register">
                <input v-model="user.name" type="text" placeholder="Name" required />
                <input v-model="user.email" type="email" placeholder="Email" required />
                <input v-model="user.password" type="password" placeholder="Password" required />
                <input v-model="user.password_confirmation" type="password" placeholder="Confirm Password" required />
                <button type="submit">Register</button>
            </form>
            <a @click="toggleForm" class="toggle">
                {{ isLogin ? "No account? Register" : 'Already have an account? Login' }}
            </a>
            <div v-if="error" class="error-message">
              <p v-for="item in error">
                {{ item }}
              </p>
            </div>
        </div>
    </div>
  </template>
  
  <script>
import { login, register } from '../includes/index';
  
  export default {
    data() {
      return {
        isLogin: true,
        error: '',
        user: {
                name: '',
                email: '',
                password: '',
            }
      };
    },
    methods: {
        login() {
            login(this.user).then(res => {
                if (res.error) {
                  this.error = res.error;
                } else {
                  this.$router.push({ name: 'dashboard'});
                }
            }).catch(error => {
               this.error = error;
            });
        },
        register() {
            register(this.user).then(res => {
                this.isLogin = true;
            }).catch(error => {
              this.error = error.response.data.errors;
            });
        },
        toggleForm() {
            this.isLogin = !this.isLogin;
            this.user.name = '';
            this.user.email = '';
            this.user.password = '';
            this.error = '';
      }
    },
  };
  </script>
  
  <style scoped>
  .container {
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
    background-color: #f5f5f5;
  }
  
  .card {
    background-color: white;
    padding: 2rem;
    border-radius: 8px;
    box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
    max-width: 400px;
    width: 100%;
    text-align: center;
  }
  
  h2 {
    margin-bottom: 1.5rem;
  }
  
  .input-group {
    margin-bottom: 1rem;
  }
  
  label {
    display: block;
    margin-bottom: 0.5rem;
  }
  
  input {
    width: 93%;
    padding: 0.75rem;
    margin-bottom: 1rem;
    border: 1px solid #ccc;
    border-radius: 4px;
  }
  
  button {
    width: 100%;
    padding: 0.75rem;
    background-color: #2f5d8e;
    color: white;
    border: none;
    border-radius: 4px;
    cursor: pointer;
  }
  
  button:hover {
    background-color: #0056b3;
  }
  
  .toggle{
    margin-top: 1rem;
    color: #007bff;
    cursor: pointer;
    text-decoration: underline;
  }
  .error-message {
    color: red;
  }
  </style>
  
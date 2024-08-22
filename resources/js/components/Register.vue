<template>
    <div>
        <h2>Register</h2>
        <form @submit.prevent="register">
            <input v-model="user.name" type="text" placeholder="Name" required />
            <input v-model="user.email" type="email" placeholder="Email" required />
            <input v-model="user.password" type="password" placeholder="Password" required />
            <input v-model="user.password_confirmation" type="password" placeholder="Confirm Password" required />
            <button type="submit">Register</button>
        </form>
    </div>
</template>

<script>
import { register } from '../includes/index';

export default {
    data() {
        return {
            user: {
                name: '',
                email: '',
                password: '',
                password_confirmation: ''
            }
        };
    },
    methods: {
        register() {
            register(this.user).then(response => {
                console.log(response.data);
            }).catch(error => {
                console.error(error);
            });
        }
    }
};
</script>

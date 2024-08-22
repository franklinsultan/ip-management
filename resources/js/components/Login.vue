<template>
    <div>
        <h2>Login</h2>
        <form @submit.prevent="login">
            <input v-model="user.email" type="email" placeholder="Email" required />
            <input v-model="user.password" type="password" placeholder="Password" required />
            <button type="submit">Login</button>
        </form>
    </div>
</template>

<script>
import { login } from '../includes/index';

export default {
    data() {
        return {
            user: {
                email: '',
                password: ''
            }
        };
    },
    methods: {
        login() {
            login(this.user).then(response => {
                this.$router.push('/ip-addresses');
            }).catch(error => {
                console.error(error);
            });
        }
    }
};
</script>

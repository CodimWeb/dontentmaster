<script setup>
    import {ref} from "vue";
    import api from "../api/index.js";
    import router from "../router/index.js";

    const login = ref('')
    const password = ref('')
    const errorLogin = ref(false)
    const errorPassword = ref(false)
    const errorMsg = ref('')

    const sendForm = (e) => {

        if(login == '') {
            errorLogin.value = true
            return false;
        }
        if(password == '') {
            errorPassword.value = true
            return false
        }
        api.post('/api/auth/login',{
            login: login.value,
            password: password.value,
        }).then((res) => {
            console.log(res)
            // userStore.setUser(res.data)
            localStorage.setItem('access_token', res.data.access_token)
            router.push('/admin')
        }).catch(error => {
            errorMsg.value = 'Не верный login или пароль'
        })
    }

</script>

<template>
    <div class="login">
        <div class="container">
            <div class="row">
                <div class="col-6 offset-3">

                    <div v-if="errorMsg" class="text-danger">{{errorMsg}}</div>

                    <div class="card py-4 px-4">
                        <div class="form-group mb-3">
                            <label class="form-label">Login</label>
                            <input v-model="login"
                                   type="text"
                                   class="form-control"
                                   :class="`${errorLogin ? 'is-invalid' : ''}`"
                            >
                            <div class="invalid-feedback">Обязательное поле</div>
                        </div>
                        <div class="form-group mb-4">
                            <label class="form-label">Password</label>
                            <input v-model="password"
                                   type="password"
                                   class="form-control"
                                   :class="`${errorPassword ? 'is-invalid' : ''}`"
                            >
                            <div class="invalid-feedback">Обязательное поле</div>
                        </div>
                        <div class="form-group mb-3">
                            <button type="button" class="btn btn-success px-8" @click="sendForm">Вход</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</template>

<style scoped>


.login {
    width: 100%;
    height: 100%;
    display: flex;
    justify-content: center;
    align-items: center;
}
</style>

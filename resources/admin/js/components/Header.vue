<script setup>
import api from "../api/index.js";
import {onMounted, ref} from "vue";

const user = ref(null)
const logout = () => {
    api.post('/api/auth/logout').then((res) => {
        localStorage.removeItem('access_token');
        location.reload();
    })
}

onMounted(() => {
    api.get('/api/auth/me').then((res) => {
        user.value = res.data.user
    })
})

</script>

<template>
    <div class="header shadow ">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-3">
                    <router-link to="/admin" class="header-logo">
                        <img src="../../../img/logo.png" alt="">
                    </router-link>
                </div>
                <div class="col-6"><h2>Здарова {{user?.login}}</h2></div>
                <div class="col-3 text-end">
                    <a class="btn btn-primary" aria-current="page" href="/">На сайт</a>
                    <button type="button" class="btn btn-danger ms-3" @click="logout">Выход</button>
                </div>
            </div>
        </div>
    </div>
</template>




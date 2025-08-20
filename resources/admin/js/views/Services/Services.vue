<script setup>
import {ref, onMounted} from "vue";
import LeftMenu from "../../components/LeftMenu.vue";
import Header from "../../components/Header.vue";
import api from "../../api/index.js";

const categories = ref([]);
const categoryId = ref('')
const services = ref([])
const isEmptyServices = ref(false)

const fetchServices = () => {
    api.get(`/api/service/get-by-category/${categoryId.value}`).then((res) => {
        services.value = res.data
        isEmptyServices.value = !res.data.length
        console.log(res)
    })
}

const removeService = (id, name) => {
    if(confirm(`Удалить запись ${name}`)) {
        api.delete(`/api/service/${id}`).then((res) => {
            services.value = res.data
        })
    }
}

onMounted(() => {
    api.get('/api/category').then((res) => {
        if(res.data.length) {
            categories.value = res.data
            categoryId.value = res.data[0].id
            fetchServices();
        }
        console.log(res)
    })
})

</script>

<template>
    <Header />
    <div class="container-fluid">
        <div class="wrapper">
            <LeftMenu />
            <div class="content">
                <div class="row align-items-center mt-2">
                    <div class="col">
                        <h1>Услуги</h1>
                    </div>
                    <div class="col text-end">
                        <router-link :to="{name: 'create-service'}" class="btn btn-success">Добавить услугу</router-link>
                    </div>
                </div>
                <div class="row">
                    <div class="col-4">
                        <select class="form-select" v-model="categoryId" @change="fetchServices">
                            <option v-for="category in categories"
                                    :value="category.id"
                            >
                                {{category.name}}
                            </option>
                        </select>
                    </div>
                </div>
                <h3 v-if="isEmptyServices" class="text-danger">Список пуст</h3>
                <table v-else class="table table-bordered align-middle mt-4">
                    <thead>
                    <tr>
                        <th scope="col" style="width: 40px">id</th>
                        <th scope="col">Название</th>
                        <th scope="col">Цена</th>
                        <th scope="col">Опубликовано</th>
                        <th scope="col"></th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr v-for="service in services">
                        <th scope="row">{{ service.id }}</th>
                        <td>{{service.name}}</td>
                        <td>
                            <div v-if="service.is_price_individual">
                                <span>Индивидуально</span>
                            </div>
                            <div v-else>
                                <span v-if="service.is_price_from" class="fw-bold">От </span>
                                {{service.price}}
                            </div>
                        </td>
                        <td class="fw-semibold" :class="`${service.is_publish ? 'text-success' : 'text-danger'}`">
                            {{`${service.is_publish ? 'Да' : 'Нет'}`}}
                        </td>
                        <td>
                            <router-link
                                :to="{name: 'edit-service', params: {id: service.id}}"
                                class="btn btn-warning btn-sm mx-1"
                            >Редактировать</router-link>
                            <button class="btn btn-danger btn-sm mx-1" @click="removeService(service.id, service.name)">Удалить</button>
                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</template>

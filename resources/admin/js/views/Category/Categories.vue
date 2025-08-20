<script setup>
import {onMounted, ref, useTemplateRef} from "vue";
import api from "../../api/index.js";
import LeftMenu from "../../components/LeftMenu.vue";
import Header from "../../components/Header.vue";

const categories = ref([])

const removeCategory = (id, name) => {
    if(confirm(`Удалить запись ${name}`)) {
        api.delete(`/api/category/${id}`).then((res) => {
            categories.value = res.data
        })
    }
}

onMounted(() => {
    api.get('/api/category').then((res) => {
        categories.value = res.data
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
                        <h1>Категории</h1>
                    </div>
                    <div class="col text-end">
                        <router-link :to="{name: 'create-category'}" class="btn btn-success">Добавить категорию</router-link>
                    </div>
                </div>
                <table class="table table-bordered align-middle mt-4">
                    <thead>
                    <tr>
                        <th scope="col" style="width: 40px">id</th>
                        <th scope="col">Название</th>
                        <th scope="col">Опубликовано</th>
                        <th scope="col"></th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr v-for="category in categories">
                        <th scope="row">{{ category.id }}</th>
                        <td>{{category.name}}</td>
                        <td class="fw-semibold" :class="`${category.is_publish ? 'text-success' : 'text-danger'}`">
                            {{`${category.is_publish ? 'Да' : 'Нет'}`}}
                        </td>
                        <td>
                            <router-link
                                :to="{name: 'edit-category', params: {id: category.id}}"
                                class="btn btn-warning btn-sm mx-1"
                            >Редактировать</router-link>
                            <button class="btn btn-danger btn-sm mx-1" @click="removeCategory(category.id, category.name)">Удалить</button>
                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</template>

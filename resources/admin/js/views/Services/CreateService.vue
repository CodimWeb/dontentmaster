<script setup>

import Header from "../../components/Header.vue";
import LeftMenu from "../../components/LeftMenu.vue";
import api from "../../api/index.js";
import {onMounted, ref} from "vue";

const categoryId = ref('')
const categories = ref([])
const title = ref('');
const isPublish = ref(true)
const price = ref('')
const isPriceFrom = ref(false)
const isPriceIndividual = ref(false)
const errorCategory = ref('')

const save = (e) => {
    e.preventDefault()
    if(!categoryId.value) {
        errorCategory.value = 'Выберите категорию'
        return false
    }
    let data = new FormData();
    data.append('name', title.value);
    data.append('category_id', categoryId.value);
    data.append('is_publish', isPublish.value ? 1 : 0);
    data.append('price', price.value);
    data.append('is_price_from', isPriceFrom.value  ? 1 : 0);
    data.append('is_price_individual', isPriceIndividual.value  ? 1 : 0);


    api.post('/api/service', data).then((res) => {
        console.log(res)
        alert("Сохранено")
        location.reload()
    })
}

const handleChangePriceFrom = () => {
    if(isPriceFrom.value) {
        isPriceIndividual.value = false
    }
}

const handleChangePriceIndividual = () => {
    if(isPriceIndividual.value) {
        isPriceFrom.value = false
    }
}

onMounted(() => {
    api.get('/api/category').then((res) => {
        categories.value = res.data
        console.log(res)
    })})


</script>

<template>
    <Header />
    <div class="container-fluid">
        <div class="wrapper">
            <LeftMenu />
            <div class="content">
                <div class="row">
                    <div class="col-9">
                        <h1>Добавление услуги</h1>
                    </div>
                    <div class="col-3">
                        <router-link :to="{name: 'services'}" class="btn btn-success">Список услуг</router-link>
                    </div>
                </div>
                <form class="form mt-4" @submit="save">
                    <div class="mb-3">
                        <label for="" class="form-label">Категория (Обязятельное поле)</label>
                        <select class="form-select" v-model="categoryId">
                            <option value="" selected>Выберите категорию</option>
                            <option v-for="category in categories"
                                    :value="category.id"
                            >
                                {{category.name}}
                            </option>
                        </select>
                        <div v-if="errorCategory" class="text-danger">{{errorCategory}}</div>
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Название услуги (Обязятельное поле)</label>
                        <input v-model="title" type="text" class="form-control">
                    </div>

                    <div class="mb-3">
                        <div>
                            <label for="" class="form-label">Цена (Обязятельное поле)</label>
                        </div>
                        <div class="d-flex align-items-center">
                            <div class="me-2" style="width: 250px">
                                <input v-model="price" type="number" class="form-control">
                            </div>
                            <div class="d-flex align-items-center me-3">
                                <label for="priceFrom" class="form-label me-2 mb-0" style="cursor: pointer">Цена от</label>
                                <input type="checkbox"
                                       id="priceFrom"
                                       style="width: 16px; height: 16px"
                                       v-model="isPriceFrom"
                                       class="form-check"
                                       @change="handleChangePriceFrom"
                                >
                            </div>
                            <div class="d-flex align-items-center me-3">
                                <label for="priceIndividual" class="form-label me-2 mb-0" style="cursor: pointer">Индивидуальный расчет</label>
                                <input type="checkbox"
                                       id="priceIndividual"
                                       style="width: 16px; height: 16px"
                                       v-model="isPriceIndividual"
                                       class="form-check"
                                       @change="handleChangePriceIndividual"
                                >
                            </div>

                        </div>
                    </div>

                    <div class="mb-3 d-flex align-items-center">
                        <input type="checkbox"
                               id="publish"
                               style="width: 16px; height: 16px"
                               v-model="isPublish"
                               class="form-check"
                        >
                        <label for="publish" class="form-label ms-2 mb-0" style="cursor: pointer">Опубликовать</label>
                    </div>

                    <button type="submit" class="btn btn-success">Сохранить</button>
                </form>
            </div>
        </div>
    </div>
</template>

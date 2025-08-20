<script setup>
import {ref, useTemplateRef} from "vue";
import api from "../../api/index.js";
import LeftMenu from "../../components/LeftMenu.vue";
import Header from "../../components/Header.vue";


const title = ref('');
const description = ref('');
const file = useTemplateRef('input')
const isPublish = ref(true)
const seoTitle = ref('')
const seoDescription = ref('')

const handlePhoto = (e) => {
    // console.log(e.target.value)
    //
    // let reader = new FileReader();
    // reader.onload = () => {
    //     let base64 = reader.result;
    //     console.log(reader.result);
    // }
    // reader.readAsDataURL(e.target.files[0]);
    // console.log(e.target.files[0].type)
}

const save = (e) => {
    e.preventDefault()
    let data = new FormData();
    data.append('name', title.value);
    data.append('img', file.value.files[0]);
    data.append('description', description.value);
    data.append('is_publish', isPublish.value ? 1 : 0);
    data.append('seo_title', seoTitle.value);
    data.append('seo_description', seoDescription.value);

    api.post('/api/category', data).then((res) => {
        console.log(res)
        alert("Сохранено")
        location.reload()
    })
}
</script>

<template>
    <Header />
    <div class="container-fluid">
        <div class="wrapper">
            <LeftMenu />
            <div class="content">
                <div class="row">
                    <div class="col-9">
                        <h1>Добавление категории</h1>
                    </div>
                    <div class="col-3">
                        <router-link :to="{name: 'categories'}" class="btn btn-success">Список категорий</router-link>
                    </div>
                </div>
                <form class="form mt-4" @submit="save">
                    <div class="mb-3">
                        <label for="" class="form-label">Название категории (Обязятельное поле)</label>
                        <input v-model="title" type="text" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Описание (Желательное поле)</label>
                        <textarea v-model="description" class="form-control" rows="4"></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Картинка (Обязятельное поле)</label>
                        <input type="file"
                               ref="input"
                               class="form-control"
                               accept="image/*"
                               @change="handlePhoto"
                        >
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
                    <div class="mb-3">
                        <label for="" class="form-label">SEO Title (Обязятельное поле)</label>
                        <input v-model="seoTitle" type="text" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">SEO Description (Обязятельное поле)</label>
                        <textarea v-model="seoDescription" class="form-control" rows="4"></textarea>
                    </div>
                    <button type="submit" class="btn btn-success">Сохранить</button>
                </form>
            </div>
        </div>
    </div>

</template>

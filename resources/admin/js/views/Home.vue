<script setup>
import {onMounted, ref} from "vue";
import api from "../api/index.js";
import Header from "../components/Header.vue";
import LeftMenu from "../components/LeftMenu.vue";

const seoTitle = ref('')
const seoDescription = ref('')

const currentSeo = ref(null)

const save = () => {

    if(currentSeo.value == null) {
        api.post('/api/home', {
            seo_title: seoTitle.value,
            seo_description: seoDescription.value,
            page_name: 'home'
        }).then((res) => {
            if(res.data.seo_title) {
                currentSeo.value = res.data
            }
            alert('Сохранено')
        })
    }
    else {
        api.put('/api/home/home', {
            seo_title: seoTitle.value,
            seo_description: seoDescription.value,
            page_name: 'home'
        }).then((res) => {
            alert('Сохранено')
            console.log(res)
        })
    }

}

onMounted(() => {
    api.get('/api/home').then((res) => {
        if(res.data.seo_title) {
            currentSeo.value = res.data
            seoTitle.value = res.data.seo_title
            seoDescription.value = res.data.seo_description
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
                <form class="form">
                    <div class="mb-3">
                        <label for="" class="form-label">SEO Title (Обязятельное поле)</label>
                        <input v-model="seoTitle" type="text" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">SEO Description (Обязятельное поле)</label>
                        <textarea v-model="seoDescription" class="form-control" rows="4"></textarea>
                    </div>
                    <button type="button" class="btn btn-success" @click="save">Сохранить</button>
                </form>
            </div>
        </div>
    </div>
</template>

<script setup>
import {ref} from "vue";
import {useRoute} from "vue-router";

const route = useRoute()
</script>

<template>
    <div class="left-menu">
        <div class="list-group">
            <router-link :to="{name: 'home'}"
                         class="list-group-item list-group-item-action"
                         :class="{'active': route.name == 'home'}"
            >
                Настройки главной
            </router-link>
            <router-link :to="{name: 'categories'}"
                         class="list-group-item list-group-item-action"
                         :class="{'active': route.fullPath.indexOf('categories') !== -1}"
            >
                Категории
            </router-link>
            <router-link :to="{name: 'services'}"
                         class="list-group-item list-group-item-action"
                         :class="{'active': route.fullPath.indexOf('services') !== -1}"
            >
                Услуги
            </router-link>
        </div>
    </div>
</template>

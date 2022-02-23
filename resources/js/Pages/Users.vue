<template>
    <app-layout title="Dashboard">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Users
            </h2>
        </template>
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

                <div v-if="loading">
                    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                        Loading...
                    </h2>
                </div>

                <div v-if="error" class="error">
                    <p>{{ error }}</p>

                    <p>
                        <button @click.prevent="fetchData">
                            Try Again
                        </button>
                    </p>
                </div>

                <UsersTable v-if="data" :data="data"/>
            </div>
        </div>
    </app-layout>
</template>

<script>
import { defineComponent } from 'vue'
import AppLayout from '@/Layouts/AppLayout.vue'
import UsersTable from '@/Pages/Admin/UsersTable.vue'

export default defineComponent({
    components: {
        AppLayout,
        UsersTable,
    },
    data () {
        return {
            loading: true,
            data: null,
            error: null,
        }
    },
    created () {
        this.fetchData()
    },
    methods: {
        fetchData (url) {
            // $this.url = url ? url :
            this.error = this.users = null
            axios
                .get(route('api.admin.users'), this.queryParams())
                .then(response => {
                    this.loading = false
                    this.data = response.data
                })
        },
        queryParams () { //TODO переместить выше уровнем, чтобы юзать в других компонентах
            return decodeURI(window.location.search)
                .replace('?', '')
                .split('&')
                .map(param => param.split('='))
                .reduce((values, [key, value]) => {
                    values[key] = value
                    return values
                }, {})
        }
    }
})
</script>

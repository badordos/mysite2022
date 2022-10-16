<template>
    <app-layout title="Dashboard">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight inline-block">
                Users
            </h2>
            <Alink class="ml-6" :href="route('users.create')">Create</Alink>
        </template>
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <Table v-if="users" :data="users"/>
            </div>
        </div>
    </app-layout>
</template>

<script>
import AppLayout from '@/Layouts/AppLayout.vue'
import Table from '@/Pages/Admin/Users/Table.vue'
import Button from "@/Jetstream/Button";
import Alink from "@/Jetstream/Alink";

export default {
    props: ['users'],
    components: {
        Alink,
        Button,
        AppLayout,
        Table,
    },
    methods:{

    }
}
</script>

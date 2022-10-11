<template>
    <app-layout title="Dashboard">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight inline-block">
                Users
            </h2>
            <a class="ml-6 inline-block h-6 px-5 font-semibold rounded-md bg-green-100 outline"
               :href="route('admin.users.create')">Create</a>
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

export default {
    props: ['users'],
    components: {
        AppLayout,
        Table,
    },
}
</script>

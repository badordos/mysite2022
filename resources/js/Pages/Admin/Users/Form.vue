<template>
    <app-layout>
        <template #title>
            <p v-if="user">Update {{ user.name }}</p>
            <p v-else>Create</p>
        </template>
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <form @submit.prevent="save()" enctype='multipart/form-data'>

                <div class="px-4 py-3 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800">

                    <Label class="mt-2" for="name" value="Username"/>
                    <Input id="name" type="text" class="mt-1"
                           v-model="form.name" ref="name"
                    />
                    <InputError :message="form.errors.name" class="mt-2"></InputError>

                    <Label class="mt-2" for="email" value="Email"/>
                    <Input id="email" type="email" class="mt-1 "
                           v-model="form.email" ref="email"
                    />
                    <InputError :message="form.errors.email" class="mt-2"></InputError>

                    <Label class="mt-2" for="password" value="Password"/>
                    <Input id="password" type="password" class="mt-1"
                           v-model="form.password" ref="password"
                    />
                    <InputError :message="form.errors.password" class="mt-2"></InputError>

                    <Label class="mt-2" for="password_confirmation" value="Password confirmation"/>
                    <Input id="password_confirmation" type="password" class="mt-1"
                           v-model="form.password_confirmation" ref="password_confirmation"
                    />
                    <InputError :message="form.errors.password_confirmation" class="mt-2"></InputError>

                    <Label class="mt-2" for="is_admin" value="Is admin"/>
                    <Input id="is_admin" type="checkbox" class="mt-1"
                           v-model="form.is_admin" ref="is_admin"
                    />
                    <InputError :message="form.errors.is_admin" class="mt-2"></InputError>

                    <Label class="mt-2" for="email_verified_at" value="Email verified at"/>
                    <Input id="email_verified_at" type="date" class="mt-1"
                           v-model="form.email_verified_at" ref="email_verified_at"
                    />
                    <InputError :message="form.errors.email_verified_at" class="mt-2"></InputError>

                    <div class="mt-5">
                        <input type="file" ref="file" class="hidden" @change="isUploadedFile = true">
                        <Button type="button" @click.native.prevent="selectNewFile">
                            Add photo
                        </Button>
                        <span class="text-xs text-black-400 ml-2" v-if="!isUploadedFile">10mb max</span>
                        <span class="text-xs text-blue-700-400 ml-2" v-if="isUploadedFile">Uploaded</span>
                        <span class="text-xs text-red-400 ml-2 cursor-pointer" v-if="isUploadedFile"
                              @click="removeUploadedFile">Remove</span>
                        <InputError :message="form.errors.profile_photo_url" class="mt-2"/>
                    </div>

                    <br>
                    <Button>
                        Сохранить
                    </Button>

                </div>
            </form>
        </div>
    </app-layout>
</template>

<script>
import AppLayout from '@/Layouts/AppLayout.vue'
import Label from "@/Jetstream/Label";
import Input from "@/Jetstream/Input";
import InputError from "@/Jetstream/InputError";
import Button from "@/Jetstream/Button";

export default {
    props: ['user'],
    components: {
        Button,
        InputError,
        Input,
        Label,
        AppLayout,
    },
    data() {
        return {
            form: this.$inertia.form({
                '_method': 'POST',
                name: null,
                email: null,
                password: null,
                password_confirmation: null,
                is_admin: null,
                email_verified_at: null,
                profile_photo_url: null,
            },
            {
                resetOnSuccess: false,
            }),
            isUploadedFile: null,
        }
    },
    methods: {
        selectNewFile() {
            this.$refs.file.click();
        },
        removeUploadedFile() {
            this.$refs.file.value = null;
            this.isUploadedFile = false;
        },

        save() {
            console.log(this.$refs.file.files[0]);
            if (this.$refs.file) {
                this.form.profile_photo_url = this.$refs.file.files[0]
            }
            this.form.post(route('users.store'), {
                preserveScroll: true
            }).then(() => {

            })
        },
    },
}
</script>

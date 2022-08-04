<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import Pagination from '@/Shared/Pagination.vue';
import { Link, useForm } from '@inertiajs/inertia-vue3';

const props = defineProps({
    mahasiswa: Object,
});

const form = useForm({
    nama: props.mahasiswa?.nama,
    nim: props.mahasiswa?.nim,
    telp: props.mahasiswa?.telp,
    jenis_kelamin: props.mahasiswa?.jenis_kelamin,
    umur: props.mahasiswa?.umur,
    tanggal_lahir: props.mahasiswa?.tanggal_lahir,
    alamat: props.mahasiswa?.alamat,
});

const simpan = () => {
    form.put(route('mahasiswa.update', props.mahasiswa), {
        preserveScroll: true,
    });
}

</script>

<template>
    <AppLayout title="Mahasiswa">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Mahasiswa
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-10">
                    <form @submit.prevent="simpan" class="flex flex-col space-y-5">
                        <div class="grid grid-col-2 gap-5">
                            <label for="nama">Nama</label>
                            <input id="nama" type="text" v-model="form.nama">
                            <label v-show="form.errors.nama" class="text-red-500" for="nama">{{ form.errors.nama }}</label>
                        </div>

                        <div class="grid grid-col-2">
                            <label for="nim">nim</label>
                            <input id="nim" type="text" v-model="form.nim">
                            <label v-show="form.errors.nim" class="text-red-500" for="nim">{{ form.errors.nim }}</label>
                        </div>

                        <div class="grid grid-col-2">
                            <label for="telp">no telpon</label>
                            <input id="telp" type="text" v-model="form.telp">
                            <label v-show="form.errors.telp" class="text-red-500" for="telp">{{ form.errors.telp }}</label>
                        </div>

                        <div class="grid grid-col-2">
                            <label for="jenis_kelamin">jenis_kelamin</label>
                            <input id="jenis_kelamin" type="text" v-model="form.jenis_kelamin">
                            <label v-show="form.errors.jenis_kelamin" class="text-red-500" for="jenis_kelamin">{{ form.errors.jenis_kelamin }}</label>
                        </div>

                        <div class="grid grid-col-2">
                            <label for="umur">umur</label>
                            <input id="umur" type="text" v-model="form.umur">
                            <label v-show="form.errors.umur" class="text-red-500" for="umur">{{ form.errors.umur }}</label>
                        </div>

                        <div class="grid grid-col-2">
                            <label for="tanggal_lahir">tanggal_lahir</label>
                            <input id="tanggal_lahir" type="date" v-model="form.tanggal_lahir">
                            <label v-show="form.errors.tanggal_lahir" class="text-red-500" for="tanggal_lahir">{{ form.errors.tanggal_lahir }}</label>
                        </div>

                        <div>
                            <button type="submit" class="bg-teal-700 px-6 py-3 rounded-md text-white">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </AppLayout>
</template>
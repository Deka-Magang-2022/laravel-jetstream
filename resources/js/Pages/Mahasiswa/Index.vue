<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import Pagination from '@/Shared/Pagination.vue';
import { Link } from '@inertiajs/inertia-vue3';

defineProps({
    mahasiswa : String,
});

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
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                    <table class="min-w-full mx-auto">
                        <thead>
                            <tr class="hover:bg-gray-50">
                                <th class="px-4 py-2 border">Nama</th>
                                <th class="px-4 py-2 border">Nim</th>
                                <th class="px-4 py-2 border">No Telpon</th>
                                <th class="px-4 py-2 border">Jenis Kelamin</th>
                                <th class="px-4 py-2 border">Umur</th>
                                <th class="px-4 py-2 border">Tanggal Lahir</th>
                                <th class="px-4 py-2 border">Alamat</th>
                                <th class="px-4 py-2 border">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr class="hover:bg-gray-50" v-for="(item, index) in mahasiswa.data" :key="index">
                                <td class="px-6 py-3">{{ item.nama }}</td>
                                <td class="px-6 py-3">{{ item.nim }}</td>
                                <td class="px-6 py-3">{{ item.telp }}</td>
                                <td class="px-6 py-3 text-center">{{ item.jenis_kelamin }}</td>
                                <td class="px-6 py-3">{{ item.umur }}</td>
                                <td class="px-6 py-3">{{ item.tanggal_lahir }}</td>
                                <td class="px-6 py-3">{{ item.alamat }}</td>
                                <td class="px-6 py-3">
                                    <Link 
                                        class="text-blue-500 px-4 py-2 rounded-md border border-blue-500 hover:bg-blue-500 hover:text-white"
                                        :href="route('mahasiswa.edit', item.id)" 
                                    >Edit</Link>
                                </td>
                            </tr>
                            <tr class="hover:bg-gray-50" v-if="!mahasiswa.data.length">
                                <td class="px-6 py-3 text-center" colspan="12">Tidak Ada Data</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="min-w-full mt-5 flex justify-end">
                    <Pagination :links="mahasiswa.links" />
                </div>
            </div>
        </div>
    </AppLayout>
</template>
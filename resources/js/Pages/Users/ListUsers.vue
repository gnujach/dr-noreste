<template>
    <app-layout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Usuarios
            </h2>
        </template>
        <div class="py-12">
            <div class="max-w-full mx-auto sm:px-6 lg:px-8">
                <div class="mt-8 flex flex-row m-2">
                    <p class="text-2xl ml-4 w-1/2">
                        Usuarios activos en el sistema
                    </p>
                    <div class="w-1/2 flex justify-end">
                        <div
                            class="w-1/2 flex justify-end"
                            v-if="can.managerUser"
                        >
                            <jet-nav-link
                                :href="route('admin.usuarios/create', {})"
                                ><button
                                    class="
                                        border-green-700 border
                                        bg-white
                                        rounded
                                        mr-4
                                        w-32
                                        mb:w-42
                                        p-1
                                        hover:bg-aqua
                                        transition
                                        duration-500
                                    "
                                >
                                    <div class="flex flex-row">
                                        <icon
                                            name="plus"
                                            class="block w-6 h-6 fill-gray-400"
                                        />
                                        <p class="font-bold">Agregar usuario</p>
                                    </div>
                                </button>
                            </jet-nav-link>
                        </div>
                    </div>
                </div>
                <div class="bg-white rounded shadow overflow-x-auto ml-4 mr-4">
                    <table class="w-full">
                        <tr class="text-left font-bold bg-aqua">
                            <th class="px-6 pt-6 pb-4">
                                <div class="flex content-center items-center">
                                    <icon
                                        name="sun"
                                        class="w-8 h-8 mr-2 text-indigo-900"
                                    />Nombre
                                </div>
                            </th>

                            <th class="px-6 pt-6 pb-4">
                                <div class="flex content-center items-center">
                                    <icon
                                        name="sun"
                                        class="w-8 h-8 mr-2 text-indigo-900"
                                    />Email
                                </div>
                            </th>

                            <th class="px-6 pt-6 pb-4">
                                <div class="flex content-center items-center">
                                    <icon
                                        name="sun"
                                        class="w-8 h-8 mr-2 text-indigo-900"
                                    />Role
                                </div>
                            </th>
                            <th class="px-6 pt-6 pb-4">
                                <div class="flex content-center items-center">
                                    <icon
                                        name="sun"
                                        class="w-8 h-8 mr-2 text-indigo-900"
                                    />Aciones
                                </div>
                            </th>
                        </tr>
                        <tr
                            v-for="user in users.data.users"
                            :key="user.data.id"
                            class="hover:bg-gray-100 focus-within:bg-gray-100"
                        >
                            <td class="border-t">
                                <p class="pl-4 font-bold uppercase">
                                    {{ user.data.attributes.name }}
                                </p>
                            </td>
                            <td class="border-t">
                                <p class="pl-4 font-bold">
                                    {{ user.data.attributes.email }}
                                </p>
                            </td>
                            <td class="border-t">
                                <p class="pl-4 font-bold">
                                    {{ user.data.attributes.role }}
                                </p>
                            </td>
                            <td class="border-t">
                                <jet-nav-link
                                    :href="
                                        route('admin.usuarios/edit', {
                                            usuario: user.data.id,
                                        })
                                    "
                                    ><icon
                                        name="edit"
                                        class="block w-6 h-6 fill-gray-400"
                                    />
                                </jet-nav-link>
                            </td>
                            <!-- Show-->
                        </tr>
                    </table>
                </div>
                <div class="max-w-3xl mx-auto sm:px-6 lg:px-8 pt-4">
                    <pagination :meta="users.meta" />
                </div>
            </div>
        </div>
    </app-layout>
</template>

<script>
import AppLayout from "@/Layouts/AppLayout";
import JetNavLink from "@/Jetstream/NavLink";
import Icon from "@/Shared/Icon";
import Pagination from "@/Shared/Pagination";
export default {
    props: ["users", "can"],
    components: {
        AppLayout,
        Icon,
        JetNavLink,
        Pagination,
    },
    data() {
        return {
            showModal: false,
            displayingToken: true,
            loading: false,
            form: {
                search: "",
                field: "name",
                referer: "list-users",
            },
        };
    },
};
</script>

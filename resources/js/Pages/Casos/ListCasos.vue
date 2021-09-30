<template>
    <app-layout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Casos de COVID y sospechosos
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-full mx-auto sm:px-6 lg:px-8">
                <div class="bg-red-300 overflow-hidden shadow-xl sm:rounded-lg">
                    <div class="p-6 sm:px-20 bg-white border-b border-gray-200">
                        <div class="mt-8 flex flex-row m-2">
                            <p class="text-2xl ml-4 w-1/2">
                                Casos activos en el sistema
                            </p>
                        </div>
                        <div
                            class="
                                bg-white
                                rounded
                                shadow
                                overflow-x-auto
                                ml-4
                                mr-4
                            "
                        >
                            <table class="w-full">
                                <tr class="text-left font-bold bg-aqua">
                                    <th class="px-6 pt-6 pb-4">
                                        <div
                                            class="
                                                flex
                                                content-center
                                                items-center
                                            "
                                        >
                                            <icon
                                                name="sun"
                                                class="
                                                    w-8
                                                    h-8
                                                    mr-2
                                                    text-indigo-900
                                                "
                                            />Clave de Centro de Trabajo
                                        </div>
                                    </th>
                                    <th class="px-6 pt-6 pb-4">
                                        <div
                                            class="
                                                flex
                                                content-center
                                                items-center
                                            "
                                        >
                                            <icon
                                                name="sun"
                                                class="
                                                    w-8
                                                    h-8
                                                    mr-2
                                                    text-indigo-900
                                                "
                                            />Centro de Trabajo
                                        </div>
                                    </th>
                                    <th class="px-6 pt-6 pb-4">
                                        <div
                                            class="
                                                flex
                                                content-center
                                                items-center
                                            "
                                        >
                                            <icon
                                                name="sun"
                                                class="
                                                    w-8
                                                    h-8
                                                    mr-2
                                                    text-indigo-900
                                                "
                                            />Categoría
                                        </div>
                                    </th>
                                    <th class="px-6 pt-6 pb-4">
                                        <div
                                            class="
                                                flex
                                                content-center
                                                items-center
                                            "
                                        >
                                            <icon
                                                name="sun"
                                                class="
                                                    w-8
                                                    h-8
                                                    mr-2
                                                    text-indigo-900
                                                "
                                            />Municipio
                                        </div>
                                    </th>
                                    <th class="px-6 pt-6 pb-4">
                                        <div
                                            class="
                                                flex
                                                content-center
                                                items-center
                                            "
                                        >
                                            <icon
                                                name="sun"
                                                class="
                                                    w-8
                                                    h-8
                                                    mr-2
                                                    text-indigo-900
                                                "
                                            />Nombre de la persona
                                        </div>
                                    </th>
                                    <th class="px-6 pt-6 pb-4">
                                        <div
                                            class="
                                                flex
                                                content-center
                                                items-center
                                            "
                                        >
                                            <icon
                                                name="sun"
                                                class="
                                                    w-8
                                                    h-8
                                                    mr-2
                                                    text-indigo-900
                                                "
                                            />Atendido
                                        </div>
                                    </th>
                                    <th class="px-6 pt-6 pb-4">
                                        <div
                                            class="
                                                flex
                                                content-center
                                                items-center
                                            "
                                        >
                                            <icon
                                                name="sun"
                                                class="
                                                    w-8
                                                    h-8
                                                    mr-2
                                                    text-indigo-900
                                                "
                                            />Aciones
                                        </div>
                                    </th>
                                </tr>
                                <tr
                                    v-for="caso in casos.data.casos"
                                    :key="caso.data.id"
                                    class="
                                        hover:bg-gray-100
                                        focus-within:bg-gray-100
                                    "
                                >
                                    <td class="border-t">
                                        <p class="pl-4 font-bold uppercase">
                                            {{
                                                caso.data.cct.data.attributes
                                                    .cct
                                            }}
                                        </p>
                                    </td>
                                    <td class="border-t">
                                        <p class="pl-4 font-bold uppercase">
                                            {{
                                                caso.data.cct.data.attributes
                                                    .nombre_ct
                                            }}
                                        </p>
                                    </td>
                                    <td class="border-t">
                                        <p class="pl-4 font-bold uppercase">
                                            {{
                                                caso.data.tipo.data.attributes
                                                    .nombre
                                            }}
                                        </p>
                                    </td>
                                    <td class="border-t">
                                        <p class="pl-4 font-bold uppercase">
                                            {{
                                                caso.data.cct.data.attributes
                                                    .descripcion_municipio
                                            }}
                                        </p>
                                    </td>
                                    <td class="border-t">
                                        <p class="pl-4 font-bold uppercase">
                                            {{
                                                caso.data.attributes
                                                    .nombre_completo
                                            }}
                                        </p>
                                    </td>
                                    <td class="border-t">
                                        <p class="pl-4 font-bold uppercase">
                                            {{
                                                caso.data.attributes
                                                    .is_atendido == 0
                                                    ? "No"
                                                    : "Si"
                                            }}
                                        </p>
                                    </td>
                                </tr>
                            </table>
                        </div>
                        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8 pt-4">
                            <pagination :meta="casos.meta" />
                        </div>
                    </div>
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
    components: {
        AppLayout,
        Icon,
        JetNavLink,
        Pagination,
    },
    props: ["casos"],
    data() {
        return {
            loading: false,
        };
    },
};
</script>

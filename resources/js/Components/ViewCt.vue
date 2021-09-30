<template>
    <!-- <div class="grid grid-cols-1 gap-4 mx-4 items-center justify-center">
        <div>
            <table
                class="
                    table-auto
                    transition
                    duration-500
                    ease-in-out
                    transform
                    hover:-translate-y-1 hover:scale-110
                "
            >
                <thead>
                    <tr>
                        <th>Cct</th>
                        <th>Nombre</th>
                        <th>Zona</th>
                        <th>Localidad</th>
                        <th>Municipio</th>
                        <th>Director (a)</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>{{ ct.cct }}</td>
                        <td>{{ ct.nombre_ct }}</td>
                        <td>{{ ct.zona_escolar }}</td>
                        <td>{{ ct.descripcion_localidad }}</td>
                        <td>{{ ct.descripcion_municipio }}</td>
                        <td>{{ ct.nombre_director }}</td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div>
            <jet-button
                class="mx-2"
                :class="{ 'opacity-25': processing }"
                :disabled="processing"
                @click="sendOk"
            >
                Continuar
            </jet-button>
        </div>
    </div> -->
    <!-- This example requires Tailwind CSS v2.0+ -->
    <div class="flex flex-col mt-8">
        <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
            <div
                class="
                    py-2
                    align-middle
                    inline-block
                    min-w-full
                    sm:px-6
                    lg:px-8
                "
            >
                <div
                    class="
                        shadow
                        overflow-hidden
                        border-b border-gray-200
                        sm:rounded-lg
                    "
                >
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                            <tr>
                                <th
                                    scope="col"
                                    class="
                                        px-6
                                        py-3
                                        text-center text-xs
                                        font-medium
                                        text-gray-500
                                        uppercase
                                        tracking-wider
                                    "
                                >
                                    CCT
                                </th>
                                <th
                                    scope="col"
                                    class="
                                        px-6
                                        py-3
                                        text-center text-xs
                                        font-medium
                                        text-gray-500
                                        uppercase
                                        tracking-wider
                                    "
                                >
                                    Nombre
                                </th>
                                <th
                                    scope="col"
                                    class="
                                        px-6
                                        py-3
                                        text-left text-xs
                                        font-medium
                                        text-gray-500
                                        uppercase
                                        tracking-wider
                                    "
                                >
                                    Zona Escolar
                                </th>
                                <th
                                    scope="col"
                                    class="
                                        px-6
                                        py-3
                                        text-left text-xs
                                        font-medium
                                        text-gray-500
                                        uppercase
                                        tracking-wider
                                    "
                                >
                                    Localidad
                                </th>
                                <th
                                    scope="col"
                                    class="
                                        px-6
                                        py-3
                                        text-left text-xs
                                        font-medium
                                        text-gray-500
                                        uppercase
                                        tracking-wider
                                    "
                                >
                                    Municipio
                                </th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="flex items-center">
                                        <div class="ml-4">
                                            <div
                                                class="
                                                    text-sm
                                                    font-medium
                                                    text-gray-900
                                                "
                                            >
                                                {{ ct.cct }}
                                            </div>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm text-gray-900">
                                        {{ ct.nombre_ct }}
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <span
                                        class="
                                            px-2
                                            inline-flex
                                            text-xs
                                            leading-5
                                            font-semibold
                                            rounded-full
                                            bg-green-100
                                            text-green-800
                                        "
                                    >
                                        {{ ct.zona_escolar }}
                                    </span>
                                </td>
                                <td
                                    class="
                                        px-6
                                        py-4
                                        whitespace-nowrap
                                        text-sm text-gray-500
                                    "
                                >
                                    {{ ct.descripcion_localidad }}
                                </td>
                                <td
                                    class="
                                        px-6
                                        py-4
                                        whitespace-nowrap
                                        text-right text-sm
                                        font-medium
                                    "
                                >
                                    {{ ct.descripcion_municipio }}
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="flex mt-8 justify-center">
        <jet-button
            class="mx-2"
            :class="{ 'opacity-25': processing }"
            :disabled="processing"
            @click="sendOk"
        >
            Continuar
        </jet-button>
    </div>
</template>

<script>
import { defineComponent } from "vue";
import JetButton from "@/Jetstream/Button";
export default defineComponent({
    props: ["ct"],
    components: {
        JetButton,
    },
    methods: {
        sendOk() {
            console.log("pressed");
            this.$emit("update", {
                continuar: true,
            });
        },
    },
});
</script>

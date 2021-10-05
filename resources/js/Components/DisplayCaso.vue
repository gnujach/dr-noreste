<template>
    <div
        class="
            max-w-7xl
            mx-auto
            py-10
            sm:px-6
            lg:px-8
            bg-white
            shadow
            overflow-hidden
            sm:rounded-lg
            mt-8
        "
    >
        <div class="flex justify-between justify-items-start">
            <div class="px-4 py-5 sm:px-6">
                <h3
                    class="
                        text-lg
                        leading-6
                        font-medium
                        text-gray-900
                        uppercase
                    "
                >
                    {{ nombreCompleto }}
                </h3>
                <p class="mt-1 max-w-2xl text-sm text-gray-500">
                    Información del caso reportado
                </p>
            </div>
            <div class="flex flex-row px-4 py-5 sm:px-6 mt-1 items-center">
                <div class="text-sm text-gray-500">Detalles</div>
                <div>
                    <icon
                        class="w-6 h-6 text-gray-400"
                        name="cheveron-down"
                        v-if="showDetails"
                        @click="showDetails = !showDetails"
                    />
                    <icon
                        class="w-6 h-6 text-gray-400"
                        name="cheveron-right"
                        v-else
                        @click="showDetails = !showDetails"
                    />
                </div>
            </div>
        </div>
        <div class="border-t border-gray-200" v-if="showDetails">
            <dl>
                <div
                    class="
                        bg-gray-50
                        px-4
                        py-5
                        sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6
                    "
                >
                    <dt class="text-sm font-medium text-gray-500">Nombre</dt>
                    <dd
                        class="
                            mt-1
                            text-sm text-gray-900
                            sm:mt-0 sm:col-span-2
                            uppercase
                        "
                    >
                        {{ nombreCompleto }}
                    </dd>
                </div>
                <div
                    class="
                        bg-white
                        px-4
                        py-5
                        sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6
                    "
                >
                    <dt class="text-sm font-medium text-gray-500">
                        Nombre de escuela
                    </dt>
                    <dd
                        class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2"
                    >
                        {{ caso.data.cct.data.attributes.nombre_ct }}
                    </dd>
                </div>
                <div
                    class="
                        bg-gray-50
                        px-4
                        py-5
                        sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6
                    "
                >
                    <dt class="text-sm font-medium text-gray-500">CCT</dt>
                    <dd
                        class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2"
                    >
                        {{ caso.data.cct.data.attributes.cct }}
                    </dd>
                </div>
                <div
                    class="
                        bg-white
                        px-4
                        py-5
                        sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6
                    "
                >
                    <dt class="text-sm font-medium text-gray-500">
                        Rol dentro del Centro de Trabajo
                    </dt>
                    <dd
                        class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2"
                    >
                        {{ caso.data.rol.data.attributes.nombre }}
                    </dd>
                </div>
                <div
                    class="
                        bg-gray-50
                        px-4
                        py-5
                        sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6
                    "
                >
                    <dt class="text-sm font-medium text-gray-500">
                        Situación al momento del reporte
                    </dt>
                    <dd
                        class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2"
                    >
                        {{ caso.data.tipo.data.attributes.nombre }}
                    </dd>
                </div>
            </dl>
        </div>
    </div>
</template>

<script>
import { defineComponent } from "vue";
import Icon from "@/Shared/Icon";
export default defineComponent({
    components: {
        Icon,
    },
    props: ["caso"],
    data() {
        return {
            showDetails: false,
        };
    },
    computed: {
        nombreCompleto() {
            return `${this.caso.data.attributes.nombre_pila} ${this.caso.data.attributes.ap1} ${this.caso.data.attributes.ap2}`;
        },
    },
});
</script>

<style></style>

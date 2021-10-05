<template>
    <div>
        <div class="p-6 sm:px-20 bg-white border-b border-gray-200">
            <div>
                <jet-application-logo class="block h-12 w-auto" />
            </div>

            <div class="mt-8 text-2xl">
                ¡¡Bienvenido(a) al sistema de captura para casos de Covid en las
                escuelas!!
            </div>

            <div class="mt-6 text-gray-500">
                Con esta iniciativa se busca agilizar el proceso de alerta
                temprana de casos de COVID en nuestras escuelas. Si tienes algún
                duda o requieres ayuda puedes marcar a 4191980780
            </div>
        </div>

        <div class="bg-gray-200 bg-opacity-25 grid grid-cols-1 md:grid-cols-2">
            <div class="p-6">
                <div class="flex items-center">
                    <Link href="/admin/casos/create">
                        <svg
                            fill="none"
                            stroke="currentColor"
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="2"
                            viewBox="0 0 24 24"
                            class="w-8 h-8 text-gray-400"
                        >
                            <path
                                d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"
                            ></path>
                        </svg>
                    </Link>
                    <div
                        class="
                            ml-4
                            text-lg text-gray-600
                            leading-7
                            font-semibold
                        "
                    >
                        <Link
                            href="/admin/casos/create"
                            class="
                                ml-4
                                text-lg text-gray-600
                                leading-7
                                font-semibold
                            "
                        >
                            Ingresar un nuevo caso sospechoso o confirmado
                        </Link>
                    </div>
                </div>

                <div class="ml-12">
                    <div class="mt-2 text-sm text-gray-500">
                        Si en tu escuela se presenta un caso sospechoso o
                        confirmado lo puedes agregar en este enlace.
                    </div>
                </div>
            </div>

            <div class="p-6 border-t border-gray-200 md:border-t-0 md:border-l">
                <div class="flex items-center">
                    <svg
                        fill="none"
                        stroke="currentColor"
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        stroke-width="2"
                        viewBox="0 0 24 24"
                        class="w-8 h-8 text-gray-400"
                    >
                        <path
                            d="M3 9a2 2 0 012-2h.93a2 2 0 001.664-.89l.812-1.22A2 2 0 0110.07 4h3.86a2 2 0 011.664.89l.812 1.22A2 2 0 0018.07 7H19a2 2 0 012 2v9a2 2 0 01-2 2H5a2 2 0 01-2-2V9z"
                        ></path>
                        <path d="M15 13a3 3 0 11-6 0 3 3 0 016 0z"></path>
                    </svg>
                    <div
                        class="
                            ml-4
                            text-lg text-gray-600
                            leading-7
                            font-semibold
                        "
                    >
                        <Link href="/admin/casos/"
                            >Dar seguimiento a casos reportados</Link
                        >
                    </div>
                </div>

                <div class="ml-12">
                    <div class="mt-2 text-sm text-gray-500">
                        Continuar con el seguimiento de casos reportados por los
                        centros de trabajo de tu municipio
                    </div>

                    <a href="https://laracasts.com">
                        <div
                            class="
                                mt-3
                                flex
                                items-center
                                text-sm
                                font-semibold
                                text-indigo-700
                            "
                        ></div>
                    </a>
                </div>
            </div>

            <div class="p-6 border-t border-gray-200">
                <div class="flex items-center">
                    <icon name="users" class="block w-8 h-8 text-gray-400" />
                    <div
                        class="
                            ml-4
                            text-lg text-gray-600
                            leading-7
                            font-semibold
                        "
                    >
                        <Link href="/admin/usuarios/">Usuarios</Link>
                    </div>
                </div>

                <div class="ml-12">
                    <div class="mt-2 text-sm text-gray-500">
                        Consultar usuarios en el sistema.
                    </div>
                </div>
            </div>

            <div class="p-6 border-t border-gray-200 md:border-l">
                <div class="flex items-center">
                    <svg
                        fill="none"
                        stroke="currentColor"
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        stroke-width="2"
                        viewBox="0 0 24 24"
                        class="w-8 h-8 text-gray-400"
                    >
                        <path
                            d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"
                        ></path>
                    </svg>
                    <div
                        class="
                            ml-4
                            text-lg text-gray-600
                            leading-7
                            font-semibold
                        "
                    >
                        Authentication
                    </div>
                </div>

                <div class="ml-12">
                    <div class="mt-2 text-sm text-gray-500">
                        Authentication and registration views are included with
                        Laravel Jetstream, as well as support for user email
                        verification and resetting forgotten passwords. So,
                        you're free to get started what matters most: building
                        your application.
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import { defineComponent } from "vue";
import { Link } from "@inertiajs/inertia-vue3";
import JetApplicationLogo from "@/Jetstream/ApplicationLogo.vue";
import Icon from "@/Shared/Icon";

export default defineComponent({
    components: {
        JetApplicationLogo,
        Link,
        Icon,
    },
});
</script>

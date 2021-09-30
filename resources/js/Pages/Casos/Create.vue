<template>
    <app-layout>
        <Head title="Alta de caso" />

        <template #header class="mb-2">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Ingresar nuevo caso
            </h2>
        </template>
        <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8 right-0">
            <div
                class="
                    w-full
                    md:w-1/2
                    flex flex-row
                    justify-items-start
                    items-center
                "
            >
                <jet-label
                    class="mx-2"
                    for="cct"
                    value="Ingrese Clave de Centro de Trabajo"
                />
                <jet-input
                    id="cct"
                    type="text"
                    class="uppercase mt-1 block w-1/3 mx-2"
                    v-model="cct"
                    autocomplete="cct"
                    autofocus
                />
                <jet-button
                    class="mx-2"
                    :class="{ 'opacity-25': processing }"
                    :disabled="aceptado"
                    @click="findCct"
                >
                    Buscar
                </jet-button>
            </div>
            <div v-if="ctEncontrado && !aceptado">
                <view-ct :ct="ct" @update="nextStep" />
            </div>

            <div v-if="sendRequest && !ctEncontrado">
                <h3 class="text-center italic text-2xl">
                    Centro de trabajo no encontrada en base de datos
                </h3>
            </div>
        </div>
        <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8" v-if="!isSaved">
            <jet-form-section
                @submit.prevent="saveCasoInformation"
                v-if="aceptado"
            >
                <template #title> Informacion del Caso </template>
                <template #description>
                    Agregar un nuevo caso sospechoso o confirmado de Covid
                </template>
                <!-- nombre -->
                <template #form>
                    <div class="col-span-6 sm:col-span-4">
                        <jet-label for="nombre" value="Nombre" />
                        <jet-input
                            id="nombre"
                            type="text"
                            class="mt-1 block w-full uppercase"
                            v-model="form.nombre_pila"
                            autofocus
                        />
                        <jet-input-error
                            v-if="errors.nombre_pila"
                            :message="errors.nombre_pila"
                            class="mt-2"
                        />
                    </div>
                    <div class="col-span-6 sm:col-span-4">
                        <jet-label for="ap1" value="Apellido 1" />
                        <jet-input
                            id="ap1"
                            type="text"
                            class="mt-1 block w-full uppercase"
                            v-model="form.ap1"
                            autocomplete="ap1"
                        />
                        <jet-input-error
                            :message="form.errors.ap1"
                            class="mt-2"
                        />
                    </div>
                    <!-- ap2 -->
                    <div class="col-span-6 sm:col-span-4">
                        <jet-label for="ap2" value="Apellido 2" />
                        <jet-input
                            id="ap2"
                            type="text"
                            class="mt-1 block w-full uppercase"
                            v-model="form.ap2"
                            autocomplete="ap2"
                        />
                        <jet-input-error
                            :message="form.errors.ap2"
                            class="mt-2"
                        />
                    </div>
                    <!-- Genero -->
                    <div class="col-span-6 sm:col-span-4">
                        <jet-label
                            for="rol"
                            value="Genero de la persona reportada"
                        />
                        <VueMultiselect
                            id="genero_id"
                            v-model="SelectedGenero"
                            :options="generos"
                            :searchable="false"
                            :close-on-select="true"
                            :show-labels="false"
                            placeholder="Selecciona genero"
                            label="nombre"
                            track-by="id"
                            :allow-empty="false"
                            :preselect-first="true"
                        />
                        <jet-input-error
                            :message="form.errors.rol_id"
                            class="mt-2"
                        />
                    </div>
                    <!-- categoria -->
                    <div class="col-span-6 sm:col-span-4">
                        <jet-label
                            for="rol"
                            value="Rol dentro de centro de trabajo de la persona"
                        />
                        <VueMultiselect
                            id="categoria_id"
                            v-model="SelectedRol"
                            :options="roles"
                            :searchable="false"
                            :close-on-select="true"
                            :show-labels="false"
                            placeholder="Selecciona rol"
                            label="nombre"
                            track-by="id"
                            :allow-empty="false"
                            :preselect-first="true"
                        />
                        <jet-input-error
                            :message="form.errors.rol_id"
                            class="mt-2"
                        />
                    </div>
                    <!-- tipo: confirmado, sospechoso -->
                    <div class="col-span-6 sm:col-span-4">
                        <jet-label for="tipo" value="Situación de la persona" />
                        <VueMultiselect
                            id="tipo_id"
                            v-model="SelectedTipo"
                            :options="tipos"
                            :searchable="false"
                            :close-on-select="true"
                            :show-labels="false"
                            placeholder="Selecciona tipo"
                            label="nombre"
                            track-by="id"
                            :allow-empty="false"
                            :preselect-first="true"
                        />
                        <jet-input-error
                            :message="form.errors.tipo_id"
                            class="mt-2"
                        />
                    </div>
                    <!-- has confirmado -->
                    <div
                        class="col-span-6 sm:col-span-4"
                        v-if="form.tipo_id == 2"
                    >
                        <jet-label for="hasconfirmado">
                            <div class="flex items-center">
                                <jet-checkbox
                                    name="terms"
                                    id="terms"
                                    v-model:checked="form.has_prueba"
                                />

                                <div class="ml-2">Se tiene prueba Covid</div>
                            </div>
                        </jet-label>
                    </div>
                    <!-- tel Contacto -->
                    <div class="col-span-6 sm:col-span-4">
                        <jet-label for="tel" value="Teléfono de contacto" />
                        <jet-input
                            id="tel"
                            type="text"
                            class="mt-1 block w-full uppercase"
                            v-model="form.tel_contacto"
                            autocomplete="tel"
                        />
                        <jet-input-error
                            :message="form.errors.tel_contacto"
                            class="mt-2"
                        />
                    </div>
                    <!-- Tel escuela -->
                    <div class="col-span-6 sm:col-span-4">
                        <jet-label
                            for="tel"
                            value="Teléfono de la escuela o director"
                        />
                        <jet-input
                            id="tel"
                            type="text"
                            class="mt-1 block w-full uppercase"
                            v-model="form.tel_escuela"
                            autocomplete="tel"
                        />
                        <jet-input-error
                            :message="form.errors.tel_escuela"
                            class="mt-2"
                        />
                    </div>
                    <!-- Nombre de quien reporta -->
                    <div class="col-span-6 sm:col-span-4">
                        <jet-label
                            for="nombre"
                            value="Nombre de quien reporta el caso"
                        />
                        <jet-input
                            id="nombre"
                            type="text"
                            class="mt-1 block w-full uppercase"
                            v-model="form.nombre_reporta"
                            autocomplete="nombre_pila"
                        />
                        <jet-input-error
                            :message="form.errors.nombre_reporta"
                            class="mt-2"
                        />
                    </div>
                    <!-- Observaciones -->
                    <div class="col-span-6 sm:col-span-4">
                        <jet-label for="observaciones" value="Observaciones" />
                        <jet-text-area
                            id="observaciones"
                            class="mt-1 block w-full"
                            v-model="form.observaciones_reporta"
                        />
                        <jet-input-error
                            :message="form.errors.observaciones_reporta"
                            class="mt-2"
                        />
                    </div>
                </template>
                <template #actions>
                    <jet-action-message
                        :on="form.recentlySuccessful"
                        class="mr-3"
                    >
                        Guardado.
                    </jet-action-message>
                    <jet-section-border />
                    <jet-button
                        :class="{ 'opacity-25': form.processing }"
                        :disabled="form.processing"
                    >
                        Guardar
                    </jet-button>
                </template>
            </jet-form-section>
        </div>
    </app-layout>
</template>

<script>
import AppLayout from "@/Layouts/AppLayout";
import JetInput from "@/Jetstream/Input";
import JetLabel from "@/Jetstream/Label";
import JetButton from "@/Jetstream/Button";
import JetInputError from "@/Jetstream/InputError";
import ViewCt from "@/Components/ViewCt";
import JetFormSection from "@/Jetstream/FormSection";
import JetActionMessage from "@/Jetstream/ActionMessage";
import JetSecondaryButton from "@/Jetstream/SecondaryButton";
import JetSectionBorder from "@/Jetstream/SectionBorder";
import JetTextArea from "@/Jetstream/TextArea";
import JetCheckbox from "@/Jetstream/Checkbox";
import VueMultiselect from "vue-multiselect";
import { Head, useForm } from "@inertiajs/inertia-vue3";
// import { ref } from "vue";

export default {
    components: {
        Head,
        AppLayout,
        JetLabel,
        JetInput,
        JetButton,
        ViewCt,
        JetFormSection,
        JetActionMessage,
        JetSecondaryButton,
        JetSectionBorder,
        JetTextArea,
        VueMultiselect,
        JetInputError,
        JetCheckbox,
    },
    // props: ["roles", "tipos", "generos"],
    props: {
        roles: Array,
        tipos: Array,
        generos: Array,
        errors: Object,
    },
    // setup() {
    //     const aceptado = ref(false);
    //     const SelectedRol = undefined;
    //     const SelectedTipo = undefined;
    //     const SelectedGenero = undefined;
    //     const cct = ref("11dpr1390p");
    //     const processing = ref(false);
    //     const ct = [];
    //     const ctEncontrado = ref(false);
    //     const form = useForm({
    //         nombre_pila: null,
    //         ap1: null,
    //         ap2: null,
    //         rol_id: null,
    //         tipo_id: null,
    //         genero_id: null,
    //         tel_contacto: null,
    //         tel_escuela: null,
    //         nombre_reporta: null,
    //         observaciones_reporta: null,
    //     });
    //     return {
    //         aceptado,
    //         SelectedRol,
    //         SelectedTipo,
    //         SelectedGenero,
    //         cct,
    //         processing,
    //         ct,
    //         ctEncontrado,
    //         form,
    //     };
    // },
    data() {
        return {
            aceptado: false,
            SelectedRol: undefined,
            SelectedTipo: undefined,
            SelectedGenero: undefined,
            cct: "11dpr1390p",
            processing: false,
            ct: [],
            ctEncontrado: false,
            sendRequest: false,
            isSaved: false,
            form: this.$inertia.form({
                nombre_pila: "",
                ap1: "",
                ap2: "",
                rol_id: "",
                tipo_id: "",
                genero_id: "",
                tel_contacto: "",
                tel_escuela: null,
                nombre_reporta: null,
                confirmado: null,
                has_prueba: false,
                observaciones_reporta: null,
            }),
        };
    },

    watch: {
        SelectedRol() {
            this.form.rol_id = this.SelectedRol.id;
        },
        SelectedGenero() {
            this.form.genero_id = this.SelectedGenero.id;
        },
        SelectedTipo() {
            this.form.tipo_id = this.SelectedTipo.id;
        },
    },
    methods: {
        findCct() {
            let found = false;
            axios
                .get("/admin/cct/" + this.cct + "/find")
                .then((response) => {
                    this.cct = "";
                    found = response.data.cct;
                    if (!found) {
                        this.ctEncontrado = false;
                        this.sendRequest = true;
                        this.cct = "";
                    } else {
                        this.ctEncontrado = true;
                        this.ct = response.data.cct[0];
                    }
                })
                .catch((error) => {
                    console.log(error);
                });
        },
        nextStep(val) {
            this.aceptado = val;
            console.log("Valor enviado: ", val);
        },
        saveCasoInformation() {
            if (this.form.tipo_id == 1) this.form.has_prueba = false;
            this.form
                .transform((data) => ({
                    ...data,
                    cct_id: this.ct.id,
                    //Verificar si el caso es sospechoso quitar confirmado a 1
                }))
                .post(route("admin.casos/store"), {
                    preserveScroll: false,
                    onSuccess: () => (this.isSaved = true),
                });
        },
        reset() {
            this.form = mapValues(this.form, () => null);
            this.$inertia.visit("/admin/casos/create", {
                method: "get",
            });
        },
    },
};
</script>
<style src="vue-multiselect/dist/vue-multiselect.css"></style>

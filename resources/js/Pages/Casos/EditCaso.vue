<template>
    <app-layout>
        <display-caso :caso="caso" />
        <Head title="Actualizar Estatus de Caso" />
        <template #header>
            <h2
                class="
                    font-semibold
                    text-xl text-gray-800
                    leading-tight
                    uppercase
                "
            >
                Actualizar Reporte
            </h2>
        </template>
        <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
            <jet-form-section @submit.prevent="updateCasoInformation">
                <template #title> Informacion del Caso </template>
                <template #description> Actualizar reporte. </template>
                <template #form>
                    <!-- Dictamen -->
                    <div class="col-span-6 sm:col-span-4">
                        <jet-label for="hasdictamen">
                            <div class="flex items-center">
                                <jet-checkbox
                                    name="hasdictamen"
                                    id="hasdictamen"
                                    v-model:checked="form.has_dictamen"
                                />
                                <div class="ml-2">
                                    Se tiene un dictamen de autoridad competente
                                </div>
                            </div>
                        </jet-label>
                    </div>
                    <!-- Diagnóstico -->
                    <div class="col-span-6 sm:col-span-4">
                        <jet-label
                            for="rol"
                            value="Diagnóstico emitido por autoridad competente"
                        />
                        <VueMultiselect
                            id="categoria_id"
                            v-model="SelectedDiagnostico"
                            :options="diagnosticos"
                            :searchable="false"
                            :close-on-select="true"
                            :show-labels="false"
                            placeholder="Selecciona Diagnóstico"
                            label="nombre"
                            track-by="id"
                            :allow-empty="false"
                        />
                        <jet-input-error
                            :message="form.errors.diagnostico_id"
                            class="mt-2"
                        />
                    </div>
                    <!-- Observaciones -->
                    <div class="col-span-6 sm:col-span-4">
                        <jet-label for="observaciones" value="Observaciones" />
                        <jet-text-area
                            id="observaciones"
                            class="mt-1 block w-full"
                            v-model="form.observaciones_enlace"
                        />
                        <jet-input-error
                            :message="form.errors.observaciones_enlace"
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
                        class="mx-4"
                    >
                        Guardar
                    </jet-button>
                    <jet-secondary-button
                        :class="{ 'opacity-25': form.processing }"
                        :disabled="form.processing"
                        @click="showModal = !showModal"
                    >
                        Cerrar
                    </jet-secondary-button>
                </template>
            </jet-form-section>
            <jet-dialog-modal :show="showModal" @close="closeModal">
                <template #title> Cerrar caso </template>

                <template #content>
                    ¿Desea cerrar este caso, ya no podrá realizar cambios?
                </template>

                <template #footer>
                    <jet-secondary-button @click="closeModal">
                        Cancelar
                    </jet-secondary-button>

                    <jet-button
                        class="ml-2"
                        @click="confirmClose"
                        :class="{ 'opacity-25': form.processing }"
                        :disabled="form.processing"
                    >
                        Guardar
                    </jet-button>
                </template>
            </jet-dialog-modal>
        </div>
    </app-layout>
</template>

<script>
import AppLayout from "@/Layouts/AppLayout";
import { Link } from "@inertiajs/inertia-vue3";
import Icon from "@/Shared/Icon";
import JetInput from "@/Jetstream/Input";
import JetLabel from "@/Jetstream/Label";
import JetButton from "@/Jetstream/Button";
import JetInputError from "@/Jetstream/InputError";
import JetFormSection from "@/Jetstream/FormSection";
import JetActionMessage from "@/Jetstream/ActionMessage";
import JetSecondaryButton from "@/Jetstream/SecondaryButton";
import JetSectionBorder from "@/Jetstream/SectionBorder";
import JetTextArea from "@/Jetstream/TextArea";
import JetCheckbox from "@/Jetstream/Checkbox";
import VueMultiselect from "vue-multiselect";
import DisplayCaso from "@/Components/DisplayCaso";
import JetDialogModal from "@/Jetstream/DialogModal.vue";

export default {
    props: ["caso", "diagnosticos"],
    components: {
        AppLayout,
        Link,
        Icon,
        JetInput,
        JetLabel,
        JetButton,
        JetInputError,
        JetFormSection,
        JetActionMessage,
        JetSecondaryButton,
        JetSectionBorder,
        JetTextArea,
        JetCheckbox,
        VueMultiselect,
        DisplayCaso,
        JetDialogModal,
    },
    data() {
        return {
            form: this.$inertia.form({
                has_dictamen: Boolean(this.caso.data.attributes.has_dictamen),
                diagnostico_id: this.caso.data.attributes.diagnostico_id,
                observaciones_enlace:
                    this.caso.data.attributes.observaciones_enlace,
            }),
            SelectedDiagnostico: undefined,
            showModal: false,
        };
    },
    mounted() {
        this.selecDiagns();
    },
    watch: {
        SelectedDiagnostico() {
            this.form.diagnostico_id = this.SelectedDiagnostico.id;
        },
    },
    computed: {
        nombreCompleto() {
            return `${this.caso.data.attributes.nombre_pila} ${this.caso.data.attributes.ap1} ${this.caso.data.attributes.ap2}`;
        },
    },
    methods: {
        updateCasoInformation() {
            this.form.put(this.route("admin.casos/update", this.caso.data.id));
        },
        selecDiagns() {
            this.SelectedDiagnostico = this.diagnosticos.find(
                (element) => element.id === this.form.diagnostico_id
            );
        },
        confirmClose() {
            console.log(route("admin.casos/cerrarcaso", this.caso.data.id));
            this.form.processing = true;
            this.$inertia.patch(
                route("admin.casos/cerrarcaso", this.caso.data.id),
                {
                    is_atendido: true,
                }
            );

            // axios;
            //     .patch(route("admin.casos/cerrarcaso", this.caso.data.id), {
            //         is_atendido: true,
            //     })
            //     .then(() => {
            //         this.form.processing = false;
            //         this.closeModal();
            //         this.$nextTick(() => this.$emit("confirmed"));
            //     })
            //     .catch((error) => {
            //         this.form.processing = false;
            //         console.log(error);
            //     })
        },
        closeModal() {
            this.showModal = false;
            this.form.error = "";
        },
    },
};
</script>

<style src="vue-multiselect/dist/vue-multiselect.css"></style>

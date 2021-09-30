<template>
    <app-layout>
        <template #header class="mb-2">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Alta de Usuario
            </h2>
        </template>
        <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
            <jet-validation-errors class="mb-4" />
            <jet-form-section @submitted="submit">
                <template #title> Informacion del Usuario </template>
                <template #description> Alta de usuario </template>
                <template #form>
                    <div class="col-span-6 sm:col-span-4">
                        <jet-label for="name" value="Nombre" />
                        <jet-input
                            id="name"
                            type="text"
                            class="mt-1 block w-full"
                            v-model="form.name"
                            required
                            autofocus
                            autocomplete="name"
                        />
                        <jet-input-error
                            :message="form.errors.name"
                            class="mt-2"
                        />
                    </div>

                    <div class="col-span-6 sm:col-span-4">
                        <jet-label for="email" value="Email" />
                        <jet-input
                            id="email"
                            type="email"
                            class="mt-1 block w-full"
                            v-model="form.email"
                            required
                        />
                        <jet-input-error
                            :message="form.errors.email"
                            class="mt-2"
                        />
                    </div>

                    <div class="col-span-6 sm:col-span-4">
                        <jet-label for="password" value="Password" />
                        <jet-input
                            id="password"
                            type="password"
                            class="mt-1 block w-full"
                            v-model="form.password"
                            required
                            autocomplete="new-password"
                        />
                        <jet-input-error
                            :message="form.errors.password"
                            class="mt-2"
                        />
                    </div>

                    <div class="col-span-6 sm:col-span-4">
                        <jet-label
                            for="password_confirmation"
                            value="Confirmar Password"
                        />
                        <jet-input
                            id="password_confirmation"
                            type="password"
                            class="mt-1 block w-full"
                            v-model="form.password_confirmation"
                            required
                            autocomplete="new-password"
                        />
                    </div>
                    <div
                        class="
                            col-span-6
                            sm:col-span-4
                            flex
                            items-center
                            justify-center
                        "
                    >
                        <div class="w-1/2">
                            <jet-label for="Rol" value="Rol" />
                        </div>
                        <div class="w-1/2">
                            <multiselect
                                v-model="role"
                                :options="roles"
                                :searchable="false"
                                :close-on-select="true"
                                :show-labels="false"
                                placeholder="Selecciona tipo de precio"
                                label="nombre"
                                track-by="nombre"
                                :preselect-first="true"
                                :allow-empty="false"
                            ></multiselect>
                        </div>
                    </div>
                    <!-- Puesto -->
                    <div
                        class="
                            col-span-6
                            sm:col-span-4
                            flex
                            items-center
                            justify-center
                        "
                    >
                        <div class="w-1/2">
                            <jet-label for="Puesto" value="Puesto" />
                        </div>
                        <div class="w-1/2">
                            <multiselect
                                v-model="SelectedPuesto"
                                :options="puestos"
                                :searchable="false"
                                :close-on-select="true"
                                :show-labels="false"
                                placeholder="Selecciona puesto del usuario"
                                label="nombre"
                                track-by="nombre"
                                :preselect-first="true"
                                :allow-empty="false"
                            ></multiselect>
                        </div>
                    </div>
                    <!-- Municipio -->
                    <div
                        class="
                            col-span-6
                            sm:col-span-4
                            flex
                            items-center
                            justify-center
                        "
                    >
                        <div class="w-1/2">
                            <jet-label for="Municipio" value="Municipio" />
                        </div>
                        <div class="w-1/2">
                            <multiselect
                                v-model="SelectedMunicipio"
                                :options="municipios"
                                :searchable="false"
                                :close-on-select="true"
                                :show-labels="false"
                                placeholder="Selecciona municipio del usuario"
                                label="nombre"
                                track-by="nombre"
                                :preselect-first="true"
                                :allow-empty="false"
                            ></multiselect>
                        </div>
                    </div>
                    <div
                        class="col-span-6 sm:col-span-4"
                        v-if="
                            $page.props.jetstream
                                .hasTermsAndPrivacyPolicyFeature
                        "
                    >
                        <jet-label for="terms">
                            <div class="flex items-center">
                                <jet-checkbox
                                    name="terms"
                                    id="terms"
                                    v-model:checked="form.terms"
                                />

                                <div class="ml-2">
                                    El usuario acepta los
                                    <a
                                        target="_blank"
                                        :href="route('terms.show')"
                                        class="
                                            underline
                                            text-sm text-gray-600
                                            hover:text-gray-900
                                        "
                                        >Terminos de servicio</a
                                    >
                                    y
                                    <a
                                        target="_blank"
                                        :href="route('policy.show')"
                                        class="
                                            underline
                                            text-sm text-gray-600
                                            hover:text-gray-900
                                        "
                                        >Política de privacidad</a
                                    >
                                </div>
                            </div>
                        </jet-label>
                    </div>
                </template>
                <template #actions>
                    <jet-action-message
                        :on="form.recentlySuccessful"
                        class="mr-3"
                    >
                        Guardar.
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
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8 pt-4"></div>
    </app-layout>
</template>

<script>
import JetAuthenticationCard from "@/Jetstream/AuthenticationCard";
import JetAuthenticationCardLogo from "@/Jetstream/AuthenticationCardLogo";
import JetButton from "@/Jetstream/Button";
import JetInput from "@/Jetstream/Input";
import JetCheckbox from "@/Jetstream/Checkbox";
import JetLabel from "@/Jetstream/Label";
import JetValidationErrors from "@/Jetstream/ValidationErrors";
import AppLayout from "@/Layouts/AppLayout";
import JetFormSection from "@/Jetstream/FormSection";
import JetInputError from "@/Jetstream/InputError";
import JetActionMessage from "@/Jetstream/ActionMessage";
import JetSectionBorder from "@/Jetstream/SectionBorder";
import Multiselect from "vue-multiselect";
export default {
    components: {
        JetAuthenticationCard,
        JetAuthenticationCardLogo,
        JetButton,
        JetInput,
        JetCheckbox,
        JetLabel,
        JetValidationErrors,
        AppLayout,
        JetFormSection,
        JetInputError,
        JetActionMessage,
        JetSectionBorder,
        Multiselect,
    },

    data() {
        return {
            form: this.$inertia.form({
                name: "",
                email: "",
                password: "",
                password_confirmation: "",
                terms: false,
                role: null,
                puesto_id: null,
                municipio_id: null,
            }),
            role: null,
            SelectedPuesto: undefined,
            SelectedMunicipio: undefined,
            roles: [
                {
                    id: "capturista",
                    nombre: "Capturista",
                },
                {
                    id: "Enlace",
                    nombre: "Enlace",
                },
                {
                    id: "Admin",
                    nombre: "Administrador",
                },
            ],
            municipios: [],
            puestos: [],
        };
    },
    props: {
        puestos: Array,
        municipios: Array,
    },
    watch: {
        role() {
            this.form.role = this.role.id;
        },
        SelectedPuesto() {
            this.form.puesto_id = this.SelectedPuesto.id;
        },
        SelectedMunicipio() {
            this.form.municipio_id = this.SelectedMunicipio.id;
        },
    },
    methods: {
        submit() {
            this.form.post(this.route("admin.usuarios/store"), {
                onFinish: () =>
                    this.form.reset("password", "password_confirmation"),
                errorBag: "saveUserInformation",
                preserveScroll: true,
            });
        },
    },
};
</script>

<style src="vue-multiselect/dist/vue-multiselect.css"></style>

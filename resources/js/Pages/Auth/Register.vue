<template>
    <Head title="Register" />

    <div class="contenedor flex">
        <header class="cont-header flex">
            <div class="logo">
                <img src="/assets/spotify-logo.svg" class="image" />
            </div>

            <div class="flex">
                <Link :href="route('login')">
                    Spotify
                </Link>
            </div>
        </header>
    </div>

    <jet-authentication-card>

        <jet-validation-errors class="mb-4" />

        <form @submit.prevent="submit">

            <h1 class="tracking-wide text-white text-md font-bold mb-2 text-center">Regístrate para escuchar.</h1>

            <div>
                <jet-label for="name" value="Nombre" class="text-white" />
                <jet-input id="name" type="text" class="mt-1 block w-full bg-transparent text-white" v-model="form.name" required autofocus autocomplete="name" placeholder="Nombre" />
            </div>

            <div class="mt-4">
                <jet-label for="email" value="Email" class="text-white" />
                <jet-input id="email" type="email" class="mt-1 block w-full bg-transparent text-white" v-model="form.email" required placeholder="Email" />
            </div>

            <div class="mt-4">
                <jet-label for="password" value="Contraseña"  class="text-white"/>
                <jet-input id="password" type="password" class="mt-1 block w-full bg-transparent text-white" v-model="form.password" required autocomplete="new-password" placeholder="Contraseña"/>
            </div>

            <div class="mt-4">
                <jet-label for="password_confirmation" value="Confirma tu Contraseña" class="text-white"/>
                <jet-input id="password_confirmation" type="password" class="mt-1 block w-full bg-transparent text-white" v-model="form.password_confirmation" required autocomplete="new-password" placeholder="Confirma tu contraseña" />
            </div>

            <div class="mt-4" v-if="$page.props.jetstream.hasTermsAndPrivacyPolicyFeature">
                <jet-label for="terms">
                    <div class="flex items-center">
                        <jet-checkbox name="terms" id="terms" v-model:checked="form.terms" />

                        <div class="ml-2">
                            I agree to the <a target="_blank" :href="route('terms.show')" class="underline text-sm text-gray-600 hover:text-gray-900">Terms of Service</a> and <a target="_blank" :href="route('policy.show')" class="underline text-sm text-gray-600 hover:text-gray-900">Privacy Policy</a>
                        </div>
                    </div>
                </jet-label>
            </div>

            <div class="flex items-center justify-end mt-4">
                <Link :href="route('login')" class="underline text-sm text-gray-600 hover:text-gray-900 text-white">
                    ¿Ya tienes cuenta?
                </Link>

                <jet-button class="ml-4 text-white" :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                    Registrarte
                </jet-button>
            </div>
        </form>
    </jet-authentication-card>
</template>


<script>
    import JetAuthenticationCard from '@/Jetstream/AuthenticationCard.vue'
    import JetAuthenticationCardLogo from '@/Jetstream/AuthenticationCardLogo.vue'
    import JetButton from '@/Jetstream/Button.vue'
    import JetInput from '@/Jetstream/Input.vue'
    import JetCheckbox from '@/Jetstream/Checkbox.vue'
    import JetLabel from '@/Jetstream/Label.vue'
    import JetValidationErrors from '@/Jetstream/ValidationErrors.vue'
    import { Head, Link } from '@inertiajs/inertia-vue3';

    export default {
        components: {
            Head,
            JetAuthenticationCard,
            JetAuthenticationCardLogo,
            JetButton,
            JetInput,
            JetCheckbox,
            JetLabel,
            JetValidationErrors,
            Link,
        },

        data() {
            return {
                form: this.$inertia.form({
                    name: '',
                    email: '',
                    password: '',
                    password_confirmation: '',
                    terms: false,
                })
            }
        },

        methods: {
            submit() {
                this.form.post(this.route('register'), {
                    onFinish: () => this.form.reset('password', 'password_confirmation'),
                })
            }
        }
    }
</script>

<style scoped>
.flex{
    display: flex;
    font-size: 30px;
}

.logo{
    width: 5%;
    padding: 5px;
    justify-content: center;

}

.cont-header{
    border-bottom: 1px solid #d9dadc;
    padding: 25px 0 10px;
    justify-content: center;
    width: 100%;
}

header{
    position:fixed;
}

</style>

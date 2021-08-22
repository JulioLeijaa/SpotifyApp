<template>
    <Head title="Log in" />

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

        <div v-if="status" class="mb-4 font-medium text-sm text-green-600">
            {{ status }}
        </div>

        <form @submit.prevent="submit">
            <h1 class="tracking-wide text-white text-md font-bold mb-2 text-center">Inicia sesión.</h1>
            <div>
                <jet-label for="email" value="Email" class="text-white"/>
                <jet-input id="email" type="email" class="mt-1 block w-full bg-transparent text-white" v-model="form.email" required autofocus placeholder="Email"/>
            </div>

            <div class="mt-4">
                <jet-label for="password" value="Contraseña" class="text-white"/>
                <jet-input id="password" type="password" class="mt-1 block w-full bg-transparent text-white" v-model="form.password" required autocomplete="current-password" placeholder="Contraseña" />
            </div>

            <div class="block mt-4">
                <label class="flex items-center">
                    <jet-checkbox name="remember" v-model:checked="form.remember" />
                    <span class="ml-2 text-sm text-white">Recordarme</span>
                </label>
            </div>

            <div class="flex items-center justify-end mt-4">
                <Link :href="route('register')" class="underline text-sm hover:text-gray-900 text-white">
                    ¿No tienes cuenta?
                </Link>

                <jet-button id="login" class="ml-4" :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                    Login
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

        props: {
            canResetPassword: Boolean,
            status: String
        },

        data() {
            return {
                form: this.$inertia.form({
                    email: '',
                    password: '',
                    remember: false
                })
            }
        },

        methods: {
            submit() {
                this.form
                    .transform(data => ({
                        ... data,
                        remember: this.form.remember ? 'on' : ''
                    }))
                    .post(this.route('login'), {
                        onFinish: () => this.form.reset('password'),
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

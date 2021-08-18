<template>
    <Head title="Log in" />
    <div class="head">
        <p>This is nuestro reproductor motherfuckers</p>
    </div>

    <jet-authentication-card>


        <jet-validation-errors class="mb-4" />

        <div v-if="status" class="mb-4 font-medium text-sm text-green-600">
            {{ status }}
        </div>

        <form @submit.prevent="submit" class="login-container">
            <h1>Inicia Sesión</h1>
            <div>
                <jet-label for="email" value="Email" class="email-label"/>
                <jet-input id="email" type="email" class="mt-1 block w-full" v-model="form.email" required autofocus placeholder="Email"/>
            </div>

            <div class="mt-4">
                <jet-label for="password" value="Contraseña" class="pass-label"/>
                <jet-input id="password" type="password" class="mt-1 block w-full" v-model="form.password" required autocomplete="current-password" placeholder="Contraseña" />
            </div>

            <div class="block mt-4">
                <label class="flex items-center">
                    <jet-checkbox name="remember" v-model:checked="form.remember" />
                    <span class="ml-2 text-sm text-gray-600">Recordarme</span>
                </label>
            </div>

            <div class="flex items-center justify-end mt-4">
                <Link v-if="canResetPassword" :href="route('register')" class="underline text-sm text-gray-600 hover:text-gray-900">
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
.head{
    width: 100%;
    height: 10%;
    background-color: #000;
}

.head p{
    color: #fff;
    text-align: center;
}

.login-container{
    height: 520px;
    width: 420px;
    background: #000;
    color: #fff;
    top: 50%;
    left: 50%;
    position: fixed;
    transform: translate(-50%, -50%);
    box-sizing: border-box;
    border-radius: 5%;
    padding: 70px 30px;
}

.login-container h1{
    margin: 0;
    padding: 0 0 50px;
    text-align: center;
    font-size: 22px;
}

#email, #password{
    background-color: #000;
    border: none;
    border-bottom: 1px solid #fff;
    background: transparent;
    outline: none;
}

.email-label, .pass-label{
    margin: 0;
    padding: 0;
    font-weight: bold;
    display: block;
    color: #fff;
}
</style>

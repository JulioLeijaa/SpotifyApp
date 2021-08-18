<template>
    <Head title="Register" />

    <div class="head">
        <p>This is nuestro reproductor motherfuckers</p>
    </div>

    <jet-authentication-card>

        <jet-validation-errors class="mb-4" />

        <form @submit.prevent="submit" class="register-container">

            <h1>Regístrate para escuchar.</h1>

            <div>
                <jet-label for="name" value="Nombre" class="nombre-label" />
                <jet-input id="name" type="text" class="mt-1 block w-full" v-model="form.name" required autofocus autocomplete="name" placeholder="Nombre" />
            </div>

            <div class="mt-4">
                <jet-label for="email" value="Email" class="email-label" />
                <jet-input id="email" type="email" class="mt-1 block w-full" v-model="form.email" required placeholder="Email" />
            </div>

            <div class="mt-4">
                <jet-label for="password" value="Contraseña"  class="pass-label"/>
                <jet-input id="password" type="password" class="mt-1 block w-full" v-model="form.password" required autocomplete="new-password" placeholder="Contraseña"/>
            </div>

            <div class="mt-4">
                <jet-label for="password_confirmation" value="Confirma tu Contraseña" class="confirmpass-label"/>
                <jet-input id="password_confirmation" type="password" class="mt-1 block w-full" v-model="form.password_confirmation" required autocomplete="new-password" placeholder="Confirma tu contraseña" />
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
                <Link :href="route('login')" class="underline text-sm text-gray-600 hover:text-gray-900">
                    ¿Ya tienes cuenta?
                </Link>

                <jet-button class="ml-4" :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
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
.head{
    width: 100%;
    height: 10%;
    background-color: #000;
}

.head p{
    color: #fff;
    text-align: center;
}

.register-container{
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

.register-container h1{
    margin: 0;
    padding: 0 0 20px;
    text-align: center;
    font-size: 22px;
}

#name, #email, #password, #password_confirmation{
    background-color: #000;
    background-color: #000;
    border: none;
    border-bottom: 1px solid #fff;
    background: transparent;
    outline: none;
}

.nombre-label, .email-label, .pass-label, .confirmpass-label{
    margin: 0;
    padding: 0;
    font-weight: bold;
    display: block;
    color: #fff;
}

</style>

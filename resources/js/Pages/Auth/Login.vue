<template>
    <div class="head">
    <p>This is nuestro reproductor motherfuckers</p>
    </div>
    <div class="container">

        <div class="login-container">
            <h1>Inicia Sesión</h1>
            <form class="">
                <label for="username">Email</label>
                <input type="text" placeholder="Email">

                <label for="password">Contraseña</label>
                <input type="password" placeholder="Contraseña">

                <input type="submit" value="Login">

                <Link :href="route('register')" class="underline text-sm text-gray-600 hover:text-gray-900">
                    ¿No tienes cuenta?
                </Link>


            </form>
        </div>
    </div>
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

.container{
    height: 100%;
    width: 100%;
    background-color: #fff;



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

.login-container label{
    margin: 0;
    padding: 0;
    font-weight: bold;
    display: block;
}

.login-container input{
    width: 100%;
    margin-bottom: 40px;
}

.login-container input[type="text"],
.login-container input[type="password"]{
    border: none;
    border-bottom: 1px solid #fff;
    background: transparent;
    outline: none;
    height: 40px;
    color: #fff;
    font-size: 16px;
}

.login-container input[type="submit"]{
    outline: none;
    border: none;
    height: 40px;
    color: black;
    border-radius: 20px;
}

.login-container link{
    color: darkgray;
}

.login-container a:hover{
    color: #ffffff;
}
</style>

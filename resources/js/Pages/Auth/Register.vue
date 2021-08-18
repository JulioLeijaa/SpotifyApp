<template>
    <div class="head">
        <p>This is nuestro reproductor motherfuckers</p>
    </div>
    <div class="container">

        <div class="register-container">
            <h1>Registrate para escuchar</h1>
            <form class="">
                <label for="username">¿Cuál es tu correo electrónico?</label>
                <input type="text" placeholder="Introduce tu correo electronico.">

                <label for="username">Confirma correo electrónico</label>
                <input type="text" placeholder="Vuelve a introducir correo electrónico.">

                <label for="password">Crea una contraseña</label>
                <input type="password" placeholder="Crea una contraseña.">

                <input type="submit" value="Registrate">

                <Link :href="route('login')" class="underline text-sm text-gray-600 hover:text-gray-900">
                    ¿Ya tienes cuenta?
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

.container{
    height: 100%;
    width: 100%;
    background-color: #eee;

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

.register-container label{
    margin: 0;
    padding: 0;
    font-weight: bold;
    display: block;
}

.register-container input{
    width: 100%;
    margin-bottom: 20px;
}

.register-container input[type="text"],
.register-container input[type="password"]{
    border: none;
    border-bottom: 1px solid #fff;
    background: transparent;
    outline: none;
    height: 40px;
    color: #fff;
    font-size: 16px;
}

.register-container input[type="submit"]{
    outline: none;
    border: none;
    height: 40px;
    color: black;
    border-radius: 20px;
}

.register-container link{
    color: darkgray;
}

.register-container a:hover{
    color: #ffffff;
}
</style>

<template>
    <div>
        <nav class="navbar navbar-expand-lg navbar-light navbar-laravel">
            <div class="container">
                <a class="navbar-brand">Panel Admina</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item">
                            <inertia-link class="nav-link" :href="route('home')">
                                Strona główna
                            </inertia-link>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

        <main class="login-form">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-8">
                        <b-card header="Logowanie">
                            <form @submit.prevent="submit">
                                <b-form-group
                                    label="Login"
                                    label-for="login"
                                    label-cols-md="4"
                                    label-align="right"
                                >
                                    <b-form-input v-model="form.login" :state="($page.errors.login ? false : null)" id="login" type="text" required autofocus autocapitalize="off" />
                                    <b-form-invalid-feedback v-if="$page.errors.login" id="login-feedback">
                                        {{ $page.errors.login[0] }}
                                    </b-form-invalid-feedback>
                                </b-form-group>

                                <b-form-group
                                    label="Hasło"
                                    label-for="password"
                                    label-cols-md="4"
                                    label-align="right"
                                >
                                    <b-form-input v-model="form.password" id="password" type="password" required />
                                </b-form-group>

                                <b-form-group
                                    label-cols-md="4"
                                >
                                    <b-form-checkbox v-model="form.remember">
                                        Zapamiętaj
                                    </b-form-checkbox>
                                </b-form-group>

                                <b-form-group
                                    label-cols-md="4"
                                >
                                    <b-button type="submit" variant="primary" :disabled="sending">
                                        <span v-if="!sending">
                                            Zaloguj
                                        </span>
                                        <span v-else>
                                            <b-spinner small></b-spinner>
                                            Logowanie...
                                        </span>
                                    </b-button>
                                </b-form-group>
                            </form>
                        </b-card>
                    </div>
                </div>
            </div>
        </main>
    </div>
</template>

<script>
export default {
    metaInfo: { title: 'Logowanie' },
    components: {
    },
    data() {
        return {
            sending: false,
            form: {
                login: 'admin',
                password: 'admin',
                remember: true,
            },
        }
    },
    methods: {
        submit() {
            this.sending = true
            this.$inertia.post(this.route('login.attempt'), {
                login: this.form.login,
                password: this.form.password,
                remember: this.form.remember,
            }).then(() => this.sending = false)
        },
    },
}
</script>

<style>
.navbar-laravel
{
    box-shadow: 0 2px 4px rgba(0,0,0,.04);
}

.navbar-brand , .nav-link, .my-form, .login-form
{
    font-family: Raleway, sans-serif;
}

.login-form
{
    padding-top: 1.5rem;
    padding-bottom: 1.5rem;
}

.login-form .row
{
    margin-left: 0;
    margin-right: 0;
}
</style>

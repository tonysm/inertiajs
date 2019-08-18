<template>
    <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
        <div class="container">
            <inertia-link href="/" class="navbar-brand">Laravel</inertia-link>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <!-- Left Side Of Navbar -->
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item">
                        <inertia-link href="/" class="nav-link">Welcome</inertia-link>
                    </li>
                    <li class="nav-item">
                        <inertia-link href="/about" class="nav-link">About</inertia-link>
                    </li>
                </ul>

                <!-- Right Side Of Navbar -->
                <ul class="navbar-nav ml-auto">
                    <!-- Authentication Links -->
                    <li v-if="!loggedIn" class="nav-item">
                        <inertia-link :href="route('login')" class="nav-link">Login</inertia-link>
                    </li>
                    <li v-if="!loggedIn" class="nav-item">
                        <inertia-link :href="route('register')" class="nav-link">Register</inertia-link>
                    </li>
                    <li v-if="loggedIn" class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            {{ user.name }} <span class="caret"></span>
                        </a>

                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" :href="route('logout')" @click.stop.prevent="logout">
                                Logout
                            </a>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</template>

<script>
export default {
    computed: {
        loggedIn() {
            return !! this.$page.auth.user;
        },
        user() {
            return this.$page.auth.user;
        },
    },
    methods: {
        logout() {
            this.$inertia.post(this.route('logout'));
        }
    }
}
</script>

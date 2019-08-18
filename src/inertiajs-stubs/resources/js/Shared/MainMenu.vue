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
                        <inertia-link :href="route('/')" class="nav-link">Welcome</inertia-link>
                    </li>
                    <li class="nav-item">
                        <inertia-link :href="route('about')" class="nav-link">About</inertia-link>
                    </li>
                    <li class="nav-item">
                        <inertia-link :href="route('contact')" class="nav-link">Contact</inertia-link>
                    </li>
                </ul>

                <!-- Right Side Of Navbar -->
                <ul class="navbar-nav ml-auto">
                    <!-- Authentication Links -->
                </ul>
            </div>
        </div>
    </nav>
</template>

<script>
export default {}
</script>

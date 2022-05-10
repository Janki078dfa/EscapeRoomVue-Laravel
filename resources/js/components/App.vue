<template>
    <main>
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container-fluid">
                <a class="navbar-brand" href="/">Escape Room</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                        data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false"
                        aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNavDropdown">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <router-link exact-active-class="active" to="/" class="nav-link active" aria-current="page">
                                Home
                            </router-link>
                        </li>
                        <li class="nav-item">
                            <router-link exact-active-class="active" to="/bookings" class="nav-link">Bookings
                            </router-link>
                        </li>
                        <li class="nav-item">
                            <router-link exact-active-class="active" to="/games" class="nav-link">Games</router-link>
                        </li>
                        <li class="nav-item">
                            <router-link exact-active-class="active" to="/reviews" class="nav-link">Reviews</router-link>
                        </li>
                        <li class="nav-item">
                            <router-link exact-active-class="active" to="/rooms" class="nav-link">Rooms</router-link>
                        </li>

                        <li class="nav-item">
                            <router-link exact-active-class="active" to="/users" class="nav-link">Users</router-link>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

        <div>
            <router-view></router-view>
        </div>
    </main>
</template>

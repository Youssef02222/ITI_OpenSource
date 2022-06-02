<template>
    <div>
        <nav class="navbar navbar-expand-lg bg-dark">
            <div class="container bg-dark">
                <a class="navbar-brand bg-dark" href="#">Lab 2</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse bg-dark" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0 bg-dark">
                        <li class="nav-item">
                            <router-link to="/posts" class="nav-link active bg-dark"> All Posts</router-link>
                        </li>
                        <li class="nav-item">
                            <router-link to="/createpost" class="nav-link bg-dark">Create Post</router-link>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </div>
</template>

<script>
export default {
    name: 'NavbarComponent',
}
</script>

<style scoped>
</style>
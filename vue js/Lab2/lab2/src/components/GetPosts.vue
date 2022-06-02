<template>
    <div class="container">
        <div class="row">
            <div class="col-8">
                <h1>All Posts</h1>
                <table class="table table-bordered" style="color: white;">
                    <thead align="center" style="color: green; font-weight: bold; font-size: larger;">
                        <tr>
                            <th>#</th>
                            <th>Title</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="post in posts" :key="post.id">
                            <td>{{ post.id }}</td>
                            <td>{{ post.title }}</td>
                            <td>
                                <router-link :to="`/posts/${post.id}`" class="btn btn-info">View</router-link>
                                <router-link :to="`/posts/${post.id}/edit`" class="btn btn-primary">Edit</router-link>
                                <button @click="deletePost(post.id)" class="btn btn-danger">Delete</button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="col-4">
                <router-view></router-view>
            </div>
        </div>
    </div>
</template>

<script>
import axios from "axios"

export default {
    name: "GetPostsComponent",
    data() {
        return {
            posts: [],
        };
    },
    created() {
        this.getAllPosts();
    },
    methods: {
        async getAllPosts() {
            await axios
                .get("http://localhost:2000/POSTS")
                .then((response) => {
                    this.posts = response.data;
                })
                .catch((error) => {
                    console.log(error);
                });
        },
        async deletePost(id) {
            axios
                .delete(`http://localhost:2000/POSTS/${id}`)
                .then((response) => {
                    console.log(response.data);
                    this.getAllPosts();
                    this.$router.push('/posts')
                })
                .catch((error) => {
                    console.log(error);
                });
        },
    },
};
</script>

<style scoped>
</style>
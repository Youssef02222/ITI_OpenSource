<template>
    <div class="container">
        <h1>Edit Post</h1>
        <form action="" @submit.prevent="editPost">
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Title</label>
                <input type="text" class="form-control" id="exampleFormControlInput1" v-model="title" />
            </div>
            <div class="mb-3">
                <label for="exampleFormControlTextarea1" class="form-label">Body</label>
                <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" v-model="body"></textarea>
            </div>
            <div>
                <button class="btn btn-success me-3">Edit</button>
                <button class="btn btn-primary" @click="back">back</button>
            </div>
        </form>
    </div>
</template>

<script>
import axios from "axios"
export default {
    name: "EditPostComponent",
    data() {
        return {
            id: "",
            title: "",
            body: "",
        };
    },
    created() {
        this.getPostDetails();
    },
    methods: {
        getPostDetails() {
            this.id = this.$route.params.id;
            axios.get(`http://localhost:2000/POSTS?id=${this.id}`)
                .then((response) => {
                    // console.log(response.data)
                    if (response.data.length > 0) {
                        this.title = response.data[0].title;
                        this.body = response.data[0].body;
                    }
                    else {
                        this.$router.push('/posts')
                    }
                })
                .catch((error) => {
                    console.log(error)
                })
        },
        editPost() {
            axios
                .put(`http://localhost:2000/POSTS/${this.id}`, {
                    title: this.title,
                    body: this.body
                })
                .then((response) => {
                    console.log(response.data);
                    this.$router.push('/posts')
                })
                .catch((error) => {
                    console.log(error.response);
                });
        },
        back() {
            this.$router.push('/posts')
        }
    },
}
</script>

<style scoped>
</style>
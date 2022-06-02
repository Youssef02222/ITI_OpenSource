<template>
    <div class="container">
        <h1>Post Details</h1>
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">{{ id }} : {{ title }}</h5>
                <p class="card-text">{{ body }}</p>
            </div>
        </div>
    </div>
</template>

<script>
import axios from 'axios'
export default {
    name: 'PostDetailsComponent',
    props: ['id'],
    data() {
        return {
            // id: '',
            title: '',
            body: ''
        }
    },
    watch: {
        id() {
            this.getPostDetails()
        }
    },
    created() {
        this.getPostDetails();
    },
    methods: {
        getPostDetails() {
            // this.id = this.$route.params.id;
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
        }
    }
}
</script>

<style scoped>
</style>
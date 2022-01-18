<template>
    <div>
        <input type="text" v-model="keyword">
        <ul v-if="Books.length > 0">
            <li v-for="book in Books" :key="book.id" v-text="book.name"></li>
        </ul>
    </div>
</template>

<script>
export default {
    data() {
        return {
            keyword: null,
            Books: []
        };
    },
    watch: {
        keyword(after, before) {
            this.getResults();
        }
    },
    methods: {

        getResults() {
            axios.get('api/aeroportlist', {params: {keyword: this.keyword}}).then(response => {
                this.Books = response.data;
                console.log(response.data);
            })
        },
    }
}
</script>

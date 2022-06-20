<template>
    <div>
        <p>tested</p>
    </div>
</template>

<script>
    export default {
        data: function () {
            return {
                categories: [],
                products: [],
                loading: true
            }
        },
        mounted() {
            this.loadCategories();
        },
        methods: {
            loadCategories: function () {
                axios.get('post_list')
                    .then((response) => {
                        console.log(response.data);
                        // this.categories = response.data.data;
                    })
                    .catch(function (error) {
                        console.log(error);
                    });
            },
            // loadProducts: function () {
            //     axios.get('/api/products')
            //         .then((response) => {
            //             this.products = response.data.data;
            //             this.loading = false;
            //         })
            //         .catch(function (error) {
            //             console.log(error);
            //         });
            // }
        }
    }
</script>

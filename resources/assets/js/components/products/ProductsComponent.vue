<template>
    <section>
        <div class="row">
            <product-card-component v-bind:product="product" v-for="product in products"></product-card-component>
        </div>
    </section>
</template>

<script>
    export default {
        data() {
            return {
                name: 'Products Component v2',
                products: [
                    {title: 'Curso Ruby', price: 200, description: 'Hola, mundo'},
                    {title: 'Curso Laravel', price: 200, description: 'Hola, mundo'},
                ]
            }
        }
    }
</script>

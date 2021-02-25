import './bootstrap';
console.log('JS OK');

import Vue from 'vue';
import axios from 'axios';

const filter = new Vue({
    el: '#filter',
    data: {
        name: '', 
        restypes: [], 
        filteredRestaurants: []
    }, 
    created() {
        this.filter();
    }, 
    methods: {
        filter() {
            axios
            // ALL RESTAURANTS
            // .get('http://127.0.0.1:8000/api/filtered-name', {
            //     params: {
            //         name: this.name, 
            //         // restypes: this.restypes
            //     }
            // })
            .get('http://127.0.0.1:8000/api/filtered-results', {
                params: {
                    name: this.name, 
                    restypes: this.restypes
                }
            })
            .then(response => {

                this.filteredRestaurants = response.data;
                console.log(this.filteredRestaurants);
            })
            .catch(error => {
                console.log(error)
            })
        }
    }
});



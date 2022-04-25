import { createApp } from "vue";

createApp({
    data() {
        return {
            counter: 0,
        };
    },
    methods: {
        onClick() {
            this.counter += 1;
        }
    },
    mounted() {
        // setInterval(() => {
        //     this.counter++;
        // }, 1000);
        console.log('hello');
    },
}).mount("#counter");
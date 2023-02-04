import './bootstrap';
import {createApp} from 'vue';
import GetComponent from './components/GetComponent.vue';


const app = createApp({});

app.component('GetComponent', GetComponent);




app.mount('#app');

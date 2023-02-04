<template>
    <table class="table">
        <thead>
        <tr>
            <th scope="col">Leads</th>
            <th scope="col">Name</th>
            <th scope="col">Price</th>
            <th scope="col">Company id</th>
        </tr>
        </thead>
        <tbody>
        <tr v-for="lead in leads">
            <th scope="row">{{ lead.id }}</th>
            <td>{{ lead.name }}</td>
            <td>{{ lead.price }}</td>
            <td>{{ lead.company.id }}</td>
        </tr>
        </tbody>
    </table>

    <table class="table">
        <thead>
        <tr>
            <th scope="col">Companies</th>
            <th scope="col">Name</th>
            <th scope="col">Price</th>
            <th scope="col">Company id</th>
        </tr>
        </thead>
        <tbody>
        <tr v-for="company in companies">
            <th scope="row">{{ company.id }}</th>
            <td>{{ company.id }}</td>
            <td>{{ company.name }}</td>
            <td>{{ company.custom_fields_values[0].values[0].value }}</td>
        </tr>
        </tbody>
    </table>

    <table class="table">
        <thead>
        <tr>
            <th scope="col">Contacts</th>
            <th scope="col">Name</th>
            <th scope="col">Company id</th>
            <th scope="col">Phone</th>
            <th scope="col">Email</th>
        </tr>
        </thead>
        <tbody>
        <tr v-for="contact in contacts">
            <th scope="row">{{ contact.id }}</th>
            <td>{{ contact.name }}</td>
            <td>{{ contact.company.id }}</td>
            <td>{{ contact.custom_fields_values[0].values[0].value }}</td>
            <td>{{ contact.custom_fields_values[1].values[0].value }}</td>
        </tr>
        </tbody>
    </table>


    <a class="btn btn-success m-5" @click.prevent="updateDataBD()">Обновить БД через axios</a>
    <a class="btn btn-success m-5" href="https://ecaf-176-124-162-49.eu.ngrok.io/public/storeData">Обновить БД через бэк</a>
</template>

<script>
import axios from "axios";

export default {
    name: "GetComponent",
    data() {
        return {
            leads: null,
            companies: null,
            contacts: null,
        }
    },
    mounted() {
        this.getData()
    },
    updated() {
        this.getData()
    },
    methods: {
        getData() {
            axios.get(`https://ecaf-176-124-162-49.eu.ngrok.io/public/api/amocrm/lead`, {}).then(res => {
                this.leads = res.data
            })
            axios.get(`https://ecaf-176-124-162-49.eu.ngrok.io/public/api/amocrm/company`, {}).then(res => {
                this.companies = res.data
            })
            axios.get(`https://ecaf-176-124-162-49.eu.ngrok.io/public/api/amocrm/contact`, {}).then(res => {
                console.log(res.data)
                this.contacts = res.data
            })
        },
        updateDataBD() {
            const dataCompany = new FormData();
            this.companies.forEach(company => {
                dataCompany.append('id', company.id);
                dataCompany.append('name', company.name);
                dataCompany.append('address', company.custom_fields_values[0].values[0].value);
                axios.post('https://ecaf-176-124-162-49.eu.ngrok.io/public/api/amocrm/company', dataCompany).then(res => {
                    console.log(res)
                }).catch(err => {
                    console.log(err);
                })

            })
            const dataLead = new FormData();
            this.leads.forEach(lead => {
                dataLead.append('id', lead.id);
                dataLead.append('name', lead.name);
                dataLead.append('price', lead.price);
                dataLead.append('company_id', lead.company.id);
                axios.post('https://ecaf-176-124-162-49.eu.ngrok.io/public/api/amocrm/lead', dataLead).then(res => {
                    console.log(res)
                }).catch(err => {
                    console.log(err);
                })

            })
            const dataContact = new FormData();
            this.contacts.forEach(contact => {
                dataContact.append('id', contact.id);
                dataContact.append('name', contact.name);
                dataContact.append('company_id', contact.company.id);
                dataContact.append('phone', contact.custom_fields_values[0].values[0].value);
                dataContact.append('email', contact.custom_fields_values[1].values[0].value);
                axios.post('https://ecaf-176-124-162-49.eu.ngrok.io/public/api/amocrm/contact', dataContact).then(res => {
                    console.log(res)
                }).catch(err => {
                    console.log(err);
                })

            })
        },

    },
}
</script>

<style scoped>

</style>


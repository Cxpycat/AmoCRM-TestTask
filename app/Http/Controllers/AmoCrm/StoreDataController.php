<?php

namespace App\Http\Controllers\AmoCrm;

use App\Http\Controllers\Controller;
use App\Http\Requests\Company\StoreRequest;
use App\Models\Company;
use App\Models\Contact;
use App\Models\Lead;
use League\OAuth2\Client\Token\AccessToken;

class StoreDataController extends Controller
{
    public function __invoke()
    {
        try {
            $apiSource = $this->getApiClient();

            $companiesService = $apiSource->companies();
            $companiesCollection = $companiesService->get();
            foreach ($companiesCollection as $company) {
                $dataCompany = [];
                $dataCompany['id'] = $company->id;
                $dataCompany['name'] = $company->name;
                $dataCompany['address'] = $company->customFieldsValues[0]->values[0]->value;
                $company = Company::firstOrCreate(['id' => $dataCompany['id']], $dataCompany);
            }

            $leadsService = $apiSource->leads();
            $leadsCollection = $leadsService->get();
            foreach ($leadsCollection as $lead) {
                $dataLead = [];
                $dataLead['id'] = $lead->id;
                $dataLead['name'] = $lead->name;
                $dataLead['price'] = $lead->price;
                $dataLead['company_id'] = $lead->company->id;
                $lead = Lead::firstOrCreate(['id' => $dataLead['id']], $dataLead);
            }

            $contactsService = $apiSource->contacts();
            $contactsCollection = $contactsService->get();
            foreach ($contactsCollection as $contact) {
                $dataContact = [];
                $dataContact['id'] = $contact->id;
                $dataContact['name'] = $contact->name;
                $dataContact['phone'] = $contact->custom_fields_values[0]->values[0]->value;
                $dataContact['email'] = $contact->custom_fields_values[1]->values[0]->value;
                $dataContact['company_id'] = $contact->company->id;
                $contact = Contact::firstOrCreate(['id' => $dataContact['id']], $dataContact);
            }
            echo "<div class='m-5'>Обновление БД прошло успешно<br><a href='https://ecaf-176-124-162-49.eu.ngrok.io/public/main' class='btn btn-success'>Главная</a></div>";
        } catch (AmoCRMApiException $e) {
            printError($e);
            die;
        }


        return view('storeData');
    }


}

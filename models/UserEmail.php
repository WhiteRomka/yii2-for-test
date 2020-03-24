<?php

namespace app\models;

class UserEmail
{
    public $domains = [];
    public $checkedDomains = [];
    public $goodDomains = [];
    public $badDomains = [];

    public function autoValidation()
    {
        $emails = ['some@listtt.ru', 'some2@yandex.ru','some3@yandex.ru','some4@yandexxfgfd.ru', 'some222@yandex.ru',];

        $domains = [];
        foreach ($emails as $email) {
            $domain = explode('@', $email)[1];
            $domains[] = $domain;
        }
        $this->domains = $domains = array_unique($domains);

        foreach ($this->domains as $domain) {
            $this->checkDomain($domain) ? ($this->goodDomains[] = $domain) : ($this->badDomains[] = $domain);
            $this->checkedDomains[] = $domain;
        }
        //debug($this->checkedDomains);
       // debug($this->goodDomains);
       // debug($this->badDomains);

        $validatedEmails = [];
        foreach ($emails as $email) {
            $validatedEmails[] = $this->checkEmail($email);
        }
        //debug($validatedEmails); die;
    }


    public function checkDomain($domain)
    {
        $URL  = $domain;
        $curlHandle = curl_init();
        curl_setopt($curlHandle, CURLOPT_URL, $URL);
        curl_setopt($curlHandle, CURLOPT_HEADER, true);
        curl_setopt($curlHandle, CURLOPT_NOBODY  , true);
        curl_setopt($curlHandle, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curlHandle, CURLOPT_TIMEOUT, 5);
        curl_exec($curlHandle);
        $code = curl_getinfo($curlHandle, CURLINFO_HTTP_CODE);
        curl_close($curlHandle);

        if ($code == 200 || $code == 302) {
            return true;
        }
        return false;
    }

    public function checkEmail($email)
    {
        $domainAndZone = explode('@', $email)[1];
        if (in_array($domainAndZone, $this->badDomains)) {
            return [$email, 'blackList', 'autoFilter'];
        } elseif (in_array($domainAndZone, $this->goodDomains)) {
            return [$email, ($this->anotherCheck($email) ? 'whiteList' : 'blackList'), 'autoFilter'];
        }
    }


    public function anotherCheck($email)
    {
        $login = explode('@', $email)[0];
        $domainAndZone = explode('@', $email)[1];
        $domain = explode('.', $domainAndZone)[0];
        $zone = explode('.', $domainAndZone)[1];

        if (strlen($login) < 3) {
            return false;
        }
        if (strlen($zone) < 2) {
            return false;
        }
        return true;
    }
}
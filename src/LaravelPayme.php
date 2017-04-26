<?php

namespace LaravelPaymeAlignet;

use Illuminate\Contracts\Config\Repository;

class LaravelPayme
{
    private $config;
    private $url;
    private $acquirer_id;
    private $commerce_id;
    private $commerce_secret_key;

    public function __construct(Repository $config)
    {
        $this->config = $config;
    }

    /**
     * This take the config/laravel-payme-alignet values and replace this class variables
     */
    private function configure()
    {
        if ($this->config->has('laravel-payme')) {
            foreach ($this->config->get('laravel-payme.') as $key => $value) {
                $this->{$key} = $value;
            }
        }
    }

    /**
     * @param $userId int
     * @param $emailUser string
     * @param $nameUser string
     * @param null $lastnameUser
     * @param array $moreData Used for reserved fields. e.g
     * @return bool|mixed
     */
    public function registerUser($userId, $emailUser, $nameUser, $lastnameUser = null, array $moreData = [])
    {
        try {
            $this->configure();

            $client = new \SoapClient($this->url);

            $registerVerification = openssl_digest("{$this->commerce_id}{$userId}{$emailUser}{$this->commerce_secret_key}", 'sha512');

            $userParams = [
                'idEntCommerce'         => $this->commerce_id,
                'codCardHolderCommerce' => $userId,
                'names'                 => $nameUser,
                'lastNames'             => is_null($lastnameUser) ? $nameUser : $lastnameUser,
                'mail'                  => $emailUser,
                'registerVerification'  => $registerVerification,
            ];

            $params = array_merge($userParams, $moreData);

            $user = $client->RegisterCardHolder($params);

            return $user->codAsoCardHolderWallet;
        } catch (\Exception $e) {
            return false;
        }
    }
}
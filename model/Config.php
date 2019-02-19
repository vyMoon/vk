<?php
class Config
{
    public $config = [
        'id' => yourID,                                                     //ID вашего приложения для авторизации через вк
        'code' => 'yourPerfectSecretCode',                                  // Защищённый ключ вашего приложения для авторизации через вк
        'redirect' => 'http://MY-SITE/controller/controller.php',           // адресс вашего сайта нужно вписать вместо MY-SITE 
    ];

    public $link = '';                                                      // линк для ссылки авторизоваться через вк

    function __construct() {                                                // формируем сслыку
        $config = $this->config;
        $link = 'https://oauth.vk.com/authorize?client_id=' . $config['id'] . '&scope=1&redirect_uri=' . $config['redirect'] . '&response_type=code';
        $this->link = $link;
    }
}

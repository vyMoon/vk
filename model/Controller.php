<?php
class Controller
{
    private $config;

    function __construct() {

        $this->config = new Config;

    }

    public function operations() {

        $config = $this->config;

        if (isset($_GET['action']) && $_GET['action'] == 'logout') {     // logout
            session_destroy();
            header('location: ../index.php');
        }
        
        if (isset($_GET['code'])) {                                     // обработка ответа от вк
            $response = $_GET['code'];
            $user = [];
        
            $vkTokenRequest = file_get_contents('https://api.vk.com/oauth/access_token?client_id=' . $config->config['id'] . '&client_secret=' . $config->config['code'] . '&code=' . $response . '&redirect_uri=' . $config->config['redirect']);
            $data = json_decode($vkTokenRequest, true);
            $accessToken = $data['access_token'];
            $user['id'] = $data['user_id'];
        
            $personalDatarequest = file_get_contents('https://api.vk.com/method/users.get?user_id=' . $user['id'] . '&fields=bdate&access_token=' . $accessToken . '&v=5.92');
            $data = json_decode($personalDatarequest, true);            
            $user['firstName'] = $data['response'][0]['first_name'];
            $user['lastName'] = $data['response'][0]['last_name'];
        
            $frendsRequest = file_get_contents('https://api.vk.com/method/friends.get?user_ids=' . $user['id'] . '&order=random&count=5&fields=city&access_token='. $accessToken . '&v=5.92');
            $data = json_decode($frendsRequest, true);
            $user['friends'] = $data['response']['items'];
        
            $_SESSION['user'] = $user;
        
            header('location: ../index.php');

        }
    }

}

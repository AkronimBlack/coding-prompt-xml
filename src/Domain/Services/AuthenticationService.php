<?php

namespace src\Domain\Services;


use src\Infrastructure\Persistence\UserRepository;
use src\sys\Services\SessionHandler;

class AuthenticationService
{
    /**
     * @var UserRepository
     */
    private $userRepository;

    /**
     * AuthenticationService constructor.
     *
     * @param UserRepository $userRepository
     */
    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    /**
     * @param $token
     *
     * @return array|bool|mixed
     */
    public function execute($token)
    {
        $user = $this->checkInSession();
        if(!$user){
            return $this->login($token);
        }
        return $user;
    }

    /**
     * @param $token
     *
     * @return array|mixed
     */
    private function login($token)
    {
        if (strpos($token, 'bearer') === false) {
            return array(
                'Error' => 'Unknown or unset key. Abort, Abort, Danger Will Robinson',
            );
        }
        list($type, $key) = explode(' ', $token);
        $user = $this->userRepository->findUserByKey($key);

        if ($user > 0) {
            SessionHandler::createSession($user);

            return $user;
        }

        return array(
            'Error' => 'Unknown or unset key. Abort, Abort, Danger Will Robinson',
        );
    }

    /**
     * @return array|bool|mixed
     */
    public function checkInSession()
    {
        $session = SessionHandler::getSession();
        if(array_key_exists('user_id',$session)){
            $user = $this->userRepository->findUserById($session['user_id']);
            if(!$user){
                return array(
                    'Error' => 'Unknown key. Abort, Abort, Danger Will Robinson',
                );
            }
            return $user;
        }
        return false;
    }
}

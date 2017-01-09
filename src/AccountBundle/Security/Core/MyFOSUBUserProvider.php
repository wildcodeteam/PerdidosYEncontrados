<?php

namespace AccountBundle\Security\Core;

use HWI\Bundle\OAuthBundle\OAuth\Response\UserResponseInterface;
use HWI\Bundle\OAuthBundle\Security\Core\User\FOSUBUserProvider as BaseFOSUBProvider;
use Symfony\Component\Security\Core\User\UserInterface;
use AccountBundle\Entity\User;


class MyFOSUBUserProvider extends BaseFOSUBProvider
{
    /**
     * {@inheritDoc}
     */
    public function connect(UserInterface $user, UserResponseInterface $response)
    {
        // get property from provider configuration by provider name
        // , it will return `facebook_id` in that case (see service definition below)
        $property = $this->getProperty($response);
        $username = $response->getUsername(); // get the unique user identifier

        //we "disconnect" previously connected users
        $existingUser = $this->userManager->findUserBy(array($property => $username));
        if (null !== $existingUser) {
            // set current user id and token to null for disconnect
            // ...
            $existingUser->$setter(null);
            $this->userManager->updateUser($existingUser);
        }
        // we connect current user, set current user id and token
        // ...
        $user->$setter($username);

        $serviceAccessTokenName = $response->getResourceOwner()->getName() . 'AccessToken';
        $serviceAccessTokenSetter = 'set' . ucfirst($serviceAccessTokenName);

        if(method_exists($user, $serviceAccessTokenSetter))
            $user->$serviceAccessTokenSetter($response->getAccessToken());

        $this->userManager->updateUser($user);
    }

    /**
     * {@inheritdoc}
     */
    public function loadUserByOAuthUserResponse(UserResponseInterface $response)
    {
        $socialID = $response->getUsername();
        $user = $this->userManager->findUserBy(array($this->getProperty($response)=>$socialID));

        // if null just create new user and set it properties
        if (null === $user) {
            $email = $response->getEmail();
            $emailCanonical = strtolower($email);

            $firstName = $response->getFirstName();
            $lastName = $response->getLastName();
            $profilePicture = $response->getProfilePicture();
            $user = $this->userManager->createUser();
            $user->setUsername($email);
            $user->setUsernameCanonical($emailCanonical);
            $user->setEmail($email);
            $user->setEmailCanonical($emailCanonical);
            $user->setFirstName($firstName);
            $user->setLastName($lastName);
            $user->setProfilePicture($profilePicture);

            $user->setPlainPassword(md5(uniqid()));
            $user->setEnabled(true);

            $user->setFacebookID($socialID);

            // save user to database
            $this->userManager->updateUser($user);

            return $user;
        }
        // else update access token of existing user
        $serviceName = $response->getResourceOwner()->getName();
        $setter = 'set' . ucfirst($serviceName) . 'AccessToken';
        $user->$setter($response->getAccessToken());//update access token

        return $user;
    }
}
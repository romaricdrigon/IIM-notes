<?php
namespace AppBundle\Security;

use KnpU\Guard\AbstractGuardAuthenticator;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Core\Authentication\Token\TokenInterface;
use Symfony\Component\Security\Core\Exception\AuthenticationException;
use Symfony\Component\Security\Core\User\User;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Security\Core\User\UserProviderInterface;

class ApiTokenAuthenticator extends AbstractGuardAuthenticator
{
    /**
     * We read HTTP header to get X-Token
     */
    public function getCredentials(Request $request)
    {
        return $request->headers->get('X-Token');
    }

    /**
     * We have only one valid token hardcoded here
     * If it does not match, we should throw an exception
     */
    public function getUser($credentials, UserProviderInterface $userProvider)
    {
        // Hardcoded token
        if ('example-token' !== $credentials) {
            throw new AuthenticationCredentialsNotFoundException();
        }

        return new User('api', 'ok');
    }

    /**
     * We don't have any checks to do
     */
    public function checkCredentials($credentials, UserInterface $user)
    {
       return;
    }

    /**
     * On success, we just let the request continue
     */
    public function onAuthenticationSuccess(Request $request, TokenInterface $token, $providerKey)
    {
        return;
    }

    /**
     * On failure, we return a 403 error
     */
    public function onAuthenticationFailure(Request $request, AuthenticationException $exception)
    {
        return new JsonResponse(['message' => 'Missing or invalid token'], 403);
    }

    /**
     * We don't support remember me
     */
    public function supportsRememberMe()
    {
        return false;
    }

    /**
     * Called when an anonymous users get in. We inform him we require authentication.
     */
    public function start(Request $request, AuthenticationException $authException = null)
    {
        return new JsonResponse(['message' => 'Authentication required'], 401);
    }
}

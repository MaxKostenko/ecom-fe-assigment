<?php
namespace middleware;

class CSRFGuardMiddleware
{
    /**
     * Example middleware invokable class
     *
     * @param  \Psr\Http\Message\ServerRequestInterface $request  PSR7 request
     * @param  \Psr\Http\Message\ResponseInterface      $response PSR7 response
     * @param  callable                                 $next     Next middleware
     *
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function __invoke($request, $response, $next)
    {
        $csrfCookie = $request->getCookieParams()['CSRF-Token'] ?? NULL;
        if(!$csrfCookie) {
            $csrfCookie = sha1(random_bytes(100));
        }
        setcookie('CSRF-Token', $csrfCookie, time() + 3 * 86400, '/');

        if(in_array(strtoupper($request->getMethod()), ['POST', 'PUT', 'DELETE', 'PATCH']))
        {
            $csrfHeader = $request->getHeader('X-CSRF-Token')[0] ?? NULL;
            if(!$csrfCookie || ($csrfHeader !== $csrfCookie))
            {
                return $response->withStatus(403);
            }
        }

        $response = $next($request, $response);

        return $response;
    }
}

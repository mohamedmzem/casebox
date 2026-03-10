<?php

/**
 * Class AppEnv
 *
 * Resolves the application environment based on the incoming request URI.
 * The environment segment is validated against a strict whitelist pattern
 * to prevent injection or path traversal attacks.
 */
class AppEnv
{
    /**
     * Pattern that defines the set of allowed characters for an environment name.
     * Only alphanumeric characters and underscores are permitted.
     */
    const VALID_ENV_PATTERN = '/^[a-zA-Z0-9_]+$/';

    /**
     * Resolves the current environment from the request URI.
     *
     * The URI is expected to follow the pattern /c/{environment}/...
     * If the extracted value does not match the allowed pattern, the
     * default environment is used instead.
     *
     * @param string|null $env Fallback environment name (defaults to 'default')
     *
     * @return string The resolved, validated environment name
     */
    public static function getRequestEnvironment($env = null)
    {
        if (empty($env)) {
            $env = 'default';
        }

        if (!empty($_SERVER['REQUEST_URI'])) {
            $requestUri = filter_var($_SERVER['REQUEST_URI'], FILTER_SANITIZE_URL);

            if ($requestUri !== false) {
                preg_match('/\/c\/([^\/]+)/i', $requestUri, $match);

                if (!empty($match[1])) {
                    $candidate = $match[1];

                    // Strict whitelist validation: only alphanumeric + underscore allowed.
                    // Any value that does not match is silently discarded to prevent
                    // environment injection or directory traversal via the URL.
                    if (preg_match(self::VALID_ENV_PATTERN, $candidate) === 1) {
                        $env = $candidate;
                    }
                }
            }
        }

        return $env;
    }
}

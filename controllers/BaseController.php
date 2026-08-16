<?php

declare(strict_types=1);

/**
 * GT HOMES — Base Controller
 *
 * All controllers extend this class.
 * Provides shared request/response utilities.
 *
 * Responsibilities:
 *  - HTTP method detection
 *  - Safe GET/POST input retrieval
 *  - Redirect
 *  - View rendering helpers
 *  - Flash messaging
 */
abstract class BaseController
{
    /**
     * Retrieve a GET parameter safely.
     */
    protected function getParam(string $key, mixed $default = null): mixed
    {
        return $_GET[$key] ?? $default;
    }

    /**
     * Retrieve a POST parameter, trimmed and as a string.
     */
    protected function postParam(string $key, mixed $default = ''): string
    {
        return isset($_POST[$key]) ? trim((string) $_POST[$key]) : (string) $default;
    }

    /**
     * Check if the current request method is POST.
     */
    protected function isPost(): bool
    {
        return $_SERVER['REQUEST_METHOD'] === 'POST';
    }

    /**
     * Check if the current request method is GET.
     */
    protected function isGet(): bool
    {
        return $_SERVER['REQUEST_METHOD'] === 'GET';
    }

    /**
     * Render a view file with optional data.
     */
    protected function view(string $view, array $data = []): void
    {
        render_view($view, $data);
    }

    /**
     * Redirect to a URL and terminate.
     */
    protected function redirect(string $path, int $code = 302): never
    {
        redirect($path, $code);
    }

    /**
     * Set a flash message for the next request.
     */
    protected function flash(string $message, string $type = 'success'): void
    {
        set_flash($message, $type);
    }

    /**
     * Return a JSON response and terminate.
     */
    protected function json(bool $success, string $message, array $data = [], int $code = 200): never
    {
        json_response($success, $message, $data, $code);
    }

    /**
     * Abort with an HTTP error page.
     */
    protected function abort(int $code): never
    {
        http_response_code($code);
        $errorView = VIEWS_PATH . '/errors/' . $code . '.php';
        if (is_file($errorView)) {
            require $errorView;
        } else {
            echo "HTTP Error {$code}";
        }
        exit;
    }
}

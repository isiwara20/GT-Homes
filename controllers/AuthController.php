<?php

declare(strict_types=1);

/**
 * GT HOMES — Auth Controller
 *
 * Handles admin login and logout.
 * NOTE: Login page is intentionally NOT linked from the public navigation.
 * Admin access: /gthome/login
 */
class AuthController extends BaseController
{
    private AuthBLL $authBll;

    public function __construct()
    {
        $this->authBll = new AuthBLL();
    }

    /**
     * Display login form (GET).
     */
    public function showLogin(): array
    {
        // If already logged in, send to dashboard.
        redirectIfAuthenticated();

        return [
            'pageTitle' => 'Admin Login — ' . APP_NAME,
            'csrfToken' => CsrfService::generateToken(),
        ];
    }

    /**
     * Handle login form submission (POST).
     */
    public function processLogin(): void
    {
        if (!$this->isPost()) {
            $this->redirect(ADMIN_LOGIN_PATH);
        }

        CsrfService::validateOrFail();

        $email    = sanitise_string($this->postParam('email'));
        $password = $this->postParam('password');

        $result = $this->authBll->attemptLogin($email, $password);

        if (!$result['success']) {
            set_flash($result['message'] ?? 'Invalid credentials.', 'error');
            $this->redirect(ADMIN_LOGIN_PATH);
        }

        // Session is set in authBll via loginAdmin() helper.
        $this->redirect(ADMIN_DASH_PATH);
    }

    /**
     * Handle logout (GET or POST).
     */
    public function logout(): void
    {
        logoutAdmin();
        set_flash('You have been logged out.', 'info');
        $this->redirect(ADMIN_LOGIN_PATH);
    }
}

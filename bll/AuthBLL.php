<?php

declare(strict_types=1);

/** GT HOMES — Auth Business Logic Layer */
class AuthBLL extends BaseBLL
{
    private UserDAL $userDal;

    public function __construct()
    {
        $this->userDal = new UserDAL();
    }

    /**
     * Attempt to log in with the provided credentials.
     *
     * @return array{success: bool, message: string}
     */
    public function attemptLogin(string $email, string $password): array
    {
        // 1. Validate input format
        $validation = AuthService::validateLoginInput($email, $password);
        if (!$validation['valid']) {
            return ['success' => false, 'message' => 'Invalid email or password.'];
        }

        // 2. Load user from database
        $user = $this->userDal->findByEmail($email);

        if ($user === null) {
            // Use a generic message — never reveal whether the email exists.
            LoggerService::warning('Login attempt: email not found', ['email' => $email]);
            return ['success' => false, 'message' => 'Invalid email or password.'];
        }

        // 3. Verify password hash
        if (!AuthService::verifyPassword($password, $user['password_hash'])) {
            LoggerService::warning('Login attempt: wrong password', ['email' => $email]);
            return ['success' => false, 'message' => 'Invalid email or password.'];
        }

        // 4. Check active status
        if (($user['is_active'] ?? 0) !== 1) {
            return ['success' => false, 'message' => 'This account has been deactivated.'];
        }

        // 5. Set session (via auth_helper)
        loginAdmin(
            (int) $user['id'],
            (string) $user['email'],
            (string) $user['name']
        );

        // 6. Rehash if needed (algorithm upgrade)
        if (AuthService::needsRehash($user['password_hash'])) {
            $newHash = AuthService::hashPassword($password);
            $this->userDal->updatePasswordHash((int) $user['id'], $newHash);
        }

        LoggerService::info('Admin login successful', ['email' => $email]);
        return ['success' => true, 'message' => 'Login successful.'];
    }
}

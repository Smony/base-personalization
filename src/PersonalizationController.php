<?php
namespace Smony\Personalization;

use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\App;

class PersonalizationController
{
    protected $node;

    public function __construct() {
        $this->saveInterest();
    }

    public function saveInterest()
    {
        $userId = Cookie::get('userId');

        if (!$userId) {

            $userId = uniqid('uniq_user_', true);
            Cookie::queue('userId', $userId, config('personalization.cookie_life_time'));

            if ($userId) {
                app('users_cookies.model')
                    ->firstOrCreate(['user_hash' => $userId]);
            }
        }

        App::singleton('user_cookie_id', function ($app) use ($userId) {
            return app('users_cookies.model')
                ->whereUserHash($userId)
                ->first();
        });

    }

    public function toHistory(string $userId): bool
    {
        if (!$userId) {
            return false;
        }

        app('users_cookies.model')
            ->firstOrCreate(['user_hash' => $userId]);

        return true;
    }

    /**
     * @param string $userId
     */
    private function getUserCookie(string $userId): void
    {
        App::singleton('user_cookie_id', function ($app) use ($userId) {
            return app('users_cookies.model')
                ->whereUserHash($userId)
                ->first();
        });
    }
}

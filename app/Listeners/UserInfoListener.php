<?php

namespace App\Listeners;

use App\Events\UserInfoEvent;
use App\Services\UserInfoService;

class UserInfoListener
{
    /**
     * Create the event listener.
     */
    public function __construct(protected UserInfoService $userInfoService)
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(UserInfoEvent $event): void
    {
        $this->userInfoService->updateUserInfo($event->user, $event->userInfo, $event->imageUrl);
    }
}

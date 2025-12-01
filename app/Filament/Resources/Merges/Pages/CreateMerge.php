<?php

namespace App\Filament\Resources\Merges\Pages;

use App\Filament\Resources\Merges\MergeResource;
use Filament\Resources\Pages\CreateRecord;
use App\Models\Merge;
use Filament\Notifications\Notification;

class CreateMerge extends CreateRecord
{
    protected static string $resource = MergeResource::class;
    protected function handleRecordCreation(array $data): Merge
    {
        $userIds = $data['user_ids'];
        $targetId = $data['target_indicator_id'];

        foreach ($userIds as $userId) {
            Merge::firstOrCreate([
                'user_id' => $userId,
                'target_indicator_id' => $targetId,
            ]);
        }

        // Bildirishnoma
        Notification::make()
            ->title('Bir nechta foydalanuvchi muvaffaqiyatli birlashtirildi!')
            ->success()
            ->send();

        return Merge::where('target_indicator_id', $targetId)->first();
    }
}

<?php

namespace App\Events;

use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Database\Eloquent\Relations\MorphOne;
use Illuminate\Database\Eloquent\Relations\MorphToMany;

class AttachmentEvent
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public function __construct(
        public array|UploadedFile $files,
        public MorphOne|MorphMany|MorphToMany|null $relation = null,
        public string $path = 'files',
        public ?string $identifier = null
    ) {
    }
}

<?php declare(strict_types=1);

namespace Sassnowski\Arcanist\Assistant\Event;

use Sassnowski\Arcanist\Assistant\AbstractAssistant;

final class AssistantFinishing
{
    public function __construct(public AbstractAssistant $assistant)
    {
    }
}

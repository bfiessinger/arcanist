<?php declare(strict_types=1);

namespace Tests\Assistant;

use Mockery as m;
use PHPUnit\Framework\TestCase;
use Sassnowski\Arcanist\Assistant\AbstractAssistant;
use Sassnowski\Arcanist\Assistant\Event\AssistantFinished;
use Sassnowski\Arcanist\Assistant\Repository\FakeAssistantRepository;
use Sassnowski\Arcanist\Assistant\Listener\RemoveCompletedAssistantListener;

class RemoveCompletedAssistantListenerTest extends TestCase
{
    /** @test */
    public function it_removes_an_assistant_after_it_was_completed(): void
    {
        $assistant = m::mock(AbstractAssistant::class)->makePartial();
        $assistant->setId(1);
        $repository = new FakeAssistantRepository();
        $event = new AssistantFinished($assistant);
        $listener = new RemoveCompletedAssistantListener($repository);

        $listener->handle($event);

        self::assertFalse($assistant->exists());
    }
}

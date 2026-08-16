<?php

declare(strict_types=1);

/**
 * GT HOMES — Room Controller
 * Handles room listing and room detail page requests.
 */
class RoomController extends BaseController
{
    private RoomBLL $roomBll;

    public function __construct()
    {
        $this->roomBll = new RoomBLL();
    }

    /**
     * Display the rooms listing page.
     * @return array<string, mixed>
     */
    public function index(): array
    {
        // Future: $rooms = $this->roomBll->getActiveRooms();
        return [
            'pageTitle'       => 'Rooms & Suites — ' . APP_NAME,
            'metaDescription' => 'Explore our premium rooms and suites at GT HOMES Holiday Resort.',
            'rooms'           => [],   // populated in later steps
        ];
    }

    /**
     * Display the detail page for a single room.
     *
     * @param string $slug  Room slug from URL (e.g. 'orchid')
     * @return array<string, mixed>
     */
    public function show(string $slug): array
    {
        $slug = slugify($slug);

        // Future: $room = $this->roomBll->getRoomBySlug($slug);
        // Future: if (!$room) { $this->abort(404); }

        return [
            'pageTitle'       => 'Room Details — ' . APP_NAME,
            'metaDescription' => 'View details about this room at GT HOMES Holiday Resort.',
            'slug'            => $slug,
            'room'            => null,   // populated in later steps
        ];
    }
}

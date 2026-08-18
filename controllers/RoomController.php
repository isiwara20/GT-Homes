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
        $rooms = $this->roomBll->getActiveRooms();
        return [
            'pageTitle'       => 'Rooms & Accommodation — ' . APP_NAME,
            'metaDescription' => 'Explore our 5 distinctive rooms at GT HOMES Holiday Resort — Orchid, Dahiliya, Lotus, Daffodil, and Rose. Find your perfect space for rest, privacy, and comfort in Sri Lanka.',
            'rooms'           => $rooms,
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
        $rooms = $this->roomBll->getActiveRooms();
        $targetRoom = null;

        foreach ($rooms as $r) {
            if ($r['slug'] === $slug) {
                $targetRoom = $r;
                break;
            }
        }

        if (!$targetRoom && !empty($rooms)) {
            $targetRoom = $rooms[0];
        }

        $title = ($targetRoom ? $targetRoom['name'] . ' Suite' : 'Room Details') . ' | GT HOMES';
        $desc  = $targetRoom['description'] ?? 'View details about this room at GT HOMES Holiday Resort.';

        return [
            'pageTitle'       => $title,
            'metaDescription' => $desc,
            'slug'            => $slug,
            'room'            => $targetRoom,
            'allRooms'        => $rooms,
        ];
    }
}

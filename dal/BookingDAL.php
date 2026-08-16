<?php

declare(strict_types=1);

/** GT HOMES — Booking DAL (skeleton) */
class BookingDAL extends BaseDAL
{
    /**
     * Insert a new booking enquiry and return its ID.
     *
     * @param  array<string, mixed> $data
     */
    public function insert(array $data): int
    {
        return $this->insertAndGetId(
            'INSERT INTO booking_enquiries
                (full_name, email, phone, check_in_date, check_out_date,
                 guests, room_id, package_id, special_request, contact_method, status)
             VALUES
                (:full_name, :email, :phone, :check_in_date, :check_out_date,
                 :guests, :room_id, :package_id, :special_request, :contact_method, :status)',
            [
                ':full_name'       => $data['full_name'],
                ':email'           => $data['email'],
                ':phone'           => $data['phone'],
                ':check_in_date'   => $data['check_in_date'],
                ':check_out_date'  => $data['check_out_date'],
                ':guests'          => $data['guests'],
                ':room_id'         => $data['room_id']    ?? null,
                ':package_id'      => $data['package_id'] ?? null,
                ':special_request' => $data['special_request'] ?? null,
                ':contact_method'  => $data['contact_method'] ?? 'email',
                ':status'          => 'PENDING',
            ]
        );
    }

    /** @return array<int, array<string, mixed>> */
    public function findAll(): array
    {
        return $this->fetchAll(
            'SELECT * FROM booking_enquiries ORDER BY created_at DESC'
        );
    }
}

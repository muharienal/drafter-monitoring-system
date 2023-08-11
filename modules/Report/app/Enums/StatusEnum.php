<?php

namespace Modules\Report\app\Enums;

enum StatusEnum: string
{
    case PENDING = 'Pending'; // primary
    case PROCESSED = 'Processed'; // secondary

    case ACCEPTED = 'Accepted'; // success
    case REJECTED = 'Rejected'; // warning

    case CLOSED = 'Closed'; // danger

    case BELOM = 'Belom';
    case IP = 'IP';
    case OK = 'Ok';
}

<?php

namespace App\Enums;

use BenSampo\Enum\Enum;

/**
 * @method static static BelumKawin()
 * @method static static Kawin()
 * @method static static CeraiHidup()
 * @method static static CeraiMati()
 * @method static static CeraiMati()
 */
final class MaritalStatus extends Enum
{
    const BelumKawin =   0;
    const Kawin =   1;
    const CeraiHidup = 2;
    const CeraiMati = 3;
}

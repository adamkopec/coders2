<?php
/**
 * Created by PhpStorm.
 * User: adamkopec
 * Date: 18.05.2016
 * Time: 13:35
 */

namespace Coders;


class FireInterceptor
{
    /** @var HotLine */
    private $hotLine;

    /**
     * FireInterceptor constructor.
     * @param HotLine $hotLine
     */
    public function __construct(HotLine $hotLine)
    {
        $this->hotLine = $hotLine;
    }

    public function interceptFire()
    {
        if ($this->fire->isCritical()) {
            $this->hotLine->callMaciek();
        }
    }
}
<?php

namespace thinkphp\contract;

interface Jsonable
{
    public function toJson(int $options = JSON_UNESCAPED_UNICODE): string;
}

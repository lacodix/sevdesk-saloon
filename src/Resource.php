<?php

namespace Lacodix\SevdeskSaloon;

class Resource
{
    public function __construct(
        protected SevdeskSaloon $connector,
    ) {
    }
}

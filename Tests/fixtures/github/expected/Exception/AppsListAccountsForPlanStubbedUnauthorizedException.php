<?php

namespace Github\Exception;

class AppsListAccountsForPlanStubbedUnauthorizedException extends UnauthorizedException
{
    /**
     * @var \Github\Model\BasicError
     */
    private $basicError;
    public function __construct(\Github\Model\BasicError $basicError)
    {
        parent::__construct('Requires Authentication', 401);
        $this->basicError = $basicError;
    }
    public function getBasicError() : \Github\Model\BasicError
    {
        return $this->basicError;
    }
}
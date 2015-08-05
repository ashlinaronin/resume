<?php
class Job
{
    private $company;
    private $title;
    private $start_date;
    private $end_date;
    private $address;
    private $salary;

    function __construct($job_company, $job_title, $job_start_date, $job_end_date, $job_address, $job_salary)
    {
        $this->company = $job_company;
        $this->title = $job_title;
        $this->start_date = $job_start_date;
        $this->end_date = $job_end_date;
        $this->address = $job_address;
        $this->salary = $job_salary;
    }

    function setCompany($new_company)
    {
        $this->company = $new_company;
    }

    function setTitle($new_title)
    {
        $this->title = $new_title;
    }

    function setStartDate($new_start_date)
    {
        $this->start_date = $new_start_date;
    }

    function setEndDate($new_end_date)
    {
        $this->end_date = $new_end_date;
    }

    function setAddress($new_address)
    {
        $this->address = $new_address;
    }

    function setSalary($new_salary)
    {
        $this->salary = $new_salary;
    }

    function getCompany()
    {
        return $this->company;
    }

    function getTitle()
    {
        return $this->title;
    }

    function getStartDate()
    {
        return $this->start_date;
    }

    function getEndDate()
    {
        return $this->end_date;
    }

    function getAddress()
    {
        return $this->address;
    }

    function getSalary()
    {
        return $this->salary;
    }


}

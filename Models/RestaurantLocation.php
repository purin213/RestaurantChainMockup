<?php

namespace Models;

require_once 'Traits/GetterTrait.php';

use Interfaces\FileConvertible;
use Traits\GetterTrait\GetterTrait;

class RestaurantLocation implements FileConvertible
{
    private string $name;
    private string $address;
    private string $city;
    private string $state;
    private string $zipCode;
    private array $employees;
    private bool $isOpen;
    private bool $hasDriveThru;

    use GetterTrait;

    public function __construct(string $name, string $address, string $city, string $state, string $zipCode, array $employees, bool $isOpen, bool $hasDriveThru)
    {
            $this->name = $name;
            $this->address = $address;
            $this->city = $city;
            $this->state = $state;
            $this->zipCode = $zipCode;
            $this->employees = $employees;
            $this->isOpen = $isOpen;
            $this->hasDriveThru = $hasDriveThru;
    }
    public function toString(): string
    {
        return sprintf(
            "Name: %s\nAddress: %s\nCity: %s\nState: %s\nZip Code: %s\nEmployees: %s\nIs Open: %s\nHas Drive through: %s\n",
            $this->name,
            $this->address,
            $this->city,
            $this->state,
            $this->zipCode,
            $this->employees,
            $this->isOpen,
            $this->hasDriveThru,
        );
    }

    public function toHTML()
    {
        return sprintf("
            <div class='restaurant-location-card'>
                <div class='avatar'>SAMPLE</div>
                <h2>%s , since %s</h2>
                <p>%s</p>
                <p>%s</p>
                <p>%s</p>
                <p>%s</p>
                <p>%s</p>
                <p>%s</p>
                <p>%s</p>
                <p>%s</p>
            </div>",
            $this->name,
            $this->address,
            $this->city,
            $this->state,
            $this->zipCode,
            $this->employees,
            $this->isOpen,
            $this->hasDriveThru,
        );
    }

    public function toMarkdown()
    {
        $stringedEmployees = implode(' ', $this->employees);
        return "## Name: {$this->name}
                 - Address: {$this->address}
                 - City: {$this->city}
                 - State: {$this->state}
                 - Zip Code: {$this->zipCode}
                 - Employees: {$stringedEmployees}
                 - Is Open: {$this->isOpen}
                 - Has Drive Through: {$this->hasDriveThru}
                 ";
    }

    public function toArray()
    {
        return [
            "Name" => $this->name,
            "Address" => $this->address,
            "City" => $this->city,
            "State" => $this->state,
            "Zip Code" => $this->zipCode,
            "Employees" => $this->employees,
            "Is Open" => $this->isOpen,
            "Has Drive Through" => $this->hasDriveThru,
        ];
    }
}

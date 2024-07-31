<?php

namespace Medidash\Phpsdk\Entities;


class Pharmacy implements EntityInterface
{
	private int $id;
	private string $name;
	private bool $active;
	private string $practiceNumber;
	private string $bhfPracticeNumber;
	private string $emailAddress;
	private string $contactNumber;
	private string $address;
	private string $province;
	private string $membership;
	private string $idNumber;
	private string $registrationNumber;

	public function getId(): int
	{
		return $this->id;
	}

	public function setId(int $id): void
	{
		$this->id = $id;
	}

	public function getProvince(): string
	{
		return $this->province;
	}

	public function setProvince(string $province): void
	{
		$this->province = $province;
	}

	public function getAddress(): string
	{
		return $this->address;
	}

	public function setAddress(string $address): void
	{
		$this->address = $address;
	}

	public function getContactNumber(): string
	{
		return $this->contactNumber;
	}

	public function setContactNumber(string $contactNumber): void
	{
		$this->contactNumber = $contactNumber;
	}

	public function getEmailAddress(): string
	{
		return $this->emailAddress;
	}

	public function setEmailAddress(string $emailAddress): void
	{
		$this->emailAddress = $emailAddress;
	}

	public function getPracticeNumber(): string
	{
		return $this->practiceNumber;
	}

	public function setPracticeNumber(string $practiceNumber): void
	{
		$this->practiceNumber = $practiceNumber;
	}

	public function getBhfPracticeNumber(): string
	{
		return $this->bhfPracticeNumber;
	}

	public function setBhfPracticeNumber(string $bhfPracticeNumber): void
	{
		$this->bhfPracticeNumber = $bhfPracticeNumber;
	}

	public function isActive(): bool
	{
		return $this->active;
	}

	public function setActive(bool $active): void
	{
		$this->active = $active;
	}

	public function getName(): string
	{
		return $this->name;
	}

	public function setName(string $name): void
	{
		$this->name = $name;
	}

	public function getMembership(): string
	{
		return $this->membership??'';
	}

	public function setMembership(string $membership): void
	{
		$this->membership = $membership;
	}

	public function getIdNumber(): string
	{
		return $this->idNumber??'';
	}

	public function setIdNumber(string $idNumber): void
	{
		$this->idNumber = $idNumber;
	}

	public function getRegistrationNumber(): string
	{
		return $this->registrationNumber;
	}

	public function setRegistrationNumber(string $registrationNumber): void
	{
		$this->registrationNumber = $registrationNumber;
	}



	public function toArray(): array
	{
		return [
			'id' => $this->getId(),
			'name' => $this->getName(),
			'active' => $this->isActive(),
			'practice_number' => $this->getPracticeNumber(),
			'bhf_practice_number' => $this->getBhfPracticeNumber(),
			'email_address' => $this->getEmailAddress(),
			'contact_number' => $this->getContactNumber(),
			'address' => $this->getAddress(),
			'province' => $this->getProvince(),
			'id_number' => $this->getIdNumber(),
			'membership' => $this->getMembership(),
			'registration_number' => $this->getRegistrationNumber()
		];
	}


	public static function fromArray(array $data): self
	{
		$pharmacy = new self();
		$pharmacy->setId($data['id']);
		$pharmacy->setAddress($data['address']);
		$pharmacy->setName($data['name']);
		$pharmacy->setEmailAddress($data['email_address']);
		$pharmacy->setContactNumber($data['contact_number']);
		$pharmacy->setPracticeNumber($data['practice_number']);
		$pharmacy->setBhfPracticeNumber($data['bhf_practice_number']);
		$pharmacy->setProvince($data['province']);
		$pharmacy->setActive($data['active'] == '1');
		$pharmacy->setIdNumber($data['id_number']??'');
		$pharmacy->setMembership($data['membership']??'');
		$pharmacy->setRegistrationNumber($data['registration_number']);

		return $pharmacy;
	}
	

}
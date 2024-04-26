<?php

namespace Medidash\Phpsdk\Collections;

interface CollectionInterface
{
	public function addAll($item): self;
	public function add($item): self;
	public function toArray(): array;
	public function slice(int $offset, int $length): self;
	public function filter(callable $function): self;
	public function findById(int $id): ?self;
	public function first(): ?self;
	public function exists(int $id): bool;
	public function count(): int;
	public function get(int $index): ?self;
	public function remove(int $index): void;
	public function clear(): void;
	public function isEmpty(): bool;
	public function isNotEmpty(): bool;
	public function map(callable $function): self;
}
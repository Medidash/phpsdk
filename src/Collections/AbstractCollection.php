<?php
namespace Medidash\Phpsdk\Collections;

use InvalidArgumentException;


abstract class AbstractCollection extends \ArrayObject
{
	/**
	 * AbstractCollection constructor.
	 * @param array<TKey,TValue> $input
	 * @param int $flags
	 * @param string $iterator_class
	 */
	public function __construct(array $input = [], int $flags = 0, string $iterator_class = \ArrayIterator::class)
	{
		$this->validateInput($input);
		parent::__construct($input, $flags, $iterator_class);
	}

	/**
	 * When extending this class, implement this function to return the fully qualified class name of the objects that
	 * will be stored in this collection
	 *
	 * @return string
	 */
	abstract protected function getCollectionType(): string;

	/**
	 * Validate input array items against the collection type.
	 * @param object|array<mixed> $input
	 * @throws InvalidArgumentException
	 */
	private function validateInput(object|array $input): void
	{
		if (is_array($input)) {
			foreach ($input as $item) {
				$this->validateItem($item);
			}
		} else {
			$this->validateItem($input);
		}
	}

	/**
	 * Validate a single item against the collection type.
	 * @param object|TValue $item
	 * @throws InvalidArgumentException
	 */
	private function validateItem(object $item): void
	{
		$type = $this->getCollectionType();
		if (!($item instanceof $type)) {
			throw new InvalidArgumentException('This collection only accepts ' . $type);
		}
	}

	/**
	 * @param TKey|null $key
	 * @param TValue $value
	 */
	public function offsetSet($key, $value): void
	{
		$this->validateItem($value);
		parent::offsetSet($key, $value);
	}

	/**
	 * Exchange the array for another one, and validate its items.
	 *
	 * @param array<mixed>|object $input
	 * @return array<TKey, TValue>
	 * @throws InvalidArgumentException
	 */
	public function exchangeArray($input): array
	{
		$this->validateInput($input);
		return parent::exchangeArray($input);
	}
}

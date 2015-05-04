<?php
/**
 * @category	Onedrop
 * @package		Onedrop\Customer\App\Common\Entities
 * @version		0.1
 * @author		Andreas Winter <awinter@1drop.de>
 * @copyright	Copyright (c) 2015 Onedrop Solutions GmbH & Co. KG (http://www.1drop.de)
 */

namespace Onedrop\Customer\App\Common\Entities;
require_once(__DIR__.'../../../../../../vendor/knplabs/doctrine-behaviors/src/Model/Tree/NodeInterface.php');

/**
 * @MappedSuperclass
 * @HasLifecycleCallbacks
 */
abstract class AbstractEntity {

	/**
	 * @var \DateTime $createdAt
	 * @Column(name="created_at", type="date", nullable=false)
	 */
	protected $createdAt;

	/**
	 * @var \DateTime $updatedAt
	 * @Column(name="updated_at", type="date", nullable=false)
	 */
	protected $updatedAt;

	/**
	 * @var int $deleted
	 * @Column(name="deleted", type="integer", nullable=false)
	 */
	protected $deleted = 0;

	/**
	 * @return \DateTime
	 */
	public function getCreatedAt() {
		return $this->createdAt;
	}

	/**
	 * @param \DateTime $createdAt
	 */
	public function setCreatedAt($createdAt) {
		$this->createdAt = $createdAt;
	}

	/**
	 * @return \DateTime
	 */
	public function getUpdatedAt() {
		return $this->updatedAt;
	}

	/**
	 * @param \DateTime $updatedAt
	 */
	public function setUpdatedAt($updatedAt) {
		$this->updatedAt = $updatedAt;
	}

	/**
	 * @return int
	 */
	public function getDeleted() {
		return $this->deleted;
	}

	/**
	 * @param int $deleted
	 */
	public function setDeleted($deleted) {
		$this->deleted = $deleted;
	}

	/**
	 * @PrePersist
	 * @PreUpdate
	 */
	public function updateTimestamps() {
		$this->setUpdatedAt(new \DateTime('now'));

		if ($this->getCreatedAt() == null) {
			$this->setCreatedAt(new \DateTime('now'));
		}
	}

	/**
	 * @param array $array
	 * @return AbstractEntity
	 */
	public function fromArray(array $array = array()) {
		foreach ($array as $key => $value) {
			$method = 'set' . ucfirst($key);
			if (method_exists($this, $method)) {
				$this->$method($value);
			}
		}
		return $this;
	}
}

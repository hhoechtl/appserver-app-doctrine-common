<?php
/**
 * @category	Onedrop
 * @package		Onedrop\Customer\App\Common\Entities
 * @subpackage	Stylecard
 * @version		0.1
 * @author		Andreas Winter <awinter@1drop.de>
 * @copyright	Copyright (c) 2015 Onedrop Solutions GmbH & Co. KG (http://www.1drop.de)
 */

namespace Onedrop\Customer\App\Common\Entities\Stylecard;
require_once(__DIR__.'/../AbstractEntity.php'); use Onedrop\Customer\App\Common\Entities\AbstractEntity;

/**
 * @Entity
 * @Table(name="stylecard_layout")
 */
class Layout extends AbstractEntity {

	/**
	 * @var int $id
	 * @Id
	 * @GeneratedValue(strategy="IDENTITY")
	 * @Column(name="id", type="integer", nullable=false)
	 */
	protected $id;

	/**
	 * @var string $title
	 * @Column(name="title", type="string", nullable=false)
	 */
	protected $title;

	/**
	 * @var string $templateFile
	 * @Column(name="template_file", type="string", nullable=false)
	 */
	protected $templateFile;

	/**
	 * @var int $slotCount
	 * @Column(name="slot_count", type="integer", nullable=false)
	 */
	protected $slotCount;

	/**
	 * INVERSE SIDE
	 * @var ArrayCollection $slots
	 * @OneToMany(targetEntity="Onedrop\Customer\App\Common\Entities\Stylecard\Slot", mappedBy="layout")
	 */
	protected $slots;

	public function __construct() {
		$this->slots = new ArrayCollection();
	}

	/**
	 * @return int
	 */
	public function getId() {
		return $this->id;
	}

	/**
	 * @return string
	 */
	public function getTitle() {
		return $this->title;
	}

	/**
	 * @param string $title
	 */
	public function setTitle($title) {
		$this->title = $title;
	}

	/**
	 * @return string
	 */
	public function getTemplateFile() {
		return $this->templateFile;
	}

	/**
	 * @param string $templateFile
	 */
	public function setTemplateFile($templateFile) {
		$this->templateFile = $templateFile;
	}

	/**
	 * @return int
	 */
	public function getSlotCount() {
		return $this->slotCount;
	}

	/**
	 * @param int $slotCount
	 */
	public function setSlotCount($slotCount) {
		$this->slotCount = $slotCount;
	}

	/**
	 * @return ArrayCollection
	 */
	public function getSlots() {
		return $this->slots;
	}

	/**
	 * @param ArrayCollection $slots
	 */
	public function setSlots($slots) {
		$this->slots = $slots;
	}

}
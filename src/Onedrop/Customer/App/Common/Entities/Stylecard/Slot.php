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
 * @Table(name="stylecard_slot")
 */
class Slot extends AbstractEntity {

	/**
	 * @var int $id
	 * @Id
	 * @GeneratedValue(strategy="IDENTITY")
	 * @Column(name="id", type="integer", nullable=false)
	 */
	protected $id;

	/**
	 * @var int $layoutId
	 * @Column(name="layout_id", type="integer", nullable=false)
	 */
	protected $layoutId;

	/**
	 * @var int $position
	 * @Column(name="position", type="integer", nullable=false)
	 */
	protected $position;

	/**
	 * OWNING SIDE
	 * @var \Onedrop\Customer\App\Common\Entities\Stylecard\Layout
	 * @ManyToOne(targetEntity="Onedrop\Customer\App\Common\Entities\Stylecard\Layout")
	 * @JoinColumn(name="layout_id", referencedColumnName="id")
	 */
	protected $layout;

	/**
	 * @var ArrayCollection $filters
	 * @ManyToMany(targetEntity="Onedrop\Customer\App\Common\Entities\Attribute\Filter")
	 * @JoinTable(name="slots_filters",
	 *      joinColumns={@JoinColumn(name="slot_id", referencedColumnName="id")},
	 *      inverseJoinColumns={@JoinColumn(name="filter_id", referencedColumnName="id")}
	 *      )
	 */
	protected $filters;

	public function __construct() {
		$this->filters = new ArrayCollection();
	}

	/**
	 * @return int
	 */
	public function getId() {
		return $this->id;
	}

	/**
	 * @return int
	 */
	public function getLayoutId() {
		return $this->layoutId;
	}

	/**
	 * @param int $layoutId
	 */
	public function setLayoutId($layoutId) {
		$this->layoutId = $layoutId;
	}

	/**
	 * @return int
	 */
	public function getPosition() {
		return $this->position;
	}

	/**
	 * @param int $position
	 */
	public function setPosition($position) {
		$this->position = $position;
	}

	/**
	 * @return Layout
	 */
	public function getLayout() {
		return $this->layout;
	}

	/**
	 * @param Layout $layout
	 */
	public function setLayout($layout) {
		$this->layout = $layout;
	}

	/**
	 * @return ArrayCollection
	 */
	public function getFilters() {
		return $this->filters;
	}

	/**
	 * @param ArrayCollection $filters
	 */
	public function setFilters($filters) {
		$this->filters = $filters;
	}

}
<?php

namespace AppBundle\Entity;

use JsonSerializable;
use Doctrine\ORM\Mapping as ORM;
use AppBundle\Entity\Tier;
use Symfony\Component\PropertyAccess\PropertyAccess;

/**
 * Estimate
 *
 * @ORM\Table(name="estimates")
 * @ORM\Entity(repositoryClass="AppBundle\Entity\EstimateRepository")
 */
class Estimate //extends JsonSerializable
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var integer
     *
     * @ORM\Column(name="totalArtefacts", type="integer")
     */
    private $totalArtefacts;

    /**
     * @var integer
     *
     * @ORM\Column(name="removedArtefacts", type="integer")
     */
    private $removedArtefacts;

    /**
     * @var integer
     *
     * @ORM\Column(name="foldedArtefacts", type="integer")
     */
    private $foldedArtefacts;

    /**
     * @var array
     *
     * @ORM\Column(name="artefactsInRange", type="array")
     */
    private $artefactsInRange;

    /**
     * @var array
     *
     * @ORM\Column(name="priceForTierPerMonth", type="array")
     */
    private $priceForTierPerMonth;

    /**
     * @var integer
     *
     * @ORM\Column(name="duCheckSum", type="integer")
     */
    private $duCheckSum;

    /**
     * @var string
     *
     * @ORM\Column(name="pricePerMonth", type="decimal")
     */
    private $pricePerMonth;

    /**
     * @var string
     *
     * @ORM\Column(name="avgPricePerDrawingPerMonth", type="decimal")
     */
    private $avgPricePerDrawingPerMonth;

    /**
     * @var string
     *
     * @ORM\Column(name="pricePerAnnum", type="decimal")
     */
    private $pricePerAnnum;


    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set totalArtefacts
     *
     * @param integer $totalArtefacts
     * @return Estimate
     */
    public function setTotalArtefacts($totalArtefacts)
    {
        $this->totalArtefacts = $totalArtefacts;

        return $this;
    }

    /**
     * Get totalArtefacts
     *
     * @return integer
     */
    public function getTotalArtefacts()
    {
        return $this->totalArtefacts;
    }

    /**
     * Set removedArtefacts
     *
     * @param integer $removedArtefacts
     * @return Estimate
     */
    public function setRemovedArtefacts($removedArtefacts)
    {
        $this->removedArtefacts = $removedArtefacts;

        return $this;
    }

    /**
     * Get removedArtefacts
     *
     * @return integer
     */
    public function getRemovedArtefacts()
    {
        return $this->removedArtefacts;
    }

    /**
     * Set foldedArtefacts
     *
     * @param integer $foldedArtefacts
     * @return Estimate
     */
    public function setFoldedArtefacts($foldedArtefacts)
    {
        $this->foldedArtefacts = $foldedArtefacts;

        return $this;
    }

    /**
     * Get foldedArtefacts
     *
     * @return integer
     */
    public function getFoldedArtefacts()
    {
        return $this->foldedArtefacts;
    }

    /**
     * Set artefactsInRange
     *
     * @param array $artefactsInRange
     * @return Estimate
     */
    public function setArtefactsInRange($artefactsInRange)
    {
        $this->artefactsInRange = $artefactsInRange;

        return $this;
    }

    /**
     * Get artefactsInRange
     *
     * @return array
     */
    public function getArtefactsInRange()
    {
        return $this->artefactsInRange;
    }

    /**
     * Set priceForTierPerMonth
     *
     * @param array $priceForTierPerMonth
     * @return Estimate
     */
    public function setPriceForTierPerMonth($priceForTierPerMonth)
    {
        $this->priceForTierPerMonth = $priceForTierPerMonth;

        return $this;
    }

    /**
     * Get priceForTierPerMonth
     *
     * @return array
     */
    public function getPriceForTierPerMonth()
    {
        return $this->priceForTierPerMonth;
    }

    /**
     * Set duCheckSum
     *
     * @param integer $duCheckSum
     * @return Estimate
     */
    public function setDuCheckSum($duCheckSum)
    {
        $this->duCheckSum = $duCheckSum;

        return $this;
    }

    /**
     * Get duCheckSum
     *
     * @return integer
     */
    public function getDuCheckSum()
    {
        return $this->duCheckSum;
    }

    /**
     * Set pricePerMonth
     *
     * @param string $pricePerMonth
     * @return Estimate
     */
    public function setPricePerMonth($pricePerMonth)
    {
        $this->pricePerMonth = $pricePerMonth;

        return $this;
    }

    /**
     * Get pricePerMonth
     *
     * @return string
     */
    public function getPricePerMonth()
    {
        return $this->pricePerMonth;
    }

    /**
     * Set avgPricePerDrawingPerMonth
     *
     * @param string $avgPricePerDrawingPerMonth
     * @return Estimate
     */
    public function setAvgPricePerDrawingPerMonth($avgPricePerDrawingPerMonth)
    {
        $this->avgPricePerDrawingPerMonth = $avgPricePerDrawingPerMonth;

        return $this;
    }

    /**
     * Get avgPricePerDrawingPerMonth
     *
     * @return string
     */
    public function getAvgPricePerDrawingPerMonth()
    {
        return $this->avgPricePerDrawingPerMonth;
    }

    /**
     * Set pricePerAnnum
     *
     * @param string $pricePerAnnum
     * @return Estimate
     */
    public function setPricePerAnnum($pricePerAnnum)
    {
        $this->pricePerAnnum = $pricePerAnnum;

        return $this;
    }

    /**
     * Get pricePerAnnum
     *
     * @return string
     */
    public function getPricePerAnnum()
    {
        return $this->pricePerAnnum;
    }

//    public function jsonSerialize()
//    {
//      return array(
//          'id' => $this->id,
//		  'total_artefacts' => $this->totalArtefacts,
//		  'removed_artefacts' => $this->removedArtefacts,
//		  'folded_artefacts' => $this->foldedArtefacts,
//		  'artefacts_in_range' => $this->artefactsInRange,
//		  'price_for_tier_per_month' => $this->priceForTierPerMonth,
//		  'du_checksum' => $this->duCheckSum,
//		  'price_per_month' => $this->pricePerMonth,
//		  'avg_price_per_drawing_per_month' => $this->avgPricePerDrawingPerMonth,
//		  'price_per_annum' => $this->pricePerAnnum,
//      );
//    }

	public function totalUnits($estimated)
	{
	  return $estimated - $this->removedArtefacts - $this->foldedArtefacts;
	}

	public function removedUnits($estimated, $duplicates)
	{
	  return $estimated * $duplicates;
	}

	public function foldedUnits($estimated, $removed, $versions)
	{
	  return ($estimated - $removed) * $versions;
	}

	public function negToZero($int)
	{
	  if ($int < 0) {
		return 0;
	  } else {
		return $int;
	  }
	}

	public function tierify($units, $maxRange)
	{
	  if (is_null($units['left']) || $units['left'] != 0) {
		$units['left'] = $this->negToZero($units['total'] - $maxRange);
		$units['inTier'] = $units['total'] - $units['left'] - $units['inTier'];
	  } elseif ($units['left'] == 0) {
		$units['inTier'] = 0;
	  }
	  return $units;
	}

	public function duCheckSumFunc($total, $unitsPerTiers)
	{
	  return $total - array_sum($unitsPerTiers);
	}

	public function priceForTierPerMonthFunc($unitsPTier, $price)
	{
	  return $unitsPTier * $price;
	}

	public function pricePerMonthFunc($priceTiersMonth)
	{
	  return array_sum($priceTiersMonth);
	}

	public function avgPricePerDrawingPerMonthFunc($total, $pricePerMonth)
	{
	  return $pricePerMonth / $total;
	}

	public function pricePerAnnumFunc($pricePerMonth)
	{
	  return $pricePerMonth * 12;
	}


}

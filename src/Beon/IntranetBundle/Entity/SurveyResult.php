<?php

namespace Beon\IntranetBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * SurveyResult
 */
class SurveyResult
{
	const EMPTY_LABEL = 'k.A.';

    /**
     * @var integer
     */
    private $id;


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
     * @var \DateTime
     */
    private $date;

    /**
     * @var string
     */
    private $timeIn;

    /**
     * @var string
     */
    private $timeOut;

    /**
     * @var integer
     */
    private $frequency;

    /**
     * @var integer
     */
    private $welcome;

    /**
     * @var integer
     */
    private $drinks;

    /**
     * @var integer
     */
    private $drinksValue;

    /**
     * @var integer
     */
    private $drinksWait;

    /**
     * @var integer
     */
    private $food;

    /**
     * @var integer
     */
    private $foodValue;

    /**
     * @var integer
     */
    private $foodWait;

    /**
     * @var integer
     */
    private $service;

    /**
     * @var integer
     */
    private $music;

    /**
     * @var integer
     */
    private $atmosphere;

    /**
     * @var integer
     */
    private $happyHour;

    /**
     * @var integer
     */
    private $enchiladaHour;

    /**
     * @var integer
     */
    private $casinoMexicano;

    /**
     * @var integer
     */
    private $ladiesNight;

    /**
     * @var integer
     */
    private $overall;

    /**
     * @var \Beon\IntranetBundle\Entity\Customer
     */
    private $customer;

	public static function getChoices($name) {
		switch ($name) {
			case 'frequency': 
				return ['erstes Mal', 'selten', 'häufig'];
			case 'music': 
				return ['zu leise', 'okay', 'zu laut'];
			case 'drinksValue': case 'drinksWait': case 'foodValue': case 'foodWait':
				return ['nicht angemessen', 'angemessen'];
			case 'happyHour': case 'enchiladaHour': case 'casinoMexicano': case 'ladiesNight':
                return ['ja', 'nein'];
			case 'welcome':
				return self::getIntegerChoices(3);
			case 'drinks': case 'food': case 'service': case 'atmosphere': 
				return self::getIntegerChoices(4);
			case 'overall': 
				return self::getIntegerChoices(6);
		}
	}

	private static function getIntegerChoices($max) {
		$result = array();

		for ($i = 1; $i <= $max; $i++) {
            $result[$i] = $i;
        }

        return $result;
	}


	public function getLabel($field) {
		return $this->$field === null ? self::EMPTY_LABEL : self::getChoices($field)[$this->$field];
	}


    /**
     * Set date
     *
     * @param \DateTime $date
     * @return SurveyResult
     */
    public function setDate($date)
    {
        $this->date = $date;

        return $this;
    }

    /**
     * Get date
     *
     * @return \DateTime 
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * Set timeIn
     *
     * @param string $timeIn
     * @return SurveyResult
     */
    public function setTimeIn($timeIn)
    {
        $this->timeIn = $timeIn;

        return $this;
    }

    /**
     * Get timeIn
     *
     * @return string 
     */
    public function getTimeIn()
    {
        return $this->timeIn;
    }

    /**
     * Set timeOut
     *
     * @param string $timeOut
     * @return SurveyResult
     */
    public function setTimeOut($timeOut)
    {
        $this->timeOut = $timeOut;

        return $this;
    }

    /**
     * Get timeOut
     *
     * @return string 
     */
    public function getTimeOut()
    {
        return $this->timeOut;
    }

    /**
     * Set frequency
     *
     * @param integer $frequency
     * @return SurveyResult
     */
    public function setFrequency($frequency)
    {
        $this->frequency = $frequency;

        return $this;
    }

    /**
     * Get frequency
     *
     * @return integer 
     */
    public function getFrequency()
    {
        return $this->frequency;
    }

    /**
     * Set welcome
     *
     * @param integer $welcome
     * @return SurveyResult
     */
    public function setWelcome($welcome)
    {
        $this->welcome = $welcome;

        return $this;
    }

    /**
     * Get welcome
     *
     * @return integer 
     */
    public function getWelcome()
    {
        return $this->welcome;
    }

    /**
     * Set drinks
     *
     * @param integer $drinks
     * @return SurveyResult
     */
    public function setDrinks($drinks)
    {
        $this->drinks = $drinks;

        return $this;
    }

    /**
     * Get drinks
     *
     * @return integer 
     */
    public function getDrinks()
    {
        return $this->drinks;
    }

    /**
     * Set drinksValue
     *
     * @param integer $drinksValue
     * @return SurveyResult
     */
    public function setDrinksValue($drinksValue)
    {
        $this->drinksValue = $drinksValue;

        return $this;
    }

    /**
     * Get drinksValue
     *
     * @return integer 
     */
    public function getDrinksValue()
    {
        return $this->drinksValue;
    }

    /**
     * Set drinksWait
     *
     * @param integer $drinksWait
     * @return SurveyResult
     */
    public function setDrinksWait($drinksWait)
    {
        $this->drinksWait = $drinksWait;

        return $this;
    }

    /**
     * Get drinksWait
     *
     * @return integer 
     */
    public function getDrinksWait()
    {
        return $this->drinksWait;
    }

    /**
     * Set food
     *
     * @param integer $food
     * @return SurveyResult
     */
    public function setFood($food)
    {
        $this->food = $food;

        return $this;
    }

    /**
     * Get food
     *
     * @return integer 
     */
    public function getFood()
    {
        return $this->food;
    }

    /**
     * Set foodValue
     *
     * @param integer $foodValue
     * @return SurveyResult
     */
    public function setFoodValue($foodValue)
    {
        $this->foodValue = $foodValue;

        return $this;
    }

    /**
     * Get foodValue
     *
     * @return integer 
     */
    public function getFoodValue()
    {
        return $this->foodValue;
    }

    /**
     * Set foodWait
     *
     * @param integer $foodWait
     * @return SurveyResult
     */
    public function setFoodWait($foodWait)
    {
        $this->foodWait = $foodWait;

        return $this;
    }

    /**
     * Get foodWait
     *
     * @return integer 
     */
    public function getFoodWait()
    {
        return $this->foodWait;
    }

    /**
     * Set service
     *
     * @param integer $service
     * @return SurveyResult
     */
    public function setService($service)
    {
        $this->service = $service;

        return $this;
    }

    /**
     * Get service
     *
     * @return integer 
     */
    public function getService()
    {
        return $this->service;
    }

    /**
     * Set music
     *
     * @param integer $music
     * @return SurveyResult
     */
    public function setMusic($music)
    {
        $this->music = $music;

        return $this;
    }

    /**
     * Get music
     *
     * @return integer 
     */
    public function getMusic()
    {
        return $this->music;
    }

    /**
     * Set atmosphere
     *
     * @param integer $atmosphere
     * @return SurveyResult
     */
    public function setAtmosphere($atmosphere)
    {
        $this->atmosphere = $atmosphere;

        return $this;
    }

    /**
     * Get atmosphere
     *
     * @return integer 
     */
    public function getAtmosphere()
    {
        return $this->atmosphere;
    }

    /**
     * Set happyHour
     *
     * @param integer $happyHour
     * @return SurveyResult
     */
    public function setHappyHour($happyHour)
    {
        $this->happyHour = $happyHour;

        return $this;
    }

    /**
     * Get happyHour
     *
     * @return integer 
     */
    public function getHappyHour()
    {
        return $this->happyHour;
    }

    /**
     * Set enchiladaHour
     *
     * @param integer $enchiladaHour
     * @return SurveyResult
     */
    public function setEnchiladaHour($enchiladaHour)
    {
        $this->enchiladaHour = $enchiladaHour;

        return $this;
    }

    /**
     * Get enchiladaHour
     *
     * @return integer 
     */
    public function getEnchiladaHour()
    {
        return $this->enchiladaHour;
    }

    /**
     * Set casinoMexicano
     *
     * @param integer $casinoMexicano
     * @return SurveyResult
     */
    public function setCasinoMexicano($casinoMexicano)
    {
        $this->casinoMexicano = $casinoMexicano;

        return $this;
    }

    /**
     * Get casinoMexicano
     *
     * @return integer 
     */
    public function getCasinoMexicano()
    {
        return $this->casinoMexicano;
    }

    /**
     * Set ladiesNight
     *
     * @param integer $ladiesNight
     * @return SurveyResult
     */
    public function setLadiesNight($ladiesNight)
    {
        $this->ladiesNight = $ladiesNight;

        return $this;
    }

    /**
     * Get ladiesNight
     *
     * @return integer 
     */
    public function getLadiesNight()
    {
        return $this->ladiesNight;
    }

    /**
     * Set overall
     *
     * @param integer $overall
     * @return SurveyResult
     */
    public function setOverall($overall)
    {
        $this->overall = $overall;

        return $this;
    }

    /**
     * Get overall
     *
     * @return integer 
     */
    public function getOverall()
    {
        return $this->overall;
    }

    /**
     * Set customer
     *
     * @param \Beon\IntranetBundle\Entity\Customer $customer
     * @return SurveyResult
     */
    public function setCustomer(\Beon\IntranetBundle\Entity\Customer $customer)
    {
        $this->customer = $customer;

        return $this;
    }

    /**
     * Get customer
     *
     * @return \Beon\IntranetBundle\Entity\Customer 
     */
    public function getCustomer()
    {
        return $this->customer;
    }
}

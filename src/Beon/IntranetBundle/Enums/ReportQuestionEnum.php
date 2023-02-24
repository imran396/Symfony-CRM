<?php
/**
 * @author: Vince
 * Enums class for survey result fields.
 */

namespace Beon\IntranetBundle\Enums;

use Symfony\Component\Config\Definition\Exception\Exception;
use Beon\IntranetBundle\Entity\SurveyResult;

class ReportQuestionEnum extends BasicEnum
{

    const ORDINAL		= 0; //Avg. will be calculated for ordinal values
    const NOMINAL		= 1; //%age will be calculated for nominal values
	const LEN_OF_STAY	= 2;
	const TIME_IN		= 'timeIn';            
	const TIME_OUT		= 'timeOut';           
	const FREQ			= 'frequency';                
	const WELCOME		= 'welcome';
	const DRINK			= 'drinks';
	const DRINK_VAL		= 'drinksValue';
	const DRINK_WAIT	= 'drinksWait';
	const FOOD			= 'food';
	const FOOD_VAL		= 'foodValue';       
	const FOOD_WAIT		= 'foodWait';
	const SERVICE		= 'service';
	const MUSIC			= 'music';
	const ATMOSPHERE	= 'atmosphere';
	const HAPPY_HOUR	= 'happyHour';
	const ENCH_HOUR		= 'enchiladaHour';
	const CASINO		= 'casinoMexicano';
	const LADIES_NIGHT	= 'ladiesNight';
	const OVERALL		= 'overall';
	

    public static function getTitles()
    {
		return [
			self::TIME_IN		=> 'Time In/Out',            
			self::FREQ			=> 'Frequency',                
			self::WELCOME		=> 'Welcome',
			self::DRINK			=> 'Drinks',
			self::DRINK_VAL		=> 'Drinks Value',
			self::DRINK_WAIT	=> 'Drinks Wait',
			self::FOOD			=> 'Food',
			self::FOOD_VAL		=> 'Food Value',       
			self::FOOD_WAIT		=> 'Food Wait',
			self::SERVICE		=> 'Service',
			self::MUSIC			=> 'Music',
			self::ATMOSPHERE	=> 'Atmosphere',
			self::HAPPY_HOUR	=> 'Happy Hour',
			self::ENCH_HOUR		=> 'Enchilada Hour',
			self::CASINO		=> 'Casino Mexicano',
			self::LADIES_NIGHT	=> 'Ladies Night',
			self::OVERALL		=> 'Overall',
        ];
    }

    /**
     * @author: Vince
     * Get fields for question type.
     */
    public static function getQuestionByType( $type )
    {
        $types = array(
            self::LEN_OF_STAY => self::TIME_IN,
            self::NOMINAL => array(
                self::FREQ, self::DRINK_VAL, self::DRINK_WAIT,
                self::FOOD_VAL, self::FOOD_WAIT, self::MUSIC,
                self::HAPPY_HOUR, self::CASINO, self::LADIES_NIGHT, 
                self::ENCH_HOUR
            ),
            self::ORDINAL => array(
                self::WELCOME, self::DRINK, self::FOOD,
                self::SERVICE, self::ATMOSPHERE,
                self::OVERALL
            )
        );
        return isset( $types[$type] )? $types[$type] : FALSE;
    }

     /**
     * @author: Vince
     * Get all the available questions.
     */
    public static function getAllQuestions( )
    {
        $questions = array(
            self::FREQ, self::WELCOME, self::DRINK, self::DRINK_VAL,
            self::DRINK_WAIT, self::FOOD, self::FOOD_VAL, self::FOOD_WAIT,
            self::SERVICE, self::MUSIC, self::ATMOSPHERE, self::HAPPY_HOUR,
            self::ENCH_HOUR, self::CASINO, self::LADIES_NIGHT, self::OVERALL,  
        );
        return $questions;
    }

	/**
     * @author: Vince
     * Get the type of question from the question.
     */
    public static function getQuestionType( $question )
	{
		switch( $question )
		{
			case self::TIME_IN:
				return self::LEN_OF_STAY;
				break;
			case self::FREQ:
			case self::DRINK_VAL:
			case self::DRINK_WAIT:
			case self::FOOD_VAL:
			case self::FOOD_WAIT:
			case self::MUSIC:
			case self::HAPPY_HOUR:
			case self::CASINO:
			case self::LADIES_NIGHT:
            case self::ENCH_HOUR:
				return self::NOMINAL;
				break;
			case self::WELCOME:
			case self::DRINK:
			case self::FOOD:
			case self::SERVICE:
			case self::ATMOSPHERE:
			case self::OVERALL:
				return self::ORDINAL;
				break;
		}
	}

    /**
     * @author: Vince
     * Get the label for question/field
     */
    public static function getChoiceLabel($question, $choice)
    {
        $data = array();
        $choices = SurveyResult::getChoices( $question );
        
        $data['type'] = self::getQuestionType( $question );
        
        if( isset( $choices[$choice] ) )
        {
            $data['choice'] = $choices[$choice];
        } 
        else 
        {
            $data['choice'] = '';
        }
		return $data;
    }

}

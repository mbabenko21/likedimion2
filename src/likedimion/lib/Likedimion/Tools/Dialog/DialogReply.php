<?php
/**
 * Created by PhpStorm.
 * User: Maksim
 * Date: 08.12.13
 * Time: 0:31
 */

namespace Likedimion\Tools\Dialog;


use Likedimion\Game;

class DialogReply {
    /** @var  string */
    protected $text;
    /** @var \Likedimion\Database\Entity\Player  */
    protected $player;

    public function __construct(){
        $this->player = Game::getInstance()->getAuthToken()->getAccount()->getCurrentPlayer();
    }

    public function getText(){
        $text = $this->text;
        $text = preg_replace_callback("/{php}(.*){\/php}/", array($this, 'phpInject'), $text);
        $text = preg_replace_callback("/{%(.*)%}/", array($this, 'baseFieldInject'), $text);
        $text = preg_replace_callback("/{charFiled}(.*){\/charFiled}/", array($this, 'charFieldInject'), $text);
        $text = preg_replace_callback("/{statFiled}(.*){\/statFiled}/", array($this, 'statFieldInject'), $text);
        $text = preg_replace_callback("/{warFiled}(.*){\/warFiled}/", array($this, 'warFieldInject'), $text);
        $text = str_replace('\n', '<br/>', $text);
        $this->text = $text;
        return $this->text;
    }

    /**
     * @return \Likedimion\Database\Entity\Player
     */
    public function getPlayer()
    {
        return $this->player;
    }

    protected function phpInject($string){
        $text = eval($text[1]);
        return $text;
    }

    protected function charFieldInject($string) {
        $char = $this->getPlayer()->getCharParameters();

        $method ="get".ucfirst(strtolower($string[1]));
        if(method_exists($char, $method)){
            return $char->$method();
        } else {
            return "";
        }
    }

    protected function statFieldInject($string) {
        $stat = $this->getPlayer()->getStatistic();
        $method ="get".ucfirst(strtolower($string[1]));
        if(method_exists($stat, $method)){
            return $stat->$method();
        } else {
            return "";
        }
    }

    protected function warFieldInject($string) {
        $war = $this->getPlayer()->getWar();
        $method ="get".ucfirst(strtolower($string[1]));
        if(method_exists($war, $method)){
            return $war->$method();
        } else {
            return "";
        }
    }

    protected function baseFieldInject($string){
        $method ="get".ucfirst(strtolower($string[1]));
        if(method_exists($this->player, $method)){
            return $this->player->$method();
        } else {
            return "";
        }
    }
} 
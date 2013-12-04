<?php
/**
 * Created by PhpStorm.
 * User: Maksim
 * Date: 05.12.13
 * Time: 0:02
 */

namespace Likedimion\Tools\Helper;


use Likedimion\Service\TranslationsHelperInterface;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Helper\DialogHelper;
use Symfony\Component\Console\Helper\InputAwareHelper;
use Symfony\Component\Console\Output\OutputInterface;

class LikedimionCommandHelper extends InputAwareHelper {
    /**
     * @param Command $command
     * @param OutputInterface $output
     * @return AuthDataHelper
     */
    public function authDialog(Command $command, OutputInterface $output){
        /** @var $dialog DialogHelper */
        $dialog = $command->getHelperSet()->get("dialog");
        /** @var $translations TranslationsHelperInterface */
        $translations = $command->getHelper("translations");
        $login = $dialog->ask(
            $output,
            $translations->getLine("login"),
            false
        );
        $password = $dialog->askHiddenResponse(
            $output,
            $translations->getLine("password"),
            "password"
        );

        $rememberMe = $dialog->askConfirmation(
            $output,
            $translations->getLine("remember_me")." (y/n)",
            false
        );
        $authData = new AuthDataHelper();
        $authData->setLogin($login);
        $authData->setPassword($password);
        $authData->setRememberMe($rememberMe);
        return $authData;
    }

    /**
     * Returns the canonical name of this helper.
     *
     * @return string The canonical name
     *
     * @api
     */
    public function getName()
    {
        return "helpers";
    }
}
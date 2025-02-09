<?php

namespace ContainerB4RiEu4;


use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/**
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class getConsole_Command_TranslationLintService extends App_KernelDevDebugContainer
{
    /**
     * Gets the private 'console.command.translation_lint' shared service.
     *
     * @return \Symfony\Component\Translation\Command\TranslationLintCommand
     */
    public static function do($container, $lazyLoad = true)
    {
        include_once \dirname(__DIR__, 4).''.\DIRECTORY_SEPARATOR.'vendor'.\DIRECTORY_SEPARATOR.'symfony'.\DIRECTORY_SEPARATOR.'console'.\DIRECTORY_SEPARATOR.'Command'.\DIRECTORY_SEPARATOR.'Command.php';
        include_once \dirname(__DIR__, 4).''.\DIRECTORY_SEPARATOR.'vendor'.\DIRECTORY_SEPARATOR.'symfony'.\DIRECTORY_SEPARATOR.'translation'.\DIRECTORY_SEPARATOR.'Command'.\DIRECTORY_SEPARATOR.'TranslationLintCommand.php';

        $container->privates['console.command.translation_lint'] = $instance = new \Symfony\Component\Translation\Command\TranslationLintCommand(($container->services['translator'] ?? self::getTranslatorService($container)), []);

        $instance->setName('lint:translations');
        $instance->setDescription('Lint translations files syntax and outputs encountered errors');

        return $instance;
    }
}

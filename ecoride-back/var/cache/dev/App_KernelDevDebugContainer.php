<?php

// This file has been auto-generated by the Symfony Dependency Injection Component for internal use.

if (\class_exists(\ContainerJ6hqstB\App_KernelDevDebugContainer::class, false)) {
    // no-op
} elseif (!include __DIR__.'/ContainerJ6hqstB/App_KernelDevDebugContainer.php') {
    touch(__DIR__.'/ContainerJ6hqstB.legacy');

    return;
}

if (!\class_exists(App_KernelDevDebugContainer::class, false)) {
    \class_alias(\ContainerJ6hqstB\App_KernelDevDebugContainer::class, App_KernelDevDebugContainer::class, false);
}

return new \ContainerJ6hqstB\App_KernelDevDebugContainer([
    'container.build_hash' => 'J6hqstB',
    'container.build_id' => 'cce7e6f4',
    'container.build_time' => 1739065483,
    'container.runtime_mode' => \in_array(\PHP_SAPI, ['cli', 'phpdbg', 'embed'], true) ? 'web=0' : 'web=1',
], __DIR__.\DIRECTORY_SEPARATOR.'ContainerJ6hqstB');

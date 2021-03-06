<?php

namespace Gameap\Repositories\Modules;

use Gameap\Exceptions\GameapException;
use Gameap\Models\Modules\LaravelModule;
use Illuminate\Contracts\Foundation\Application;
use Nwidart\Modules\Contracts\RepositoryInterface;
use Nwidart\Modules\Module;

class LaravelModulesRepository
{
    /** @var Application */
    private $laravel;

    public function __construct(Application $laravel)
    {
        $this->laravel = $laravel;
    }

    public function getModulesVersions(): array
    {
        $modules = [];
        /** @var Module $module */
        foreach ($this->getNvidardRepository()->all() as $module) {
            $attributes                       = $module->json()->getAttributes();
            $modules[$module->getLowerName()] = $attributes['version'] ?? '';
        }

        return $modules;
    }

    public function getCached(): array
    {
        $modules    = [];
        $repository = $this->getNvidardRepository();
        foreach ($repository->getCached() as $module) {
            $modules[] = $this->denormalizeLaravelModule($module, $repository->isEnabled($module['name']));
        }
        return $modules;
    }

    public function getCachedEnabled(): array
    {
        $modules    = [];
        $repository = $this->getNvidardRepository();
        foreach ($repository->allEnabled() as $module) {
            $modules[] = $this->convertNwidardModuleToLaravelModule($module);
        }
        return $modules;
    }

    public function delete(string $module): bool
    {
        return $this->getNvidardRepository()->delete($module);
    }

    private function getNvidardRepository(): RepositoryInterface
    {
        if (!$this->laravel->has('modules')) {
            throw new GameapException('Unable to find modules container');
        }

        return $this->laravel->get('modules');
    }

    private function convertNwidardModuleToLaravelModule(Module $module): LaravelModule
    {
        $moduleJson = $module->json();

        $laravelModule = new LaravelModule();

        $laravelModule->id          = $module->getAlias();
        $laravelModule->name        = $module->getName();
        $laravelModule->description = $module->getDescription();
        $laravelModule->tags        = $moduleJson->get('keywords', []);
        $laravelModule->isEnabled   = $module->isEnabled();
        $laravelModule->icon        = $moduleJson->get('icon');
        $laravelModule->mainRoute   = $moduleJson->get('main-route');

        return $laravelModule;
    }

    private function denormalizeLaravelModule(array $module, bool $isEnabled): LaravelModule
    {
        $laravelModule = new LaravelModule();

        $laravelModule->id          = $module['alias'] ?? '';
        $laravelModule->name        = $module['name'] ?? '';
        $laravelModule->description = $module['description'] ?? '';
        $laravelModule->tags        = $module['keywords'] ?? [];
        $laravelModule->isEnabled   = $isEnabled;
        $laravelModule->icon        = $module['icon'] ?? null;
        $laravelModule->mainRoute   = $module['main-route'] ?? null;

        return $laravelModule;
    }
}

<?php

namespace App\Services\Admin\Simulator;

use App\Repositories\Admin\Simulator\AdminSimulatorLanguageWordRepository;
use Illuminate\Database\Eloquent\Model;

class AdminSimulatorLanguageWordService
{
    /**
     * @var AdminSimulatorLanguageWordRepository
     */
    private AdminSimulatorLanguageWordRepository $adminSimulatorLanguageWordRepository;

    /**
     * QuizService constructor.
     * @param AdminSimulatorLanguageWordRepository $adminSimulatorLanguageWordRepository
     */
    public function __construct(AdminSimulatorLanguageWordRepository $adminSimulatorLanguageWordRepository)
    {
        $this->adminSimulatorLanguageWordRepository = $adminSimulatorLanguageWordRepository;
    }

    /**
     * @param array $data
     * @return Model
     */
    public function create(array $data): Model
    {
        return $this->adminSimulatorLanguageWordRepository
            ->create($data['body']);
    }

    /**
     * @param array $data
     * @param int $id
     * @return bool
     */
    public function update(array $data, int $id): bool
    {
        return $this->adminSimulatorLanguageWordRepository
            ->update($data['body'], $id);
    }

    /**
     * @param int $id
     * @return bool
     */
    public function delete(int $id): bool
    {
        return $this->adminSimulatorLanguageWordRepository
            ->delete($id);
    }

    /**
     * @param int $simulatorId
     * @return Model|null
     */
    public function getSimulatorLanguageWordById(int $simulatorId): ?Model
    {
        return $this->adminSimulatorLanguageWordRepository
            ->findOneById($simulatorId);
    }

    /**
     * @param array $queryOptions
     * @return array
     */
    public function getSimulatorLanguageWords(array $queryOptions): array
    {
        $queryOptions['table'] = $this->adminSimulatorLanguageWordRepository
            ->getTableName();

        return $this->adminSimulatorLanguageWordRepository
            ->get($queryOptions);
    }
}
